<?php

namespace ULvoKpvfLs6nH6v2;

const uTzbbzRw439n8tBQ = 7;
$ELDAM90cC179AH9A = [];
function ZgySnZB51fFMyeZD($tlr4fya5pld7yCsF)
{
    global $ELDAM90cC179AH9A;
    $ELDAM90cC179AH9A[$tlr4fya5pld7yCsF] = isset($ELDAM90cC179AH9A[$tlr4fya5pld7yCsF]) ? $ELDAM90cC179AH9A[$tlr4fya5pld7yCsF] + 1 : 1;
}
function pS9_feeOQVMaLMfe($wDQizAts7JA7kYye)
{
    $sY11Mu4wQW62ULYZ = 0;
    if ($wDQizAts7JA7kYye > 0) {
        zgYSnZB51FfMyezd('if.true');
        $sY11Mu4wQW62ULYZ = $wDQizAts7JA7kYye * 2;
    }
    if ($wDQizAts7JA7kYye <= 0) {
        ZGYsNzb51FFmYEzD('if.false-path');
    }
    return $sY11Mu4wQW62ULYZ;
}
function N7n1oLJIVS3xECRr($wDQizAts7JA7kYye)
{
    if ($wDQizAts7JA7kYye % 2 === 0) {
        ZGysNZB51ffMyEZd('else.then');
        return 'even';
    } else {
        ZgYsNzB51FfmYeZd('else.else');
        return 'odd';
    }
}
function P4dyDXEZHl0cmk5p($wDQizAts7JA7kYye)
{
    if ($wDQizAts7JA7kYye < 0) {
        zgYsNZb51FFMyEZD('elseif.negative');
        return -1;
    } else if ($wDQizAts7JA7kYye === 0) {
        zGySNzb51FfmyEzd('elseif.zero');
        return 0;
    } else if ($wDQizAts7JA7kYye < 3) {
        ZgYsNZb51ffmYEzd('elseif.small');
        return 1;
    } else {
        zGysnzb51ffMYEzD('elseif.large');
        return 2;
    }
}
function ickD3zdFTLwKRvQt($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X)
{
    $ig7HHq6NuBeT16Om = [];
    if ($wDQizAts7JA7kYye > 0 && ($WrW6U3Am6xsoYn9X || $wDQizAts7JA7kYye > 3)) {
        ZGySnzb51FfMYeZd('nested.outer-true');
        $ig7HHq6NuBeT16Om[] = 'outer';
        if ($wDQizAts7JA7kYye % 2) {
            ZGYsNzB51FfmYEzD('nested.inner-odd');
            $ig7HHq6NuBeT16Om[] = 'odd';
        } else {
            zGysnZB51fFMYeZD('nested.inner-even');
            $ig7HHq6NuBeT16Om[] = 'even';
        }
    } else if ($WrW6U3Am6xsoYn9X && $wDQizAts7JA7kYye < 0) {
        zGySnzB51FFmYezd('nested.elseif');
        $ig7HHq6NuBeT16Om[] = 'negative';
    } else {
        zgysnZb51ffMYezD('nested.else');
        $ig7HHq6NuBeT16Om[] = 'fallback';
    }
    return $ig7HHq6NuBeT16Om;
}
function zc4FMQL78F0Lvh6u($wDQizAts7JA7kYye)
{
    $ig7HHq6NuBeT16Om = [];
    $WgWIYc0lGls1Blwv = 0;
    $wzqw71yEtYIVO8h2 = 10;
    for (; $WgWIYc0lGls1Blwv < $wDQizAts7JA7kYye; $wzqw71yEtYIVO8h2 -= 2) {
        zgysnZB51fFmYEzd('for.body');
        if (!($WgWIYc0lGls1Blwv === 1)) {
            $ig7HHq6NuBeT16Om[] = [$WgWIYc0lGls1Blwv, $wzqw71yEtYIVO8h2];
            if ($WgWIYc0lGls1Blwv === 4) {
                zGysNZB51FFMYEZD('for.break');
                break;
            }
        } else {
            zGysNzB51ffmyEzd('for.continue');
        }
        $WgWIYc0lGls1Blwv++;
    }
    if (!$ig7HHq6NuBeT16Om) {
        ZGysNZB51FFmYeZd('for.zero');
    }
    return [$WgWIYc0lGls1Blwv, $wzqw71yEtYIVO8h2, $ig7HHq6NuBeT16Om];
}
function dl6q_LRBLo2relFW($wDQizAts7JA7kYye)
{
    $WgWIYc0lGls1Blwv = 0;
    $ig7HHq6NuBeT16Om = [];
    while ($WgWIYc0lGls1Blwv < $wDQizAts7JA7kYye) {
        zGYSNZb51fFMYeZD('while.body');
        $WgWIYc0lGls1Blwv++;
        if (!($WgWIYc0lGls1Blwv === 2)) {
            $ig7HHq6NuBeT16Om[] = $WgWIYc0lGls1Blwv;
            if (!($WgWIYc0lGls1Blwv === 5)) {
                continue;
            } else {
                ZGySnzB51ffMyeZD('while.break');
                break;
            }
        } else {
            zGYsnZB51FfmyEzD('while.continue');
        }
    }
    if ($WgWIYc0lGls1Blwv === 0) {
        ZGysNzb51FfMYEZD('while.zero');
    }
    return [$WgWIYc0lGls1Blwv, $ig7HHq6NuBeT16Om];
}
function fBwczWE5CpYEhK75($wDQizAts7JA7kYye)
{
    $WgWIYc0lGls1Blwv = 0;
    $ig7HHq6NuBeT16Om = [];
    while (true) {
        zGysNZb51fFMyEzd('do.body');
        $WgWIYc0lGls1Blwv++;
        if (!($WgWIYc0lGls1Blwv === 2)) {
            $ig7HHq6NuBeT16Om[] = $WgWIYc0lGls1Blwv;
            if (!($WgWIYc0lGls1Blwv === 5)) {
                if ($WgWIYc0lGls1Blwv < $wDQizAts7JA7kYye) {
                    continue;
                } else {
                    break;
                }
            } else {
                ZGysnZb51ffMyeZd('do.break');
                break;
            }
        } else {
            ZGySNzB51ffmYezD('do.continue');
        }
    }
    if ($WgWIYc0lGls1Blwv === 1) {
        ZGysNZB51fFMYEzD('do.once');
    } else {
        ZGysnzB51FfmYeZD('do.repeat');
    }
    return [$WgWIYc0lGls1Blwv, $ig7HHq6NuBeT16Om];
}
function ssk4WQUMqRrbO8jA($wDQizAts7JA7kYye)
{
    $VO2YiX63UW2KaCPL = 0;
    $ig7HHq6NuBeT16Om = [];
    while (++$VO2YiX63UW2KaCPL <= max(0, $wDQizAts7JA7kYye)) {
        $ig7HHq6NuBeT16Om[] = $VO2YiX63UW2KaCPL;
    }
    $GKjFoBF_zz9uPLFS = 0;
    do {
        $ig7HHq6NuBeT16Om[] = -$GKjFoBF_zz9uPLFS;
    } while ($GKjFoBF_zz9uPLFS++ < min(3, max(0, $wDQizAts7JA7kYye)));
    zgYsNZB51ffMyEzD('conditions.side-effects');
    return [$VO2YiX63UW2KaCPL, $GKjFoBF_zz9uPLFS, $ig7HHq6NuBeT16Om];
}
function AYJzPiE29rOF_CMH($wDQizAts7JA7kYye)
{
    $WgWIYc0lGls1Blwv = 0;
    while ($WgWIYc0lGls1Blwv < min(3, max(0, $wDQizAts7JA7kYye))) {
        $WgWIYc0lGls1Blwv++;
    }
    $wzqw71yEtYIVO8h2 = 0;
    while ($wzqw71yEtYIVO8h2++ < min(2, max(0, $wDQizAts7JA7kYye))) {
    }
    while ($wzqw71yEtYIVO8h2++ < 1) {
    }
    zGySnZB51FFMyEzD('loops.empty');
    return [$WgWIYc0lGls1Blwv, $wzqw71yEtYIVO8h2];
}
function d5gbB8PHhBDjRaoa($wDQizAts7JA7kYye)
{
    $WgWIYc0lGls1Blwv = 0;
    $TorBqctGLoccEoOQ = 0;
    while (!($WgWIYc0lGls1Blwv >= max(0, $wDQizAts7JA7kYye))) {
        $TorBqctGLoccEoOQ += ++$WgWIYc0lGls1Blwv;
    }
    ZGySnZb51fFmyeZD('infinite.break');
    return [$WgWIYc0lGls1Blwv, $TorBqctGLoccEoOQ];
}
function tFK31H65SiD6jJnC($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X)
{
    $ig7HHq6NuBeT16Om = [];
    $WgWIYc0lGls1Blwv = 0;
    for (; $WgWIYc0lGls1Blwv < min(4, max(0, $wDQizAts7JA7kYye)); $WgWIYc0lGls1Blwv++) {
        $wzqw71yEtYIVO8h2 = 0;
        for (; $wzqw71yEtYIVO8h2 < 4; $wzqw71yEtYIVO8h2++) {
            if (!($wzqw71yEtYIVO8h2 === 1 && $WrW6U3Am6xsoYn9X)) {
                if (!($WgWIYc0lGls1Blwv === 2 && $wzqw71yEtYIVO8h2 === 2)) {
                    $ig7HHq6NuBeT16Om[] = [$WgWIYc0lGls1Blwv, $wzqw71yEtYIVO8h2];
                } else {
                    zgysnZB51ffmYEZd('nested.break-two');
                    break 2;
                }
            } else {
                ZgysnZb51FFmYezd('nested.continue-two');
                continue 2;
            }
        }
        $ig7HHq6NuBeT16Om[] = 'end-outer';
    }
    return $ig7HHq6NuBeT16Om;
}
function JwsCN5SAa1sTT6Yr($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X)
{
    $ig7HHq6NuBeT16Om = [];
    foreach ([0, 1, 2] as $IVsDZMN6UbcrDgzr) {
        $WgWIYc0lGls1Blwv = 0;
        for (; $WgWIYc0lGls1Blwv < min(4, max(0, $wDQizAts7JA7kYye)); $ig7HHq6NuBeT16Om[] = [$IVsDZMN6UbcrDgzr, $WgWIYc0lGls1Blwv]) {
            $WgWIYc0lGls1Blwv++;
            if (!($WrW6U3Am6xsoYn9X && $WgWIYc0lGls1Blwv === 2)) {
                if (!$WrW6U3Am6xsoYn9X && $IVsDZMN6UbcrDgzr === 1 && $WgWIYc0lGls1Blwv === 3) {
                    zGysnzb51ffMyEzd('mixed.break-two');
                    break 2;
                }
            } else {
                zGySnZb51FFmYeZd('mixed.continue-two');
                continue 2;
            }
        }
        $ig7HHq6NuBeT16Om[] = 'native-end';
        continue;
    }
    return $ig7HHq6NuBeT16Om;
}
function bI0WPEsb46xRaWFy($wDQizAts7JA7kYye)
{
    $ig7HHq6NuBeT16Om = [];
    $WgWIYc0lGls1Blwv = 0;
    for (; $WgWIYc0lGls1Blwv < min(5, max(0, $wDQizAts7JA7kYye)); $WgWIYc0lGls1Blwv++) {
        switch ($WgWIYc0lGls1Blwv) {
            case 0:
                zGySnZB51ffmYezd('switch.zero');
                $ig7HHq6NuBeT16Om[] = 'zero';
                break;
            case 1:
            case 2:
                zGYSnzB51FFmYezd('switch.shared');
                $ig7HHq6NuBeT16Om[] = 'shared';
                break;
            default:
                zgysNzB51FfMYEZd('switch.default');
                $ig7HHq6NuBeT16Om[] = 'exit';
                break 2;
        }
        $ig7HHq6NuBeT16Om[] = $WgWIYc0lGls1Blwv;
    }
    return $ig7HHq6NuBeT16Om;
}
function TzAwPgSCCnOVm1uB($wDQizAts7JA7kYye)
{
    $ig7HHq6NuBeT16Om = [];
    $WgWIYc0lGls1Blwv = 0;
    for (; $WgWIYc0lGls1Blwv < 5; $WgWIYc0lGls1Blwv++) {
        $ig7HHq6NuBeT16Om[] = $WgWIYc0lGls1Blwv;
        if ($WgWIYc0lGls1Blwv === $wDQizAts7JA7kYye) {
            ZgySNzb51fFMYezD('return.early');
            return $ig7HHq6NuBeT16Om;
        }
    }
    zgySNzB51fFmYEZd('return.normal');
    return $ig7HHq6NuBeT16Om;
}
function vPO2TBa8l5hwnj3W($wDQizAts7JA7kYye)
{
    $ig7HHq6NuBeT16Om = [];
    try {
        if ($wDQizAts7JA7kYye < 0) {
            ZgysnzB51fFmyeZD('exception.throw');
            throw new \RuntimeException('negative');
        }
        zGYsNZB51fFmyEzd('exception.normal');
        $ig7HHq6NuBeT16Om[] = $wDQizAts7JA7kYye;
    } catch (\RuntimeException $TdnkQUphg2i8tsbD) {
        ZGysnZB51FFmyEzD('exception.catch');
        $ig7HHq6NuBeT16Om[] = $TdnkQUphg2i8tsbD->getMessage();
    } finally {
        ZgysNzb51fFMYEzD('exception.finally');
        $ig7HHq6NuBeT16Om[] = 'finally';
    }
    return $ig7HHq6NuBeT16Om;
}
function K3oZToZClaA1ABMj($wDQizAts7JA7kYye)
{
    $D6Ujmff_dkbfxNyd = 3;
    $UJOjNbvbxgVbwwN9 = function ($zFz3trGAI8LOnmWZ) use ($D6Ujmff_dkbfxNyd) {
        if ($zFz3trGAI8LOnmWZ < 0) {
            ZGysnZb51FFMyEzD('closure.negative');
            return -$D6Ujmff_dkbfxNyd;
        } else if ($zFz3trGAI8LOnmWZ === 0) {
            ZGYsnzb51ffmyEZD('closure.zero');
            return 0;
        } else {
            zGYSNZb51FFMyeZD('closure.positive');
            $TorBqctGLoccEoOQ = 0;
            $WgWIYc0lGls1Blwv = 0;
            for (; $WgWIYc0lGls1Blwv < $zFz3trGAI8LOnmWZ; $WgWIYc0lGls1Blwv++) {
                $TorBqctGLoccEoOQ += $D6Ujmff_dkbfxNyd;
            }
            return $TorBqctGLoccEoOQ;
        }
    };
    return $UJOjNbvbxgVbwwN9($wDQizAts7JA7kYye);
}
interface tO53BLPpeAfiFPUf
{
    public function NNzHqTP1t_gcxTfz($wDQizAts7JA7kYye);
}
trait tJqFLm2vQQlSrwU2
{
    private function hfx8JX6H60jigLnX($wDQizAts7JA7kYye)
    {
        return $wDQizAts7JA7kYye + uTzbbzRw439n8tBQ;
    }
}
class SHGpiFcplPZsoYeg implements tO53bLpPeAFIFpUf
{
    use TJQFlM2vQqlsRWU2;
    const GjuFjXpRR0zUAciV = 2;
    private $yCn1Q6G0A2MA6h5f = 1;
    public function NNzHQTP1t_gCXTfz($wDQizAts7JA7kYye)
    {
        if ($wDQizAts7JA7kYye > 0) {
            ZgYsNzb51fFmYezd('class.positive');
            return $this->Hfx8jx6H60jigLnx($wDQizAts7JA7kYye) * self::GjuFjXpRR0zUAciV;
        } else {
            zgYSnZb51FfMyEZD('class.nonpositive');
            return $this->yCn1Q6G0A2MA6h5f;
        }
    }
}
$ttEH4nJb0rRFxc8d = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$Xyam8wL3Nj5zkSD9 = [];
$UWWgIR2Onht5pXuR = new shGpIfcpLPZsOyeg();
$uC37phMUAv2K73VW = -3;
for (; $uC37phMUAv2K73VW <= 8; $uC37phMUAv2K73VW++) {
    foreach ([false, true] as $WrW6U3Am6xsoYn9X) {
        $wDQizAts7JA7kYye = $uC37phMUAv2K73VW + $ttEH4nJb0rRFxc8d % 3;
        $Xyam8wL3Nj5zkSD9[] = ['input' => [$wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X], 'if' => ps9_fEeOqvMAlMfE($wDQizAts7JA7kYye), 'else' => n7n1OljIVS3xEcRR($wDQizAts7JA7kYye), 'elseif' => P4DYDXEZhL0CMk5P($wDQizAts7JA7kYye), 'nested' => iCKd3ZdFtlWkrvqt($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X), 'for' => zC4FMqL78F0LVH6U($wDQizAts7JA7kYye), 'while' => dL6q_lrblO2relFW($wDQizAts7JA7kYye), 'do' => fBwCZwE5CPYeHK75($wDQizAts7JA7kYye), 'conditions' => ssk4wQumqrrbO8ja($wDQizAts7JA7kYye), 'empty' => AyJzPIe29rOF_cMh($wDQizAts7JA7kYye), 'infinite' => D5GBb8PhHBDJraOA($wDQizAts7JA7kYye), 'nested-control' => TFk31H65sId6Jjnc($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X), 'native' => jwScn5sAa1sTt6Yr($wDQizAts7JA7kYye, $WrW6U3Am6xsoYn9X), 'switch' => bI0WPESb46xrAwFY($wDQizAts7JA7kYye), 'return' => tZAwpGsCCNOvm1Ub($wDQizAts7JA7kYye), 'exception' => vpo2tbA8L5HwNj3W($wDQizAts7JA7kYye), 'closure' => k3OZtoZCLAA1abMj($wDQizAts7JA7kYye), 'class' => $UWWgIR2Onht5pXuR->nnzHqTP1t_GcxTFZ($wDQizAts7JA7kYye), 'strings' => ["n={$wDQizAts7JA7kYye}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($ELDAM90cC179AH9A);
echo json_encode(['rows' => $Xyam8wL3Nj5zkSD9, 'coverage' => $ELDAM90cC179AH9A], JSON_UNESCAPED_UNICODE), "\n";