<?php

namespace ANADq2UgDZb47Jgw;

const KEgP2GYIj4TX5E22 = 7;
$WNKXmoQN1jMvU9Jt = [];
function GyjeU0vY9tA_e4XU($TEW28S4NJPo4NcmJ)
{
    global $WNKXmoQN1jMvU9Jt;
    $WNKXmoQN1jMvU9Jt[$TEW28S4NJPo4NcmJ] = isset($WNKXmoQN1jMvU9Jt[$TEW28S4NJPo4NcmJ]) ? $WNKXmoQN1jMvU9Jt[$TEW28S4NJPo4NcmJ] + 1 : 1;
}
function V3V0MOe2LhkXSS3n($KzKU0qipYDExXAL4)
{
    $uaawl5h8wbSSQ3Rk = 0;
    if ($KzKU0qipYDExXAL4 > 0) {
        gYjEU0vy9Ta_E4Xu('if.true');
        $uaawl5h8wbSSQ3Rk = $KzKU0qipYDExXAL4 * 2;
    }
    if ($KzKU0qipYDExXAL4 <= 0) {
        GYjeu0Vy9ta_e4xu('if.false-path');
    }
    return $uaawl5h8wbSSQ3Rk;
}
function LW9F5XfSRYdTYnz2($KzKU0qipYDExXAL4)
{
    if ($KzKU0qipYDExXAL4 % 2 === 0) {
        GYJEU0vy9tA_e4Xu('else.then');
        return 'even';
    } else {
        GyJEU0VY9Ta_e4XU('else.else');
        return 'odd';
    }
}
function VPR30dZ4HsbVRIqd($KzKU0qipYDExXAL4)
{
    if ($KzKU0qipYDExXAL4 < 0) {
        gyjEU0vy9ta_e4Xu('elseif.negative');
        return -1;
    } else if ($KzKU0qipYDExXAL4 === 0) {
        GYJEU0Vy9tA_E4XU('elseif.zero');
        return 0;
    } else if ($KzKU0qipYDExXAL4 < 3) {
        GYjeU0vy9tA_e4xU('elseif.small');
        return 1;
    } else {
        gYjeu0VY9TA_e4xU('elseif.large');
        return 2;
    }
}
function cn5tpGSgi26VDJ7g($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH)
{
    $r7torAGeVHnJSuRh = [];
    if ($KzKU0qipYDExXAL4 > 0 && ($qwqlcLlY0DRG_pOH || $KzKU0qipYDExXAL4 > 3)) {
        GyjEU0VY9Ta_e4XU('nested.outer-true');
        $r7torAGeVHnJSuRh[] = 'outer';
        if ($KzKU0qipYDExXAL4 % 2) {
            gyjeu0vY9TA_E4xU('nested.inner-odd');
            $r7torAGeVHnJSuRh[] = 'odd';
        } else {
            gYjeU0VY9ta_E4Xu('nested.inner-even');
            $r7torAGeVHnJSuRh[] = 'even';
        }
    } else if ($qwqlcLlY0DRG_pOH && $KzKU0qipYDExXAL4 < 0) {
        GYjeu0vY9TA_e4xu('nested.elseif');
        $r7torAGeVHnJSuRh[] = 'negative';
    } else {
        gyjEu0VY9tA_e4Xu('nested.else');
        $r7torAGeVHnJSuRh[] = 'fallback';
    }
    return $r7torAGeVHnJSuRh;
}
function q7_U6Kf_aAzztkro($KzKU0qipYDExXAL4)
{
    $r7torAGeVHnJSuRh = [];
    $yvSDShdYhdxH_ocL = 0;
    $E6posAAMaDOwhigV = 10;
    for (; $yvSDShdYhdxH_ocL < $KzKU0qipYDExXAL4; $E6posAAMaDOwhigV -= 2) {
        GYjeu0Vy9Ta_e4XU('for.body');
        if (!($yvSDShdYhdxH_ocL === 1)) {
            $r7torAGeVHnJSuRh[] = [$yvSDShdYhdxH_ocL, $E6posAAMaDOwhigV];
            if ($yvSDShdYhdxH_ocL === 4) {
                GyjeU0vy9tA_E4xu('for.break');
                break;
            }
        } else {
            GYJEu0vY9tA_E4Xu('for.continue');
        }
        $yvSDShdYhdxH_ocL++;
    }
    if (!$r7torAGeVHnJSuRh) {
        GyJeU0VY9tA_e4XU('for.zero');
    }
    return [$yvSDShdYhdxH_ocL, $E6posAAMaDOwhigV, $r7torAGeVHnJSuRh];
}
function ZdUNMmgLDS5UmHH0($KzKU0qipYDExXAL4)
{
    $yvSDShdYhdxH_ocL = 0;
    $r7torAGeVHnJSuRh = [];
    while ($yvSDShdYhdxH_ocL < $KzKU0qipYDExXAL4) {
        gYJEU0VY9tA_E4Xu('while.body');
        $yvSDShdYhdxH_ocL++;
        if (!($yvSDShdYhdxH_ocL === 2)) {
            $r7torAGeVHnJSuRh[] = $yvSDShdYhdxH_ocL;
            if (!($yvSDShdYhdxH_ocL === 5)) {
                continue;
            } else {
                gyjEU0vy9TA_e4xu('while.break');
                break;
            }
        } else {
            gyJEU0VY9TA_e4Xu('while.continue');
        }
    }
    if ($yvSDShdYhdxH_ocL === 0) {
        gyjeU0VY9TA_e4xu('while.zero');
    }
    return [$yvSDShdYhdxH_ocL, $r7torAGeVHnJSuRh];
}
function T8eNbSv7Zkc97dhp($KzKU0qipYDExXAL4)
{
    $yvSDShdYhdxH_ocL = 0;
    $r7torAGeVHnJSuRh = [];
    while (true) {
        GYjeU0VY9tA_E4XU('do.body');
        $yvSDShdYhdxH_ocL++;
        if (!($yvSDShdYhdxH_ocL === 2)) {
            $r7torAGeVHnJSuRh[] = $yvSDShdYhdxH_ocL;
            if (!($yvSDShdYhdxH_ocL === 5)) {
                if ($yvSDShdYhdxH_ocL < $KzKU0qipYDExXAL4) {
                    continue;
                } else {
                    break;
                }
            } else {
                gYjEU0VY9tA_e4xu('do.break');
                break;
            }
        } else {
            GyjEu0vy9TA_E4xu('do.continue');
        }
    }
    if ($yvSDShdYhdxH_ocL === 1) {
        gYJEu0Vy9ta_E4XU('do.once');
    } else {
        GYjeU0vY9TA_e4Xu('do.repeat');
    }
    return [$yvSDShdYhdxH_ocL, $r7torAGeVHnJSuRh];
}
function p886UxDn0Zb3T_0O($KzKU0qipYDExXAL4)
{
    $f3jbJogVXLtJD9cW = 0;
    $r7torAGeVHnJSuRh = [];
    while (++$f3jbJogVXLtJD9cW <= max(0, $KzKU0qipYDExXAL4)) {
        $r7torAGeVHnJSuRh[] = $f3jbJogVXLtJD9cW;
    }
    $wLLQ3phmb68wgg0_ = 0;
    do {
        $r7torAGeVHnJSuRh[] = -$wLLQ3phmb68wgg0_;
    } while ($wLLQ3phmb68wgg0_++ < min(3, max(0, $KzKU0qipYDExXAL4)));
    GyjeU0vy9tA_e4XU('conditions.side-effects');
    return [$f3jbJogVXLtJD9cW, $wLLQ3phmb68wgg0_, $r7torAGeVHnJSuRh];
}
function u2on1Ns6UX3ngkkB($KzKU0qipYDExXAL4)
{
    $yvSDShdYhdxH_ocL = 0;
    while ($yvSDShdYhdxH_ocL < min(3, max(0, $KzKU0qipYDExXAL4))) {
        $yvSDShdYhdxH_ocL++;
    }
    $E6posAAMaDOwhigV = 0;
    while ($E6posAAMaDOwhigV++ < min(2, max(0, $KzKU0qipYDExXAL4))) {
    }
    while ($E6posAAMaDOwhigV++ < 1) {
    }
    GYjEu0Vy9tA_E4Xu('loops.empty');
    return [$yvSDShdYhdxH_ocL, $E6posAAMaDOwhigV];
}
function a4gcCPF9fAsRUU2F($KzKU0qipYDExXAL4)
{
    $yvSDShdYhdxH_ocL = 0;
    $UH3QetNJNNuYCPxH = 0;
    while (!($yvSDShdYhdxH_ocL >= max(0, $KzKU0qipYDExXAL4))) {
        $UH3QetNJNNuYCPxH += ++$yvSDShdYhdxH_ocL;
    }
    gyjEU0VY9ta_e4xu('infinite.break');
    return [$yvSDShdYhdxH_ocL, $UH3QetNJNNuYCPxH];
}
function ycTZrH3SdD3S3HJQ($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH)
{
    $r7torAGeVHnJSuRh = [];
    $yvSDShdYhdxH_ocL = 0;
    for (; $yvSDShdYhdxH_ocL < min(4, max(0, $KzKU0qipYDExXAL4)); $yvSDShdYhdxH_ocL++) {
        $E6posAAMaDOwhigV = 0;
        for (; $E6posAAMaDOwhigV < 4; $E6posAAMaDOwhigV++) {
            if (!($E6posAAMaDOwhigV === 1 && $qwqlcLlY0DRG_pOH)) {
                if (!($yvSDShdYhdxH_ocL === 2 && $E6posAAMaDOwhigV === 2)) {
                    $r7torAGeVHnJSuRh[] = [$yvSDShdYhdxH_ocL, $E6posAAMaDOwhigV];
                } else {
                    gYJEu0Vy9TA_e4XU('nested.break-two');
                    break 2;
                }
            } else {
                GYjEU0vY9TA_E4xU('nested.continue-two');
                continue 2;
            }
        }
        $r7torAGeVHnJSuRh[] = 'end-outer';
    }
    return $r7torAGeVHnJSuRh;
}
function LBk1P4_HaWRL2lUW($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH)
{
    $r7torAGeVHnJSuRh = [];
    foreach ([0, 1, 2] as $BN8sHIwT2DJtDReU) {
        $yvSDShdYhdxH_ocL = 0;
        for (; $yvSDShdYhdxH_ocL < min(4, max(0, $KzKU0qipYDExXAL4)); $r7torAGeVHnJSuRh[] = [$BN8sHIwT2DJtDReU, $yvSDShdYhdxH_ocL]) {
            $yvSDShdYhdxH_ocL++;
            if (!($qwqlcLlY0DRG_pOH && $yvSDShdYhdxH_ocL === 2)) {
                if (!$qwqlcLlY0DRG_pOH && $BN8sHIwT2DJtDReU === 1 && $yvSDShdYhdxH_ocL === 3) {
                    gyjeU0Vy9TA_e4XU('mixed.break-two');
                    break 2;
                }
            } else {
                GyjEu0Vy9tA_E4XU('mixed.continue-two');
                continue 2;
            }
        }
        $r7torAGeVHnJSuRh[] = 'native-end';
        continue;
    }
    return $r7torAGeVHnJSuRh;
}
function VbUrMGufay6Y6_hy($KzKU0qipYDExXAL4)
{
    $r7torAGeVHnJSuRh = [];
    $yvSDShdYhdxH_ocL = 0;
    for (; $yvSDShdYhdxH_ocL < min(5, max(0, $KzKU0qipYDExXAL4)); $yvSDShdYhdxH_ocL++) {
        switch ($yvSDShdYhdxH_ocL) {
            case 0:
                Gyjeu0vy9TA_E4Xu('switch.zero');
                $r7torAGeVHnJSuRh[] = 'zero';
                break;
            case 1:
            case 2:
                gYJEu0Vy9Ta_E4xU('switch.shared');
                $r7torAGeVHnJSuRh[] = 'shared';
                break;
            default:
                GYjEu0VY9Ta_E4Xu('switch.default');
                $r7torAGeVHnJSuRh[] = 'exit';
                break 2;
        }
        $r7torAGeVHnJSuRh[] = $yvSDShdYhdxH_ocL;
    }
    return $r7torAGeVHnJSuRh;
}
function hMk7jRTDEe0jd3ba($KzKU0qipYDExXAL4)
{
    $r7torAGeVHnJSuRh = [];
    $yvSDShdYhdxH_ocL = 0;
    for (; $yvSDShdYhdxH_ocL < 5; $yvSDShdYhdxH_ocL++) {
        $r7torAGeVHnJSuRh[] = $yvSDShdYhdxH_ocL;
        if ($yvSDShdYhdxH_ocL === $KzKU0qipYDExXAL4) {
            gyjEU0Vy9tA_e4xU('return.early');
            return $r7torAGeVHnJSuRh;
        }
    }
    GyjEu0VY9ta_e4xU('return.normal');
    return $r7torAGeVHnJSuRh;
}
function e1o7FM8KdGi9alui($KzKU0qipYDExXAL4)
{
    $r7torAGeVHnJSuRh = [];
    try {
        if ($KzKU0qipYDExXAL4 < 0) {
            gYjEu0Vy9TA_e4xu('exception.throw');
            throw new \RuntimeException('negative');
        }
        GYjeU0Vy9Ta_e4Xu('exception.normal');
        $r7torAGeVHnJSuRh[] = $KzKU0qipYDExXAL4;
    } catch (\RuntimeException $s8xgL8g1emMqcppf) {
        gyjEu0Vy9ta_e4xu('exception.catch');
        $r7torAGeVHnJSuRh[] = $s8xgL8g1emMqcppf->getMessage();
    } finally {
        gYJEU0VY9Ta_E4xu('exception.finally');
        $r7torAGeVHnJSuRh[] = 'finally';
    }
    return $r7torAGeVHnJSuRh;
}
function I7lny57rM343gr6x($KzKU0qipYDExXAL4)
{
    $HQvWgKhipERkqJsR = 3;
    $ssY2aWZh7oHUhVvy = function ($H7Zh5GBex4Lr2BTM) use ($HQvWgKhipERkqJsR) {
        if ($H7Zh5GBex4Lr2BTM < 0) {
            GyJEu0vy9Ta_E4XU('closure.negative');
            return -$HQvWgKhipERkqJsR;
        } else if ($H7Zh5GBex4Lr2BTM === 0) {
            gyJEu0vy9Ta_e4XU('closure.zero');
            return 0;
        } else {
            Gyjeu0VY9ta_E4Xu('closure.positive');
            $UH3QetNJNNuYCPxH = 0;
            $yvSDShdYhdxH_ocL = 0;
            for (; $yvSDShdYhdxH_ocL < $H7Zh5GBex4Lr2BTM; $yvSDShdYhdxH_ocL++) {
                $UH3QetNJNNuYCPxH += $HQvWgKhipERkqJsR;
            }
            return $UH3QetNJNNuYCPxH;
        }
    };
    return $ssY2aWZh7oHUhVvy($KzKU0qipYDExXAL4);
}
interface YkhQM5izxfeyYofC
{
    public function PiNym7A_YZpeIDRw($KzKU0qipYDExXAL4);
}
trait F7nOvW4Ld8igTnTE
{
    private function aF6KtUZBIjy48uLT($KzKU0qipYDExXAL4)
    {
        return $KzKU0qipYDExXAL4 + KEgP2GYIj4TX5E22;
    }
}
class dwnf_teuQdVHQeoN implements ykhQM5izXfeyyoFc
{
    use F7noVW4ld8IgTNTe;
    const SVWLLOEXqGGRSUTR = 2;
    private $Ucl6eNKKFR554z0H = 1;
    public function pInyM7A_YZpeIdrw($KzKU0qipYDExXAL4)
    {
        if ($KzKU0qipYDExXAL4 > 0) {
            GYjeU0VY9Ta_e4Xu('class.positive');
            return $this->aF6KtuzBiJY48uLT($KzKU0qipYDExXAL4) * self::SVWLLOEXqGGRSUTR;
        } else {
            gYJeu0vY9ta_e4xu('class.nonpositive');
            return $this->Ucl6eNKKFR554z0H;
        }
    }
}
$GExjTDssxRnB1YMc = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$shGNZTs6SQiLSoDF = [];
$RLNW8KtUYYAPPrIx = new DwnF_TeuqDVhqeon();
$WcAG1B8oLORXMDtX = -3;
for (; $WcAG1B8oLORXMDtX <= 8; $WcAG1B8oLORXMDtX++) {
    foreach ([false, true] as $qwqlcLlY0DRG_pOH) {
        $KzKU0qipYDExXAL4 = $WcAG1B8oLORXMDtX + $GExjTDssxRnB1YMc % 3;
        $shGNZTs6SQiLSoDF[] = ['input' => [$KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH], 'if' => V3V0mOe2LhkXSS3n($KzKU0qipYDExXAL4), 'else' => lw9f5xFSRyDTYNZ2($KzKU0qipYDExXAL4), 'elseif' => vPR30DZ4hSBvRiQD($KzKU0qipYDExXAL4), 'nested' => cN5TpgSgi26vDj7G($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH), 'for' => Q7_U6kf_AAZzTkRO($KzKU0qipYDExXAL4), 'while' => zDuNMMglDS5umHh0($KzKU0qipYDExXAL4), 'do' => t8Enbsv7Zkc97Dhp($KzKU0qipYDExXAL4), 'conditions' => P886Uxdn0Zb3T_0o($KzKU0qipYDExXAL4), 'empty' => U2ON1NS6Ux3NGKKb($KzKU0qipYDExXAL4), 'infinite' => a4gCcpF9fASrUu2f($KzKU0qipYDExXAL4), 'nested-control' => ycTZRh3SDd3s3hJq($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH), 'native' => LBK1p4_HAWRL2LUW($KzKU0qipYDExXAL4, $qwqlcLlY0DRG_pOH), 'switch' => VBUrMguFaY6y6_hY($KzKU0qipYDExXAL4), 'return' => hMk7jRtdee0JD3BA($KzKU0qipYDExXAL4), 'exception' => E1o7fM8kdgi9alUI($KzKU0qipYDExXAL4), 'closure' => i7lnY57RM343gR6x($KzKU0qipYDExXAL4), 'class' => $RLNW8KtUYYAPPrIx->PINYM7A_yZPeIDrW($KzKU0qipYDExXAL4), 'strings' => ["n={$KzKU0qipYDExXAL4}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($WNKXmoQN1jMvU9Jt);
echo json_encode(['rows' => $shGNZTs6SQiLSoDF, 'coverage' => $WNKXmoQN1jMvU9Jt], JSON_UNESCAPED_UNICODE), "\n";