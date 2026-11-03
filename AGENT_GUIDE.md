# FOR AGENTS — YAK Decoder V3 engineering handoff

**Audience: coding agents and maintainers, not end users.** Read this file when entering a new session or account. It describes the current local V3 implementation and its engineering constraints; it does not authorize deployment or unrelated changes. User instructions and applicable `AGENTS.md` files take precedence.

Last checked against code: **2026-11-03**. Application/UI version: **0.32**. All paths below are relative to the project root. No private workspace, account credentials, or external test folders are required to understand this guide.

## 1. Start here

1. Confirm the requested project and branch. V3 belongs to `main`; V2 is a separate implementation on `2.x`. Do not synchronize the two libraries blindly.
2. Read this guide, then inspect the owning source for the behavior you will change. This document is a map, not proof that a later checkout still behaves identically.
3. Preserve existing edits; establish a baseline and back up files before substantial changes.
4. Reproduce the failure on an authored, safe fixture. Compare against the **obfuscated input**, not automatically against the pre-obfuscation source.
5. Make a focused change; test the original failure, intentional failure detection, then relevant regression suites.
6. Report exact scope: files, PHP targets, variant counts, residual goto, behavior comparisons, and any partial results.

Repository: [Dell2201/YAK-DECODER](https://github.com/Dell2201/YAK-DECODER). Release `v0.32` includes the test hardening, `tests/test_support.py`, `tests/native_process.ps1`, and this guide. Verify actual Git state before publishing; do not infer synchronization from the UI version.

## 2. Product and compatibility boundaries

V3 is a local Windows x64 application that turns YAK-style flattened PHP control flow into readable PHP. It reconstructs conditions, loops, and multi-level controls; decodes PHP string escapes through parsing; and prints the resulting AST. It does not recover original renamed identifiers.

| Component | Current implementation |
|---|---|
| Obfuscator family | YAK Pro 3.x / upstream `master`; stress corpus generated with 3.0.2 |
| Parser | Vendored nikic/PHP-Parser 5.9.0, `lib/decoder/vendor/php-parser5/` |
| Server and decoder host | Bundled PHP 7.4.33, `runtime/php/php.exe` |
| Selectable source/output targets | 7.4, 8.1, 8.2, 8.3; default 7.4 |
| Syntax-check runtimes | 7.4.33 / 8.1.34 / 8.2.35 / 8.3.36 |
| UI version | 0.32; independent of parser, PHP, and obfuscator versions |

The selected target controls parsing, printing, and output lint. It does not switch the host worker to PHP 8 or migrate the submitted program between PHP versions. Other PHP targets and operating systems require separate work.

**The application never executes submitted PHP.** Only application-owned worker/lint commands run. Differential tests execute specifically authored safe programs; never substitute arbitrary uploaded modules, live application files, or unreviewed PHP into those tests.

## 3. Source map

| File | Responsibility / when to inspect |
|---|---|
| `start.cmd` | Bundled-runtime check; local server on `127.0.0.1:18090`, DocumentRoot `public/` |
| `public/index.html` | Editor, target-PHP selector, signature option, batch controls and explanatory text |
| `public/assets/styles.css` | Presentation; includes `.batch-file-rules` |
| `public/assets/app.js` | Single requests, chosen PHP, original-text restoration, result checks |
| `public/assets/batch-ui.js` | Batch request transport, selected PHP, progress, cancellation, downloads |
| `public/assets/batch-core.js` | Entries/paths, file classification, statuses, limits, report, ZIP/CRC-32 |
| `public/decode.php` | HTTP validation and mapping to `DecoderProcess` |
| `app/DecoderProcess.php` | Isolated worker, resource limits, target runtime selection, mandatory output lint |
| `app/worker.php` | STDIN normalization, `Deobfuscator`, AST goto counters, JSON response |
| `lib/decoder/Deobfuscator.php` | AST ownership, recursive regions, fallback validation, diagnostics, printing |
| `lib/decoder/CfgStructurer.php` | Basic blocks, graph analysis, region/loop emission and loop controls |
| `lib/decoder/autoload.php` | Vendored parser registration |
| `tests/decode_version_fixture.php` | Test bridge through the real process/lint pipeline |
| `tests/count_fixture_gotos.php` | Independent token counter; run with the fixture's target PHP |
| `tests/test_support.py` | Explicit checks, manifest integrity, deferred snapshot publication |
| `tests/native_process.ps1` | Exact native stdout/stderr capture and successful-exit comparison |
| `tests/cases/` | Reproducible authored corpora, regressions, manifests, snapshots |

Further references: [PROJECT_HANDOFF.md](PROJECT_HANDOFF.md), [HANDOFF_DECODER_FIXES.md](HANDOFF_DECODER_FIXES.md), [LIMITS.txt](LIMITS.txt), [tests/cases/README.md](tests/cases/README.md). README is deliberately user-facing; keep engineering commands and internal details in agent/maintenance documents.

## 4. Request and file pipeline

```text
editor or dropped folder
  -> browser validates size/signature and selects target PHP
  -> POST decode.php (JSON)
  -> DecoderProcess -> worker.php (STDIN, separate PHP 7.4 process)
  -> parse target AST -> restructure regions -> print target PHP
  -> selected PHP CLI --syntax-check (temporary output file)
  -> syntaxChecked result -> editor or browser-built ZIP
```

Request: `code` string, optional boolean `requireYakSignature`, optional boolean `completeFile`, optional string `phpVersion` from the four supported targets. Fragment mode adds a PHP opening tag when absent. Batch mode sends `completeFile:true`, preserving leading HTML. UTF-8 BOM is removed.

Success includes `ok`, `code`, `gotoBefore`, `gotoAfter`, `syntaxChecked`, and `syntaxPhpVersion`. A successful parse/restructure alone is insufficient: `DecoderProcess` must complete lint before returning success. Browser code rejects successful-looking responses without syntax confirmation; V3 transport also checks the requested syntax version.

Goto counters in V3 worker come from parsed `Stmt\Goto_` nodes, not the PHP 7.4 host tokenizer. For independent verification, tokenize with the **target runtime**. Comments and string literals containing `goto` are not transitions.

### Batch behavior that must survive changes

- Candidate extensions: `.php`, `.php0`–`.php9`, `.phtml`, `.inc`, `.tpl`, case-insensitive.
- A file needs `<?php` or `<?=` to be sent for conversion. A file containing only short `<?` tags is copied unchanged. Smarty/Twig syntax is not converted by this decoder.
- Full mixed HTML/PHP is sent together. Other file types, hidden files, and ineligible templates are copied as bytes.
- Processing is recursive and sequential; original disk files are not overwritten. Root names, nesting, and empty directories are retained.
- `decoded`: linted output, zero goto. `partial`: linted output with remaining goto. `kept`: unchanged/ineligible. `warning`: size/encoding issue, unchanged bytes. `error`: conversion/lint failed, unchanged bytes.
- Signature filtering requires exact case-sensitive text `Obfuscated by YAK Pro - Php Obfuscator`; it is not an authenticity check. The option defaults to off.
- Partial/warning/error entries create `yak-decoder-report.txt`, with collision-safe suffixes, chosen PHP version, categorized paths and reasons. Completely successful batches create no report.
- ZIP is generated in the browser, STORE/no compression, UTF-8 names, CRC-32. Do not replace byte-preserving copies with text re-encoding.
- Path validation rejects traversal, absolute paths, duplicates, and file/directory conflicts. Cancellation/transport failure aborts batch completion; per-file decoding errors retain originals.

## 5. How reconstruction works

### 5.1 `Deobfuscator`: region ownership and safety

`processFile()` creates a parser with `PhpVersion`, counts goto AST nodes, removes obfuscator marker comments, processes the tree, counts output nodes, and prints with `DeobPrinter` configured for the same target version.

`processTopLevel()` processes nested bodies first. This preserves independent function/class-body successes when top-level restructuring fails.

`processBody()` is the conversion boundary:

1. Detect direct labels/goto or a nested body needing supplied controls.
2. Record labels originally defined in this region.
3. Pre-walk nested bodies. Bodies requiring an enclosing loop's labels may fail provisionally and be retried later.
4. Clear stale `deob_controls` attributes from earlier emissions; retain the explicitly supplied controls map.
5. Clone the work AST so a failed attempt can return the preserved region.
6. Build `CfgStructurer`, determine reachable blocks, dominators, and loops.
7. Count semantic payload of reachable statements **and branch conditions** before emission.
8. Emit structured statements and compare payload counts. Loss or duplication rejects the attempt.
9. Retry nested emitted bodies with controls attached during emission.
10. If goto remains, verify it does not target a label removed by restructuring this region or a sibling.
11. Commit the successful result; otherwise preserve the region with diagnostics.

`preWalk`, `ctxStack`, and `scopeStack` coordinate quiet provisional attempts, contextual diagnostics, and label scopes of bodies kept intact. `removedBlocks` records unreachable-code audit information; it must be rolled back when a later safety check rejects the region.

`collectPayload()` counts semantic atoms; rebuilding control-flow wrappers is allowed. It deliberately ignores labels/goto/break/continue/nop wrappers and accommodates synthetic loop conditions. **Payload equality is a structural guard, not a proof of execution order or full semantic equivalence.** Keep differential behavior tests.

`keptGotosAreStable()` permits a partial success only when remaining targets are still valid. Never remove this guard just to obtain zero goto.

`processNested()` handles function/closure scopes, loop bodies, switch cases, and transparent try/catch/finally bodies. Controls have a kind and depth; an inherited context must not leak into another function or closure.

### 5.2 `CfgStructurer`: graph and emission

- `build()` splits statement lists at relevant labels, gotos, conditional-goto shapes, terminators, and native foreach/switch boundaries.
- `resolveBlock()` follows empty aliases/fall-through chains. `target()` resolves a local block or an `OUTER:<label>` marker for an inherited control.
- `reachable()` isolates reachable graph nodes; `dominators()` supports back-edge/loop discovery.
- `findLoops()` finds loop regions and parent contexts; irreducible or unsupported graphs are rejected conservatively.
- `merge()` uses postdominators with a virtual exit and region-limited joins/distances. A join outside the appropriate region can duplicate a loop increment or other side effect.
- `emitRegion()` / `emit()` produce statements, branches, loops and controls. Emission budgets prevent runaway reconstruction or excessive duplication.
- `loopControl()` and `emitControl()` map targets to break/continue with correct depth, including inherited `OUTER` targets.
- A dedicated single increment/latch block can become the `loop` expression of a reconstructed `for`. Its `continueBlock` is crucial for nested continue-to-outer-for semantics.
- `attachBodyControls()` / `attachNestedControls()` attach label-to-control context while the enclosing CFG still exists. Later nested processing consumes it.

Try/catch/finally add **zero** to break/continue depth. Loops and switch add a level. A for continue can target its increment, not its condition. A do-loop's body header is not automatically its correct continue target; respect `hasHeaderCond` and the actual graph.

Safety budgets currently include a 6000-statement region guard, a 4000-node dominator guard, per-block emission budget 8, and total duplicate-emission budget 120. Check source before changing them. Reaching a guard is a fallback/resource result, not permission to discard logic.

### 5.3 Printer and parser migration details

`DeobPrinter::pScalar_String()` prints readable strings while preserving byte values, including control characters, quotes, backslashes and dollars. Do not optimize quoting by changing the resulting PHP string's bytes or interpolation behavior.

V3 uses PHP-Parser 5 node APIs, including `Scalar\Int_` and expression-form `Expr\Throw_` wrapped in a statement. V2 uses parser 4 APIs. Check actual node shapes/constructor contracts when transferring a fix. Some inherited comments or diagnostic labels still refer to older implementation details; runtime source and tested AST shape take priority.

## 6. Failure history: symptoms, causes, fixes

| Case | Root cause / fix to preserve |
|---|---|
| Legacy stress kept all 403 goto | A final blanket rejection of any remaining goto discarded independent nested successes. Use region-local partial success plus stable-target validation. The supplied legacy example now reaches zero goto. |
| Nested loops: `multiple loop exits` | Empty jump aliases were not consistently resolved; loop region discovery missed external-control paths; multi-level targets and for increments lacked proper contexts. Resolve fall-through, extend loop regions, track parent controls and a dedicated increment block. |
| Nested foreach inside conditional branches | Context was attached only to directly emitted statements. Recurse through transparent branches to body owners while preserving scope and tail position. |
| Retry fails with `unknown jump target` | `deob_controls` from a discarded/pre-walk CFG survived into a new attempt. Strip stale attributes before each region attempt and pass the current explicit context. |
| foreach → try/finally → continue outer for | Only the outer header/exit were exposed; the increment target was omitted. Propagate `continueBlock` and retry nested owners with it. Regression: `foreach-finally-continue.php`. |
| foreach/for/switch inside try/catch/finally | Context stopped at try/catch or already restored loops; transparent exception bodies were treated at the wrong depth. Pass context through try, catches, finally and for/while/do bodies without adding a try level. Regression: `try-catch-loop-controls.php`; stress-B nested/retry scenarios. |
| Condition at loop latch disappeared | Both branch arms hit stop sets and emitted nothing; the branch condition was silently lost. Emit continue for a branch to the active loop header; reject both-arms-stopped cases instead of dropping the condition. Regression: `tfc-latch-obfuscated.php`, 78 → 0 goto. |
| Wrong branch merge duplicated side effects | A common join outside the current region was selected, potentially re-emitting an increment. Restrict join reasoning to the appropriate region; test condition/increment side effects, not only final values. |
| PHP 8.3 goto counter reported zero | Host PHP 7.4 tokenization was unsuitable for newer syntax. Worker now counts target-parser AST nodes; suite B and hardened suite A cross-check with target-runtime tokenization. |
| Native throw AST could be treated incorrectly after parser migration | Parser 5 represents throw as an expression. Graph termination must recognize the actual AST wrapper; exercise dead statements after throw and catches. |
| Large valid JSON rejected before decoding | Code size and escaped transport size were separate limits. Keep 5 MiB code vs 32 MiB JSON consistent across endpoint, worker, UI and server flags. |

### Intentional fallback and upstream damage

`tests/cases/regressions/crosslevel-test.php` intentionally retains **3 goto** and preserves behavior. It protects against orphaned labels across nested scopes. Do not redefine every successful safety test as requiring zero goto.

YAK can change semantics before decoding. In the investigated YAK Pro 2.0.17 do/continue example, the source result was `[2,[1]]`, while obfuscated input and correct decoded output produce `[3,[1,3]]`. Preserve the latter for that input.

`tests/cases/stress-a/upstream-errors/` holds examples broken by YAK's full renaming of newer syntax (enum references, type relationships, readonly/promoted-property behavior). Keep them separate from valid-input success statistics. Do not silently change the decoder to emulate an unavailable original program.

## 7. Test corpus and what the numbers mean

| Location / runner | Scope |
|---|---|
| `examples/stress-yak-obfuscated.php` | Legacy 403-goto example; final_check exercises several seed values |
| `tests/cases/stress-legacy/` | 25 stored legacy variants/snapshots and historical metadata; do not assume all 25 are rerun by final_check |
| `tests/php8_stress_test.py` → stress A | 75 variants: 25 each for PHP 8.1/8.2/8.3; 7 seeds each; 24 scenario rows per execution; 525 behavior comparisons |
| `tests/stress_suite_b_test.py` → stress B | 100 variants: 25 each for PHP 7.4/8.1/8.2/8.3; 7 seeds each; 6 seed offsets per execution; 700 behavior comparisons |
| `tests/php_version_test.py` | Target selection, signature validation, version-specific syntax, semantics and minimal finally/catch regressions; currently 63 checks |
| `tests/portable_runtime_test.py` | Bundled CLI, ignored system configuration, self-started server and 29 HTTP checks |
| `tests/batch_test.js` | Four target PHP versions × signature on/off = eight batch archives |
| `tests/verify_batch_zip.py` | Independent ZIP CRC/entries/bytes, report PHP version, duplicate-entry rejection, target-runtime lint |
| `tests/external_no_goto_test.py` | Explicit supplied folders, independent count and syntax checks only; never executes submitted files |

At this handoff, full A+B passed **175 variants / 1225 behavior comparisons**, zero residual goto in those cases. Source/output execution must both succeed, with byte-identical stdout and stderr. These results do not establish equivalence for arbitrary PHP or prove that every possible branch is tested.

The stored decoded files are examples/snapshots, **not the semantic oracle**. Runners decode inputs again. Their behavior oracle is the obfuscated fixture. An equal crash is not success.

## 8. Test hardening

Earlier tools could give misleading success; preserve the following changes:

- `cmp_json.php` compares complete decoded JSON structures, including extra rows/fields, validates the expected output shape, and returns 1 on mismatch or invalid input. JSON array/object-key ordering and scalar types remain strict under its associative-array comparison.
- Python runners use `test_support.require()` instead of removable `assert` statements. Important checks still run under `python -O`.
- Manifest validation rejects empty, incomplete or duplicated corpora, unsupported versions, escaping paths and source/snapshot collisions. Current declared counts are exactly 25 per supported version in each suite.
- Both A and B require all declared hit markers to be observed. Both cross-check worker goto statistics using target-runtime tokenization.
- B's `--update-snapshots` buffers decoded bytes and writes only after the entire run and coverage checks pass. `--quick --update-snapshots` is rejected. This prevents test failures from partially updating baselines; it is not a transactional guarantee against a later disk-write failure.
- `native_process.ps1` captures both native streams as bytes and checks exit codes; PowerShell comparisons use case-sensitive base64 equality. Do not regress to `Out-String` equality or compare only stdout.
- `final_check.ps1` checks decoder exit codes and exact behavior. The corpus/HTTP scratch scripts fail on partial output, lint errors or unsuccessful/different execution. The corpus counter uses PHP tokens, not substring search.
- Batch requests explicitly send `phpVersion`; successful responses must identify the requested target. ZIP verification requires all eight combinations and uses the respective CLI for lint.

Previously observed false successes included `cmp_json.php` printing a difference with exit 0, extra JSON rows/fields being ignored, empty manifests printing an all-passed message, and scratch tools merely displaying a failure count. Do not reintroduce these patterns.

The hardening was checked with intentional mismatches, missing/duplicate cases, remaining goto, missing coverage, unequal exit codes, stderr, letter case and newlines; late failing snapshot updates preserved old files. Both ordinary and optimized Python were exercised. Actual suites passed under optimized Python as well. New meta-tests should follow the current session's test-directory rules; do not depend on private paths from an earlier account.

## 9. Commands: run from project root

Prerequisites for development checks: Python 3.9+ (uses `Path.is_relative_to`), Node.js with built-in `fetch` support (18+), Windows PowerShell, bundled PHP runtimes. Normal end-user operation needs neither Python nor Node.

### Quick baseline

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File tests/final_check.ps1
python tests/stress_suite_b_test.py --quick
python tests/php_version_test.py
```

### Full decoder and HTTP checks

```powershell
python tests/php8_stress_test.py
python tests/stress_suite_b_test.py
python tests/portable_runtime_test.py
```

To verify checks are not disabled by optimization, repeat an affected Python runner with `python -O`. A test tool change also needs intentional negative cases; a green corpus alone does not demonstrate that the runner detects failure.

`portable_runtime_test.py` and `php_version_test.py` start and stop their own test servers on available ports. For direct `http_test.py` or batch checks, start the site first:

```powershell
.\start.cmd
```

Then in another shell:

```powershell
python tests/http_test.py http://127.0.0.1:18090/
node tests/batch_test.js "$env:TEMP/yak-batch-check" http://127.0.0.1:18090/decode.php
python tests/verify_batch_zip.py "$env:TEMP/yak-batch-check"
```

### Decode and inspect a minimal authored fixture

```powershell
& .\runtime\php\php.exe -n tests/decode_version_fixture.php input.php decoded.php 8.3
& .\runtime\php83\php.exe -n -l input.php
& .\runtime\php83\php.exe -n -l decoded.php
& .\runtime\php83\php.exe -n tests/count_fixture_gotos.php input.php decoded.php
```

The bridge prints JSON metadata and writes output only on application success. Inspect the bridge exit code **and** returned `ok`, `syntaxChecked`, `syntaxPhpVersion`, and counts. Use 7.4/php, 8.1/php81, 8.2/php82 or 8.3/php83 consistently.

For PHP 7.4 graph diagnostics:

```powershell
& .\runtime\php\php.exe -n tests/diag.php input.php decoded.php
```

`diag.php` is a diagnostic tool, not a strict pass/fail oracle: it prints attempted-region failures, and its current default decoder target/counter are PHP 7.4. Some failures are provisional or expected. For PHP 8.x use the version-aware bridge/counter; adapt a dedicated local diagnostic harness if you need target-specific internal traces.

Other graph tools: `dump_cfg.php`, `dump_case.php`, `dump_fn.php`, `run_fn.php`, `emit_direct.php`, and `tests/scratch/dump_method.php`. Inspect each CLI contract and target-version assumptions before use. Tools that execute a function need the same authored-fixture restriction as behavior tests.

## 10. Adding a regression that actually catches the bug

1. **Minimize the failing control-flow shape.** Remove framework dependencies, filesystem/network effects, credentials, real orders, or other live operations. Keep only bounded deterministic computation.
2. **Keep observability.** Record an ordered trace or JSON result. Put a distinguishable statement after the inner loop so `break inner` cannot masquerade as `continue outer`. Trace finally execution and side effects of conditions/increments.
3. **Exercise the relevant branches.** Choose seeds/arguments reaching normal paths, early return, throw/catch, cleanup, multi-level break/continue and fall-through. Hit markers are useful only if the runner requires them.
4. **Keep the actual obfuscated input.** For an obfuscator-pattern fix, generate multiple variants with the appropriate genuine YAK version; preserve source, config, generated input and reproducible command. Renaming categories can break the obfuscator independently; record the exact profile.
5. **Use three comparisons deliberately.** Source→obfuscated reveals upstream damage; obfuscated→decoded is the decoder requirement; snapshot text is supplementary. Do not count a known broken obfuscated input as successful recovery.
6. **Check lint and real goto counts on target PHP.** Do not search raw text for `goto ` or use PHP 7.4 tokenization as evidence about PHP 8.3 source.
7. **Compare `(exit code, stdout bytes, stderr bytes)`** for every selected input; require exit code 0 for these successful fixtures. Use subprocess timeouts so a bad loop cannot hang the run indefinitely.
8. **Place small cases in `tests/cases/regressions/` when permitted by the current project/session instructions.** For a new corpus, explicitly wire the case into a runner; merely adding a `.php` file does not ensure any existing command runs it.
9. **Update manifest counts consciously.** A/B currently require 25 per version. Adding/removing variants requires a corresponding reviewed change to expected counts and documentation. Do not lower expected coverage/counts merely to hide a failing test.
10. **Test the harness itself.** Feed it different values, extra JSON fields/rows, partial output, empty/incomplete/duplicate manifests, missing markers, nonzero exits and changed stderr. Expect nonzero command completion. Verify failure leaves snapshots untouched.

Minimal behavior-comparison pattern for an authored fixture (replace paths and target runtime):

```python
import subprocess

def execute(runtime, file, seed):
    result = subprocess.run([runtime, '-n', file, str(seed)],
                            capture_output=True, timeout=10)
    if result.returncode != 0:
        raise RuntimeError((file, seed, result.returncode, result.stderr))
    return result.returncode, result.stdout, result.stderr

for seed in [-7, -1, 0, 1, 3, 11, 42]:
    if execute(runtime, obfuscated, seed) != execute(runtime, decoded, seed):
        raise RuntimeError(('Behavior mismatch', seed))
```

For snapshots, run `python tests/stress_suite_b_test.py --update-snapshots` only when an intentional output change has already been justified. Review the resulting diff; snapshot refresh does not prove correctness. Suite A currently has no equivalent update switch; do not invent one in documentation.

## 11. Debugging checklist by symptom

| Symptom | First inspection |
|---|---|
| `unknown jump target` | Missing inherited control, stale attributes, target removed too early, incorrect alias resolution |
| `multiple loop exits` | Parent loop context, natural-loop extension, alias/fall-through targets, increment blocks |
| `payload mismatch` | Dropped condition/expression, duplicated branch, incorrect merge; inspect expected/actual atoms |
| `cross-level goto in kept nested body` | Remaining nested goto targets an enclosing/sibling label being removed; fix propagation, not the guard |
| `branch with both arms stopped` | Both successors suppressed by stop sets; explicit continue/break or a better merge may be needed |
| Lint fails after printing | Target parser/printer configuration, AST wrapper/constructor contracts, generated break/continue depth |
| Valid lint but behavior differs | Evaluation order, loop latch, side-effect duplication, early exits, finally execution, scope leakage |
| AST goto count differs from independent count | Wrong target tokenizer or worker version/counter implementation |
| Batch only fails on PHP 8.x | Missing `phpVersion` in transport, wrong `syntaxPhpVersion`, missing target runtime |
| Archive verification fails on extra file | Generated report and collision rules; do not delete the report to satisfy stale expectations |
| Test reports success after a deliberate failure | Runner exit logic, disabled asserts, incomplete corpus, ignored stderr/exit code, snapshot timing |

## 12. Limits, packaging, and publishing

Current limits: 5 MiB code, 32 MiB JSON, 5000 batch files, 10000 ZIP entries including directories/report, 100 MiB input and 150 MiB result-file data. Worker: 2 GiB memory, 20-second PHP execution setting, 25-second outer timeout, 64 MiB process output buffer. Lint: 512 MiB, 5 seconds, 64 KiB output. Browser request timeout: 35 seconds. See source and `LIMITS.txt` for coordinated changes.

All bundled CLI commands use `-n`. The target syntax paths currently name Windows `php.exe` files explicitly; `YAK_PHP_BINARY` alone does not make the full multi-runtime package portable to Linux.

When publication is requested:

1. Inspect the current remote/branch/tag/release state. Use the current account owner and canonical repository URLs; account renames can leave redirected old links in docs and metadata.
2. Synchronize the requested local V3 into `main`, excluding caches, scratch outputs, credentials and **nested `.git` directories** in vendored dependencies.
3. Preserve runtime binaries, dependency licenses, manifests and all needed static assets. Do not silently update parser/runtime dependencies during packaging.
4. Synchronize the UI version in `public/index.html`, README, handoff version text and LIMITS header. Screenshot filenames may describe an older captured UI; do not relabel an old screenshot as a newly rendered image.
5. Build an archive, verify entry list/CRC and content against the intended source, compute SHA-256, extract it into an isolated folder and verify startup and relevant suites there.
6. Review the final diff. Publish only the requested branch and release; verify the remote commit/tag and uploaded asset digests. Existing releases are not evidence that subsequent local changes were included.
7. Authentication belongs in configured credentials/environment, never the repository, archive, guide, logs or release notes. Do not copy private folder names or investigative datasets into public documentation.

## 13. Maintenance rules for the next agent

- **Maintaining this guide is part of the implementation task**, not optional follow-up. See [AGENTS.md](AGENTS.md) for the required update checklist. Update affected architecture, behavior, compatibility, limits, tests, failure history, commands and local/publication status whenever a substantive change affects them. Cosmetic changes need a relevance check, not an artificial rewrite.
- This is a constrained reconstruction algorithm, not a general PHP equivalence prover. Safe partial output is a supported result.
- Preserve AST payload and stable-target guards. Fix the graph/context defect that triggers fallback; do not suppress evidence of it.
- Tests returning green must mean the intended cases actually ran and relevant failures produce nonzero exit codes.
- Report provisional diagnostics separately from final residual goto; attempted nested conversions can fail before a later successful retry.
- Do not execute unreviewed submitted PHP even when asked to count transitions or lint a module.
- Keep changes scoped. Separate decoder correctness, test-tool correctness, presentation, and publication tasks in the explanation and review.
- After a meaningful change, update this guide's affected facts and check commands, not an unbounded chronological transcript. Remove stale facts rather than appending contradictory status sections.
