<?php
// Minimal repro: triple-nested loops with break 3 / continue 3 / mixed levels.
$r = [];
for ($i = 0; $i < 3; $i++) {
    $j = 0;
    while ($j < 3) {
        $j++;
        foreach ([1, 2] as $v) {
            if ($v === 2 && $i === 1) {
                $r[] = "b3$i$j$v";
                break 3;
            }
            if ($v === 1 && $j === 2) {
                $r[] = "c2$i$j$v";
                continue 2;
            }
            if ($v === 2 && $j === 3) {
                $r[] = "b2$i$j$v";
                break 2;
            }
            $r[] = "t$i$j$v";
        }
    }
    $r[] = "outer$i";
}
echo json_encode($r), "\n";
