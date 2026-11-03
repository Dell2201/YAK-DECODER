<?php

namespace zKSKieth_2ap63ya;

const lSTgHf1lecsud520 = 7;
$xLt6p5JXeGkHpSdl = [];
function jpsQmJ_JCsAVnFPs($ISIcZo77wdHPKg5z)
{
    global $xLt6p5JXeGkHpSdl;
    $xLt6p5JXeGkHpSdl[$ISIcZo77wdHPKg5z] = isset($xLt6p5JXeGkHpSdl[$ISIcZo77wdHPKg5z]) ? $xLt6p5JXeGkHpSdl[$ISIcZo77wdHPKg5z] + 1 : 1;
}
function VBQIx33K5m7_2UiR($TGJo9rEBW1uHx9h4)
{
    $W3taoBn4HAx0ZkZa = 0;
    if ($TGJo9rEBW1uHx9h4 > 0) {
        JpsqMJ_JcSAVnfps('if.true');
        $W3taoBn4HAx0ZkZa = $TGJo9rEBW1uHx9h4 * 2;
    }
    if ($TGJo9rEBW1uHx9h4 <= 0) {
        JPSQmj_JcSaVNfpS('if.false-path');
    }
    return $W3taoBn4HAx0ZkZa;
}
function oV3z5XjmQalerN1n($TGJo9rEBW1uHx9h4)
{
    if ($TGJo9rEBW1uHx9h4 % 2 === 0) {
        jPsqmj_jcsavNFPS('else.then');
        return 'even';
    } else {
        JPsQmj_jcSavnFpS('else.else');
        return 'odd';
    }
}
function QWOCcAB0k6MRlNR_($TGJo9rEBW1uHx9h4)
{
    if ($TGJo9rEBW1uHx9h4 < 0) {
        JpsqMJ_JcsaVNfpS('elseif.negative');
        return -1;
    } else if ($TGJo9rEBW1uHx9h4 === 0) {
        jpSQMJ_JcsaVnfPS('elseif.zero');
        return 0;
    } else if ($TGJo9rEBW1uHx9h4 < 3) {
        JpSQmJ_JCsAvNFPs('elseif.small');
        return 1;
    } else {
        jpsqMj_JCsAvnfPs('elseif.large');
        return 2;
    }
}
function nqWWrDDF6959LwlW($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S)
{
    $UoayK3u1dmAV5gcd = [];
    if ($TGJo9rEBW1uHx9h4 > 0 && ($jSCOMNSF_VIrWM4S || $TGJo9rEBW1uHx9h4 > 3)) {
        jPsQMj_jCsavNfPs('nested.outer-true');
        $UoayK3u1dmAV5gcd[] = 'outer';
        if ($TGJo9rEBW1uHx9h4 % 2) {
            jPsQmj_jcsAVNfps('nested.inner-odd');
            $UoayK3u1dmAV5gcd[] = 'odd';
        } else {
            jPSqMJ_jcSaVNfPS('nested.inner-even');
            $UoayK3u1dmAV5gcd[] = 'even';
        }
    } else if ($jSCOMNSF_VIrWM4S && $TGJo9rEBW1uHx9h4 < 0) {
        JPsQMJ_JcSavNFPs('nested.elseif');
        $UoayK3u1dmAV5gcd[] = 'negative';
    } else {
        JPsQmj_JCSaVnfPs('nested.else');
        $UoayK3u1dmAV5gcd[] = 'fallback';
    }
    return $UoayK3u1dmAV5gcd;
}
function fEQKaW2q_o6YUxYE($TGJo9rEBW1uHx9h4)
{
    $UoayK3u1dmAV5gcd = [];
    $qNuP1d1rAyLG8UbZ = 0;
    $CPm8PAT0Gq6jrZWN = 10;
    for (; $qNuP1d1rAyLG8UbZ < $TGJo9rEBW1uHx9h4; $CPm8PAT0Gq6jrZWN -= 2) {
        jPSqMj_JcsAvnfPs('for.body');
        if (!($qNuP1d1rAyLG8UbZ === 1)) {
            $UoayK3u1dmAV5gcd[] = [$qNuP1d1rAyLG8UbZ, $CPm8PAT0Gq6jrZWN];
            if ($qNuP1d1rAyLG8UbZ === 4) {
                JPSqMJ_jCsAVnfPS('for.break');
                break;
            }
        } else {
            JpsqmJ_jCSavnfPs('for.continue');
        }
        $qNuP1d1rAyLG8UbZ++;
    }
    if (!$UoayK3u1dmAV5gcd) {
        JPSQMj_JcsavNFpS('for.zero');
    }
    return [$qNuP1d1rAyLG8UbZ, $CPm8PAT0Gq6jrZWN, $UoayK3u1dmAV5gcd];
}
function BQpUZwL7S_OpC25Z($TGJo9rEBW1uHx9h4)
{
    $qNuP1d1rAyLG8UbZ = 0;
    $UoayK3u1dmAV5gcd = [];
    while ($qNuP1d1rAyLG8UbZ < $TGJo9rEBW1uHx9h4) {
        jPSQmJ_JCsAvNFPS('while.body');
        $qNuP1d1rAyLG8UbZ++;
        if (!($qNuP1d1rAyLG8UbZ === 2)) {
            $UoayK3u1dmAV5gcd[] = $qNuP1d1rAyLG8UbZ;
            if (!($qNuP1d1rAyLG8UbZ === 5)) {
                continue;
            } else {
                jPsQMj_JcSaVnfPS('while.break');
                break;
            }
        } else {
            JpsqMj_JCsAVnFPS('while.continue');
        }
    }
    if ($qNuP1d1rAyLG8UbZ === 0) {
        jpSqMJ_jcSavnFpS('while.zero');
    }
    return [$qNuP1d1rAyLG8UbZ, $UoayK3u1dmAV5gcd];
}
function xG6MYhfUK8GWF30X($TGJo9rEBW1uHx9h4)
{
    $qNuP1d1rAyLG8UbZ = 0;
    $UoayK3u1dmAV5gcd = [];
    while (true) {
        JPsqMJ_jCSavnfPS('do.body');
        $qNuP1d1rAyLG8UbZ++;
        if (!($qNuP1d1rAyLG8UbZ === 2)) {
            $UoayK3u1dmAV5gcd[] = $qNuP1d1rAyLG8UbZ;
            if (!($qNuP1d1rAyLG8UbZ === 5)) {
                if ($qNuP1d1rAyLG8UbZ < $TGJo9rEBW1uHx9h4) {
                    continue;
                } else {
                    break;
                }
            } else {
                JPsQMJ_jCsAvNFpS('do.break');
                break;
            }
        } else {
            jpSQMj_jcSAVNFPs('do.continue');
        }
    }
    if ($qNuP1d1rAyLG8UbZ === 1) {
        JpSQmJ_jCsAVNFpS('do.once');
    } else {
        JpSqmJ_JcSAVnFps('do.repeat');
    }
    return [$qNuP1d1rAyLG8UbZ, $UoayK3u1dmAV5gcd];
}
function p6tN8Gm5FXnM60Df($TGJo9rEBW1uHx9h4)
{
    $kQMs0p0nTOx5ucEF = 0;
    $UoayK3u1dmAV5gcd = [];
    while (++$kQMs0p0nTOx5ucEF <= max(0, $TGJo9rEBW1uHx9h4)) {
        $UoayK3u1dmAV5gcd[] = $kQMs0p0nTOx5ucEF;
    }
    $br5ZP5SJs1nUBRWg = 0;
    do {
        $UoayK3u1dmAV5gcd[] = -$br5ZP5SJs1nUBRWg;
    } while ($br5ZP5SJs1nUBRWg++ < min(3, max(0, $TGJo9rEBW1uHx9h4)));
    JPSQmj_jcsavnfPs('conditions.side-effects');
    return [$kQMs0p0nTOx5ucEF, $br5ZP5SJs1nUBRWg, $UoayK3u1dmAV5gcd];
}
function ub0Xx2E3hnDOBAXB($TGJo9rEBW1uHx9h4)
{
    $qNuP1d1rAyLG8UbZ = 0;
    while ($qNuP1d1rAyLG8UbZ < min(3, max(0, $TGJo9rEBW1uHx9h4))) {
        $qNuP1d1rAyLG8UbZ++;
    }
    $CPm8PAT0Gq6jrZWN = 0;
    while ($CPm8PAT0Gq6jrZWN++ < min(2, max(0, $TGJo9rEBW1uHx9h4))) {
    }
    while ($CPm8PAT0Gq6jrZWN++ < 1) {
    }
    JpSqmj_JCSAvNFPS('loops.empty');
    return [$qNuP1d1rAyLG8UbZ, $CPm8PAT0Gq6jrZWN];
}
function Y2N3DyDjO0t5jdX_($TGJo9rEBW1uHx9h4)
{
    $qNuP1d1rAyLG8UbZ = 0;
    $xKwpZsKAkE42EIxP = 0;
    while (!($qNuP1d1rAyLG8UbZ >= max(0, $TGJo9rEBW1uHx9h4))) {
        $xKwpZsKAkE42EIxP += ++$qNuP1d1rAyLG8UbZ;
    }
    JpsQmj_JCsAvnfPs('infinite.break');
    return [$qNuP1d1rAyLG8UbZ, $xKwpZsKAkE42EIxP];
}
function oMt791sPOWXni8qH($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S)
{
    $UoayK3u1dmAV5gcd = [];
    $qNuP1d1rAyLG8UbZ = 0;
    for (; $qNuP1d1rAyLG8UbZ < min(4, max(0, $TGJo9rEBW1uHx9h4)); $qNuP1d1rAyLG8UbZ++) {
        $CPm8PAT0Gq6jrZWN = 0;
        for (; $CPm8PAT0Gq6jrZWN < 4; $CPm8PAT0Gq6jrZWN++) {
            if (!($CPm8PAT0Gq6jrZWN === 1 && $jSCOMNSF_VIrWM4S)) {
                if (!($qNuP1d1rAyLG8UbZ === 2 && $CPm8PAT0Gq6jrZWN === 2)) {
                    $UoayK3u1dmAV5gcd[] = [$qNuP1d1rAyLG8UbZ, $CPm8PAT0Gq6jrZWN];
                } else {
                    jpSQmj_JCsaVnfps('nested.break-two');
                    break 2;
                }
            } else {
                JPSQMJ_jcSaVnFps('nested.continue-two');
                continue 2;
            }
        }
        $UoayK3u1dmAV5gcd[] = 'end-outer';
    }
    return $UoayK3u1dmAV5gcd;
}
function wiO16lGjUGSrec4b($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S)
{
    $UoayK3u1dmAV5gcd = [];
    foreach ([0, 1, 2] as $NGnAIzyNYqvNtCzN) {
        $qNuP1d1rAyLG8UbZ = 0;
        for (; $qNuP1d1rAyLG8UbZ < min(4, max(0, $TGJo9rEBW1uHx9h4)); $UoayK3u1dmAV5gcd[] = [$NGnAIzyNYqvNtCzN, $qNuP1d1rAyLG8UbZ]) {
            $qNuP1d1rAyLG8UbZ++;
            if (!($jSCOMNSF_VIrWM4S && $qNuP1d1rAyLG8UbZ === 2)) {
                if (!$jSCOMNSF_VIrWM4S && $NGnAIzyNYqvNtCzN === 1 && $qNuP1d1rAyLG8UbZ === 3) {
                    JpsQmJ_jcsaVNFps('mixed.break-two');
                    break 2;
                }
            } else {
                jpsqMj_JCsaVNFps('mixed.continue-two');
                continue 2;
            }
        }
        $UoayK3u1dmAV5gcd[] = 'native-end';
        continue;
    }
    return $UoayK3u1dmAV5gcd;
}
function PDOMNgajbfo7CWmB($TGJo9rEBW1uHx9h4)
{
    $UoayK3u1dmAV5gcd = [];
    $qNuP1d1rAyLG8UbZ = 0;
    for (; $qNuP1d1rAyLG8UbZ < min(5, max(0, $TGJo9rEBW1uHx9h4)); $qNuP1d1rAyLG8UbZ++) {
        switch ($qNuP1d1rAyLG8UbZ) {
            case 0:
                jPsQMj_jCSAvnfPs('switch.zero');
                $UoayK3u1dmAV5gcd[] = 'zero';
                break;
            case 1:
            case 2:
                JPsQMJ_JCsAvNfPs('switch.shared');
                $UoayK3u1dmAV5gcd[] = 'shared';
                break;
            default:
                JPSQmJ_JcSavnFPS('switch.default');
                $UoayK3u1dmAV5gcd[] = 'exit';
                break 2;
        }
        $UoayK3u1dmAV5gcd[] = $qNuP1d1rAyLG8UbZ;
    }
    return $UoayK3u1dmAV5gcd;
}
function YnIEb5On4X_M45HT($TGJo9rEBW1uHx9h4)
{
    $UoayK3u1dmAV5gcd = [];
    $qNuP1d1rAyLG8UbZ = 0;
    for (; $qNuP1d1rAyLG8UbZ < 5; $qNuP1d1rAyLG8UbZ++) {
        $UoayK3u1dmAV5gcd[] = $qNuP1d1rAyLG8UbZ;
        if ($qNuP1d1rAyLG8UbZ === $TGJo9rEBW1uHx9h4) {
            JpSqmj_JcSaVnFPs('return.early');
            return $UoayK3u1dmAV5gcd;
        }
    }
    jPsqMJ_jCSaVNfPS('return.normal');
    return $UoayK3u1dmAV5gcd;
}
function DPd3GAeHr3RqJngO($TGJo9rEBW1uHx9h4)
{
    $UoayK3u1dmAV5gcd = [];
    try {
        if ($TGJo9rEBW1uHx9h4 < 0) {
            jPsQMj_jcsavNfPS('exception.throw');
            throw new \RuntimeException('negative');
        }
        JPsqMJ_jcsAVnfPS('exception.normal');
        $UoayK3u1dmAV5gcd[] = $TGJo9rEBW1uHx9h4;
    } catch (\RuntimeException $xFSFog8TIffkfWMo) {
        jpsqmj_JCsAvnfpS('exception.catch');
        $UoayK3u1dmAV5gcd[] = $xFSFog8TIffkfWMo->getMessage();
    } finally {
        JPSqMJ_jCsavNfPs('exception.finally');
        $UoayK3u1dmAV5gcd[] = 'finally';
    }
    return $UoayK3u1dmAV5gcd;
}
function rH0tHGwObSrB1SZ7($TGJo9rEBW1uHx9h4)
{
    $GooRuJTkOE4RCz2l = 3;
    $OycQEPoz1WqEXOr4 = function ($epYUQattkpR6bkVm) use ($GooRuJTkOE4RCz2l) {
        if ($epYUQattkpR6bkVm < 0) {
            JpsQMj_JCsAvNFPS('closure.negative');
            return -$GooRuJTkOE4RCz2l;
        } else if ($epYUQattkpR6bkVm === 0) {
            jpsqmj_jcsaVnFpS('closure.zero');
            return 0;
        } else {
            JPSqmj_JcSaVNfps('closure.positive');
            $xKwpZsKAkE42EIxP = 0;
            $qNuP1d1rAyLG8UbZ = 0;
            for (; $qNuP1d1rAyLG8UbZ < $epYUQattkpR6bkVm; $qNuP1d1rAyLG8UbZ++) {
                $xKwpZsKAkE42EIxP += $GooRuJTkOE4RCz2l;
            }
            return $xKwpZsKAkE42EIxP;
        }
    };
    return $OycQEPoz1WqEXOr4($TGJo9rEBW1uHx9h4);
}
interface L99Ml8gl0zkb0YWO
{
    public function ZmgLl4FIyN0R5kil($TGJo9rEBW1uHx9h4);
}
trait AFL09katgLSc3Nrv
{
    private function eWK2WbP1ZgGYUR36($TGJo9rEBW1uHx9h4)
    {
        return $TGJo9rEBW1uHx9h4 + lSTgHf1lecsud520;
    }
}
class wjQ8_XB5cKzCYeB1 implements L99ML8Gl0ZKb0yWO
{
    use aFl09kaTGLSC3NrV;
    const Ht2Fwbwn_DA2EToY = 2;
    private $xgyHCg6PTHeTx1Pm = 1;
    public function ZmGLl4fiyN0r5Kil($TGJo9rEBW1uHx9h4)
    {
        if ($TGJo9rEBW1uHx9h4 > 0) {
            jpSqmJ_JcsAvNfPS('class.positive');
            return $this->EWk2wBP1zGGyuR36($TGJo9rEBW1uHx9h4) * self::Ht2Fwbwn_DA2EToY;
        } else {
            jPsQmJ_JcsAVNFpS('class.nonpositive');
            return $this->xgyHCg6PTHeTx1Pm;
        }
    }
}
$HxjRsLW6A8VMQZFn = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$jgH3UYDwD8ps8mi2 = [];
$GVs1vCy99pltac7j = new wJq8_Xb5cKzCYeb1();
$DqL1rE3IR0v4sxoe = -3;
for (; $DqL1rE3IR0v4sxoe <= 8; $DqL1rE3IR0v4sxoe++) {
    foreach ([false, true] as $jSCOMNSF_VIrWM4S) {
        $TGJo9rEBW1uHx9h4 = $DqL1rE3IR0v4sxoe + $HxjRsLW6A8VMQZFn % 3;
        $jgH3UYDwD8ps8mi2[] = ['input' => [$TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S], 'if' => vBqIX33K5M7_2uIR($TGJo9rEBW1uHx9h4), 'else' => oV3z5XjmqalErn1N($TGJo9rEBW1uHx9h4), 'elseif' => QWocCab0k6mRlNr_($TGJo9rEBW1uHx9h4), 'nested' => NqwWRddf6959lWlW($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S), 'for' => feQkAW2q_O6Yuxye($TGJo9rEBW1uHx9h4), 'while' => bqpUZwl7S_oPc25Z($TGJo9rEBW1uHx9h4), 'do' => xg6myHFuK8gWF30X($TGJo9rEBW1uHx9h4), 'conditions' => p6tN8gm5fXNM60DF($TGJo9rEBW1uHx9h4), 'empty' => UB0xX2e3HNDOBaxB($TGJo9rEBW1uHx9h4), 'infinite' => y2n3dyDjO0T5JDx_($TGJo9rEBW1uHx9h4), 'nested-control' => omt791SpOwxnI8qh($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S), 'native' => wio16lGJUGsREc4B($TGJo9rEBW1uHx9h4, $jSCOMNSF_VIrWM4S), 'switch' => pdOMNGaJBfo7cwMb($TGJo9rEBW1uHx9h4), 'return' => Ynieb5oN4x_m45HT($TGJo9rEBW1uHx9h4), 'exception' => DPd3gAEhR3RQJNGO($TGJo9rEBW1uHx9h4), 'closure' => rh0thGwobsrb1sz7($TGJo9rEBW1uHx9h4), 'class' => $GVs1vCy99pltac7j->ZMGLl4FIyn0r5KiL($TGJo9rEBW1uHx9h4), 'strings' => ["n={$TGJo9rEBW1uHx9h4}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($xLt6p5JXeGkHpSdl);
echo json_encode(['rows' => $jgH3UYDwD8ps8mi2, 'coverage' => $xLt6p5JXeGkHpSdl], JSON_UNESCAPED_UNICODE), "\n";