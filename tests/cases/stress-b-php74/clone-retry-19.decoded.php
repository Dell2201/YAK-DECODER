<?php

namespace StressSuiteB;

$hits = [];
function hit(string $name) : void
{
    global $hits;
    $hits[$name] = ($hits[$name] ?? 0) + 1;
}
interface Value83
{
    public function value() : int;
}
trait Policy83
{
}
class Snapshot83 implements Value83
{
    use Policy83;
    public const LABEL = 'snapshot';
    public const STEP = 2;
    public int $number;
    public function __construct(int $number)
    {
        $this->number = $number;
    }
    public function value() : int
    {
        return $this->number;
    }
    public function __clone()
    {
        $this->number = $this->number + self::STEP;
    }
}
function cloneStream83(int $seed, array &$trace) : \Generator
{
    $value = new Snapshot83($seed);
    $key = 'LABEL';
    try {
        $i = 0;
        for (; $i < 5; $i++) {
            $value = clone $value;
            if (!($i === 2 && $seed < 0)) {
                (yield [constant(Snapshot83::class . '::' . $key), $value->value()]);
                hit('clone.yield');
                if ($i === 3 && $seed > 5) {
                    hit('clone.stop');
                    break;
                }
            } else {
                hit('clone.skip');
            }
        }
        return $value->value();
    } finally {
        $trace[] = 'disposed';
        hit('clone.finally');
    }
}
function retry83(int $seed) : array
{
    $trace = [];
    $success = 0;
    $job = 0;
    for (; $job < 4; $job++) {
        $attempt = 0;
        for (; $attempt < 3; $attempt++) {
            try {
                if (!(($job + $attempt + $seed) % 3 === 0 || $job === 3 && $seed % 2 !== 0)) {
                    if (!($job === 2 && $seed < 0)) {
                        $trace[] = ['ok', $job, $attempt];
                        $success++;
                        hit('retry.success');
                        break;
                    } else {
                        hit('retry.continue2');
                        break;
                    }
                } else {
                    hit('retry.throw');
                    throw new \RuntimeException('retry');
                }
            } catch (\RuntimeException $e) {
                $trace[] = ['error', $job, $attempt];
                hit('retry.catch');
                if ($attempt === 2) {
                    hit('retry.break2');
                    break 2;
                }
            } finally {
                $trace[] = ['finally', $job, $attempt];
                hit('retry.finally');
            }
        }
    }
    return [$success, $trace];
}
function runVersion(int $seed) : array
{
    $trace = [];
    $g = cloneStream83($seed, $trace);
    $rows = iterator_to_array($g, false);
    return [$rows, $g->getReturn(), $trace, retry83($seed)];
}
$seed = (int) ($argv[1] ?? 0);
$rows = [];
foreach ([-3, -1, 0, 1, 3, 8] as $offset) {
    $rows[] = [$seed + $offset, runVersion($seed + $offset)];
}
ksort($hits);
echo json_encode(['rows' => $rows, 'coverage' => $hits], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR), "\n";