# Agent instructions — YAK Decoder V3

Read [AGENT_GUIDE.md](AGENT_GUIDE.md) before making substantive changes. It is the engineering handoff for future agents and accounts; verify relevant facts against the current source.

## Keep the agent guide current

Updating `AGENT_GUIDE.md` is part of completing any substantive change that affects its contents. This includes changes to:

- decoder architecture, algorithms, scope/control propagation, safety guards, or fallback behavior;
- supported PHP/parser/obfuscator versions, bundled runtimes, input formats, or limits;
- application behavior, transport contracts, batch processing, ZIP/report rules, or file layout;
- test runners, corpus composition, expected counts, coverage, commands, snapshot handling, or failure detection;
- a reproducible decoder defect, its cause, fix, and protecting regression;
- release/version information or the distinction between local and published changes.

Before finishing the task:

1. Identify affected guide sections and update them in the same task as the implementation.
2. Replace obsolete facts; do not append contradictory status notes or a verbose session transcript.
3. Verify referenced files and commands. State test results with their actual scope; never imply an old result was rerun.
4. Update the guide's verification date only when its relevant facts have actually been checked. Mark unresolved uncertainty explicitly.
5. Keep paths relative and content independent of private folders, credentials, machine details, and the current account.
6. Include required guide changes in the same publication when publishing the associated implementation is authorized.

For a cosmetic change that does not affect any guide fact, review the guide for relevance; no artificial text change is required.
