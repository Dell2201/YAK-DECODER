<?php
// Minimal repro: loops inside switch cases with break/continue levels.
$r = [];
foreach ([0, 1, 2, 3] as $n) {
    switch ($n) {
        case 0:
            foreach ([1, 2, 3] as $v) {
                if ($v === 2) {
                    $r[] = "skip$v";
                    continue;
                }
                $r[] = "z$v";
            }
            break;
        case 1:
            for ($k = 0; $k < 3; $k++) {
                if ($k === 1) {
                    $r[] = 'k1';
                    continue 2;
                }
                $r[] = "k$k";
            }
            break;
        default:
            $m = 0;
            while ($m < 3) {
                $m++;
                if ($n === 2 && $m === 2) {
                    $r[] = "b2-$m";
                    break 2;
                }
                $r[] = "d$n$m";
            }
            break;
    }
    $r[] = "after$n";
}
echo json_encode($r), "\n";
