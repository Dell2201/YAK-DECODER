<?php

namespace StressSuiteB;

$hits = [];
function hit(string $name): void
{
    global $hits;
    $hits[$name] = ($hits[$name] ?? 0) + 1;
}
enum State81 : string
{
    case Idle = 'idle';
    case Active = 'active';
    case Closed = 'closed';
}
interface Left81
{
    public function left(): int;
}
interface Right81
{
    public function right(): int;
}
final class Input81 implements Left81, Right81
{
    public function __construct(public readonly int $value)
    {
    }
    public function left(): int
    {
        return $this->value;
    }
    public function right(): int
    {
        return $this->value + 1;
    }
}
function reject81(): never
{
    hit('never.throw');
    throw new \DomainException('rejected');
}
function machine81(Left81&Right81 $input): array
{
    $state = State81::Idle;
    $trace = [];
    foreach (['start', 'tick', 'pause', 'tick', 'close', 'tick'] as $event) {
        try {
            switch ($state) {
                case State81::Idle:
                    if (!($event === 'start')) {
                        break;
                    } else {
                        hit('state.start');
                        $state = State81::Active;
                        break;
                    }
                case State81::Active:
                    if ($event === 'pause' && $input->left() < 0) {
                        reject81();
                    }
                    $state = match ($event) {
                        'close' => State81::Closed,
                        default => $state,
                    };
                    hit('state.active');
                    break;
                default:
                    hit('state.closed');
                    continue 2;
            }
            $trace[] = [$state->value, $event, $input->right()];
        } catch (\DomainException $e) {
            $trace[] = $e->getMessage();
            $state = State81::Idle;
            hit('state.catch');
        } finally {
            $trace[] = 'finally';
            hit('state.finally');
        }
    }
    return $trace;
}
function fiber81(int $seed): array
{
    $trace = [];
    $f = new \Fiber(function () use ($seed, &$trace): int {
        try {
            $i = 0;
            for (; $i < 4; $i++) {
                if (!($seed < 0 && $i === 3)) {
                    $reply = \Fiber::suspend($seed + $i);
                    $trace[] = [$i, $reply];
                    hit('fiber.resume');
                } else {
                    hit('fiber.early');
                    return -1;
                }
            }
            return 42;
        } finally {
            $trace[] = 'finished';
            hit('fiber.finally');
        }
    });
    $yields = [$f->start()];
    while ($f->isSuspended()) {
        $next = $f->resume(count($yields) * 3);
        if ($f->isTerminated()) {
            continue;
        } else {
            $yields[] = $next;
        }
    }
    return [$yields, $f->getReturn(), $trace];
}
function runVersion(int $seed): array
{
    $call = machine81(...);
    return [$call(new Input81($seed)), fiber81($seed), State81::tryFrom('missing') === null];
}
$seed = (int) ($argv[1] ?? 0);
$rows = [];
foreach ([-3, -1, 0, 1, 3, 8] as $offset) {
    $rows[] = [$seed + $offset, runVersion($seed + $offset)];
}
ksort($hits);
echo json_encode(['rows' => $rows, 'coverage' => $hits], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR), "\n";