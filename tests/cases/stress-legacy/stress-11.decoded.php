<?php

namespace I9JZplrY1Qne7H_D;

const B0ClUwsTrBv35IcE = 7;
$e65boeOZLryHLRig = [];
function Ew21h97v49BDqXzK($TVrDls_aA0p4mWKH)
{
    global $e65boeOZLryHLRig;
    $e65boeOZLryHLRig[$TVrDls_aA0p4mWKH] = isset($e65boeOZLryHLRig[$TVrDls_aA0p4mWKH]) ? $e65boeOZLryHLRig[$TVrDls_aA0p4mWKH] + 1 : 1;
}
function YwIWy9QtaC0j1oaz($TALCpp5KFZYbDd0a)
{
    $yr5BOdiYNBOJTcdg = 0;
    if ($TALCpp5KFZYbDd0a > 0) {
        ew21H97v49BDQxzK('if.true');
        $yr5BOdiYNBOJTcdg = $TALCpp5KFZYbDd0a * 2;
    }
    if ($TALCpp5KFZYbDd0a <= 0) {
        Ew21h97v49bdqXZK('if.false-path');
    }
    return $yr5BOdiYNBOJTcdg;
}
function XCi_DreVMBwvaHqX($TALCpp5KFZYbDd0a)
{
    if ($TALCpp5KFZYbDd0a % 2 === 0) {
        ew21h97V49bDqXZk('else.then');
        return 'even';
    } else {
        EW21H97v49bdQXZK('else.else');
        return 'odd';
    }
}
function Vm8N_jU4b29XiXVz($TALCpp5KFZYbDd0a)
{
    if ($TALCpp5KFZYbDd0a < 0) {
        ew21H97V49BDQxzk('elseif.negative');
        return -1;
    } else if ($TALCpp5KFZYbDd0a === 0) {
        Ew21H97v49bdqxZK('elseif.zero');
        return 0;
    } else if ($TALCpp5KFZYbDd0a < 3) {
        EW21h97V49bDqxzk('elseif.small');
        return 1;
    } else {
        ew21H97v49bdqxZK('elseif.large');
        return 2;
    }
}
function wjY36XTHCVU2S3Ly($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d)
{
    $zGd7xNw4PpPBfflq = [];
    if ($TALCpp5KFZYbDd0a > 0 && ($ugcAj6KLM8yVet4d || $TALCpp5KFZYbDd0a > 3)) {
        Ew21h97V49BdqxzK('nested.outer-true');
        $zGd7xNw4PpPBfflq[] = 'outer';
        if ($TALCpp5KFZYbDd0a % 2) {
            EW21h97v49BdQXZK('nested.inner-odd');
            $zGd7xNw4PpPBfflq[] = 'odd';
        } else {
            eW21h97v49bdqxZk('nested.inner-even');
            $zGd7xNw4PpPBfflq[] = 'even';
        }
    } else if ($ugcAj6KLM8yVet4d && $TALCpp5KFZYbDd0a < 0) {
        eW21h97V49BdQXZK('nested.elseif');
        $zGd7xNw4PpPBfflq[] = 'negative';
    } else {
        EW21H97v49bDqXzk('nested.else');
        $zGd7xNw4PpPBfflq[] = 'fallback';
    }
    return $zGd7xNw4PpPBfflq;
}
function s8JoK0qOYSQsnwne($TALCpp5KFZYbDd0a)
{
    $zGd7xNw4PpPBfflq = [];
    $bOoZThyP4Pql9CWa = 0;
    $qh7yP2olABLamTdX = 10;
    for (; $bOoZThyP4Pql9CWa < $TALCpp5KFZYbDd0a; $qh7yP2olABLamTdX -= 2) {
        eW21h97V49bdqxZK('for.body');
        if (!($bOoZThyP4Pql9CWa === 1)) {
            $zGd7xNw4PpPBfflq[] = [$bOoZThyP4Pql9CWa, $qh7yP2olABLamTdX];
            if ($bOoZThyP4Pql9CWa === 4) {
                eW21h97v49BdqXzk('for.break');
                break;
            }
        } else {
            Ew21H97v49bDqxZk('for.continue');
        }
        $bOoZThyP4Pql9CWa++;
    }
    if (!$zGd7xNw4PpPBfflq) {
        Ew21h97V49BDQxzk('for.zero');
    }
    return [$bOoZThyP4Pql9CWa, $qh7yP2olABLamTdX, $zGd7xNw4PpPBfflq];
}
function GZemEyGkvIl3U0Ir($TALCpp5KFZYbDd0a)
{
    $bOoZThyP4Pql9CWa = 0;
    $zGd7xNw4PpPBfflq = [];
    while ($bOoZThyP4Pql9CWa < $TALCpp5KFZYbDd0a) {
        ew21h97V49bdqxzK('while.body');
        $bOoZThyP4Pql9CWa++;
        if (!($bOoZThyP4Pql9CWa === 2)) {
            $zGd7xNw4PpPBfflq[] = $bOoZThyP4Pql9CWa;
            if (!($bOoZThyP4Pql9CWa === 5)) {
                continue;
            } else {
                EW21h97V49bDQxzk('while.break');
                break;
            }
        } else {
            EW21H97v49BdqXzK('while.continue');
        }
    }
    if ($bOoZThyP4Pql9CWa === 0) {
        ew21H97V49bDQXZk('while.zero');
    }
    return [$bOoZThyP4Pql9CWa, $zGd7xNw4PpPBfflq];
}
function gY28c8AeaKN7oY9U($TALCpp5KFZYbDd0a)
{
    $bOoZThyP4Pql9CWa = 0;
    $zGd7xNw4PpPBfflq = [];
    while (true) {
        Ew21h97V49BDqxzk('do.body');
        $bOoZThyP4Pql9CWa++;
        if (!($bOoZThyP4Pql9CWa === 2)) {
            $zGd7xNw4PpPBfflq[] = $bOoZThyP4Pql9CWa;
            if (!($bOoZThyP4Pql9CWa === 5)) {
                if ($bOoZThyP4Pql9CWa < $TALCpp5KFZYbDd0a) {
                    continue;
                } else {
                    break;
                }
            } else {
                Ew21h97V49BDQxZK('do.break');
                break;
            }
        } else {
            Ew21H97V49bdqXzk('do.continue');
        }
    }
    if ($bOoZThyP4Pql9CWa === 1) {
        EW21h97V49bdQxZK('do.once');
    } else {
        Ew21H97V49BdQxZk('do.repeat');
    }
    return [$bOoZThyP4Pql9CWa, $zGd7xNw4PpPBfflq];
}
function bXt6f2o8ibhndBY1($TALCpp5KFZYbDd0a)
{
    $ezVN02GhUZYH6iwQ = 0;
    $zGd7xNw4PpPBfflq = [];
    while (++$ezVN02GhUZYH6iwQ <= max(0, $TALCpp5KFZYbDd0a)) {
        $zGd7xNw4PpPBfflq[] = $ezVN02GhUZYH6iwQ;
    }
    $SMqzvvPoUwdZMLnW = 0;
    do {
        $zGd7xNw4PpPBfflq[] = -$SMqzvvPoUwdZMLnW;
    } while ($SMqzvvPoUwdZMLnW++ < min(3, max(0, $TALCpp5KFZYbDd0a)));
    Ew21H97v49BDqxZK('conditions.side-effects');
    return [$ezVN02GhUZYH6iwQ, $SMqzvvPoUwdZMLnW, $zGd7xNw4PpPBfflq];
}
function uN7pXXIIgAYgXgmG($TALCpp5KFZYbDd0a)
{
    $bOoZThyP4Pql9CWa = 0;
    while ($bOoZThyP4Pql9CWa < min(3, max(0, $TALCpp5KFZYbDd0a))) {
        $bOoZThyP4Pql9CWa++;
    }
    $qh7yP2olABLamTdX = 0;
    while ($qh7yP2olABLamTdX++ < min(2, max(0, $TALCpp5KFZYbDd0a))) {
    }
    while ($qh7yP2olABLamTdX++ < 1) {
    }
    eW21h97v49BDQxZK('loops.empty');
    return [$bOoZThyP4Pql9CWa, $qh7yP2olABLamTdX];
}
function TNbMjB_6orR9gXvS($TALCpp5KFZYbDd0a)
{
    $bOoZThyP4Pql9CWa = 0;
    $NGP47Eo7c4QNsC_V = 0;
    while (!($bOoZThyP4Pql9CWa >= max(0, $TALCpp5KFZYbDd0a))) {
        $NGP47Eo7c4QNsC_V += ++$bOoZThyP4Pql9CWa;
    }
    eW21H97v49Bdqxzk('infinite.break');
    return [$bOoZThyP4Pql9CWa, $NGP47Eo7c4QNsC_V];
}
function FyS0BTHCrI3HPPat($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d)
{
    $zGd7xNw4PpPBfflq = [];
    $bOoZThyP4Pql9CWa = 0;
    for (; $bOoZThyP4Pql9CWa < min(4, max(0, $TALCpp5KFZYbDd0a)); $bOoZThyP4Pql9CWa++) {
        $qh7yP2olABLamTdX = 0;
        for (; $qh7yP2olABLamTdX < 4; $qh7yP2olABLamTdX++) {
            if (!($qh7yP2olABLamTdX === 1 && $ugcAj6KLM8yVet4d)) {
                if (!($bOoZThyP4Pql9CWa === 2 && $qh7yP2olABLamTdX === 2)) {
                    $zGd7xNw4PpPBfflq[] = [$bOoZThyP4Pql9CWa, $qh7yP2olABLamTdX];
                } else {
                    eW21H97V49BdqxZk('nested.break-two');
                    break 2;
                }
            } else {
                Ew21H97V49bDQXzK('nested.continue-two');
                continue 2;
            }
        }
        $zGd7xNw4PpPBfflq[] = 'end-outer';
    }
    return $zGd7xNw4PpPBfflq;
}
function dFzP_ycIu6oCSgz2($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d)
{
    $zGd7xNw4PpPBfflq = [];
    foreach ([0, 1, 2] as $NLl2QU24YhlHh3Ue) {
        $bOoZThyP4Pql9CWa = 0;
        for (; $bOoZThyP4Pql9CWa < min(4, max(0, $TALCpp5KFZYbDd0a)); $zGd7xNw4PpPBfflq[] = [$NLl2QU24YhlHh3Ue, $bOoZThyP4Pql9CWa]) {
            $bOoZThyP4Pql9CWa++;
            if (!($ugcAj6KLM8yVet4d && $bOoZThyP4Pql9CWa === 2)) {
                if (!$ugcAj6KLM8yVet4d && $NLl2QU24YhlHh3Ue === 1 && $bOoZThyP4Pql9CWa === 3) {
                    ew21h97v49bDqXzK('mixed.break-two');
                    break 2;
                }
            } else {
                Ew21H97v49BdqxZk('mixed.continue-two');
                continue 2;
            }
        }
        $zGd7xNw4PpPBfflq[] = 'native-end';
        continue;
    }
    return $zGd7xNw4PpPBfflq;
}
function pN0IBPSGDhU06QaV($TALCpp5KFZYbDd0a)
{
    $zGd7xNw4PpPBfflq = [];
    $bOoZThyP4Pql9CWa = 0;
    for (; $bOoZThyP4Pql9CWa < min(5, max(0, $TALCpp5KFZYbDd0a)); $bOoZThyP4Pql9CWa++) {
        switch ($bOoZThyP4Pql9CWa) {
            case 0:
                EW21H97V49bDqxzK('switch.zero');
                $zGd7xNw4PpPBfflq[] = 'zero';
                break;
            case 1:
            case 2:
                Ew21h97v49BdQxZk('switch.shared');
                $zGd7xNw4PpPBfflq[] = 'shared';
                break;
            default:
                EW21h97v49BDqxZK('switch.default');
                $zGd7xNw4PpPBfflq[] = 'exit';
                break 2;
        }
        $zGd7xNw4PpPBfflq[] = $bOoZThyP4Pql9CWa;
    }
    return $zGd7xNw4PpPBfflq;
}
function ssgqs_TczvPWfd9N($TALCpp5KFZYbDd0a)
{
    $zGd7xNw4PpPBfflq = [];
    $bOoZThyP4Pql9CWa = 0;
    for (; $bOoZThyP4Pql9CWa < 5; $bOoZThyP4Pql9CWa++) {
        $zGd7xNw4PpPBfflq[] = $bOoZThyP4Pql9CWa;
        if ($bOoZThyP4Pql9CWa === $TALCpp5KFZYbDd0a) {
            Ew21H97V49BDqXzk('return.early');
            return $zGd7xNw4PpPBfflq;
        }
    }
    Ew21H97v49BdQXZK('return.normal');
    return $zGd7xNw4PpPBfflq;
}
function V8Z5jwOLm3qa9J5U($TALCpp5KFZYbDd0a)
{
    $zGd7xNw4PpPBfflq = [];
    try {
        if ($TALCpp5KFZYbDd0a < 0) {
            EW21H97v49BdqxzK('exception.throw');
            throw new \RuntimeException('negative');
        }
        Ew21h97v49bDqxzK('exception.normal');
        $zGd7xNw4PpPBfflq[] = $TALCpp5KFZYbDd0a;
    } catch (\RuntimeException $LP_orVOy_yKRClqE) {
        Ew21h97v49BDQXZK('exception.catch');
        $zGd7xNw4PpPBfflq[] = $LP_orVOy_yKRClqE->getMessage();
    } finally {
        EW21H97v49BdqXZK('exception.finally');
        $zGd7xNw4PpPBfflq[] = 'finally';
    }
    return $zGd7xNw4PpPBfflq;
}
function aw7kkMstFGZsIDoz($TALCpp5KFZYbDd0a)
{
    $WyzNkIbSkMEAmdi1 = 3;
    $BJUutTYBjXBJjPcs = function ($wdcxK1rKeiktmNg0) use ($WyzNkIbSkMEAmdi1) {
        if ($wdcxK1rKeiktmNg0 < 0) {
            ew21h97V49bdqXzk('closure.negative');
            return -$WyzNkIbSkMEAmdi1;
        } else if ($wdcxK1rKeiktmNg0 === 0) {
            EW21H97V49bdqxzK('closure.zero');
            return 0;
        } else {
            eW21h97V49bdqXzK('closure.positive');
            $NGP47Eo7c4QNsC_V = 0;
            $bOoZThyP4Pql9CWa = 0;
            for (; $bOoZThyP4Pql9CWa < $wdcxK1rKeiktmNg0; $bOoZThyP4Pql9CWa++) {
                $NGP47Eo7c4QNsC_V += $WyzNkIbSkMEAmdi1;
            }
            return $NGP47Eo7c4QNsC_V;
        }
    };
    return $BJUutTYBjXBJjPcs($TALCpp5KFZYbDd0a);
}
interface tLRn7Dl5BFaVsKzZ
{
    public function Kdy3aQGtOLChdKir($TALCpp5KFZYbDd0a);
}
trait jfbAFpxCJQFJ8vl7
{
    private function abDv0YY1PNCkPazp($TALCpp5KFZYbDd0a)
    {
        return $TALCpp5KFZYbDd0a + B0ClUwsTrBv35IcE;
    }
}
class ElItWHuIft6fNWf1 implements tLrN7dl5bfavSKZZ
{
    use JfbAfPXcJqfJ8vL7;
    const aIul_5rbN_wV49bL = 2;
    private $bxB96EntqCSvduL8 = 1;
    public function kdY3AQgTOLChDKiR($TALCpp5KFZYbDd0a)
    {
        if ($TALCpp5KFZYbDd0a > 0) {
            EW21h97v49BdQxzK('class.positive');
            return $this->aBdv0yy1pncKPazP($TALCpp5KFZYbDd0a) * self::aIul_5rbN_wV49bL;
        } else {
            ew21H97V49bDQxZK('class.nonpositive');
            return $this->bxB96EntqCSvduL8;
        }
    }
}
$c75R2Czkahtcc38A = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$wIwXJZIWM0f86DCx = [];
$y9JdHvMhOQ6O4MC6 = new ElitWHUift6FnWf1();
$tDa5uR_pq0hDDxws = -3;
for (; $tDa5uR_pq0hDDxws <= 8; $tDa5uR_pq0hDDxws++) {
    foreach ([false, true] as $ugcAj6KLM8yVet4d) {
        $TALCpp5KFZYbDd0a = $tDa5uR_pq0hDDxws + $c75R2Czkahtcc38A % 3;
        $wIwXJZIWM0f86DCx[] = ['input' => [$TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d], 'if' => yWiWY9QtAc0J1OAz($TALCpp5KFZYbDd0a), 'else' => Xci_DRevMbWVahQX($TALCpp5KFZYbDd0a), 'elseif' => vM8n_JU4b29xIxvz($TALCpp5KFZYbDd0a), 'nested' => WJY36XThcvu2S3Ly($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d), 'for' => s8jOk0qOYsQsnwNE($TALCpp5KFZYbDd0a), 'while' => gZEmeYGkViL3U0iR($TALCpp5KFZYbDd0a), 'do' => Gy28c8aeAKn7oY9u($TALCpp5KFZYbDd0a), 'conditions' => BxT6f2o8ibHndBy1($TALCpp5KFZYbDd0a), 'empty' => uN7pxxIIgayGxGMg($TALCpp5KFZYbDd0a), 'infinite' => tNbmJb_6orR9gxvS($TALCpp5KFZYbDd0a), 'nested-control' => FYS0bThcRI3hPpaT($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d), 'native' => dfzP_YCIu6OCsgZ2($TALCpp5KFZYbDd0a, $ugcAj6KLM8yVet4d), 'switch' => PN0IbpSGDHU06QAV($TALCpp5KFZYbDd0a), 'return' => SSgqs_tczvpWFD9n($TALCpp5KFZYbDd0a), 'exception' => v8z5jWolm3qA9J5u($TALCpp5KFZYbDd0a), 'closure' => AW7KkMsTFgzSIDoZ($TALCpp5KFZYbDd0a), 'class' => $y9JdHvMhOQ6O4MC6->KDY3aqgtolcHdKIr($TALCpp5KFZYbDd0a), 'strings' => ["n={$TALCpp5KFZYbDd0a}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($e65boeOZLryHLRig);
echo json_encode(['rows' => $wIwXJZIWM0f86DCx, 'coverage' => $e65boeOZLryHLRig], JSON_UNESCAPED_UNICODE), "\n";