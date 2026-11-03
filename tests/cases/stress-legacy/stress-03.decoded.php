<?php

namespace L5Oek5eAKWyhlepv;

const J_kpKHY2isoEHeny = 7;
$oae3UL6KQFilZ5t1 = [];
function W9j3YwEH09A1b9_A($ooiQ2LPGX3kFZeTL)
{
    global $oae3UL6KQFilZ5t1;
    $oae3UL6KQFilZ5t1[$ooiQ2LPGX3kFZeTL] = isset($oae3UL6KQFilZ5t1[$ooiQ2LPGX3kFZeTL]) ? $oae3UL6KQFilZ5t1[$ooiQ2LPGX3kFZeTL] + 1 : 1;
}
function faNFgCySpMLmnzQn($UW5TAc35iLjvB50D)
{
    $MoLTu9Xdy_wcOtF6 = 0;
    if ($UW5TAc35iLjvB50D > 0) {
        w9j3YWEh09A1B9_A('if.true');
        $MoLTu9Xdy_wcOtF6 = $UW5TAc35iLjvB50D * 2;
    }
    if ($UW5TAc35iLjvB50D <= 0) {
        W9j3yweh09A1b9_a('if.false-path');
    }
    return $MoLTu9Xdy_wcOtF6;
}
function LUl3mcK6xwLa_dxq($UW5TAc35iLjvB50D)
{
    if ($UW5TAc35iLjvB50D % 2 === 0) {
        w9J3yWEH09a1B9_A('else.then');
        return 'even';
    } else {
        W9J3yWeh09A1B9_a('else.else');
        return 'odd';
    }
}
function X2DJRqllBuHyMHjv($UW5TAc35iLjvB50D)
{
    if ($UW5TAc35iLjvB50D < 0) {
        w9J3YWEh09a1B9_a('elseif.negative');
        return -1;
    } else if ($UW5TAc35iLjvB50D === 0) {
        w9J3yWEH09A1B9_a('elseif.zero');
        return 0;
    } else if ($UW5TAc35iLjvB50D < 3) {
        W9J3YWeh09a1b9_a('elseif.small');
        return 1;
    } else {
        w9j3YWEh09a1B9_A('elseif.large');
        return 2;
    }
}
function D22B2G4bbCl2ic8m($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030)
{
    $P9jT3ralwVL9RIcO = [];
    if ($UW5TAc35iLjvB50D > 0 && ($Coo_fjME9EJxc030 || $UW5TAc35iLjvB50D > 3)) {
        W9J3yWEh09A1B9_a('nested.outer-true');
        $P9jT3ralwVL9RIcO[] = 'outer';
        if ($UW5TAc35iLjvB50D % 2) {
            w9j3ywEh09A1B9_a('nested.inner-odd');
            $P9jT3ralwVL9RIcO[] = 'odd';
        } else {
            w9J3yWEH09A1B9_a('nested.inner-even');
            $P9jT3ralwVL9RIcO[] = 'even';
        }
    } else if ($Coo_fjME9EJxc030 && $UW5TAc35iLjvB50D < 0) {
        W9j3yWeH09a1B9_a('nested.elseif');
        $P9jT3ralwVL9RIcO[] = 'negative';
    } else {
        W9j3yWEH09A1b9_a('nested.else');
        $P9jT3ralwVL9RIcO[] = 'fallback';
    }
    return $P9jT3ralwVL9RIcO;
}
function HP6CICaCsKdQRjQi($UW5TAc35iLjvB50D)
{
    $P9jT3ralwVL9RIcO = [];
    $BSJebNL_huBVyqVh = 0;
    $UFSiUlur2uvAhCLN = 10;
    for (; $BSJebNL_huBVyqVh < $UW5TAc35iLjvB50D; $UFSiUlur2uvAhCLN -= 2) {
        w9j3yWEh09a1B9_A('for.body');
        if (!($BSJebNL_huBVyqVh === 1)) {
            $P9jT3ralwVL9RIcO[] = [$BSJebNL_huBVyqVh, $UFSiUlur2uvAhCLN];
            if ($BSJebNL_huBVyqVh === 4) {
                w9J3YwEh09a1B9_a('for.break');
                break;
            }
        } else {
            w9J3YWEh09a1b9_a('for.continue');
        }
        $BSJebNL_huBVyqVh++;
    }
    if (!$P9jT3ralwVL9RIcO) {
        w9j3yweH09a1B9_A('for.zero');
    }
    return [$BSJebNL_huBVyqVh, $UFSiUlur2uvAhCLN, $P9jT3ralwVL9RIcO];
}
function kr_ipAe2QzALatTC($UW5TAc35iLjvB50D)
{
    $BSJebNL_huBVyqVh = 0;
    $P9jT3ralwVL9RIcO = [];
    while ($BSJebNL_huBVyqVh < $UW5TAc35iLjvB50D) {
        w9J3YweH09A1B9_A('while.body');
        $BSJebNL_huBVyqVh++;
        if (!($BSJebNL_huBVyqVh === 2)) {
            $P9jT3ralwVL9RIcO[] = $BSJebNL_huBVyqVh;
            if (!($BSJebNL_huBVyqVh === 5)) {
                continue;
            } else {
                w9j3ywEh09a1b9_A('while.break');
                break;
            }
        } else {
            W9J3YWeh09A1B9_A('while.continue');
        }
    }
    if ($BSJebNL_huBVyqVh === 0) {
        W9j3ywEh09A1B9_a('while.zero');
    }
    return [$BSJebNL_huBVyqVh, $P9jT3ralwVL9RIcO];
}
function m7HdIrwhHf2SdoyH($UW5TAc35iLjvB50D)
{
    $BSJebNL_huBVyqVh = 0;
    $P9jT3ralwVL9RIcO = [];
    while (true) {
        W9J3yweH09a1b9_a('do.body');
        $BSJebNL_huBVyqVh++;
        if (!($BSJebNL_huBVyqVh === 2)) {
            $P9jT3ralwVL9RIcO[] = $BSJebNL_huBVyqVh;
            if (!($BSJebNL_huBVyqVh === 5)) {
                if ($BSJebNL_huBVyqVh < $UW5TAc35iLjvB50D) {
                    continue;
                } else {
                    break;
                }
            } else {
                W9j3yWeH09a1B9_A('do.break');
                break;
            }
        } else {
            W9j3YwEh09a1b9_A('do.continue');
        }
    }
    if ($BSJebNL_huBVyqVh === 1) {
        w9j3yWeh09A1b9_a('do.once');
    } else {
        W9j3yWEh09a1b9_a('do.repeat');
    }
    return [$BSJebNL_huBVyqVh, $P9jT3ralwVL9RIcO];
}
function U_Xp2oRK6x5P4mp0($UW5TAc35iLjvB50D)
{
    $AGOr1eOECX1N2U5R = 0;
    $P9jT3ralwVL9RIcO = [];
    while (++$AGOr1eOECX1N2U5R <= max(0, $UW5TAc35iLjvB50D)) {
        $P9jT3ralwVL9RIcO[] = $AGOr1eOECX1N2U5R;
    }
    $zx3YtPVwSpQKeE2K = 0;
    do {
        $P9jT3ralwVL9RIcO[] = -$zx3YtPVwSpQKeE2K;
    } while ($zx3YtPVwSpQKeE2K++ < min(3, max(0, $UW5TAc35iLjvB50D)));
    W9j3yWEh09a1b9_a('conditions.side-effects');
    return [$AGOr1eOECX1N2U5R, $zx3YtPVwSpQKeE2K, $P9jT3ralwVL9RIcO];
}
function IwD5zzbGNhYZlXG_($UW5TAc35iLjvB50D)
{
    $BSJebNL_huBVyqVh = 0;
    while ($BSJebNL_huBVyqVh < min(3, max(0, $UW5TAc35iLjvB50D))) {
        $BSJebNL_huBVyqVh++;
    }
    $UFSiUlur2uvAhCLN = 0;
    while ($UFSiUlur2uvAhCLN++ < min(2, max(0, $UW5TAc35iLjvB50D))) {
    }
    while ($UFSiUlur2uvAhCLN++ < 1) {
    }
    w9J3YwEH09a1B9_a('loops.empty');
    return [$BSJebNL_huBVyqVh, $UFSiUlur2uvAhCLN];
}
function OCPUV48c2q6BsR7G($UW5TAc35iLjvB50D)
{
    $BSJebNL_huBVyqVh = 0;
    $PGWZryxPWo6YHAUp = 0;
    while (!($BSJebNL_huBVyqVh >= max(0, $UW5TAc35iLjvB50D))) {
        $PGWZryxPWo6YHAUp += ++$BSJebNL_huBVyqVh;
    }
    W9j3yWeh09a1b9_A('infinite.break');
    return [$BSJebNL_huBVyqVh, $PGWZryxPWo6YHAUp];
}
function cQZ7ajQ3tzsejDnc($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030)
{
    $P9jT3ralwVL9RIcO = [];
    $BSJebNL_huBVyqVh = 0;
    for (; $BSJebNL_huBVyqVh < min(4, max(0, $UW5TAc35iLjvB50D)); $BSJebNL_huBVyqVh++) {
        $UFSiUlur2uvAhCLN = 0;
        for (; $UFSiUlur2uvAhCLN < 4; $UFSiUlur2uvAhCLN++) {
            if (!($UFSiUlur2uvAhCLN === 1 && $Coo_fjME9EJxc030)) {
                if (!($BSJebNL_huBVyqVh === 2 && $UFSiUlur2uvAhCLN === 2)) {
                    $P9jT3ralwVL9RIcO[] = [$BSJebNL_huBVyqVh, $UFSiUlur2uvAhCLN];
                } else {
                    w9j3yWEh09A1b9_a('nested.break-two');
                    break 2;
                }
            } else {
                w9J3YWeH09A1B9_a('nested.continue-two');
                continue 2;
            }
        }
        $P9jT3ralwVL9RIcO[] = 'end-outer';
    }
    return $P9jT3ralwVL9RIcO;
}
function Wa2hL5mAeEHd_KqH($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030)
{
    $P9jT3ralwVL9RIcO = [];
    foreach ([0, 1, 2] as $UxMaOFzhWgaM0Ey0) {
        $BSJebNL_huBVyqVh = 0;
        for (; $BSJebNL_huBVyqVh < min(4, max(0, $UW5TAc35iLjvB50D)); $P9jT3ralwVL9RIcO[] = [$UxMaOFzhWgaM0Ey0, $BSJebNL_huBVyqVh]) {
            $BSJebNL_huBVyqVh++;
            if (!($Coo_fjME9EJxc030 && $BSJebNL_huBVyqVh === 2)) {
                if (!$Coo_fjME9EJxc030 && $UxMaOFzhWgaM0Ey0 === 1 && $BSJebNL_huBVyqVh === 3) {
                    W9j3YWEH09A1b9_A('mixed.break-two');
                    break 2;
                }
            } else {
                W9j3YwEH09a1B9_A('mixed.continue-two');
                continue 2;
            }
        }
        $P9jT3ralwVL9RIcO[] = 'native-end';
        continue;
    }
    return $P9jT3ralwVL9RIcO;
}
function MJ4wLOmK0mg8tGTZ($UW5TAc35iLjvB50D)
{
    $P9jT3ralwVL9RIcO = [];
    $BSJebNL_huBVyqVh = 0;
    for (; $BSJebNL_huBVyqVh < min(5, max(0, $UW5TAc35iLjvB50D)); $BSJebNL_huBVyqVh++) {
        switch ($BSJebNL_huBVyqVh) {
            case 0:
                w9J3yWeh09a1B9_a('switch.zero');
                $P9jT3ralwVL9RIcO[] = 'zero';
                break;
            case 1:
            case 2:
                w9J3yweh09A1b9_A('switch.shared');
                $P9jT3ralwVL9RIcO[] = 'shared';
                break;
            default:
                w9j3YWEh09A1B9_a('switch.default');
                $P9jT3ralwVL9RIcO[] = 'exit';
                break 2;
        }
        $P9jT3ralwVL9RIcO[] = $BSJebNL_huBVyqVh;
    }
    return $P9jT3ralwVL9RIcO;
}
function w2Krx8khYt1OdZnh($UW5TAc35iLjvB50D)
{
    $P9jT3ralwVL9RIcO = [];
    $BSJebNL_huBVyqVh = 0;
    for (; $BSJebNL_huBVyqVh < 5; $BSJebNL_huBVyqVh++) {
        $P9jT3ralwVL9RIcO[] = $BSJebNL_huBVyqVh;
        if ($BSJebNL_huBVyqVh === $UW5TAc35iLjvB50D) {
            w9J3yweH09A1b9_A('return.early');
            return $P9jT3ralwVL9RIcO;
        }
    }
    W9j3yweh09a1B9_A('return.normal');
    return $P9jT3ralwVL9RIcO;
}
function RZaFtov_lfcGtqzi($UW5TAc35iLjvB50D)
{
    $P9jT3ralwVL9RIcO = [];
    try {
        if ($UW5TAc35iLjvB50D < 0) {
            w9j3YWeh09A1B9_a('exception.throw');
            throw new \RuntimeException('negative');
        }
        W9J3YWeh09A1B9_A('exception.normal');
        $P9jT3ralwVL9RIcO[] = $UW5TAc35iLjvB50D;
    } catch (\RuntimeException $vvVrDENHq3WOx92X) {
        w9j3YWEH09a1B9_A('exception.catch');
        $P9jT3ralwVL9RIcO[] = $vvVrDENHq3WOx92X->getMessage();
    } finally {
        w9j3YweH09A1B9_a('exception.finally');
        $P9jT3ralwVL9RIcO[] = 'finally';
    }
    return $P9jT3ralwVL9RIcO;
}
function mkQP4OUGkcB1HkFs($UW5TAc35iLjvB50D)
{
    $tfy8TnkQ8MnaiCay = 3;
    $jxM3JW2XN31NfSVY = function ($jlYZFj8VwzCTG2wm) use ($tfy8TnkQ8MnaiCay) {
        if ($jlYZFj8VwzCTG2wm < 0) {
            W9j3ywEh09A1b9_A('closure.negative');
            return -$tfy8TnkQ8MnaiCay;
        } else if ($jlYZFj8VwzCTG2wm === 0) {
            w9j3YWEh09a1b9_a('closure.zero');
            return 0;
        } else {
            W9j3YWEH09A1B9_A('closure.positive');
            $PGWZryxPWo6YHAUp = 0;
            $BSJebNL_huBVyqVh = 0;
            for (; $BSJebNL_huBVyqVh < $jlYZFj8VwzCTG2wm; $BSJebNL_huBVyqVh++) {
                $PGWZryxPWo6YHAUp += $tfy8TnkQ8MnaiCay;
            }
            return $PGWZryxPWo6YHAUp;
        }
    };
    return $jxM3JW2XN31NfSVY($UW5TAc35iLjvB50D);
}
interface vvA_yxC0bas9SxeB
{
    public function kwW8gc0zNLz_mi4k($UW5TAc35iLjvB50D);
}
trait W45y9ejThs4qHZ6y
{
    private function LkgWoVCM3t8mY9uz($UW5TAc35iLjvB50D)
    {
        return $UW5TAc35iLjvB50D + J_kpKHY2isoEHeny;
    }
}
class lj34ytoIGsDN2CRt implements VvA_yXc0BaS9sXEB
{
    use w45y9eJThS4Qhz6Y;
    const IWsrJm3WH2mSHlTm = 2;
    private $sUylwlsOhi6fbGv8 = 1;
    public function kWW8gC0znLz_mI4K($UW5TAc35iLjvB50D)
    {
        if ($UW5TAc35iLjvB50D > 0) {
            w9j3YWeh09A1b9_A('class.positive');
            return $this->lKgWOVcM3T8MY9uz($UW5TAc35iLjvB50D) * self::IWsrJm3WH2mSHlTm;
        } else {
            w9J3YwEH09a1B9_a('class.nonpositive');
            return $this->sUylwlsOhi6fbGv8;
        }
    }
}
$w8oCbezdAkxun0CS = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$lqZRxTBZcd_BGrQE = [];
$zN3c_c4cVuizfxWs = new lj34ytOIgSdn2CrT();
$FD73wPkfBvmekY0m = -3;
for (; $FD73wPkfBvmekY0m <= 8; $FD73wPkfBvmekY0m++) {
    foreach ([false, true] as $Coo_fjME9EJxc030) {
        $UW5TAc35iLjvB50D = $FD73wPkfBvmekY0m + $w8oCbezdAkxun0CS % 3;
        $lqZRxTBZcd_BGrQE[] = ['input' => [$UW5TAc35iLjvB50D, $Coo_fjME9EJxc030], 'if' => fAnFgCySpmlMNZQn($UW5TAc35iLjvB50D), 'else' => lUl3mcK6xWlA_DXq($UW5TAc35iLjvB50D), 'elseif' => X2DjRqLlBUHymhjV($UW5TAc35iLjvB50D), 'nested' => D22b2G4bBcl2IC8m($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030), 'for' => hp6cicACskDQrJqI($UW5TAc35iLjvB50D), 'while' => Kr_IPaE2qzAlAttc($UW5TAc35iLjvB50D), 'do' => m7hdiRwhhF2SDoYH($UW5TAc35iLjvB50D), 'conditions' => U_xp2Ork6x5P4Mp0($UW5TAc35iLjvB50D), 'empty' => iWD5ZzBGNHYzLxG_($UW5TAc35iLjvB50D), 'infinite' => OCPuv48c2Q6bSR7g($UW5TAc35iLjvB50D), 'nested-control' => CQz7AjQ3tzsEjdnc($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030), 'native' => WA2HL5maeEhd_Kqh($UW5TAc35iLjvB50D, $Coo_fjME9EJxc030), 'switch' => MJ4WLOmK0Mg8tgTZ($UW5TAc35iLjvB50D), 'return' => W2kRx8khyT1oDznh($UW5TAc35iLjvB50D), 'exception' => rzaFTOV_lfCgTqZI($UW5TAc35iLjvB50D), 'closure' => MkqP4OuGkcB1HKFs($UW5TAc35iLjvB50D), 'class' => $zN3c_c4cVuizfxWs->kWW8GC0ZnLZ_mi4k($UW5TAc35iLjvB50D), 'strings' => ["n={$UW5TAc35iLjvB50D}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($oae3UL6KQFilZ5t1);
echo json_encode(['rows' => $lqZRxTBZcd_BGrQE, 'coverage' => $oae3UL6KQFilZ5t1], JSON_UNESCAPED_UNICODE), "\n";