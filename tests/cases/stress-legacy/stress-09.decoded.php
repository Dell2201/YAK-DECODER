<?php

namespace F0XuATr8Cup2pDdu;

const SVREjRpbp_j0sYrD = 7;
$sZG9sCUsiaOmKQDO = [];
function cuRxNf2TbHyBb1tj($c9MF3EIA3zzsWOPB)
{
    global $sZG9sCUsiaOmKQDO;
    $sZG9sCUsiaOmKQDO[$c9MF3EIA3zzsWOPB] = isset($sZG9sCUsiaOmKQDO[$c9MF3EIA3zzsWOPB]) ? $sZG9sCUsiaOmKQDO[$c9MF3EIA3zzsWOPB] + 1 : 1;
}
function vF3l25Q0NW3DTFHz($U7P9W7JK8ehOJ0zH)
{
    $ahIjFgzYMIJpAa9v = 0;
    if ($U7P9W7JK8ehOJ0zH > 0) {
        cuRXNF2tbhYBB1tJ('if.true');
        $ahIjFgzYMIJpAa9v = $U7P9W7JK8ehOJ0zH * 2;
    }
    if ($U7P9W7JK8ehOJ0zH <= 0) {
        cuRxNF2tBHybB1tJ('if.false-path');
    }
    return $ahIjFgzYMIJpAa9v;
}
function Vd1U78gJEyeyuHCX($U7P9W7JK8ehOJ0zH)
{
    if ($U7P9W7JK8ehOJ0zH % 2 === 0) {
        cURXnf2TbhybB1Tj('else.then');
        return 'even';
    } else {
        CUrxnf2tbhYbb1Tj('else.else');
        return 'odd';
    }
}
function U0LQsXvwSd3_QjEp($U7P9W7JK8ehOJ0zH)
{
    if ($U7P9W7JK8ehOJ0zH < 0) {
        CURXNF2tBhyBB1Tj('elseif.negative');
        return -1;
    } else if ($U7P9W7JK8ehOJ0zH === 0) {
        cuRXnF2TBhYBB1Tj('elseif.zero');
        return 0;
    } else if ($U7P9W7JK8ehOJ0zH < 3) {
        cuRXNf2TbhYBB1Tj('elseif.small');
        return 1;
    } else {
        CURxnF2tBHyBB1tJ('elseif.large');
        return 2;
    }
}
function R9pWKlEGJEwYXTvc($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ)
{
    $phcYM9K4JPIuC2WV = [];
    if ($U7P9W7JK8ehOJ0zH > 0 && ($oAPd8o0XWF_MGDxJ || $U7P9W7JK8ehOJ0zH > 3)) {
        cUrxNF2TBhyBb1tj('nested.outer-true');
        $phcYM9K4JPIuC2WV[] = 'outer';
        if ($U7P9W7JK8ehOJ0zH % 2) {
            cURXnf2tbhybB1Tj('nested.inner-odd');
            $phcYM9K4JPIuC2WV[] = 'odd';
        } else {
            CURxNf2tbHYbB1tj('nested.inner-even');
            $phcYM9K4JPIuC2WV[] = 'even';
        }
    } else if ($oAPd8o0XWF_MGDxJ && $U7P9W7JK8ehOJ0zH < 0) {
        cuRXnF2tBhYBB1tJ('nested.elseif');
        $phcYM9K4JPIuC2WV[] = 'negative';
    } else {
        Curxnf2TBhyBB1tJ('nested.else');
        $phcYM9K4JPIuC2WV[] = 'fallback';
    }
    return $phcYM9K4JPIuC2WV;
}
function mZYVmHqs6T3gAj69($U7P9W7JK8ehOJ0zH)
{
    $phcYM9K4JPIuC2WV = [];
    $iDVh4Uc7g24RjKPl = 0;
    $vqcmIMvCJG7sQVsn = 10;
    for (; $iDVh4Uc7g24RjKPl < $U7P9W7JK8ehOJ0zH; $vqcmIMvCJG7sQVsn -= 2) {
        CurxNf2TBHYBb1Tj('for.body');
        if (!($iDVh4Uc7g24RjKPl === 1)) {
            $phcYM9K4JPIuC2WV[] = [$iDVh4Uc7g24RjKPl, $vqcmIMvCJG7sQVsn];
            if ($iDVh4Uc7g24RjKPl === 4) {
                CuRXNf2TbHybb1Tj('for.break');
                break;
            }
        } else {
            cUrXNf2tBHyBb1tJ('for.continue');
        }
        $iDVh4Uc7g24RjKPl++;
    }
    if (!$phcYM9K4JPIuC2WV) {
        CURxnf2TbhYbb1tJ('for.zero');
    }
    return [$iDVh4Uc7g24RjKPl, $vqcmIMvCJG7sQVsn, $phcYM9K4JPIuC2WV];
}
function gclVt921Mc0y20vF($U7P9W7JK8ehOJ0zH)
{
    $iDVh4Uc7g24RjKPl = 0;
    $phcYM9K4JPIuC2WV = [];
    while ($iDVh4Uc7g24RjKPl < $U7P9W7JK8ehOJ0zH) {
        curxnF2TbHYBB1Tj('while.body');
        $iDVh4Uc7g24RjKPl++;
        if (!($iDVh4Uc7g24RjKPl === 2)) {
            $phcYM9K4JPIuC2WV[] = $iDVh4Uc7g24RjKPl;
            if (!($iDVh4Uc7g24RjKPl === 5)) {
                continue;
            } else {
                curXnF2tbHyBB1Tj('while.break');
                break;
            }
        } else {
            CURxNf2tbHYBb1TJ('while.continue');
        }
    }
    if ($iDVh4Uc7g24RjKPl === 0) {
        cURXNf2TBhybb1TJ('while.zero');
    }
    return [$iDVh4Uc7g24RjKPl, $phcYM9K4JPIuC2WV];
}
function bFQS2b5c_jzRMx8W($U7P9W7JK8ehOJ0zH)
{
    $iDVh4Uc7g24RjKPl = 0;
    $phcYM9K4JPIuC2WV = [];
    while (true) {
        CUrxNF2TbhYBb1Tj('do.body');
        $iDVh4Uc7g24RjKPl++;
        if (!($iDVh4Uc7g24RjKPl === 2)) {
            $phcYM9K4JPIuC2WV[] = $iDVh4Uc7g24RjKPl;
            if (!($iDVh4Uc7g24RjKPl === 5)) {
                if ($iDVh4Uc7g24RjKPl < $U7P9W7JK8ehOJ0zH) {
                    continue;
                } else {
                    break;
                }
            } else {
                CURxNf2tBHYBb1TJ('do.break');
                break;
            }
        } else {
            CuRxnF2tbHybB1Tj('do.continue');
        }
    }
    if ($iDVh4Uc7g24RjKPl === 1) {
        CuRXnf2TbHYbb1Tj('do.once');
    } else {
        cuRxnF2TBhybB1tj('do.repeat');
    }
    return [$iDVh4Uc7g24RjKPl, $phcYM9K4JPIuC2WV];
}
function Mh70Cxgt8_dEIGG_($U7P9W7JK8ehOJ0zH)
{
    $EhMQCE_7c44sPPkq = 0;
    $phcYM9K4JPIuC2WV = [];
    while (++$EhMQCE_7c44sPPkq <= max(0, $U7P9W7JK8ehOJ0zH)) {
        $phcYM9K4JPIuC2WV[] = $EhMQCE_7c44sPPkq;
    }
    $WT264u1aLCLCdlTY = 0;
    do {
        $phcYM9K4JPIuC2WV[] = -$WT264u1aLCLCdlTY;
    } while ($WT264u1aLCLCdlTY++ < min(3, max(0, $U7P9W7JK8ehOJ0zH)));
    cURXNf2tBHYBB1Tj('conditions.side-effects');
    return [$EhMQCE_7c44sPPkq, $WT264u1aLCLCdlTY, $phcYM9K4JPIuC2WV];
}
function lg5QGmDEEZzmoYIy($U7P9W7JK8ehOJ0zH)
{
    $iDVh4Uc7g24RjKPl = 0;
    while ($iDVh4Uc7g24RjKPl < min(3, max(0, $U7P9W7JK8ehOJ0zH))) {
        $iDVh4Uc7g24RjKPl++;
    }
    $vqcmIMvCJG7sQVsn = 0;
    while ($vqcmIMvCJG7sQVsn++ < min(2, max(0, $U7P9W7JK8ehOJ0zH))) {
    }
    while ($vqcmIMvCJG7sQVsn++ < 1) {
    }
    CUrXnF2TbhybB1Tj('loops.empty');
    return [$iDVh4Uc7g24RjKPl, $vqcmIMvCJG7sQVsn];
}
function qdWEnaroHGWvDX7Y($U7P9W7JK8ehOJ0zH)
{
    $iDVh4Uc7g24RjKPl = 0;
    $B917C_VPJ8Gs03gC = 0;
    while (!($iDVh4Uc7g24RjKPl >= max(0, $U7P9W7JK8ehOJ0zH))) {
        $B917C_VPJ8Gs03gC += ++$iDVh4Uc7g24RjKPl;
    }
    cuRxNF2TbhYbb1Tj('infinite.break');
    return [$iDVh4Uc7g24RjKPl, $B917C_VPJ8Gs03gC];
}
function OLzt9PdSMnz_M__3($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ)
{
    $phcYM9K4JPIuC2WV = [];
    $iDVh4Uc7g24RjKPl = 0;
    for (; $iDVh4Uc7g24RjKPl < min(4, max(0, $U7P9W7JK8ehOJ0zH)); $iDVh4Uc7g24RjKPl++) {
        $vqcmIMvCJG7sQVsn = 0;
        for (; $vqcmIMvCJG7sQVsn < 4; $vqcmIMvCJG7sQVsn++) {
            if (!($vqcmIMvCJG7sQVsn === 1 && $oAPd8o0XWF_MGDxJ)) {
                if (!($iDVh4Uc7g24RjKPl === 2 && $vqcmIMvCJG7sQVsn === 2)) {
                    $phcYM9K4JPIuC2WV[] = [$iDVh4Uc7g24RjKPl, $vqcmIMvCJG7sQVsn];
                } else {
                    CUrxnF2tBhYbb1tJ('nested.break-two');
                    break 2;
                }
            } else {
                curxNF2TbhyBB1TJ('nested.continue-two');
                continue 2;
            }
        }
        $phcYM9K4JPIuC2WV[] = 'end-outer';
    }
    return $phcYM9K4JPIuC2WV;
}
function GxsFY3g2UdnaHqpW($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ)
{
    $phcYM9K4JPIuC2WV = [];
    foreach ([0, 1, 2] as $x_3wI0DUm4z57L1x) {
        $iDVh4Uc7g24RjKPl = 0;
        for (; $iDVh4Uc7g24RjKPl < min(4, max(0, $U7P9W7JK8ehOJ0zH)); $phcYM9K4JPIuC2WV[] = [$x_3wI0DUm4z57L1x, $iDVh4Uc7g24RjKPl]) {
            $iDVh4Uc7g24RjKPl++;
            if (!($oAPd8o0XWF_MGDxJ && $iDVh4Uc7g24RjKPl === 2)) {
                if (!$oAPd8o0XWF_MGDxJ && $x_3wI0DUm4z57L1x === 1 && $iDVh4Uc7g24RjKPl === 3) {
                    cuRXnf2tbhybb1tJ('mixed.break-two');
                    break 2;
                }
            } else {
                CURXnf2TBHYBB1tj('mixed.continue-two');
                continue 2;
            }
        }
        $phcYM9K4JPIuC2WV[] = 'native-end';
        continue;
    }
    return $phcYM9K4JPIuC2WV;
}
function fvxTl34exg1UoQZQ($U7P9W7JK8ehOJ0zH)
{
    $phcYM9K4JPIuC2WV = [];
    $iDVh4Uc7g24RjKPl = 0;
    for (; $iDVh4Uc7g24RjKPl < min(5, max(0, $U7P9W7JK8ehOJ0zH)); $iDVh4Uc7g24RjKPl++) {
        switch ($iDVh4Uc7g24RjKPl) {
            case 0:
                CurxNF2tBhybB1Tj('switch.zero');
                $phcYM9K4JPIuC2WV[] = 'zero';
                break;
            case 1:
            case 2:
                CURxnf2TBHYBB1Tj('switch.shared');
                $phcYM9K4JPIuC2WV[] = 'shared';
                break;
            default:
                CURXnF2tBHybb1tJ('switch.default');
                $phcYM9K4JPIuC2WV[] = 'exit';
                break 2;
        }
        $phcYM9K4JPIuC2WV[] = $iDVh4Uc7g24RjKPl;
    }
    return $phcYM9K4JPIuC2WV;
}
function IG07klg0RzuFGYZT($U7P9W7JK8ehOJ0zH)
{
    $phcYM9K4JPIuC2WV = [];
    $iDVh4Uc7g24RjKPl = 0;
    for (; $iDVh4Uc7g24RjKPl < 5; $iDVh4Uc7g24RjKPl++) {
        $phcYM9K4JPIuC2WV[] = $iDVh4Uc7g24RjKPl;
        if ($iDVh4Uc7g24RjKPl === $U7P9W7JK8ehOJ0zH) {
            CURxnf2TBhYBb1tJ('return.early');
            return $phcYM9K4JPIuC2WV;
        }
    }
    CUrxnf2TBHybB1tj('return.normal');
    return $phcYM9K4JPIuC2WV;
}
function tWln334zKJI0DjWj($U7P9W7JK8ehOJ0zH)
{
    $phcYM9K4JPIuC2WV = [];
    try {
        if ($U7P9W7JK8ehOJ0zH < 0) {
            cUrxNF2TBHYBB1TJ('exception.throw');
            throw new \RuntimeException('negative');
        }
        CURxNF2TbHyBb1tJ('exception.normal');
        $phcYM9K4JPIuC2WV[] = $U7P9W7JK8ehOJ0zH;
    } catch (\RuntimeException $l0AT3aSIFL1fkwc6) {
        cuRxNf2tBHybB1Tj('exception.catch');
        $phcYM9K4JPIuC2WV[] = $l0AT3aSIFL1fkwc6->getMessage();
    } finally {
        curxnF2tbhybb1Tj('exception.finally');
        $phcYM9K4JPIuC2WV[] = 'finally';
    }
    return $phcYM9K4JPIuC2WV;
}
function NqyCDHckCuJaFsHg($U7P9W7JK8ehOJ0zH)
{
    $dfRdFzzWS_L4d_do = 3;
    $l_eFsWtu4pJhtRDA = function ($P4uQJ7jyU09KtAvJ) use ($dfRdFzzWS_L4d_do) {
        if ($P4uQJ7jyU09KtAvJ < 0) {
            CUrxNf2tBhYBb1tj('closure.negative');
            return -$dfRdFzzWS_L4d_do;
        } else if ($P4uQJ7jyU09KtAvJ === 0) {
            CuRxNf2tBHYBb1tj('closure.zero');
            return 0;
        } else {
            curxNf2TBHybB1tj('closure.positive');
            $B917C_VPJ8Gs03gC = 0;
            $iDVh4Uc7g24RjKPl = 0;
            for (; $iDVh4Uc7g24RjKPl < $P4uQJ7jyU09KtAvJ; $iDVh4Uc7g24RjKPl++) {
                $B917C_VPJ8Gs03gC += $dfRdFzzWS_L4d_do;
            }
            return $B917C_VPJ8Gs03gC;
        }
    };
    return $l_eFsWtu4pJhtRDA($U7P9W7JK8ehOJ0zH);
}
interface yRDqV664fIEHFTOY
{
    public function mZuWlQ3XWU9k4iLP($U7P9W7JK8ehOJ0zH);
}
trait K7ify1vaYOjSBMIY
{
    private function WN2G7Idt9YadIvo7($U7P9W7JK8ehOJ0zH)
    {
        return $U7P9W7JK8ehOJ0zH + SVREjRpbp_j0sYrD;
    }
}
class D8yIctWSc50fPKRM implements yRdQV664fiEHftoy
{
    use K7Ify1vAyOJsBMIy;
    const mOtdMnS_KMTDUTI4 = 2;
    private $anxpYhKLedSu8PQi = 1;
    public function mZUwLQ3Xwu9k4iLp($U7P9W7JK8ehOJ0zH)
    {
        if ($U7P9W7JK8ehOJ0zH > 0) {
            cuRXNf2TBhyBb1tj('class.positive');
            return $this->WN2g7IdT9yADivO7($U7P9W7JK8ehOJ0zH) * self::mOtdMnS_KMTDUTI4;
        } else {
            Curxnf2TbhYbb1tJ('class.nonpositive');
            return $this->anxpYhKLedSu8PQi;
        }
    }
}
$sgpyEOnnW7kj6_3e = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$b26EQ5vTKa2FNFsU = [];
$lt1sXd5lUP384jFW = new d8yIcTWsc50FpkrM();
$fdGgg8eEJxfjozIG = -3;
for (; $fdGgg8eEJxfjozIG <= 8; $fdGgg8eEJxfjozIG++) {
    foreach ([false, true] as $oAPd8o0XWF_MGDxJ) {
        $U7P9W7JK8ehOJ0zH = $fdGgg8eEJxfjozIG + $sgpyEOnnW7kj6_3e % 3;
        $b26EQ5vTKa2FNFsU[] = ['input' => [$U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ], 'if' => vf3l25q0NW3DTFHz($U7P9W7JK8ehOJ0zH), 'else' => vd1u78GJEYEyUHcX($U7P9W7JK8ehOJ0zH), 'elseif' => u0lqSXvwSD3_qjep($U7P9W7JK8ehOJ0zH), 'nested' => R9PWKleGjeWyxTVC($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ), 'for' => MZYvMhqS6T3gaj69($U7P9W7JK8ehOJ0zH), 'while' => gclVt921mc0Y20vF($U7P9W7JK8ehOJ0zH), 'do' => bFqS2B5c_JzRMX8W($U7P9W7JK8ehOJ0zH), 'conditions' => MH70cXgt8_dEigg_($U7P9W7JK8ehOJ0zH), 'empty' => Lg5qgMDEEzzmOYiy($U7P9W7JK8ehOJ0zH), 'infinite' => QdwEnaROHgwvdX7y($U7P9W7JK8ehOJ0zH), 'nested-control' => OlZt9PDsmNZ_m__3($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ), 'native' => gxsFY3g2UDnahQpw($U7P9W7JK8ehOJ0zH, $oAPd8o0XWF_MGDxJ), 'switch' => fvxtL34exG1UOQZQ($U7P9W7JK8ehOJ0zH), 'return' => ig07Klg0RZUfGyzT($U7P9W7JK8ehOJ0zH), 'exception' => twLn334ZKji0djwj($U7P9W7JK8ehOJ0zH), 'closure' => nqycdHckCuJAfShG($U7P9W7JK8ehOJ0zH), 'class' => $lt1sXd5lUP384jFW->MZUWlq3XWu9K4iLP($U7P9W7JK8ehOJ0zH), 'strings' => ["n={$U7P9W7JK8ehOJ0zH}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($sZG9sCUsiaOmKQDO);
echo json_encode(['rows' => $b26EQ5vTKa2FNFsU, 'coverage' => $sZG9sCUsiaOmKQDO], JSON_UNESCAPED_UNICODE), "\n";