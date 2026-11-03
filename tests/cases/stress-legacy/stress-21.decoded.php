<?php

namespace x5Jd3WDyN_9q8o3X;

const Ur9JofhP3E2a3SzC = 7;
$aLJIwoVDs3Mp5DPu = [];
function mTVacU7OC4q2XkUW($oYBrg9H24jlhe26L)
{
    global $aLJIwoVDs3Mp5DPu;
    $aLJIwoVDs3Mp5DPu[$oYBrg9H24jlhe26L] = isset($aLJIwoVDs3Mp5DPu[$oYBrg9H24jlhe26L]) ? $aLJIwoVDs3Mp5DPu[$oYBrg9H24jlhe26L] + 1 : 1;
}
function hJXAnrZ9vN0sLhFM($rk8RJsjs5ilnFMEa)
{
    $j1KWOJkkZaKRnQ1d = 0;
    if ($rk8RJsjs5ilnFMEa > 0) {
        MtvACu7oc4q2XKUw('if.true');
        $j1KWOJkkZaKRnQ1d = $rk8RJsjs5ilnFMEa * 2;
    }
    if ($rk8RJsjs5ilnFMEa <= 0) {
        MtVACU7oC4Q2xkUw('if.false-path');
    }
    return $j1KWOJkkZaKRnQ1d;
}
function eFmlCQduypgcX7cK($rk8RJsjs5ilnFMEa)
{
    if ($rk8RJsjs5ilnFMEa % 2 === 0) {
        MtvAcU7oC4q2Xkuw('else.then');
        return 'even';
    } else {
        mtvAcu7OC4Q2xkUW('else.else');
        return 'odd';
    }
}
function meG2_blgBG2q9Brq($rk8RJsjs5ilnFMEa)
{
    if ($rk8RJsjs5ilnFMEa < 0) {
        mtvAcu7oC4q2XKUw('elseif.negative');
        return -1;
    } else if ($rk8RJsjs5ilnFMEa === 0) {
        MTvAcu7OC4q2xkUW('elseif.zero');
        return 0;
    } else if ($rk8RJsjs5ilnFMEa < 3) {
        mtvAcU7Oc4Q2XkuW('elseif.small');
        return 1;
    } else {
        MTvAcu7oC4Q2Xkuw('elseif.large');
        return 2;
    }
}
function cErQkpl69aug06_A($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ)
{
    $Tzbu6EfdgaIHn6RQ = [];
    if ($rk8RJsjs5ilnFMEa > 0 && ($umY4KOQaxE0bUEWQ || $rk8RJsjs5ilnFMEa > 3)) {
        mtVaCu7OC4Q2XKuW('nested.outer-true');
        $Tzbu6EfdgaIHn6RQ[] = 'outer';
        if ($rk8RJsjs5ilnFMEa % 2) {
            mtvacU7Oc4q2xKuw('nested.inner-odd');
            $Tzbu6EfdgaIHn6RQ[] = 'odd';
        } else {
            MTvAcu7oc4Q2XKUw('nested.inner-even');
            $Tzbu6EfdgaIHn6RQ[] = 'even';
        }
    } else if ($umY4KOQaxE0bUEWQ && $rk8RJsjs5ilnFMEa < 0) {
        MtvAcu7Oc4Q2xKuw('nested.elseif');
        $Tzbu6EfdgaIHn6RQ[] = 'negative';
    } else {
        MTvacu7oC4q2XKUW('nested.else');
        $Tzbu6EfdgaIHn6RQ[] = 'fallback';
    }
    return $Tzbu6EfdgaIHn6RQ;
}
function I7m4uaaF12d09Rya($rk8RJsjs5ilnFMEa)
{
    $Tzbu6EfdgaIHn6RQ = [];
    $pyI9XO1A5nGThUM9 = 0;
    $h4ZI7gJC2LPuBwyd = 10;
    for (; $pyI9XO1A5nGThUM9 < $rk8RJsjs5ilnFMEa; $h4ZI7gJC2LPuBwyd -= 2) {
        mtvACU7Oc4Q2Xkuw('for.body');
        if (!($pyI9XO1A5nGThUM9 === 1)) {
            $Tzbu6EfdgaIHn6RQ[] = [$pyI9XO1A5nGThUM9, $h4ZI7gJC2LPuBwyd];
            if ($pyI9XO1A5nGThUM9 === 4) {
                MTvACU7oc4q2XKUw('for.break');
                break;
            }
        } else {
            MTVACU7oc4q2xKUW('for.continue');
        }
        $pyI9XO1A5nGThUM9++;
    }
    if (!$Tzbu6EfdgaIHn6RQ) {
        mTVAcU7oC4q2xkuW('for.zero');
    }
    return [$pyI9XO1A5nGThUM9, $h4ZI7gJC2LPuBwyd, $Tzbu6EfdgaIHn6RQ];
}
function ZhPnOG5ETAHr5I03($rk8RJsjs5ilnFMEa)
{
    $pyI9XO1A5nGThUM9 = 0;
    $Tzbu6EfdgaIHn6RQ = [];
    while ($pyI9XO1A5nGThUM9 < $rk8RJsjs5ilnFMEa) {
        MTVacU7Oc4Q2XKUW('while.body');
        $pyI9XO1A5nGThUM9++;
        if (!($pyI9XO1A5nGThUM9 === 2)) {
            $Tzbu6EfdgaIHn6RQ[] = $pyI9XO1A5nGThUM9;
            if (!($pyI9XO1A5nGThUM9 === 5)) {
                continue;
            } else {
                mTVACU7OC4Q2Xkuw('while.break');
                break;
            }
        } else {
            MTvaCu7OC4q2xkUW('while.continue');
        }
    }
    if ($pyI9XO1A5nGThUM9 === 0) {
        mTVACu7oc4Q2xKuw('while.zero');
    }
    return [$pyI9XO1A5nGThUM9, $Tzbu6EfdgaIHn6RQ];
}
function IcmWRZMTIhFcmp7I($rk8RJsjs5ilnFMEa)
{
    $pyI9XO1A5nGThUM9 = 0;
    $Tzbu6EfdgaIHn6RQ = [];
    while (true) {
        MTvAcU7oC4Q2xKuw('do.body');
        $pyI9XO1A5nGThUM9++;
        if (!($pyI9XO1A5nGThUM9 === 2)) {
            $Tzbu6EfdgaIHn6RQ[] = $pyI9XO1A5nGThUM9;
            if (!($pyI9XO1A5nGThUM9 === 5)) {
                if ($pyI9XO1A5nGThUM9 < $rk8RJsjs5ilnFMEa) {
                    continue;
                } else {
                    break;
                }
            } else {
                MtvacU7Oc4q2XKuW('do.break');
                break;
            }
        } else {
            MtVAcU7oc4q2XkUW('do.continue');
        }
    }
    if ($pyI9XO1A5nGThUM9 === 1) {
        MTvaCU7oC4q2XKuw('do.once');
    } else {
        mtvACu7OC4q2Xkuw('do.repeat');
    }
    return [$pyI9XO1A5nGThUM9, $Tzbu6EfdgaIHn6RQ];
}
function jrKxEcbL3doQHOde($rk8RJsjs5ilnFMEa)
{
    $gDC3mklQhz306pv3 = 0;
    $Tzbu6EfdgaIHn6RQ = [];
    while (++$gDC3mklQhz306pv3 <= max(0, $rk8RJsjs5ilnFMEa)) {
        $Tzbu6EfdgaIHn6RQ[] = $gDC3mklQhz306pv3;
    }
    $UkVShrboZZp0wG7e = 0;
    do {
        $Tzbu6EfdgaIHn6RQ[] = -$UkVShrboZZp0wG7e;
    } while ($UkVShrboZZp0wG7e++ < min(3, max(0, $rk8RJsjs5ilnFMEa)));
    mtvaCU7oc4Q2XkuW('conditions.side-effects');
    return [$gDC3mklQhz306pv3, $UkVShrboZZp0wG7e, $Tzbu6EfdgaIHn6RQ];
}
function X316OeefFj92T_jz($rk8RJsjs5ilnFMEa)
{
    $pyI9XO1A5nGThUM9 = 0;
    while ($pyI9XO1A5nGThUM9 < min(3, max(0, $rk8RJsjs5ilnFMEa))) {
        $pyI9XO1A5nGThUM9++;
    }
    $h4ZI7gJC2LPuBwyd = 0;
    while ($h4ZI7gJC2LPuBwyd++ < min(2, max(0, $rk8RJsjs5ilnFMEa))) {
    }
    while ($h4ZI7gJC2LPuBwyd++ < 1) {
    }
    mTVaCu7OC4Q2XKUw('loops.empty');
    return [$pyI9XO1A5nGThUM9, $h4ZI7gJC2LPuBwyd];
}
function tBiZVDE2Gly40KlX($rk8RJsjs5ilnFMEa)
{
    $pyI9XO1A5nGThUM9 = 0;
    $Vnm6gwecloc6z1ez = 0;
    while (!($pyI9XO1A5nGThUM9 >= max(0, $rk8RJsjs5ilnFMEa))) {
        $Vnm6gwecloc6z1ez += ++$pyI9XO1A5nGThUM9;
    }
    Mtvacu7Oc4q2XKUW('infinite.break');
    return [$pyI9XO1A5nGThUM9, $Vnm6gwecloc6z1ez];
}
function zh7r2X0Y1Ia_Rq5Z($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ)
{
    $Tzbu6EfdgaIHn6RQ = [];
    $pyI9XO1A5nGThUM9 = 0;
    for (; $pyI9XO1A5nGThUM9 < min(4, max(0, $rk8RJsjs5ilnFMEa)); $pyI9XO1A5nGThUM9++) {
        $h4ZI7gJC2LPuBwyd = 0;
        for (; $h4ZI7gJC2LPuBwyd < 4; $h4ZI7gJC2LPuBwyd++) {
            if (!($h4ZI7gJC2LPuBwyd === 1 && $umY4KOQaxE0bUEWQ)) {
                if (!($pyI9XO1A5nGThUM9 === 2 && $h4ZI7gJC2LPuBwyd === 2)) {
                    $Tzbu6EfdgaIHn6RQ[] = [$pyI9XO1A5nGThUM9, $h4ZI7gJC2LPuBwyd];
                } else {
                    mTVACu7oc4Q2xkUw('nested.break-two');
                    break 2;
                }
            } else {
                MTvACU7oc4Q2xkUw('nested.continue-two');
                continue 2;
            }
        }
        $Tzbu6EfdgaIHn6RQ[] = 'end-outer';
    }
    return $Tzbu6EfdgaIHn6RQ;
}
function b5bGZOghqjU0chh7($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ)
{
    $Tzbu6EfdgaIHn6RQ = [];
    foreach ([0, 1, 2] as $vEhi3iBjlU48dkqr) {
        $pyI9XO1A5nGThUM9 = 0;
        for (; $pyI9XO1A5nGThUM9 < min(4, max(0, $rk8RJsjs5ilnFMEa)); $Tzbu6EfdgaIHn6RQ[] = [$vEhi3iBjlU48dkqr, $pyI9XO1A5nGThUM9]) {
            $pyI9XO1A5nGThUM9++;
            if (!($umY4KOQaxE0bUEWQ && $pyI9XO1A5nGThUM9 === 2)) {
                if (!$umY4KOQaxE0bUEWQ && $vEhi3iBjlU48dkqr === 1 && $pyI9XO1A5nGThUM9 === 3) {
                    mTvAcu7oC4q2Xkuw('mixed.break-two');
                    break 2;
                }
            } else {
                MtvACu7Oc4q2xKuW('mixed.continue-two');
                continue 2;
            }
        }
        $Tzbu6EfdgaIHn6RQ[] = 'native-end';
        continue;
    }
    return $Tzbu6EfdgaIHn6RQ;
}
function xfjrkdzt3yVmUQXh($rk8RJsjs5ilnFMEa)
{
    $Tzbu6EfdgaIHn6RQ = [];
    $pyI9XO1A5nGThUM9 = 0;
    for (; $pyI9XO1A5nGThUM9 < min(5, max(0, $rk8RJsjs5ilnFMEa)); $pyI9XO1A5nGThUM9++) {
        switch ($pyI9XO1A5nGThUM9) {
            case 0:
                MTvACU7oC4q2xkuw('switch.zero');
                $Tzbu6EfdgaIHn6RQ[] = 'zero';
                break;
            case 1:
            case 2:
                MtVaCu7OC4q2XkUw('switch.shared');
                $Tzbu6EfdgaIHn6RQ[] = 'shared';
                break;
            default:
                mTVACu7Oc4q2XKUw('switch.default');
                $Tzbu6EfdgaIHn6RQ[] = 'exit';
                break 2;
        }
        $Tzbu6EfdgaIHn6RQ[] = $pyI9XO1A5nGThUM9;
    }
    return $Tzbu6EfdgaIHn6RQ;
}
function JyrFwgmB6cB9RoKF($rk8RJsjs5ilnFMEa)
{
    $Tzbu6EfdgaIHn6RQ = [];
    $pyI9XO1A5nGThUM9 = 0;
    for (; $pyI9XO1A5nGThUM9 < 5; $pyI9XO1A5nGThUM9++) {
        $Tzbu6EfdgaIHn6RQ[] = $pyI9XO1A5nGThUM9;
        if ($pyI9XO1A5nGThUM9 === $rk8RJsjs5ilnFMEa) {
            MtvACu7OC4q2XkUW('return.early');
            return $Tzbu6EfdgaIHn6RQ;
        }
    }
    mTVAcU7Oc4Q2xKUW('return.normal');
    return $Tzbu6EfdgaIHn6RQ;
}
function JthBHdMciP2TjADy($rk8RJsjs5ilnFMEa)
{
    $Tzbu6EfdgaIHn6RQ = [];
    try {
        if ($rk8RJsjs5ilnFMEa < 0) {
            MTVAcU7oc4q2xkuw('exception.throw');
            throw new \RuntimeException('negative');
        }
        mtvACu7OC4Q2XKUW('exception.normal');
        $Tzbu6EfdgaIHn6RQ[] = $rk8RJsjs5ilnFMEa;
    } catch (\RuntimeException $s7YygNBhRWcmCt7d) {
        MtvaCU7oc4Q2xKuw('exception.catch');
        $Tzbu6EfdgaIHn6RQ[] = $s7YygNBhRWcmCt7d->getMessage();
    } finally {
        MTVACu7OC4q2xKUW('exception.finally');
        $Tzbu6EfdgaIHn6RQ[] = 'finally';
    }
    return $Tzbu6EfdgaIHn6RQ;
}
function vXrOGV_yVjc3dqPv($rk8RJsjs5ilnFMEa)
{
    $ok599v674inyi3dH = 3;
    $tyV7HeoeyLUG2ERx = function ($nwKifisLzeT0vjJ1) use ($ok599v674inyi3dH) {
        if ($nwKifisLzeT0vjJ1 < 0) {
            mtvacU7oc4Q2xkUw('closure.negative');
            return -$ok599v674inyi3dH;
        } else if ($nwKifisLzeT0vjJ1 === 0) {
            mtvacU7OC4q2XKUW('closure.zero');
            return 0;
        } else {
            mTvacU7oc4q2XkuW('closure.positive');
            $Vnm6gwecloc6z1ez = 0;
            $pyI9XO1A5nGThUM9 = 0;
            for (; $pyI9XO1A5nGThUM9 < $nwKifisLzeT0vjJ1; $pyI9XO1A5nGThUM9++) {
                $Vnm6gwecloc6z1ez += $ok599v674inyi3dH;
            }
            return $Vnm6gwecloc6z1ez;
        }
    };
    return $tyV7HeoeyLUG2ERx($rk8RJsjs5ilnFMEa);
}
interface M_hwbzjhy8uRYSXw
{
    public function MyJLp6gNUM0ddl9b($rk8RJsjs5ilnFMEa);
}
trait tAL5ogzg5XaVFfvk
{
    private function IxrIyof5ZleqN4EB($rk8RJsjs5ilnFMEa)
    {
        return $rk8RJsjs5ilnFMEa + Ur9JofhP3E2a3SzC;
    }
}
class fhQz7k_JpA2kz6n3 implements m_hwbzjhy8urysXw
{
    use tal5OgZG5XaVFFVK;
    const qb7SzsePsDdpPX6U = 2;
    private $waQgl5VtQ2TTu2g9 = 1;
    public function MyjLP6gnUM0ddL9B($rk8RJsjs5ilnFMEa)
    {
        if ($rk8RJsjs5ilnFMEa > 0) {
            MtvaCU7oc4Q2XKUW('class.positive');
            return $this->ixriYof5zLeQn4eb($rk8RJsjs5ilnFMEa) * self::qb7SzsePsDdpPX6U;
        } else {
            mTVACu7OC4q2xKuW('class.nonpositive');
            return $this->waQgl5VtQ2TTu2g9;
        }
    }
}
$o3yh8quQbZHJJ27X = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$Bxpsqb6sEVmehdUH = [];
$lYl5IcHtu9o0lCoJ = new fHqZ7K_JPa2kz6n3();
$Y_mjqBs48YVFebTi = -3;
for (; $Y_mjqBs48YVFebTi <= 8; $Y_mjqBs48YVFebTi++) {
    foreach ([false, true] as $umY4KOQaxE0bUEWQ) {
        $rk8RJsjs5ilnFMEa = $Y_mjqBs48YVFebTi + $o3yh8quQbZHJJ27X % 3;
        $Bxpsqb6sEVmehdUH[] = ['input' => [$rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ], 'if' => HjXANrz9Vn0SLHFm($rk8RJsjs5ilnFMEa), 'else' => eFMlcqdUypGcX7cK($rk8RJsjs5ilnFMEa), 'elseif' => mEG2_BlGbg2Q9Brq($rk8RJsjs5ilnFMEa), 'nested' => CerqkPl69AUG06_A($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ), 'for' => i7M4UaAf12D09RYa($rk8RJsjs5ilnFMEa), 'while' => zHPNog5ETAhR5I03($rk8RJsjs5ilnFMEa), 'do' => IcmwRZmTIhfcMp7I($rk8RJsjs5ilnFMEa), 'conditions' => jRKXecbL3DoqHodE($rk8RJsjs5ilnFMEa), 'empty' => X316oEeFFj92t_jZ($rk8RJsjs5ilnFMEa), 'infinite' => tbIzvdE2GLy40KLX($rk8RJsjs5ilnFMEa), 'nested-control' => zH7R2x0y1IA_RQ5Z($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ), 'native' => b5bgzogHQJU0chH7($rk8RJsjs5ilnFMEa, $umY4KOQaxE0bUEWQ), 'switch' => XFjRkDzt3YvmUQXH($rk8RJsjs5ilnFMEa), 'return' => jYRfwGmb6cB9roKF($rk8RJsjs5ilnFMEa), 'exception' => jTHbHdMcIP2tjAdy($rk8RJsjs5ilnFMEa), 'closure' => vXrOGV_Yvjc3dQPV($rk8RJsjs5ilnFMEa), 'class' => $lYl5IcHtu9o0lCoJ->MyJlP6GNum0DDL9B($rk8RJsjs5ilnFMEa), 'strings' => ["n={$rk8RJsjs5ilnFMEa}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($aLJIwoVDs3Mp5DPu);
echo json_encode(['rows' => $Bxpsqb6sEVmehdUH, 'coverage' => $aLJIwoVDs3Mp5DPu], JSON_UNESCAPED_UNICODE), "\n";