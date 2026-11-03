<?php
// Regression: goto to the increment of an outer for-shape through finally.
$trace = [];
$i = 0;
$early = (bool)($argv[1] ?? false);
goto head;
body:
try {
    foreach ([0, 1, 2] as $j) {
        goto check;
        breakOuter:
        $trace[] = 'break2';
        goto done;
        continueOuter:
        $trace[] = 'continue2';
        goto increment;
        check:
        if ($early && $i === 2 && $j === 1) goto breakOuter;
        if ($j === 1) goto continueOuter;
        $trace[] = [$i, $j];
    }
} finally { $trace[] = ['finally', $i]; }
increment:
$i++;
goto head;
head:
if ($i < 4) goto body;
done:
echo json_encode([$i, $trace]), "\n";
