<?php
// Regression: try/catch are transparent to break/continue depth.
// A statement after the inner loop distinguishes continue-outer from break-inner.
function tryCatchControls(int $seed): array
{
    $trace = [];
    $a = 0;
outerHeader:
    if ($a >= 3) goto done;
    foreach ([0, 1] as $item) {
        $b = 0;
innerHeader:
        if ($b >= 3) goto innerEnd;
        try {
            if (($seed + $a + $item + $b) % 4 === 0) goto outerIncrement;
            if (($seed + $b) % 3 === 0) throw new RuntimeException('retry');
            if ($b === 1) goto innerIncrement;
            $trace[] = ['ok', $a, $item, $b];
        } catch (RuntimeException $e) {
            switch (($seed + $a) % 3) {
                case 0: $trace[] = 'break-all'; goto done;
                case 1: $trace[] = 'next-inner'; goto innerIncrement;
                default: $trace[] = 'next-outer'; goto outerIncrement;
            }
        } finally {
            $trace[] = ['finally', $a, $item, $b];
        }
innerIncrement:
        $b++;
        goto innerHeader;
innerEnd:
        $trace[] = ['after-inner', $a, $item];
    }
    $trace[] = ['after-foreach', $a];
outerIncrement:
    $a++;
    goto outerHeader;
done:
    return $trace;
}

$result = [];
foreach (range(-7, 7) as $seed) {
    $result[$seed] = tryCatchControls($seed);
}
echo json_encode($result, JSON_THROW_ON_ERROR), "\n";
