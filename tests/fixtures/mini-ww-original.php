<?php
// Minimal repro: while/while with continue 2 and break 2 (continue targets
// the outer while CONDITION, not an increment).
$r = [];
$i = 0;
while ($i < 4) {
    $j = 0;
    while ($j < 5) {
        $j++;
        if ($j === 2) {
            $r[] = "c$i";
            $i++;
            if ($i === 3) {
                $r[] = "break2";
                break 2;
            }
            continue 2;
        }
        $r[] = [$i, $j];
    }
    $r[] = "end$i";
    $i++;
}
echo json_encode($r), "\n";
