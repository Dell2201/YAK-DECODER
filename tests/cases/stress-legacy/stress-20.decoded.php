<?php

namespace EtxZayr1cI9q3fl8;

const faxYldCJEAulsepI = 7;
$xr4tSy5FRP6H_ozt = [];
function VOIQImPrIE0KZMFu($wj83C_ScFpu6uyFq)
{
    global $xr4tSy5FRP6H_ozt;
    $xr4tSy5FRP6H_ozt[$wj83C_ScFpu6uyFq] = isset($xr4tSy5FRP6H_ozt[$wj83C_ScFpu6uyFq]) ? $xr4tSy5FRP6H_ozt[$wj83C_ScFpu6uyFq] + 1 : 1;
}
function L458Ny1jsuK5xLdI($v48ygyhbErqVzXF8)
{
    $nBik0bOLAdgtnkPQ = 0;
    if ($v48ygyhbErqVzXF8 > 0) {
        vOiqIMPRIE0kZmfu('if.true');
        $nBik0bOLAdgtnkPQ = $v48ygyhbErqVzXF8 * 2;
    }
    if ($v48ygyhbErqVzXF8 <= 0) {
        vOIqimprIE0kzMFU('if.false-path');
    }
    return $nBik0bOLAdgtnkPQ;
}
function LSMgWHT1z17FSe0D($v48ygyhbErqVzXF8)
{
    if ($v48ygyhbErqVzXF8 % 2 === 0) {
        VOIqImprie0kZmFU('else.then');
        return 'even';
    } else {
        vOIQimpriE0kZMfu('else.else');
        return 'odd';
    }
}
function AXEK_IuK4fUkWox3($v48ygyhbErqVzXF8)
{
    if ($v48ygyhbErqVzXF8 < 0) {
        voIqiMPrIe0kzmFu('elseif.negative');
        return -1;
    } else if ($v48ygyhbErqVzXF8 === 0) {
        VoIqIMPRiE0kzMFu('elseif.zero');
        return 0;
    } else if ($v48ygyhbErqVzXF8 < 3) {
        VOIqImprIE0KZmFU('elseif.small');
        return 1;
    } else {
        vOiQIMPrie0kZmFu('elseif.large');
        return 2;
    }
}
function EuoduAlmCGjrsQUJ($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu)
{
    $YRq6blGN282pFUMy = [];
    if ($v48ygyhbErqVzXF8 > 0 && ($esJ7FPNXJjxXDtzu || $v48ygyhbErqVzXF8 > 3)) {
        VOIQiMpRIE0kZmFu('nested.outer-true');
        $YRq6blGN282pFUMy[] = 'outer';
        if ($v48ygyhbErqVzXF8 % 2) {
            voIqiMprIE0KzMFu('nested.inner-odd');
            $YRq6blGN282pFUMy[] = 'odd';
        } else {
            voIQiMpRie0KzmFu('nested.inner-even');
            $YRq6blGN282pFUMy[] = 'even';
        }
    } else if ($esJ7FPNXJjxXDtzu && $v48ygyhbErqVzXF8 < 0) {
        vOIqimPRIe0kzMFu('nested.elseif');
        $YRq6blGN282pFUMy[] = 'negative';
    } else {
        VOiQIMpRIE0KZMFu('nested.else');
        $YRq6blGN282pFUMy[] = 'fallback';
    }
    return $YRq6blGN282pFUMy;
}
function s5GTH2BF1o34R4Ds($v48ygyhbErqVzXF8)
{
    $YRq6blGN282pFUMy = [];
    $zz79U8KK4U9cD0Sf = 0;
    $FeGpsz8UjxX5T_32 = 10;
    for (; $zz79U8KK4U9cD0Sf < $v48ygyhbErqVzXF8; $FeGpsz8UjxX5T_32 -= 2) {
        VoIqImPRIE0KZmfu('for.body');
        if (!($zz79U8KK4U9cD0Sf === 1)) {
            $YRq6blGN282pFUMy[] = [$zz79U8KK4U9cD0Sf, $FeGpsz8UjxX5T_32];
            if ($zz79U8KK4U9cD0Sf === 4) {
                vOIQIMpRIe0kZMFu('for.break');
                break;
            }
        } else {
            VOIQIMpRiE0kzMFU('for.continue');
        }
        $zz79U8KK4U9cD0Sf++;
    }
    if (!$YRq6blGN282pFUMy) {
        voIQiMPrIE0kzmfU('for.zero');
    }
    return [$zz79U8KK4U9cD0Sf, $FeGpsz8UjxX5T_32, $YRq6blGN282pFUMy];
}
function fyAP8zo6oOJhNewV($v48ygyhbErqVzXF8)
{
    $zz79U8KK4U9cD0Sf = 0;
    $YRq6blGN282pFUMy = [];
    while ($zz79U8KK4U9cD0Sf < $v48ygyhbErqVzXF8) {
        voiQIMpRIe0kzMFu('while.body');
        $zz79U8KK4U9cD0Sf++;
        if (!($zz79U8KK4U9cD0Sf === 2)) {
            $YRq6blGN282pFUMy[] = $zz79U8KK4U9cD0Sf;
            if (!($zz79U8KK4U9cD0Sf === 5)) {
                continue;
            } else {
                VOiQIMPRiE0kzmFU('while.break');
                break;
            }
        } else {
            vOiqIMPRIe0kZmFU('while.continue');
        }
    }
    if ($zz79U8KK4U9cD0Sf === 0) {
        voiQImpRie0kZmFU('while.zero');
    }
    return [$zz79U8KK4U9cD0Sf, $YRq6blGN282pFUMy];
}
function wmDjSe2kQq5Ooj5v($v48ygyhbErqVzXF8)
{
    $zz79U8KK4U9cD0Sf = 0;
    $YRq6blGN282pFUMy = [];
    while (true) {
        VOiQImPRIe0KZMfu('do.body');
        $zz79U8KK4U9cD0Sf++;
        if (!($zz79U8KK4U9cD0Sf === 2)) {
            $YRq6blGN282pFUMy[] = $zz79U8KK4U9cD0Sf;
            if (!($zz79U8KK4U9cD0Sf === 5)) {
                if ($zz79U8KK4U9cD0Sf < $v48ygyhbErqVzXF8) {
                    continue;
                } else {
                    break;
                }
            } else {
                VoIQiMprie0KZmFu('do.break');
                break;
            }
        } else {
            voIqIMprie0Kzmfu('do.continue');
        }
    }
    if ($zz79U8KK4U9cD0Sf === 1) {
        VoIQImPRie0kZmFU('do.once');
    } else {
        VoiqImPrIe0kZmFu('do.repeat');
    }
    return [$zz79U8KK4U9cD0Sf, $YRq6blGN282pFUMy];
}
function Tnob7QcMaJxNNLxN($v48ygyhbErqVzXF8)
{
    $nYaKhFaJbcz8HJe5 = 0;
    $YRq6blGN282pFUMy = [];
    while (++$nYaKhFaJbcz8HJe5 <= max(0, $v48ygyhbErqVzXF8)) {
        $YRq6blGN282pFUMy[] = $nYaKhFaJbcz8HJe5;
    }
    $UUklaav6KiQec65O = 0;
    do {
        $YRq6blGN282pFUMy[] = -$UUklaav6KiQec65O;
    } while ($UUklaav6KiQec65O++ < min(3, max(0, $v48ygyhbErqVzXF8)));
    vOIqiMpriE0KzMfu('conditions.side-effects');
    return [$nYaKhFaJbcz8HJe5, $UUklaav6KiQec65O, $YRq6blGN282pFUMy];
}
function djF0A_8cygdSOFCJ($v48ygyhbErqVzXF8)
{
    $zz79U8KK4U9cD0Sf = 0;
    while ($zz79U8KK4U9cD0Sf < min(3, max(0, $v48ygyhbErqVzXF8))) {
        $zz79U8KK4U9cD0Sf++;
    }
    $FeGpsz8UjxX5T_32 = 0;
    while ($FeGpsz8UjxX5T_32++ < min(2, max(0, $v48ygyhbErqVzXF8))) {
    }
    while ($FeGpsz8UjxX5T_32++ < 1) {
    }
    vOiQImPRiE0KZMfU('loops.empty');
    return [$zz79U8KK4U9cD0Sf, $FeGpsz8UjxX5T_32];
}
function IRZVYAm9KdjM3li3($v48ygyhbErqVzXF8)
{
    $zz79U8KK4U9cD0Sf = 0;
    $uyaUG69_gsjGuMnj = 0;
    while (!($zz79U8KK4U9cD0Sf >= max(0, $v48ygyhbErqVzXF8))) {
        $uyaUG69_gsjGuMnj += ++$zz79U8KK4U9cD0Sf;
    }
    vOiqImPriE0KzmfU('infinite.break');
    return [$zz79U8KK4U9cD0Sf, $uyaUG69_gsjGuMnj];
}
function XrZlLcqfae0yuiBh($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu)
{
    $YRq6blGN282pFUMy = [];
    $zz79U8KK4U9cD0Sf = 0;
    for (; $zz79U8KK4U9cD0Sf < min(4, max(0, $v48ygyhbErqVzXF8)); $zz79U8KK4U9cD0Sf++) {
        $FeGpsz8UjxX5T_32 = 0;
        for (; $FeGpsz8UjxX5T_32 < 4; $FeGpsz8UjxX5T_32++) {
            if (!($FeGpsz8UjxX5T_32 === 1 && $esJ7FPNXJjxXDtzu)) {
                if (!($zz79U8KK4U9cD0Sf === 2 && $FeGpsz8UjxX5T_32 === 2)) {
                    $YRq6blGN282pFUMy[] = [$zz79U8KK4U9cD0Sf, $FeGpsz8UjxX5T_32];
                } else {
                    vOIqIMpriE0KzMfU('nested.break-two');
                    break 2;
                }
            } else {
                VoiQiMpRiE0KzMfu('nested.continue-two');
                continue 2;
            }
        }
        $YRq6blGN282pFUMy[] = 'end-outer';
    }
    return $YRq6blGN282pFUMy;
}
function adeffn417JMZLWIK($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu)
{
    $YRq6blGN282pFUMy = [];
    foreach ([0, 1, 2] as $pdmbxMMBr1aZBFBz) {
        $zz79U8KK4U9cD0Sf = 0;
        for (; $zz79U8KK4U9cD0Sf < min(4, max(0, $v48ygyhbErqVzXF8)); $YRq6blGN282pFUMy[] = [$pdmbxMMBr1aZBFBz, $zz79U8KK4U9cD0Sf]) {
            $zz79U8KK4U9cD0Sf++;
            if (!($esJ7FPNXJjxXDtzu && $zz79U8KK4U9cD0Sf === 2)) {
                if (!$esJ7FPNXJjxXDtzu && $pdmbxMMBr1aZBFBz === 1 && $zz79U8KK4U9cD0Sf === 3) {
                    voiqIMPrIE0KZMfU('mixed.break-two');
                    break 2;
                }
            } else {
                VOiqimpRIe0KZmFu('mixed.continue-two');
                continue 2;
            }
        }
        $YRq6blGN282pFUMy[] = 'native-end';
        continue;
    }
    return $YRq6blGN282pFUMy;
}
function X7aZDGlA99gfJlKv($v48ygyhbErqVzXF8)
{
    $YRq6blGN282pFUMy = [];
    $zz79U8KK4U9cD0Sf = 0;
    for (; $zz79U8KK4U9cD0Sf < min(5, max(0, $v48ygyhbErqVzXF8)); $zz79U8KK4U9cD0Sf++) {
        switch ($zz79U8KK4U9cD0Sf) {
            case 0:
                voiqIMPrIe0kzMFu('switch.zero');
                $YRq6blGN282pFUMy[] = 'zero';
                break;
            case 1:
            case 2:
                voIQimpRie0KzMfu('switch.shared');
                $YRq6blGN282pFUMy[] = 'shared';
                break;
            default:
                VOIQIMpRie0kzmFu('switch.default');
                $YRq6blGN282pFUMy[] = 'exit';
                break 2;
        }
        $YRq6blGN282pFUMy[] = $zz79U8KK4U9cD0Sf;
    }
    return $YRq6blGN282pFUMy;
}
function ie_11NR3OxpeK2CW($v48ygyhbErqVzXF8)
{
    $YRq6blGN282pFUMy = [];
    $zz79U8KK4U9cD0Sf = 0;
    for (; $zz79U8KK4U9cD0Sf < 5; $zz79U8KK4U9cD0Sf++) {
        $YRq6blGN282pFUMy[] = $zz79U8KK4U9cD0Sf;
        if ($zz79U8KK4U9cD0Sf === $v48ygyhbErqVzXF8) {
            VOiQIMpriE0kzMfu('return.early');
            return $YRq6blGN282pFUMy;
        }
    }
    vOIqiMPRie0KzMFU('return.normal');
    return $YRq6blGN282pFUMy;
}
function mAFwgrLSACf_xawn($v48ygyhbErqVzXF8)
{
    $YRq6blGN282pFUMy = [];
    try {
        if ($v48ygyhbErqVzXF8 < 0) {
            vOIQImprIE0kZmFU('exception.throw');
            throw new \RuntimeException('negative');
        }
        vOIqiMpRIE0kZmFU('exception.normal');
        $YRq6blGN282pFUMy[] = $v48ygyhbErqVzXF8;
    } catch (\RuntimeException $GxeocT4W05lDB1RT) {
        voIQimPRie0KzMfu('exception.catch');
        $YRq6blGN282pFUMy[] = $GxeocT4W05lDB1RT->getMessage();
    } finally {
        VoIQiMPrIE0kZmfU('exception.finally');
        $YRq6blGN282pFUMy[] = 'finally';
    }
    return $YRq6blGN282pFUMy;
}
function a6sfVwY1qpLfIO4a($v48ygyhbErqVzXF8)
{
    $pjSr94upje2FWLFf = 3;
    $pVajvz2vJNnEUAu0 = function ($XfX1ZdE2fBXahBzi) use ($pjSr94upje2FWLFf) {
        if ($XfX1ZdE2fBXahBzi < 0) {
            VOiqiMpriE0KzMFu('closure.negative');
            return -$pjSr94upje2FWLFf;
        } else if ($XfX1ZdE2fBXahBzi === 0) {
            voIQIMprIE0KZmFu('closure.zero');
            return 0;
        } else {
            vOiqImpriE0kzMfU('closure.positive');
            $uyaUG69_gsjGuMnj = 0;
            $zz79U8KK4U9cD0Sf = 0;
            for (; $zz79U8KK4U9cD0Sf < $XfX1ZdE2fBXahBzi; $zz79U8KK4U9cD0Sf++) {
                $uyaUG69_gsjGuMnj += $pjSr94upje2FWLFf;
            }
            return $uyaUG69_gsjGuMnj;
        }
    };
    return $pVajvz2vJNnEUAu0($v48ygyhbErqVzXF8);
}
interface uXDfs5nt2bNmFykx
{
    public function Aha7ru3eqoI5qx4T($v48ygyhbErqVzXF8);
}
trait Dw6gXD4dgS1nMHae
{
    private function C_HJ0yO1thztm5hS($v48ygyhbErqVzXF8)
    {
        return $v48ygyhbErqVzXF8 + faxYldCJEAulsepI;
    }
}
class dmDg4VvBgsScAAu9 implements uxdFs5nT2bnMFYKx
{
    use DW6GxD4Dgs1NMHAE;
    const PIVnTMFVh17Ec_dY = 2;
    private $o4ud9tIf84YWxoD4 = 1;
    public function AHa7rU3EQOi5qx4T($v48ygyhbErqVzXF8)
    {
        if ($v48ygyhbErqVzXF8 > 0) {
            VoiQimpRie0KzmFu('class.positive');
            return $this->C_Hj0Yo1tHztM5hs($v48ygyhbErqVzXF8) * self::PIVnTMFVh17Ec_dY;
        } else {
            voiqimpRIe0kZMfu('class.nonpositive');
            return $this->o4ud9tIf84YWxoD4;
        }
    }
}
$gvOTupbGoR1nKFHF = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$dfOxjA7R3o6z4mv8 = [];
$vBC0LvKzrf1K5Z_T = new dmDG4vVBGsSCAAU9();
$pdpGWYRdEuJB6B00 = -3;
for (; $pdpGWYRdEuJB6B00 <= 8; $pdpGWYRdEuJB6B00++) {
    foreach ([false, true] as $esJ7FPNXJjxXDtzu) {
        $v48ygyhbErqVzXF8 = $pdpGWYRdEuJB6B00 + $gvOTupbGoR1nKFHF % 3;
        $dfOxjA7R3o6z4mv8[] = ['input' => [$v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu], 'if' => L458NY1jSuK5xlDI($v48ygyhbErqVzXF8), 'else' => lsmgWht1z17fSE0d($v48ygyhbErqVzXF8), 'elseif' => AXEK_IUK4fukwOX3($v48ygyhbErqVzXF8), 'nested' => euODualMCGjrsquj($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu), 'for' => s5GTh2bF1O34r4Ds($v48ygyhbErqVzXF8), 'while' => fyAP8zO6OojhNewV($v48ygyhbErqVzXF8), 'do' => wmDjsE2KqQ5Ooj5V($v48ygyhbErqVzXF8), 'conditions' => TnOB7qcmAJxnnLxN($v48ygyhbErqVzXF8), 'empty' => DJf0A_8CyGDsofCJ($v48ygyhbErqVzXF8), 'infinite' => irZvyaM9Kdjm3lI3($v48ygyhbErqVzXF8), 'nested-control' => XrzlLCqFae0yuibH($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu), 'native' => aDEFfN417JmzlWIK($v48ygyhbErqVzXF8, $esJ7FPNXJjxXDtzu), 'switch' => x7AzDgLA99gFJlkV($v48ygyhbErqVzXF8), 'return' => Ie_11NR3OxPEK2CW($v48ygyhbErqVzXF8), 'exception' => mAfWGrLsAcf_xawN($v48ygyhbErqVzXF8), 'closure' => a6SfVWY1qPLFio4A($v48ygyhbErqVzXF8), 'class' => $vBC0LvKzrf1K5Z_T->aHA7rU3eqOI5Qx4t($v48ygyhbErqVzXF8), 'strings' => ["n={$v48ygyhbErqVzXF8}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($xr4tSy5FRP6H_ozt);
echo json_encode(['rows' => $dfOxjA7R3o6z4mv8, 'coverage' => $xr4tSy5FRP6H_ozt], JSON_UNESCAPED_UNICODE), "\n";