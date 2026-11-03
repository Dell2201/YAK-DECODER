<?php

namespace DecoderCoverage;

const TEST_OFFSET = 7;
$coverage = [];
function hit($label)
{
    global $coverage;
    $coverage[$label] = isset($coverage[$label]) ? $coverage[$label] + 1 : 1;
}
function simpleIf($n)
{
    $result = 0;
    if ($n > 0) {
        hit('if.true');
        $result = $n * 2;
    }
    if ($n <= 0) {
        hit('if.false-path');
    }
    return $result;
}
function ifElse($n)
{
    if ($n % 2 === 0) {
        hit('else.then');
        return 'even';
    } else {
        hit('else.else');
        return 'odd';
    }
}
function elseifChain($n)
{
    if ($n < 0) {
        hit('elseif.negative');
        return -1;
    } else if ($n === 0) {
        hit('elseif.zero');
        return 0;
    } else if ($n < 3) {
        hit('elseif.small');
        return 1;
    } else {
        hit('elseif.large');
        return 2;
    }
}
function nestedConditions($n, $flag)
{
    $trace = [];
    if ($n > 0 && ($flag || $n > 3)) {
        hit('nested.outer-true');
        $trace[] = 'outer';
        if ($n % 2) {
            hit('nested.inner-odd');
            $trace[] = 'odd';
        } else {
            hit('nested.inner-even');
            $trace[] = 'even';
        }
    } else if ($flag && $n < 0) {
        hit('nested.elseif');
        $trace[] = 'negative';
    } else {
        hit('nested.else');
        $trace[] = 'fallback';
    }
    return $trace;
}
function forLoop($n)
{
    $trace = [];
    $i = 0;
    $j = 10;
    for (; $i < $n; $j -= 2) {
        hit('for.body');
        if (!($i === 1)) {
            $trace[] = [$i, $j];
            if ($i === 4) {
                hit('for.break');
                break;
            }
        } else {
            hit('for.continue');
        }
        $i++;
    }
    if (!$trace) {
        hit('for.zero');
    }
    return [$i, $j, $trace];
}
function whileLoop($n)
{
    $i = 0;
    $trace = [];
    while ($i < $n) {
        hit('while.body');
        $i++;
        if (!($i === 2)) {
            $trace[] = $i;
            if (!($i === 5)) {
                continue;
            } else {
                hit('while.break');
                break;
            }
        } else {
            hit('while.continue');
        }
    }
    if ($i === 0) {
        hit('while.zero');
    }
    return [$i, $trace];
}
function doWhileLoop($n)
{
    $i = 0;
    $trace = [];
    while (true) {
        hit('do.body');
        $i++;
        if (!($i === 2)) {
            $trace[] = $i;
            if (!($i === 5)) {
                if ($i < $n) {
                    continue;
                } else {
                    break;
                }
            } else {
                hit('do.break');
                break;
            }
        } else {
            hit('do.continue');
        }
    }
    if ($i === 1) {
        hit('do.once');
    } else {
        hit('do.repeat');
    }
    return [$i, $trace];
}
function sideEffectConditions($n)
{
    $checks = 0;
    $trace = [];
    while (++$checks <= max(0, $n)) {
        $trace[] = $checks;
    }
    $post = 0;
    do {
        $trace[] = -$post;
    } while ($post++ < min(3, max(0, $n)));
    hit('conditions.side-effects');
    return [$checks, $post, $trace];
}
function emptyLoops($n)
{
    $i = 0;
    while ($i < min(3, max(0, $n))) {
        $i++;
    }
    $j = 0;
    while ($j++ < min(2, max(0, $n))) {
    }
    while ($j++ < 1) {
    }
    hit('loops.empty');
    return [$i, $j];
}
function infiniteLoopWithExit($n)
{
    $i = 0;
    $sum = 0;
    while (!($i >= max(0, $n))) {
        $sum += ++$i;
    }
    hit('infinite.break');
    return [$i, $sum];
}
function nestedLoopControl($n, $flag)
{
    $trace = [];
    $i = 0;
    for (; $i < min(4, max(0, $n)); $i++) {
        $j = 0;
        for (; $j < 4; $j++) {
            if (!($j === 1 && $flag)) {
                if (!($i === 2 && $j === 2)) {
                    $trace[] = [$i, $j];
                } else {
                    hit('nested.break-two');
                    break 2;
                }
            } else {
                hit('nested.continue-two');
                continue 2;
            }
        }
        $trace[] = 'end-outer';
    }
    return $trace;
}
function mixedNativeLoops($n, $flag)
{
    $trace = [];
    foreach ([0, 1, 2] as $outer) {
        $i = 0;
        for (; $i < min(4, max(0, $n)); $trace[] = [$outer, $i]) {
            $i++;
            if (!($flag && $i === 2)) {
                if (!$flag && $outer === 1 && $i === 3) {
                    hit('mixed.break-two');
                    break 2;
                }
            } else {
                hit('mixed.continue-two');
                continue 2;
            }
        }
        $trace[] = 'native-end';
        continue;
    }
    return $trace;
}
function switchAndLoop($n)
{
    $trace = [];
    $i = 0;
    for (; $i < min(5, max(0, $n)); $i++) {
        switch ($i) {
            case 0:
                hit('switch.zero');
                $trace[] = 'zero';
                break;
            case 1:
            case 2:
                hit('switch.shared');
                $trace[] = 'shared';
                break;
            default:
                hit('switch.default');
                $trace[] = 'exit';
                break 2;
        }
        $trace[] = $i;
    }
    return $trace;
}
function earlyReturn($n)
{
    $trace = [];
    $i = 0;
    for (; $i < 5; $i++) {
        $trace[] = $i;
        if ($i === $n) {
            hit('return.early');
            return $trace;
        }
    }
    hit('return.normal');
    return $trace;
}
function exceptionPaths($n)
{
    $trace = [];
    try {
        if (!($n < 0)) {
            hit('exception.normal');
            $trace[] = $n;
        } else {
            hit('exception.throw');
            throw new \RuntimeException('negative');
        }
    } catch (\RuntimeException $error) {
        hit('exception.catch');
        $trace[] = $error->getMessage();
    } finally {
        hit('exception.finally');
        $trace[] = 'finally';
    }
    return $trace;
}
function closurePath($n)
{
    $factor = 3;
    $function = function ($value) use ($factor) {
        if ($value < 0) {
            hit('closure.negative');
            return -$factor;
        } else if ($value === 0) {
            hit('closure.zero');
            return 0;
        } else {
            hit('closure.positive');
            $sum = 0;
            $i = 0;
            for (; $i < $value; $i++) {
                $sum += $factor;
            }
            return $sum;
        }
    };
    return $function($n);
}
interface WorkerContract
{
    public function calculate($n);
}
trait OffsetTrait
{
    private function offset($n)
    {
        return $n + TEST_OFFSET;
    }
}
class Worker implements WorkerContract
{
    use OffsetTrait;
    const FACTOR = 2;
    private $base = 1;
    public function calculate($n)
    {
        if ($n > 0) {
            hit('class.positive');
            return $this->offset($n) * self::FACTOR;
        } else {
            hit('class.nonpositive');
            return $this->base;
        }
    }
}
interface Left82
{
    public function left(): int;
}
interface Right82
{
    public function right(): int;
}
readonly class Token82 implements Left82, Right82
{
    public function __construct(public int $value)
    {
    }
    public function left(): int
    {
        return $this->value;
    }
    public function right(): int
    {
        return $this->value + 2;
    }
}
function read82((Left82&Right82)|null $t): int
{
    return $t === null ? -1 : $t->left() + $t->right();
}
function yes82(): true
{
    return true;
}
function no82(): false
{
    return false;
}
function nil82(): null
{
    return null;
}
function versionFeature($n, $flag)
{
    $trace = [];
    $checks = 0;
    $i = 0;
    for (; $i < 3; $i++) {
        $j = 0;
        while (++$j <= 4) {
            switch (($i + $j) % 3) {
                case 0:
                    hit('v82.null');
                    $trace[] = read82(nil82());
                    break;
                case 1:
                    hit('v82.token');
                    $trace[] = read82(new Token82($n + $i));
                    break;
                default:
                    if (!($flag && $j === 2)) {
                        if (!(!$flag && $i === 2)) {
                            $trace[] = [yes82(), no82(), ++$checks];
                        } else {
                            hit('v82.break3');
                            break 3;
                        }
                    } else {
                        hit('v82.continue3');
                        break 2;
                    }
            }
        }
    }
    return [$trace, $checks];
}
$seed = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$rows = [];
$worker = new Worker();
$input = -3;
for (; $input <= 8; $input++) {
    foreach ([false, true] as $flag) {
        $n = $input + $seed % 3;
        $rows[] = ['input' => [$n, $flag], 'version-feature' => versionFeature($n, $flag), 'if' => simpleIf($n), 'else' => ifElse($n), 'elseif' => elseifChain($n), 'nested' => nestedConditions($n, $flag), 'for' => forLoop($n), 'while' => whileLoop($n), 'do' => doWhileLoop($n), 'conditions' => sideEffectConditions($n), 'empty' => emptyLoops($n), 'infinite' => infiniteLoopWithExit($n), 'nested-control' => nestedLoopControl($n, $flag), 'native' => mixedNativeLoops($n, $flag), 'switch' => switchAndLoop($n), 'return' => earlyReturn($n), 'exception' => exceptionPaths($n), 'closure' => closurePath($n), 'class' => $worker->calculate($n), 'strings' => ["n={$n}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($coverage);
echo json_encode(['rows' => $rows, 'coverage' => $coverage], JSON_UNESCAPED_UNICODE), "\n";