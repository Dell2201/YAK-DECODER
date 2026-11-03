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
    } elseif ($n === 0) {
        hit('elseif.zero');
        return 0;
    } elseif ($n < 3) {
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
    } elseif ($flag && $n < 0) {
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
    for ($i = 0, $j = 10; $i < $n; $i++, $j -= 2) {
        hit('for.body');
        if ($i === 1) {
            hit('for.continue');
            continue;
        }
        $trace[] = [$i, $j];
        if ($i === 4) {
            hit('for.break');
            break;
        }
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
        if ($i === 2) {
            hit('while.continue');
            continue;
        }
        $trace[] = $i;
        if ($i === 5) {
            hit('while.break');
            break;
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
    do {
        hit('do.body');
        $i++;
        if ($i === 2) {
            hit('do.continue');
            continue;
        }
        $trace[] = $i;
        if ($i === 5) {
            hit('do.break');
            break;
        }
    } while ($i < $n);
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
    for (; $i < min(3, max(0, $n)); $i++) {
    }
    $j = 0;
    while ($j++ < min(2, max(0, $n))) {
    }
    do {
    } while ($j++ < 1);
    hit('loops.empty');
    return [$i, $j];
}

function infiniteLoopWithExit($n)
{
    $i = 0;
    $sum = 0;
    for (;;) {
        if ($i >= max(0, $n)) {
            hit('infinite.break');
            break;
        }
        $sum += ++$i;
    }
    return [$i, $sum];
}

function nestedLoopControl($n, $flag)
{
    $trace = [];
    for ($i = 0; $i < min(4, max(0, $n)); $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($j === 1 && $flag) {
                hit('nested.continue-two');
                continue 2;
            }
            if ($i === 2 && $j === 2) {
                hit('nested.break-two');
                break 2;
            }
            $trace[] = [$i, $j];
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
        while ($i < min(4, max(0, $n))) {
            $i++;
            if ($flag && $i === 2) {
                hit('mixed.continue-two');
                continue 2;
            }
            if (!$flag && $outer === 1 && $i === 3) {
                hit('mixed.break-two');
                break 2;
            }
            $trace[] = [$outer, $i];
        }
        $trace[] = 'native-end';
    }
    return $trace;
}

function switchAndLoop($n)
{
    $trace = [];
    for ($i = 0; $i < min(5, max(0, $n)); $i++) {
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
    for ($i = 0; $i < 5; $i++) {
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
        if ($n < 0) {
            hit('exception.throw');
            throw new \RuntimeException('negative');
        }
        hit('exception.normal');
        $trace[] = $n;
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
        } elseif ($value === 0) {
            hit('closure.zero');
            return 0;
        } else {
            hit('closure.positive');
            $sum = 0;
            for ($i = 0; $i < $value; $i++) {
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

// PHP 8.1 syntax integrated with control flow and side effects.
enum Phase81: string { case Ready='ready'; case Done='done'; }
interface Left81 { public function left(): int; }
interface Right81 { public function right(): int; }
final class Token81 implements Left81, Right81 {
 public function __construct(public readonly int $value) {}
 public function left(): int { return $this->value; }
 public function right(): int { return $this->value+1; }
}
function read81(Left81&Right81 $t): int { return $t->left()+$t->right(); }
function versionFeature($n,$flag) {
 $t=new Token81($n); $call=read81(...); $trace=[]; $counter=0;
 for($i=0;$i<4;$i++) {
  try {
   $phase=match(($n+$i)%3) {0=>Phase81::Ready, default=>Phase81::Done};
   foreach([0,1,2] as $j) {
    if($flag && $j===1) { hit('v81.continue2'); continue 2; }
    if(!$flag && $i===2 && $j===2) { hit('v81.break2'); break 2; }
    $trace[]=[$phase->value,$call($t),++$counter,$i,$j];
   }
  } finally {hit('v81.finally');$trace[]=['finally',$i];}
 }
 return [$trace,$counter];
}

$seed = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$rows = [];
$worker = new Worker();
for ($input = -3; $input <= 8; $input++) {
    foreach ([false, true] as $flag) {
        $n = $input + $seed % 3;
        $rows[] = [
            'input' => [$n, $flag],
            'version-feature' => versionFeature($n, $flag),
            'if' => simpleIf($n),
            'else' => ifElse($n),
            'elseif' => elseifChain($n),
            'nested' => nestedConditions($n, $flag),
            'for' => forLoop($n),
            'while' => whileLoop($n),
            'do' => doWhileLoop($n),
            'conditions' => sideEffectConditions($n),
            'empty' => emptyLoops($n),
            'infinite' => infiniteLoopWithExit($n),
            'nested-control' => nestedLoopControl($n, $flag),
            'native' => mixedNativeLoops($n, $flag),
            'switch' => switchAndLoop($n),
            'return' => earlyReturn($n),
            'exception' => exceptionPaths($n),
            'closure' => closurePath($n),
            'class' => $worker->calculate($n),
            'strings' => ["n={$n}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"],
        ];
    }
}
ksort($coverage);
echo json_encode(['rows' => $rows, 'coverage' => $coverage], JSON_UNESCAPED_UNICODE), "\n";
