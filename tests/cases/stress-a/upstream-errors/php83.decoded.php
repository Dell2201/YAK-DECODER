<?php

namespace RiwjE611wgvyAZQa;

const bH4QlzkH_x8SeF6I = 7;
$t_veiXD_WtRc28H2 = [];
function lXjTnzguxTrNJCbn($K_wO4yDoDlYKCzZ5)
{
    global $t_veiXD_WtRc28H2;
    $t_veiXD_WtRc28H2[$K_wO4yDoDlYKCzZ5] = isset($t_veiXD_WtRc28H2[$K_wO4yDoDlYKCzZ5]) ? $t_veiXD_WtRc28H2[$K_wO4yDoDlYKCzZ5] + 1 : 1;
}
function t17FyiVGyPOIdI6A($zbeYKdt9Lcy5L8kO)
{
    $wVvZNgcfqPMRRj8s = 0;
    if ($zbeYKdt9Lcy5L8kO > 0) {
        LxjtNzGuxtrNJCBn('if.true');
        $wVvZNgcfqPMRRj8s = $zbeYKdt9Lcy5L8kO * 2;
    }
    if ($zbeYKdt9Lcy5L8kO <= 0) {
        LxjtnZguxTrNJCbN('if.false-path');
    }
    return $wVvZNgcfqPMRRj8s;
}
function XLadrbTXYCjfx620($zbeYKdt9Lcy5L8kO)
{
    if ($zbeYKdt9Lcy5L8kO % 2 === 0) {
        lxjTNZGuXTRNjCbn('else.then');
        return 'even';
    } else {
        LxJtnzgUxTrnjCbN('else.else');
        return 'odd';
    }
}
function jemh0NLhZzeuzRJx($zbeYKdt9Lcy5L8kO)
{
    if ($zbeYKdt9Lcy5L8kO < 0) {
        lXJTNzGuxTrNJcbn('elseif.negative');
        return -1;
    } else if ($zbeYKdt9Lcy5L8kO === 0) {
        lXJTnZGuxtRnjcbN('elseif.zero');
        return 0;
    } else if ($zbeYKdt9Lcy5L8kO < 3) {
        LXjtNZgUxtrnJCbN('elseif.small');
        return 1;
    } else {
        lxJTnzGuxtRNjCbn('elseif.large');
        return 2;
    }
}
function z9oZO8RfblnkrKBc($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt)
{
    $Zae_FOYQJpYXDStj = [];
    if ($zbeYKdt9Lcy5L8kO > 0 && ($l4DDEjahE6tSeDgt || $zbeYKdt9Lcy5L8kO > 3)) {
        LxjtNZGuXtRNJCBN('nested.outer-true');
        $Zae_FOYQJpYXDStj[] = 'outer';
        if ($zbeYKdt9Lcy5L8kO % 2) {
            lxjtnzgUXtRnJcbN('nested.inner-odd');
            $Zae_FOYQJpYXDStj[] = 'odd';
        } else {
            lxJtNzgUXTrnJcBn('nested.inner-even');
            $Zae_FOYQJpYXDStj[] = 'even';
        }
    } else if ($l4DDEjahE6tSeDgt && $zbeYKdt9Lcy5L8kO < 0) {
        lXjTnZguXTrNJCBn('nested.elseif');
        $Zae_FOYQJpYXDStj[] = 'negative';
    } else {
        lxjTnZgUxtRnjcbn('nested.else');
        $Zae_FOYQJpYXDStj[] = 'fallback';
    }
    return $Zae_FOYQJpYXDStj;
}
function mElhk9Rf8N129_jU($zbeYKdt9Lcy5L8kO)
{
    $Zae_FOYQJpYXDStj = [];
    $K987_uapx7a2rbhj = 0;
    $gwviWlOP6neCatny = 10;
    for (; $K987_uapx7a2rbhj < $zbeYKdt9Lcy5L8kO; $gwviWlOP6neCatny -= 2) {
        LXjTnzGuXTrnJCbn('for.body');
        if (!($K987_uapx7a2rbhj === 1)) {
            $Zae_FOYQJpYXDStj[] = [$K987_uapx7a2rbhj, $gwviWlOP6neCatny];
            if ($K987_uapx7a2rbhj === 4) {
                LXjtnzGUXTrNjCbN('for.break');
                break;
            }
        } else {
            lxjTnZGUXTRNjCBn('for.continue');
        }
        $K987_uapx7a2rbhj++;
    }
    if (!$Zae_FOYQJpYXDStj) {
        LXjtnZguxtRNjCbn('for.zero');
    }
    return [$K987_uapx7a2rbhj, $gwviWlOP6neCatny, $Zae_FOYQJpYXDStj];
}
function YOqsmIhLj2VB6_EG($zbeYKdt9Lcy5L8kO)
{
    $K987_uapx7a2rbhj = 0;
    $Zae_FOYQJpYXDStj = [];
    while ($K987_uapx7a2rbhj < $zbeYKdt9Lcy5L8kO) {
        lxjtNzguxTrnjcbN('while.body');
        $K987_uapx7a2rbhj++;
        if (!($K987_uapx7a2rbhj === 2)) {
            $Zae_FOYQJpYXDStj[] = $K987_uapx7a2rbhj;
            if (!($K987_uapx7a2rbhj === 5)) {
                continue;
            } else {
                LXjTNZguXTrNjcBN('while.break');
                break;
            }
        } else {
            LxjtNZguxtRnjcbn('while.continue');
        }
    }
    if ($K987_uapx7a2rbhj === 0) {
        lXJtnZGuxtrnJcBN('while.zero');
    }
    return [$K987_uapx7a2rbhj, $Zae_FOYQJpYXDStj];
}
function JPB3HrH1IN4e4rQC($zbeYKdt9Lcy5L8kO)
{
    $K987_uapx7a2rbhj = 0;
    $Zae_FOYQJpYXDStj = [];
    while (true) {
        lXjtnzguXTrNJCBn('do.body');
        $K987_uapx7a2rbhj++;
        if (!($K987_uapx7a2rbhj === 2)) {
            $Zae_FOYQJpYXDStj[] = $K987_uapx7a2rbhj;
            if (!($K987_uapx7a2rbhj === 5)) {
                if ($K987_uapx7a2rbhj < $zbeYKdt9Lcy5L8kO) {
                    continue;
                } else {
                    break;
                }
            } else {
                LxJtnzGuxTRNjCBN('do.break');
                break;
            }
        } else {
            lxjtnZguXtrNJCbN('do.continue');
        }
    }
    if ($K987_uapx7a2rbhj === 1) {
        lxjTNZGuxtRNJCbN('do.once');
    } else {
        lxJtNZguxtRNJCBn('do.repeat');
    }
    return [$K987_uapx7a2rbhj, $Zae_FOYQJpYXDStj];
}
function IKXi_iR19sPx3Q4A($zbeYKdt9Lcy5L8kO)
{
    $KySzwSM6Bb6QREKN = 0;
    $Zae_FOYQJpYXDStj = [];
    while (++$KySzwSM6Bb6QREKN <= max(0, $zbeYKdt9Lcy5L8kO)) {
        $Zae_FOYQJpYXDStj[] = $KySzwSM6Bb6QREKN;
    }
    $NvOIExa1eNzBDc0O = 0;
    do {
        $Zae_FOYQJpYXDStj[] = -$NvOIExa1eNzBDc0O;
    } while ($NvOIExa1eNzBDc0O++ < min(3, max(0, $zbeYKdt9Lcy5L8kO)));
    LxjtNzGuXTRnjCbn('conditions.side-effects');
    return [$KySzwSM6Bb6QREKN, $NvOIExa1eNzBDc0O, $Zae_FOYQJpYXDStj];
}
function dxFnvg7aDWtXN09F($zbeYKdt9Lcy5L8kO)
{
    $K987_uapx7a2rbhj = 0;
    while ($K987_uapx7a2rbhj < min(3, max(0, $zbeYKdt9Lcy5L8kO))) {
        $K987_uapx7a2rbhj++;
    }
    $gwviWlOP6neCatny = 0;
    while ($gwviWlOP6neCatny++ < min(2, max(0, $zbeYKdt9Lcy5L8kO))) {
    }
    while ($gwviWlOP6neCatny++ < 1) {
    }
    LxJtnzGUxtRnJCbN('loops.empty');
    return [$K987_uapx7a2rbhj, $gwviWlOP6neCatny];
}
function W1U1Gq1LsFkDCDgI($zbeYKdt9Lcy5L8kO)
{
    $K987_uapx7a2rbhj = 0;
    $fDf2DwwC_5hFJZyC = 0;
    while (!($K987_uapx7a2rbhj >= max(0, $zbeYKdt9Lcy5L8kO))) {
        $fDf2DwwC_5hFJZyC += ++$K987_uapx7a2rbhj;
    }
    lxjtNZGuxtRNjCbn('infinite.break');
    return [$K987_uapx7a2rbhj, $fDf2DwwC_5hFJZyC];
}
function gV_myoexfCgX73_U($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt)
{
    $Zae_FOYQJpYXDStj = [];
    $K987_uapx7a2rbhj = 0;
    for (; $K987_uapx7a2rbhj < min(4, max(0, $zbeYKdt9Lcy5L8kO)); $K987_uapx7a2rbhj++) {
        $gwviWlOP6neCatny = 0;
        for (; $gwviWlOP6neCatny < 4; $gwviWlOP6neCatny++) {
            if (!($gwviWlOP6neCatny === 1 && $l4DDEjahE6tSeDgt)) {
                if (!($K987_uapx7a2rbhj === 2 && $gwviWlOP6neCatny === 2)) {
                    $Zae_FOYQJpYXDStj[] = [$K987_uapx7a2rbhj, $gwviWlOP6neCatny];
                } else {
                    lxjTnzGUXtRnjcBN('nested.break-two');
                    break 2;
                }
            } else {
                LXJTNZGuXTRNJCBn('nested.continue-two');
                continue 2;
            }
        }
        $Zae_FOYQJpYXDStj[] = 'end-outer';
    }
    return $Zae_FOYQJpYXDStj;
}
function PogYWWLL_Hrf2w3n($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt)
{
    $Zae_FOYQJpYXDStj = [];
    foreach ([0, 1, 2] as $Dyq2NV_ecpBKkGPy) {
        $K987_uapx7a2rbhj = 0;
        for (; $K987_uapx7a2rbhj < min(4, max(0, $zbeYKdt9Lcy5L8kO)); $Zae_FOYQJpYXDStj[] = [$Dyq2NV_ecpBKkGPy, $K987_uapx7a2rbhj]) {
            $K987_uapx7a2rbhj++;
            if (!($l4DDEjahE6tSeDgt && $K987_uapx7a2rbhj === 2)) {
                if (!$l4DDEjahE6tSeDgt && $Dyq2NV_ecpBKkGPy === 1 && $K987_uapx7a2rbhj === 3) {
                    lXjtNzguxtrnjcBn('mixed.break-two');
                    break 2;
                }
            } else {
                lxJTnZgUXTRNjCBN('mixed.continue-two');
                continue 2;
            }
        }
        $Zae_FOYQJpYXDStj[] = 'native-end';
        continue;
    }
    return $Zae_FOYQJpYXDStj;
}
function LsnsrPvtoOBU8_0M($zbeYKdt9Lcy5L8kO)
{
    $Zae_FOYQJpYXDStj = [];
    $K987_uapx7a2rbhj = 0;
    for (; $K987_uapx7a2rbhj < min(5, max(0, $zbeYKdt9Lcy5L8kO)); $K987_uapx7a2rbhj++) {
        switch ($K987_uapx7a2rbhj) {
            case 0:
                LxJtnzGUXtrnJcbN('switch.zero');
                $Zae_FOYQJpYXDStj[] = 'zero';
                break;
            case 1:
            case 2:
                lxjtNzgUXTRNjCBn('switch.shared');
                $Zae_FOYQJpYXDStj[] = 'shared';
                break;
            default:
                lxJTNZgUXtrnJCBn('switch.default');
                $Zae_FOYQJpYXDStj[] = 'exit';
                break 2;
        }
        $Zae_FOYQJpYXDStj[] = $K987_uapx7a2rbhj;
    }
    return $Zae_FOYQJpYXDStj;
}
function Zx90NQUfzALXObc6($zbeYKdt9Lcy5L8kO)
{
    $Zae_FOYQJpYXDStj = [];
    $K987_uapx7a2rbhj = 0;
    for (; $K987_uapx7a2rbhj < 5; $K987_uapx7a2rbhj++) {
        $Zae_FOYQJpYXDStj[] = $K987_uapx7a2rbhj;
        if ($K987_uapx7a2rbhj === $zbeYKdt9Lcy5L8kO) {
            LXjTnzguXTRNJcBn('return.early');
            return $Zae_FOYQJpYXDStj;
        }
    }
    LXJtnZGuXTRNjCBN('return.normal');
    return $Zae_FOYQJpYXDStj;
}
function zw8LHi1Cm8eSn41i($zbeYKdt9Lcy5L8kO)
{
    $Zae_FOYQJpYXDStj = [];
    try {
        if (!($zbeYKdt9Lcy5L8kO < 0)) {
            lXJtNzGUxtrnJcBn('exception.normal');
            $Zae_FOYQJpYXDStj[] = $zbeYKdt9Lcy5L8kO;
        } else {
            LxJtNzGuxtRnJCBN('exception.throw');
            throw new \RuntimeException('negative');
        }
    } catch (\RuntimeException $R5po3Dgrady6Vt3I) {
        LXJTnZguxtrNjcbN('exception.catch');
        $Zae_FOYQJpYXDStj[] = $R5po3Dgrady6Vt3I->getMessage();
    } finally {
        lxjtNZGuxTrNjCBn('exception.finally');
        $Zae_FOYQJpYXDStj[] = 'finally';
    }
    return $Zae_FOYQJpYXDStj;
}
function DqfEwLpNCCVxxI8t($zbeYKdt9Lcy5L8kO)
{
    $IefixpCLrXrH17wb = 3;
    $IYNAkmVxuDDIaLqI = function ($iBnMLal5KcXu1y7y) use ($IefixpCLrXrH17wb) {
        if ($iBnMLal5KcXu1y7y < 0) {
            lXjTNzguxtRNjcbN('closure.negative');
            return -$IefixpCLrXrH17wb;
        } else if ($iBnMLal5KcXu1y7y === 0) {
            lxJtnzGuXTrNjcBN('closure.zero');
            return 0;
        } else {
            lxjtNzGUXtrNjCbN('closure.positive');
            $fDf2DwwC_5hFJZyC = 0;
            $K987_uapx7a2rbhj = 0;
            for (; $K987_uapx7a2rbhj < $iBnMLal5KcXu1y7y; $K987_uapx7a2rbhj++) {
                $fDf2DwwC_5hFJZyC += $IefixpCLrXrH17wb;
            }
            return $fDf2DwwC_5hFJZyC;
        }
    };
    return $IYNAkmVxuDDIaLqI($zbeYKdt9Lcy5L8kO);
}
interface Y9g9x7JLt4B7WJWa
{
    public function DrE6CEedDvOjZFTQ($zbeYKdt9Lcy5L8kO);
}
trait gwJkPKuHs6I18mEV
{
    private function OqwA2IM5kWIzSAi2($zbeYKdt9Lcy5L8kO)
    {
        return $zbeYKdt9Lcy5L8kO + bH4QlzkH_x8SeF6I;
    }
}
class h3D3PbvZoBR61X4H implements Y9G9x7JLT4b7wjWA
{
    use GWjkpkuHs6i18MEV;
    const vqVlCKLBqybEebN3 = 2;
    private $dCW_cLkaK9PK36DH = 1;
    public function DRE6CeEddVoJZfTQ($zbeYKdt9Lcy5L8kO)
    {
        if ($zbeYKdt9Lcy5L8kO > 0) {
            lXJTNzGUxtRNjCBN('class.positive');
            return $this->OQWA2iM5KwiZsai2($zbeYKdt9Lcy5L8kO) * self::vqVlCKLBqybEebN3;
        } else {
            lXjtnzguxTRnJCbN('class.nonpositive');
            return $this->dCW_cLkaK9PK36DH;
        }
    }
}
interface RP4KfL1pRCQ_UXDZ
{
    public function F4jfo7uJAk73z2Ds(): int;
}
readonly class LTvwFxpwbwuPM0yO implements Rp4Kfl1prcQ_uxdZ
{
    public const string dFYKNZC7bYEUuYQ0 = 'typed';
    public const int N76GPntHBka6bFPs = 3;
    public function __construct(public int $js9hPA1iZWl3fs1f)
    {
    }
    #[\Override]
    public function f4JfO7UJAK73Z2Ds(): int
    {
        return $this->aZgHfAA1QivqX3cd;
    }
    public function __clone()
    {
        $this->aZgHfAA1QivqX3cd = $this->aZgHfAA1QivqX3cd + 10;
    }
}
function RnKqcSMpq1OT7epi($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt)
{
    goto TcDy9eXHxWZwFN8u;
    t3dAetU1ZQ8CAKlq:
    try {
        foreach ([0, 1, 2] as $gwviWlOP6neCatny) {
            goto x3vJaqoVPFAP2044;
            H1knK04rOppKfJuv:
            U2MLwyYIZgd2cp3s:
            goto neXeAw4_vJjPXtCH;
            D2F1qYuQeYGfktnM:
            if (!($K987_uapx7a2rbhj === 2 && $gwviWlOP6neCatny === 1 && !$l4DDEjahE6tSeDgt)) {
                goto u_A9TRkB56OMp30n;
            }
            goto eKa1PMKspJv_BlUq;
            EQXdSw6xQI_q2_1g:
            $Zae_FOYQJpYXDStj[] = [LtvwFXpWbwUpm0Yo::dFYKNZC7bYEUuYQ0, $H3aaKxskCD_Om4Dc->F4jFO7ujAK73z2ds() + lTvwFXPwbwupm0yO::N76GPntHBka6bFPs, ++$RrysLUNRTeOKFvEu, $K987_uapx7a2rbhj, $gwviWlOP6neCatny, $rZtvoKaO6X1voUCk];
            goto Ck2C0JLNN_42Tu6g;
            LWUi_01HPi8ywyht:
            goto kdPp6xjyxqvt5PXV;
            goto etgixnY0ZBy9sxZK;
            eKa1PMKspJv_BlUq:
            lxjTnzguXtrNJcBn('v83.break3');
            goto w19t_K5PzYkN0Gzq;
            TMSvfCG1AYgz3amq:
            u_A9TRkB56OMp30n:
            goto EQXdSw6xQI_q2_1g;
            w19t_K5PzYkN0Gzq:
            goto zeOHtX7pfWEGSaEU;
            goto TMSvfCG1AYgz3amq;
            etgixnY0ZBy9sxZK:
            BGOqeow3nLszOuQI:
            goto D2F1qYuQeYGfktnM;
            fauqo6M8EQjJRJwz:
            Y1_T4I3Q4D30WKG6:
            goto UVsFybbVS060O0cY;
            BnNusWkvH0Xgz5p8:
            qUA_4Ak9nXVks_Zu:
            goto fauqo6M8EQjJRJwz;
            Ck2C0JLNN_42Tu6g:
            if ($rZtvoKaO6X1voUCk < 3) {
                goto U2MLwyYIZgd2cp3s;
            }
            goto BnNusWkvH0Xgz5p8;
            neXeAw4_vJjPXtCH:
            if (!(++$rZtvoKaO6X1voUCk === 2 && $l4DDEjahE6tSeDgt)) {
                goto BGOqeow3nLszOuQI;
            }
            goto IXCd6D_mFBy91dZM;
            IXCd6D_mFBy91dZM:
            LXjTnZguXtRnjCbn('v83.continue3');
            goto LWUi_01HPi8ywyht;
            x3vJaqoVPFAP2044:
            $rZtvoKaO6X1voUCk = 0;
            goto H1knK04rOppKfJuv;
            UVsFybbVS060O0cY:
        }
    } finally {
        lXJTnZguxTRnJCbN('v83.finally');
        $Zae_FOYQJpYXDStj[] = ['finally', $K987_uapx7a2rbhj];
    }
    goto tWwjr8lLe94W_1_r;
    SS88nCPh3oHTPpfg:
    $RrysLUNRTeOKFvEu = 0;
    goto GI7jR4KADlsbCdT7;
    J1kEw2c5C1sSba41:
    qCGbN8cZGFVsTeFR:
    goto l0dg26tAdqvLw4Ha;
    l0dg26tAdqvLw4Ha:
    if (!($K987_uapx7a2rbhj < 3)) {
        goto zeOHtX7pfWEGSaEU;
    }
    goto t3dAetU1ZQ8CAKlq;
    s41HII1kieRPaiTt:
    goto qCGbN8cZGFVsTeFR;
    goto KiF4pC2rMq3z7X22;
    RTSufnh8Te3598wp:
    $Zae_FOYQJpYXDStj = [];
    goto SS88nCPh3oHTPpfg;
    tWwjr8lLe94W_1_r:
    kdPp6xjyxqvt5PXV:
    goto jNFsxg9YNLTXNhv8;
    GI7jR4KADlsbCdT7:
    $K987_uapx7a2rbhj = 0;
    goto J1kEw2c5C1sSba41;
    jNFsxg9YNLTXNhv8:
    $K987_uapx7a2rbhj++;
    goto s41HII1kieRPaiTt;
    DnT_IRe9f0CtafXf:
    $H3aaKxskCD_Om4Dc = clone $lt2jIC8iQPkqFsV7;
    goto RTSufnh8Te3598wp;
    KiF4pC2rMq3z7X22:
    zeOHtX7pfWEGSaEU:
    goto X4kSp9bdp3FsDViH;
    X4kSp9bdp3FsDViH:
    return [$lt2jIC8iQPkqFsV7->F4JFO7UJAK73Z2Ds(), $H3aaKxskCD_Om4Dc->F4JfO7uJak73Z2ds(), $Zae_FOYQJpYXDStj, $RrysLUNRTeOKFvEu];
    goto eL8lvGISxlXV0bqA;
    TcDy9eXHxWZwFN8u:
    $lt2jIC8iQPkqFsV7 = new LtVwFxPwbWUpM0YO($zbeYKdt9Lcy5L8kO);
    goto DnT_IRe9f0CtafXf;
    eL8lvGISxlXV0bqA:
}
$tzUCLK2IzCiTbmum = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$qUsiUIGIIynNF4nC = [];
$i9GfdkeQ8mQXC3TD = new H3D3pBvZobR61x4h();
$iSw2P50e29e34Y1R = -3;
for (; $iSw2P50e29e34Y1R <= 8; $iSw2P50e29e34Y1R++) {
    foreach ([false, true] as $l4DDEjahE6tSeDgt) {
        $zbeYKdt9Lcy5L8kO = $iSw2P50e29e34Y1R + $tzUCLK2IzCiTbmum % 3;
        $qUsiUIGIIynNF4nC[] = ['input' => [$zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt], 'version-feature' => rNkQCsmpQ1ot7EPi($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt), 'if' => t17fYiVgYPoIDi6A($zbeYKdt9Lcy5L8kO), 'else' => xLAdrBTxycjFx620($zbeYKdt9Lcy5L8kO), 'elseif' => jeMh0NLHZzeuZrjX($zbeYKdt9Lcy5L8kO), 'nested' => z9OZO8RfbLnkrKbC($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt), 'for' => meLhk9rf8n129_JU($zbeYKdt9Lcy5L8kO), 'while' => YOqsmIhLJ2Vb6_Eg($zbeYKdt9Lcy5L8kO), 'do' => Jpb3hrh1IN4e4RQc($zbeYKdt9Lcy5L8kO), 'conditions' => iKxI_Ir19spx3Q4A($zbeYKdt9Lcy5L8kO), 'empty' => dxFNVg7adWtXN09f($zbeYKdt9Lcy5L8kO), 'infinite' => W1U1gq1lsfKDcdgi($zbeYKdt9Lcy5L8kO), 'nested-control' => gv_mYoExFCgx73_u($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt), 'native' => POgyWwlL_hRF2w3n($zbeYKdt9Lcy5L8kO, $l4DDEjahE6tSeDgt), 'switch' => lSNSrPvToOBU8_0m($zbeYKdt9Lcy5L8kO), 'return' => zX90NqUfZAlXObC6($zbeYKdt9Lcy5L8kO), 'exception' => ZW8LHI1cm8eSn41i($zbeYKdt9Lcy5L8kO), 'closure' => dQFEwlpncCVxXi8T($zbeYKdt9Lcy5L8kO), 'class' => $i9GfdkeQ8mQXC3TD->Dre6CeeDDVojzFtq($zbeYKdt9Lcy5L8kO), 'strings' => ["n={$zbeYKdt9Lcy5L8kO}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($t_veiXD_WtRc28H2);
echo json_encode(['rows' => $qUsiUIGIIynNF4nC, 'coverage' => $t_veiXD_WtRc28H2], JSON_UNESCAPED_UNICODE), "\n";