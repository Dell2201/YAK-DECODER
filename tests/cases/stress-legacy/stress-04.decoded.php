<?php

namespace BTOT3euhoL_0HfoH;

const ECRUokIWkkXOOmLo = 7;
$YgE0FRGs82BrpGTA = [];
function K9riXJXkQc5EWkv0($mDF3z1nU9CG_mx6Y)
{
    global $YgE0FRGs82BrpGTA;
    $YgE0FRGs82BrpGTA[$mDF3z1nU9CG_mx6Y] = isset($YgE0FRGs82BrpGTA[$mDF3z1nU9CG_mx6Y]) ? $YgE0FRGs82BrpGTA[$mDF3z1nU9CG_mx6Y] + 1 : 1;
}
function Vs8mP85J6uXpW8RR($qzMskxLXu_cFPQQg)
{
    $Cn9j8kBy3ugHt_N6 = 0;
    if ($qzMskxLXu_cFPQQg > 0) {
        k9RixJxKqc5ewkv0('if.true');
        $Cn9j8kBy3ugHt_N6 = $qzMskxLXu_cFPQQg * 2;
    }
    if ($qzMskxLXu_cFPQQg <= 0) {
        K9RIXJXkQC5eWKv0('if.false-path');
    }
    return $Cn9j8kBy3ugHt_N6;
}
function fVTLJxCMKyjyIMqc($qzMskxLXu_cFPQQg)
{
    if ($qzMskxLXu_cFPQQg % 2 === 0) {
        K9riXJXKqc5EwKV0('else.then');
        return 'even';
    } else {
        k9rIxjXKQC5EWKv0('else.else');
        return 'odd';
    }
}
function IZtO8p7pMwidEpEL($qzMskxLXu_cFPQQg)
{
    if ($qzMskxLXu_cFPQQg < 0) {
        k9RiXJxkqc5ewkv0('elseif.negative');
        return -1;
    } else if ($qzMskxLXu_cFPQQg === 0) {
        k9rIxJXkQC5ewKv0('elseif.zero');
        return 0;
    } else if ($qzMskxLXu_cFPQQg < 3) {
        K9RIxjxKQC5EwKV0('elseif.small');
        return 1;
    } else {
        k9rIxJXKqC5ewKV0('elseif.large');
        return 2;
    }
}
function yL07gKmz_2aiRNiP($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr)
{
    $A8t5stWjLauUx_2h = [];
    if ($qzMskxLXu_cFPQQg > 0 && ($kvdAcy1owpSMUMUr || $qzMskxLXu_cFPQQg > 3)) {
        k9rIxjxkqC5EwKv0('nested.outer-true');
        $A8t5stWjLauUx_2h[] = 'outer';
        if ($qzMskxLXu_cFPQQg % 2) {
            K9RixjXKQc5ewkV0('nested.inner-odd');
            $A8t5stWjLauUx_2h[] = 'odd';
        } else {
            k9RIxjxkqC5ewKv0('nested.inner-even');
            $A8t5stWjLauUx_2h[] = 'even';
        }
    } else if ($kvdAcy1owpSMUMUr && $qzMskxLXu_cFPQQg < 0) {
        K9rIXJxKqC5ewkv0('nested.elseif');
        $A8t5stWjLauUx_2h[] = 'negative';
    } else {
        k9rIxjxKQC5eWkV0('nested.else');
        $A8t5stWjLauUx_2h[] = 'fallback';
    }
    return $A8t5stWjLauUx_2h;
}
function mH4y8W3nuetCnINs($qzMskxLXu_cFPQQg)
{
    $A8t5stWjLauUx_2h = [];
    $AfjEEpf62MQrwJ34 = 0;
    $H3I_bxW0_TbVBdg0 = 10;
    for (; $AfjEEpf62MQrwJ34 < $qzMskxLXu_cFPQQg; $H3I_bxW0_TbVBdg0 -= 2) {
        k9rixjXKqC5EWkV0('for.body');
        if (!($AfjEEpf62MQrwJ34 === 1)) {
            $A8t5stWjLauUx_2h[] = [$AfjEEpf62MQrwJ34, $H3I_bxW0_TbVBdg0];
            if ($AfjEEpf62MQrwJ34 === 4) {
                k9RIXJXKqc5EwKv0('for.break');
                break;
            }
        } else {
            k9RIxJxKQC5eWkV0('for.continue');
        }
        $AfjEEpf62MQrwJ34++;
    }
    if (!$A8t5stWjLauUx_2h) {
        k9rixjxkQC5EwKv0('for.zero');
    }
    return [$AfjEEpf62MQrwJ34, $H3I_bxW0_TbVBdg0, $A8t5stWjLauUx_2h];
}
function ToHxWF8QeCDopTFN($qzMskxLXu_cFPQQg)
{
    $AfjEEpf62MQrwJ34 = 0;
    $A8t5stWjLauUx_2h = [];
    while ($AfjEEpf62MQrwJ34 < $qzMskxLXu_cFPQQg) {
        K9RIxJxkQC5ewKV0('while.body');
        $AfjEEpf62MQrwJ34++;
        if (!($AfjEEpf62MQrwJ34 === 2)) {
            $A8t5stWjLauUx_2h[] = $AfjEEpf62MQrwJ34;
            if (!($AfjEEpf62MQrwJ34 === 5)) {
                continue;
            } else {
                K9rIXJxKQC5ewKV0('while.break');
                break;
            }
        } else {
            k9RiXJxkqC5eWKv0('while.continue');
        }
    }
    if ($AfjEEpf62MQrwJ34 === 0) {
        K9RIxJxKqC5EwKV0('while.zero');
    }
    return [$AfjEEpf62MQrwJ34, $A8t5stWjLauUx_2h];
}
function kyqQrNS7FjGfBZRF($qzMskxLXu_cFPQQg)
{
    $AfjEEpf62MQrwJ34 = 0;
    $A8t5stWjLauUx_2h = [];
    while (true) {
        k9rIxjXkqc5Ewkv0('do.body');
        $AfjEEpf62MQrwJ34++;
        if (!($AfjEEpf62MQrwJ34 === 2)) {
            $A8t5stWjLauUx_2h[] = $AfjEEpf62MQrwJ34;
            if (!($AfjEEpf62MQrwJ34 === 5)) {
                if ($AfjEEpf62MQrwJ34 < $qzMskxLXu_cFPQQg) {
                    continue;
                } else {
                    break;
                }
            } else {
                k9riXjxKqc5ewKv0('do.break');
                break;
            }
        } else {
            k9riXJXkQc5ewkv0('do.continue');
        }
    }
    if ($AfjEEpf62MQrwJ34 === 1) {
        k9rixjXKQc5ewkv0('do.once');
    } else {
        K9RIxJxKqc5ewKV0('do.repeat');
    }
    return [$AfjEEpf62MQrwJ34, $A8t5stWjLauUx_2h];
}
function ejrmaBAaDDSPMC_B($qzMskxLXu_cFPQQg)
{
    $MXRXpK9tUcFP7uSX = 0;
    $A8t5stWjLauUx_2h = [];
    while (++$MXRXpK9tUcFP7uSX <= max(0, $qzMskxLXu_cFPQQg)) {
        $A8t5stWjLauUx_2h[] = $MXRXpK9tUcFP7uSX;
    }
    $v3LmtICKFUNHw20i = 0;
    do {
        $A8t5stWjLauUx_2h[] = -$v3LmtICKFUNHw20i;
    } while ($v3LmtICKFUNHw20i++ < min(3, max(0, $qzMskxLXu_cFPQQg)));
    K9rixJxKQc5EWKV0('conditions.side-effects');
    return [$MXRXpK9tUcFP7uSX, $v3LmtICKFUNHw20i, $A8t5stWjLauUx_2h];
}
function kwsNU4aUVjHvvrc1($qzMskxLXu_cFPQQg)
{
    $AfjEEpf62MQrwJ34 = 0;
    while ($AfjEEpf62MQrwJ34 < min(3, max(0, $qzMskxLXu_cFPQQg))) {
        $AfjEEpf62MQrwJ34++;
    }
    $H3I_bxW0_TbVBdg0 = 0;
    while ($H3I_bxW0_TbVBdg0++ < min(2, max(0, $qzMskxLXu_cFPQQg))) {
    }
    while ($H3I_bxW0_TbVBdg0++ < 1) {
    }
    k9RiXjxKQC5EwKv0('loops.empty');
    return [$AfjEEpf62MQrwJ34, $H3I_bxW0_TbVBdg0];
}
function PnyvRaC20kAKb2JG($qzMskxLXu_cFPQQg)
{
    $AfjEEpf62MQrwJ34 = 0;
    $uZ6XWkpPABEbxaY8 = 0;
    while (!($AfjEEpf62MQrwJ34 >= max(0, $qzMskxLXu_cFPQQg))) {
        $uZ6XWkpPABEbxaY8 += ++$AfjEEpf62MQrwJ34;
    }
    k9rixJXkqc5eWKV0('infinite.break');
    return [$AfjEEpf62MQrwJ34, $uZ6XWkpPABEbxaY8];
}
function veLjoi_enMqzDh2Z($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr)
{
    $A8t5stWjLauUx_2h = [];
    $AfjEEpf62MQrwJ34 = 0;
    for (; $AfjEEpf62MQrwJ34 < min(4, max(0, $qzMskxLXu_cFPQQg)); $AfjEEpf62MQrwJ34++) {
        $H3I_bxW0_TbVBdg0 = 0;
        for (; $H3I_bxW0_TbVBdg0 < 4; $H3I_bxW0_TbVBdg0++) {
            if (!($H3I_bxW0_TbVBdg0 === 1 && $kvdAcy1owpSMUMUr)) {
                if (!($AfjEEpf62MQrwJ34 === 2 && $H3I_bxW0_TbVBdg0 === 2)) {
                    $A8t5stWjLauUx_2h[] = [$AfjEEpf62MQrwJ34, $H3I_bxW0_TbVBdg0];
                } else {
                    k9riXJXKqC5EwKV0('nested.break-two');
                    break 2;
                }
            } else {
                k9RixjXkQc5ewKv0('nested.continue-two');
                continue 2;
            }
        }
        $A8t5stWjLauUx_2h[] = 'end-outer';
    }
    return $A8t5stWjLauUx_2h;
}
function YdgDsvX2L6jDCYAx($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr)
{
    $A8t5stWjLauUx_2h = [];
    foreach ([0, 1, 2] as $M9FOLcvPjkBxoiuW) {
        $AfjEEpf62MQrwJ34 = 0;
        for (; $AfjEEpf62MQrwJ34 < min(4, max(0, $qzMskxLXu_cFPQQg)); $A8t5stWjLauUx_2h[] = [$M9FOLcvPjkBxoiuW, $AfjEEpf62MQrwJ34]) {
            $AfjEEpf62MQrwJ34++;
            if (!($kvdAcy1owpSMUMUr && $AfjEEpf62MQrwJ34 === 2)) {
                if (!$kvdAcy1owpSMUMUr && $M9FOLcvPjkBxoiuW === 1 && $AfjEEpf62MQrwJ34 === 3) {
                    K9RixjxKQc5ewKV0('mixed.break-two');
                    break 2;
                }
            } else {
                K9riXjXKQC5EwKv0('mixed.continue-two');
                continue 2;
            }
        }
        $A8t5stWjLauUx_2h[] = 'native-end';
        continue;
    }
    return $A8t5stWjLauUx_2h;
}
function XJi08_b1MwDQiM3z($qzMskxLXu_cFPQQg)
{
    $A8t5stWjLauUx_2h = [];
    $AfjEEpf62MQrwJ34 = 0;
    for (; $AfjEEpf62MQrwJ34 < min(5, max(0, $qzMskxLXu_cFPQQg)); $AfjEEpf62MQrwJ34++) {
        switch ($AfjEEpf62MQrwJ34) {
            case 0:
                k9RIXJXKQc5ewKV0('switch.zero');
                $A8t5stWjLauUx_2h[] = 'zero';
                break;
            case 1:
            case 2:
                k9rixJxkqC5Ewkv0('switch.shared');
                $A8t5stWjLauUx_2h[] = 'shared';
                break;
            default:
                k9rIxjxKqC5eWkv0('switch.default');
                $A8t5stWjLauUx_2h[] = 'exit';
                break 2;
        }
        $A8t5stWjLauUx_2h[] = $AfjEEpf62MQrwJ34;
    }
    return $A8t5stWjLauUx_2h;
}
function YIwwgk563bczvpzF($qzMskxLXu_cFPQQg)
{
    $A8t5stWjLauUx_2h = [];
    $AfjEEpf62MQrwJ34 = 0;
    for (; $AfjEEpf62MQrwJ34 < 5; $AfjEEpf62MQrwJ34++) {
        $A8t5stWjLauUx_2h[] = $AfjEEpf62MQrwJ34;
        if ($AfjEEpf62MQrwJ34 === $qzMskxLXu_cFPQQg) {
            K9riXjXkQC5eWKv0('return.early');
            return $A8t5stWjLauUx_2h;
        }
    }
    K9rIXjXkqC5eWkv0('return.normal');
    return $A8t5stWjLauUx_2h;
}
function wxO1IpoGVKDrZA0N($qzMskxLXu_cFPQQg)
{
    $A8t5stWjLauUx_2h = [];
    try {
        if ($qzMskxLXu_cFPQQg < 0) {
            k9RIxjxKQc5EwkV0('exception.throw');
            throw new \RuntimeException('negative');
        }
        k9rIxJxKQc5Ewkv0('exception.normal');
        $A8t5stWjLauUx_2h[] = $qzMskxLXu_cFPQQg;
    } catch (\RuntimeException $xWhyDguWRxp1wRAA) {
        K9riXjXKQc5EWKV0('exception.catch');
        $A8t5stWjLauUx_2h[] = $xWhyDguWRxp1wRAA->getMessage();
    } finally {
        k9RIxJxKQc5EWkv0('exception.finally');
        $A8t5stWjLauUx_2h[] = 'finally';
    }
    return $A8t5stWjLauUx_2h;
}
function tuysc3zh5z3oHjeq($qzMskxLXu_cFPQQg)
{
    $pPgGYKr3mNiJE2wr = 3;
    $wCM9G3766H4bkBcn = function ($JyGIyQ2Q2WjBg2gP) use ($pPgGYKr3mNiJE2wr) {
        if ($JyGIyQ2Q2WjBg2gP < 0) {
            K9RixJXkQc5Ewkv0('closure.negative');
            return -$pPgGYKr3mNiJE2wr;
        } else if ($JyGIyQ2Q2WjBg2gP === 0) {
            K9riXjxkqC5ewKV0('closure.zero');
            return 0;
        } else {
            k9RiXjxkQc5EWKV0('closure.positive');
            $uZ6XWkpPABEbxaY8 = 0;
            $AfjEEpf62MQrwJ34 = 0;
            for (; $AfjEEpf62MQrwJ34 < $JyGIyQ2Q2WjBg2gP; $AfjEEpf62MQrwJ34++) {
                $uZ6XWkpPABEbxaY8 += $pPgGYKr3mNiJE2wr;
            }
            return $uZ6XWkpPABEbxaY8;
        }
    };
    return $wCM9G3766H4bkBcn($qzMskxLXu_cFPQQg);
}
interface NrGzEqHOxA7Z5Bde
{
    public function eNCNvp8GqzxJhTpu($qzMskxLXu_cFPQQg);
}
trait WxvliZluTfMBTZMv
{
    private function hanucpTQs_Pb3Out($qzMskxLXu_cFPQQg)
    {
        return $qzMskxLXu_cFPQQg + ECRUokIWkkXOOmLo;
    }
}
class Tahc_lC_7b3JHzXV implements Nrgzeqhoxa7Z5BDe
{
    use wxvlizlUTfmBtzMv;
    const HSgK0joYYmBFlaIl = 2;
    private $U6PRhJs23t4e2183 = 1;
    public function encnVP8GqzXJHtpU($qzMskxLXu_cFPQQg)
    {
        if ($qzMskxLXu_cFPQQg > 0) {
            K9rIXJXkqc5ewkv0('class.positive');
            return $this->hanUCPTQs_pb3Out($qzMskxLXu_cFPQQg) * self::HSgK0joYYmBFlaIl;
        } else {
            k9RIxjxkQC5eWKv0('class.nonpositive');
            return $this->U6PRhJs23t4e2183;
        }
    }
}
$gOvGs_G8u0vadCVp = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$uzOBDCEzWDDrjWG3 = [];
$rBXnLx5fn2fGQMnP = new Tahc_lc_7b3JhzXv();
$hynKbaD0ohK1bCsW = -3;
for (; $hynKbaD0ohK1bCsW <= 8; $hynKbaD0ohK1bCsW++) {
    foreach ([false, true] as $kvdAcy1owpSMUMUr) {
        $qzMskxLXu_cFPQQg = $hynKbaD0ohK1bCsW + $gOvGs_G8u0vadCVp % 3;
        $uzOBDCEzWDDrjWG3[] = ['input' => [$qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr], 'if' => vs8MP85J6uXPW8RR($qzMskxLXu_cFPQQg), 'else' => FvtLjxcMkyJYiMQC($qzMskxLXu_cFPQQg), 'elseif' => iZTo8p7pmWiDePEl($qzMskxLXu_cFPQQg), 'nested' => YL07GKMZ_2aiRnIp($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr), 'for' => mH4Y8w3NueTcnins($qzMskxLXu_cFPQQg), 'while' => tOHxwf8QECDOptfn($qzMskxLXu_cFPQQg), 'do' => kYQqRnS7FjGfBZRf($qzMskxLXu_cFPQQg), 'conditions' => EjrmABAAddSPmC_b($qzMskxLXu_cFPQQg), 'empty' => kWSnU4aUVjhvvRc1($qzMskxLXu_cFPQQg), 'infinite' => PNyvRAC20kakb2JG($qzMskxLXu_cFPQQg), 'nested-control' => vEljOI_EnMQzDh2z($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr), 'native' => ydgDsVX2L6JDcyAx($qzMskxLXu_cFPQQg, $kvdAcy1owpSMUMUr), 'switch' => XJi08_b1mWDQiM3Z($qzMskxLXu_cFPQQg), 'return' => YIWwgK563bCzVpzf($qzMskxLXu_cFPQQg), 'exception' => WXO1IpogVkdRZa0n($qzMskxLXu_cFPQQg), 'closure' => tuYsc3zh5Z3OHJeq($qzMskxLXu_cFPQQg), 'class' => $rBXnLx5fn2fGQMnP->eNCnVp8gQzxJhtpU($qzMskxLXu_cFPQQg), 'strings' => ["n={$qzMskxLXu_cFPQQg}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($YgE0FRGs82BrpGTA);
echo json_encode(['rows' => $uzOBDCEzWDDrjWG3, 'coverage' => $YgE0FRGs82BrpGTA], JSON_UNESCAPED_UNICODE), "\n";