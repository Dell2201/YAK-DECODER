<?php
// Synthetic safety-net test: a foreach body jumps to a region-level label.
// The region must revert (cannot restructure), and behavior must be preserved.
$a = 0;
goto s;
l2:
$a = 5;
goto end;
s:
foreach ([1, 2] as $x) {
    goto l2;
}
end:
echo $a, "\n";
