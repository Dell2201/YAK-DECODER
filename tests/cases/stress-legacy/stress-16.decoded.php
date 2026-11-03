<?php

namespace P0Fm35wj7Fjm9KvK;

const hZJnirBwCroQqndp = 7;
$FfnFEgbS8ryrC3Rc = [];
function igYQycbc3XlHSIG_($keYLgEluJF3Ln2Ru)
{
    global $FfnFEgbS8ryrC3Rc;
    $FfnFEgbS8ryrC3Rc[$keYLgEluJF3Ln2Ru] = isset($FfnFEgbS8ryrC3Rc[$keYLgEluJF3Ln2Ru]) ? $FfnFEgbS8ryrC3Rc[$keYLgEluJF3Ln2Ru] + 1 : 1;
}
function R8z0CnYllbGshUZK($Z4i_TW1VsHwGT8rO)
{
    $RXqR_iMe0rTicpWj = 0;
    if ($Z4i_TW1VsHwGT8rO > 0) {
        IGyqYcBC3XLhsig_('if.true');
        $RXqR_iMe0rTicpWj = $Z4i_TW1VsHwGT8rO * 2;
    }
    if ($Z4i_TW1VsHwGT8rO <= 0) {
        IGYqYcBc3xLhSiG_('if.false-path');
    }
    return $RXqR_iMe0rTicpWj;
}
function gEuOyoaA0qSYJTig($Z4i_TW1VsHwGT8rO)
{
    if ($Z4i_TW1VsHwGT8rO % 2 === 0) {
        IgYQyCBC3XlHSig_('else.then');
        return 'even';
    } else {
        IgyqycBC3xlHsiG_('else.else');
        return 'odd';
    }
}
function vTaCazFcGdqYwwtA($Z4i_TW1VsHwGT8rO)
{
    if ($Z4i_TW1VsHwGT8rO < 0) {
        iGYQYCBC3XLhSIG_('elseif.negative');
        return -1;
    } else if ($Z4i_TW1VsHwGT8rO === 0) {
        iGyQyCbC3Xlhsig_('elseif.zero');
        return 0;
    } else if ($Z4i_TW1VsHwGT8rO < 3) {
        IGyQYcbC3xlhSig_('elseif.small');
        return 1;
    } else {
        IGYqYCBc3xlhSIG_('elseif.large');
        return 2;
    }
}
function F9X1ma3Gx9KohFP4($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS)
{
    $s2yd_Il0f_Kyw3mp = [];
    if ($Z4i_TW1VsHwGT8rO > 0 && ($kJ5jCteSZ0tqe7HS || $Z4i_TW1VsHwGT8rO > 3)) {
        IGYQYcBc3xLhsiG_('nested.outer-true');
        $s2yd_Il0f_Kyw3mp[] = 'outer';
        if ($Z4i_TW1VsHwGT8rO % 2) {
            IgYQyCbc3XlhSIG_('nested.inner-odd');
            $s2yd_Il0f_Kyw3mp[] = 'odd';
        } else {
            igyQycBC3XLHsig_('nested.inner-even');
            $s2yd_Il0f_Kyw3mp[] = 'even';
        }
    } else if ($kJ5jCteSZ0tqe7HS && $Z4i_TW1VsHwGT8rO < 0) {
        IGYQYcbC3XlHSig_('nested.elseif');
        $s2yd_Il0f_Kyw3mp[] = 'negative';
    } else {
        IgyQycBc3xlHSIg_('nested.else');
        $s2yd_Il0f_Kyw3mp[] = 'fallback';
    }
    return $s2yd_Il0f_Kyw3mp;
}
function UENEFXfdufU8tllk($Z4i_TW1VsHwGT8rO)
{
    $s2yd_Il0f_Kyw3mp = [];
    $if4r744P2CnxUv1g = 0;
    $oF03xlU0UparPX_j = 10;
    for (; $if4r744P2CnxUv1g < $Z4i_TW1VsHwGT8rO; $oF03xlU0UparPX_j -= 2) {
        iGyqYcbC3XLHSIG_('for.body');
        if (!($if4r744P2CnxUv1g === 1)) {
            $s2yd_Il0f_Kyw3mp[] = [$if4r744P2CnxUv1g, $oF03xlU0UparPX_j];
            if ($if4r744P2CnxUv1g === 4) {
                igyQycbc3xLHsiG_('for.break');
                break;
            }
        } else {
            IGyqycbc3XLhsig_('for.continue');
        }
        $if4r744P2CnxUv1g++;
    }
    if (!$s2yd_Il0f_Kyw3mp) {
        IgyqyCbC3XlhSIg_('for.zero');
    }
    return [$if4r744P2CnxUv1g, $oF03xlU0UparPX_j, $s2yd_Il0f_Kyw3mp];
}
function u8bqjiTqZT1uc7Wk($Z4i_TW1VsHwGT8rO)
{
    $if4r744P2CnxUv1g = 0;
    $s2yd_Il0f_Kyw3mp = [];
    while ($if4r744P2CnxUv1g < $Z4i_TW1VsHwGT8rO) {
        igYQyCBc3xlhSig_('while.body');
        $if4r744P2CnxUv1g++;
        if (!($if4r744P2CnxUv1g === 2)) {
            $s2yd_Il0f_Kyw3mp[] = $if4r744P2CnxUv1g;
            if (!($if4r744P2CnxUv1g === 5)) {
                continue;
            } else {
                igyQYCbc3XLHSIG_('while.break');
                break;
            }
        } else {
            igyQYCbc3XLhSIG_('while.continue');
        }
    }
    if ($if4r744P2CnxUv1g === 0) {
        IGyqycbc3XLHSIG_('while.zero');
    }
    return [$if4r744P2CnxUv1g, $s2yd_Il0f_Kyw3mp];
}
function hOClBuIeWPWF96mr($Z4i_TW1VsHwGT8rO)
{
    $if4r744P2CnxUv1g = 0;
    $s2yd_Il0f_Kyw3mp = [];
    while (true) {
        igYqycBC3xLhsIg_('do.body');
        $if4r744P2CnxUv1g++;
        if (!($if4r744P2CnxUv1g === 2)) {
            $s2yd_Il0f_Kyw3mp[] = $if4r744P2CnxUv1g;
            if (!($if4r744P2CnxUv1g === 5)) {
                if ($if4r744P2CnxUv1g < $Z4i_TW1VsHwGT8rO) {
                    continue;
                } else {
                    break;
                }
            } else {
                igYqYcbC3XlHsIG_('do.break');
                break;
            }
        } else {
            IGYqycbC3xlHsIG_('do.continue');
        }
    }
    if ($if4r744P2CnxUv1g === 1) {
        igyqycbC3xLhSiG_('do.once');
    } else {
        iGYqYcbC3XlHsIG_('do.repeat');
    }
    return [$if4r744P2CnxUv1g, $s2yd_Il0f_Kyw3mp];
}
function tMmtt2eUrW3ZCzdP($Z4i_TW1VsHwGT8rO)
{
    $MaiS3N1q3M3FlTLk = 0;
    $s2yd_Il0f_Kyw3mp = [];
    while (++$MaiS3N1q3M3FlTLk <= max(0, $Z4i_TW1VsHwGT8rO)) {
        $s2yd_Il0f_Kyw3mp[] = $MaiS3N1q3M3FlTLk;
    }
    $g5ufyYgUmgXqHOj6 = 0;
    do {
        $s2yd_Il0f_Kyw3mp[] = -$g5ufyYgUmgXqHOj6;
    } while ($g5ufyYgUmgXqHOj6++ < min(3, max(0, $Z4i_TW1VsHwGT8rO)));
    IGYQYcbc3XLHSiG_('conditions.side-effects');
    return [$MaiS3N1q3M3FlTLk, $g5ufyYgUmgXqHOj6, $s2yd_Il0f_Kyw3mp];
}
function tzJioP9IUvpzyH_a($Z4i_TW1VsHwGT8rO)
{
    $if4r744P2CnxUv1g = 0;
    while ($if4r744P2CnxUv1g < min(3, max(0, $Z4i_TW1VsHwGT8rO))) {
        $if4r744P2CnxUv1g++;
    }
    $oF03xlU0UparPX_j = 0;
    while ($oF03xlU0UparPX_j++ < min(2, max(0, $Z4i_TW1VsHwGT8rO))) {
    }
    while ($oF03xlU0UparPX_j++ < 1) {
    }
    IGyQycbC3xlhsIg_('loops.empty');
    return [$if4r744P2CnxUv1g, $oF03xlU0UparPX_j];
}
function Xaem6Urrfdnh2_yo($Z4i_TW1VsHwGT8rO)
{
    $if4r744P2CnxUv1g = 0;
    $poTlPx2aC2kEQi40 = 0;
    while (!($if4r744P2CnxUv1g >= max(0, $Z4i_TW1VsHwGT8rO))) {
        $poTlPx2aC2kEQi40 += ++$if4r744P2CnxUv1g;
    }
    IgyqYcBC3XLHSig_('infinite.break');
    return [$if4r744P2CnxUv1g, $poTlPx2aC2kEQi40];
}
function QussqRsodbrm631M($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS)
{
    $s2yd_Il0f_Kyw3mp = [];
    $if4r744P2CnxUv1g = 0;
    for (; $if4r744P2CnxUv1g < min(4, max(0, $Z4i_TW1VsHwGT8rO)); $if4r744P2CnxUv1g++) {
        $oF03xlU0UparPX_j = 0;
        for (; $oF03xlU0UparPX_j < 4; $oF03xlU0UparPX_j++) {
            if (!($oF03xlU0UparPX_j === 1 && $kJ5jCteSZ0tqe7HS)) {
                if (!($if4r744P2CnxUv1g === 2 && $oF03xlU0UparPX_j === 2)) {
                    $s2yd_Il0f_Kyw3mp[] = [$if4r744P2CnxUv1g, $oF03xlU0UparPX_j];
                } else {
                    IGYQyCBC3xLHSig_('nested.break-two');
                    break 2;
                }
            } else {
                iGyqycBc3xLHsig_('nested.continue-two');
                continue 2;
            }
        }
        $s2yd_Il0f_Kyw3mp[] = 'end-outer';
    }
    return $s2yd_Il0f_Kyw3mp;
}
function jj9617KxRJFl5YSY($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS)
{
    $s2yd_Il0f_Kyw3mp = [];
    foreach ([0, 1, 2] as $F8vyXTeheQ7bUIZJ) {
        $if4r744P2CnxUv1g = 0;
        for (; $if4r744P2CnxUv1g < min(4, max(0, $Z4i_TW1VsHwGT8rO)); $s2yd_Il0f_Kyw3mp[] = [$F8vyXTeheQ7bUIZJ, $if4r744P2CnxUv1g]) {
            $if4r744P2CnxUv1g++;
            if (!($kJ5jCteSZ0tqe7HS && $if4r744P2CnxUv1g === 2)) {
                if (!$kJ5jCteSZ0tqe7HS && $F8vyXTeheQ7bUIZJ === 1 && $if4r744P2CnxUv1g === 3) {
                    IgYqycBc3xLHSiG_('mixed.break-two');
                    break 2;
                }
            } else {
                igYqYCbC3XlHsiG_('mixed.continue-two');
                continue 2;
            }
        }
        $s2yd_Il0f_Kyw3mp[] = 'native-end';
        continue;
    }
    return $s2yd_Il0f_Kyw3mp;
}
function RNyLaKJswaof3Js5($Z4i_TW1VsHwGT8rO)
{
    $s2yd_Il0f_Kyw3mp = [];
    $if4r744P2CnxUv1g = 0;
    for (; $if4r744P2CnxUv1g < min(5, max(0, $Z4i_TW1VsHwGT8rO)); $if4r744P2CnxUv1g++) {
        switch ($if4r744P2CnxUv1g) {
            case 0:
                igyQyCBc3xLhSiG_('switch.zero');
                $s2yd_Il0f_Kyw3mp[] = 'zero';
                break;
            case 1:
            case 2:
                iGyQYCbc3xLhsiG_('switch.shared');
                $s2yd_Il0f_Kyw3mp[] = 'shared';
                break;
            default:
                igyQycbc3xLHSIg_('switch.default');
                $s2yd_Il0f_Kyw3mp[] = 'exit';
                break 2;
        }
        $s2yd_Il0f_Kyw3mp[] = $if4r744P2CnxUv1g;
    }
    return $s2yd_Il0f_Kyw3mp;
}
function Yq_LkLdVV2Cap1bC($Z4i_TW1VsHwGT8rO)
{
    $s2yd_Il0f_Kyw3mp = [];
    $if4r744P2CnxUv1g = 0;
    for (; $if4r744P2CnxUv1g < 5; $if4r744P2CnxUv1g++) {
        $s2yd_Il0f_Kyw3mp[] = $if4r744P2CnxUv1g;
        if ($if4r744P2CnxUv1g === $Z4i_TW1VsHwGT8rO) {
            IgYQycBc3xlHsiG_('return.early');
            return $s2yd_Il0f_Kyw3mp;
        }
    }
    IgYqYCBc3XLHSiG_('return.normal');
    return $s2yd_Il0f_Kyw3mp;
}
function POJGpm_GoJy6wNRE($Z4i_TW1VsHwGT8rO)
{
    $s2yd_Il0f_Kyw3mp = [];
    try {
        if ($Z4i_TW1VsHwGT8rO < 0) {
            iGYqYcBC3xLhsig_('exception.throw');
            throw new \RuntimeException('negative');
        }
        igyqYcBC3xLhsIg_('exception.normal');
        $s2yd_Il0f_Kyw3mp[] = $Z4i_TW1VsHwGT8rO;
    } catch (\RuntimeException $kY3gvnk8lbEN1Czm) {
        IGYQycBC3XLHsiG_('exception.catch');
        $s2yd_Il0f_Kyw3mp[] = $kY3gvnk8lbEN1Czm->getMessage();
    } finally {
        IGyQycBC3XlHsIG_('exception.finally');
        $s2yd_Il0f_Kyw3mp[] = 'finally';
    }
    return $s2yd_Il0f_Kyw3mp;
}
function ei6C_e71EMrg6RuM($Z4i_TW1VsHwGT8rO)
{
    $eWxvpfYD0rJnM2Ps = 3;
    $GMaGLn71TzVEi6Px = function ($nquFv6DYHS8eSX27) use ($eWxvpfYD0rJnM2Ps) {
        if ($nquFv6DYHS8eSX27 < 0) {
            IGyQYcBC3xlhsig_('closure.negative');
            return -$eWxvpfYD0rJnM2Ps;
        } else if ($nquFv6DYHS8eSX27 === 0) {
            igyqyCbC3xLhSIG_('closure.zero');
            return 0;
        } else {
            igYqycbC3xLhsIG_('closure.positive');
            $poTlPx2aC2kEQi40 = 0;
            $if4r744P2CnxUv1g = 0;
            for (; $if4r744P2CnxUv1g < $nquFv6DYHS8eSX27; $if4r744P2CnxUv1g++) {
                $poTlPx2aC2kEQi40 += $eWxvpfYD0rJnM2Ps;
            }
            return $poTlPx2aC2kEQi40;
        }
    };
    return $GMaGLn71TzVEi6Px($Z4i_TW1VsHwGT8rO);
}
interface eAks3fCiL9Tkif6Z
{
    public function j3TTH1L5y5sfz7Aa($Z4i_TW1VsHwGT8rO);
}
trait MTDS66jfItHuEsPa
{
    private function xlDWTybnKPkoiVSC($Z4i_TW1VsHwGT8rO)
    {
        return $Z4i_TW1VsHwGT8rO + hZJnirBwCroQqndp;
    }
}
class isjA60W3FAVnrqo3 implements EAkS3Fcil9tkif6z
{
    use MtdS66JfIthUesPA;
    const zeulQ10gUJE9GMHz = 2;
    private $SwJhbxw1xqhg7No1 = 1;
    public function j3Tth1L5Y5sFz7aA($Z4i_TW1VsHwGT8rO)
    {
        if ($Z4i_TW1VsHwGT8rO > 0) {
            IGyqYcbC3XlHSig_('class.positive');
            return $this->xLdWtYbnKpkOivSc($Z4i_TW1VsHwGT8rO) * self::zeulQ10gUJE9GMHz;
        } else {
            igyqYCbc3xlhSiG_('class.nonpositive');
            return $this->SwJhbxw1xqhg7No1;
        }
    }
}
$EB2zEOqMJWAG9PfR = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$NYLR8hxxyHwy0bQm = [];
$AOCFCQmgZq_FuDfJ = new IsjA60W3FavNrqo3();
$gLWDbWRzNJz1cajF = -3;
for (; $gLWDbWRzNJz1cajF <= 8; $gLWDbWRzNJz1cajF++) {
    foreach ([false, true] as $kJ5jCteSZ0tqe7HS) {
        $Z4i_TW1VsHwGT8rO = $gLWDbWRzNJz1cajF + $EB2zEOqMJWAG9PfR % 3;
        $NYLR8hxxyHwy0bQm[] = ['input' => [$Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS], 'if' => r8Z0cNyllBGShuZk($Z4i_TW1VsHwGT8rO), 'else' => GeUoyOaa0qsYjTIg($Z4i_TW1VsHwGT8rO), 'elseif' => vtaCazfcGDQywwTa($Z4i_TW1VsHwGT8rO), 'nested' => F9X1MA3GX9KohFP4($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS), 'for' => UenEFxfDUFu8TlLk($Z4i_TW1VsHwGT8rO), 'while' => U8BQjitqzt1UC7WK($Z4i_TW1VsHwGT8rO), 'do' => hOClbuIeWpwF96mR($Z4i_TW1VsHwGT8rO), 'conditions' => TmMtt2euRW3ZcZDp($Z4i_TW1VsHwGT8rO), 'empty' => tzjiOp9iuVpzYh_A($Z4i_TW1VsHwGT8rO), 'infinite' => xAem6URRfDnH2_yo($Z4i_TW1VsHwGT8rO), 'nested-control' => quSsqrSodbRm631m($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS), 'native' => jj9617KxrJfL5ySY($Z4i_TW1VsHwGT8rO, $kJ5jCteSZ0tqe7HS), 'switch' => RnyLaKJSwaOF3JS5($Z4i_TW1VsHwGT8rO), 'return' => Yq_lKlDvv2cAP1BC($Z4i_TW1VsHwGT8rO), 'exception' => Pojgpm_goJY6wNre($Z4i_TW1VsHwGT8rO), 'closure' => Ei6C_E71EMrg6rUm($Z4i_TW1VsHwGT8rO), 'class' => $AOCFCQmgZq_FuDfJ->J3TtH1l5Y5Sfz7Aa($Z4i_TW1VsHwGT8rO), 'strings' => ["n={$Z4i_TW1VsHwGT8rO}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($FfnFEgbS8ryrC3Rc);
echo json_encode(['rows' => $NYLR8hxxyHwy0bQm, 'coverage' => $FfnFEgbS8ryrC3Rc], JSON_UNESCAPED_UNICODE), "\n";