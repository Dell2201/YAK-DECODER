<?php

namespace OxsAqG0QKfOCWVds;

const qJRA0ok5NlVBNj2G = 7;
$SFiWcNThOsYrQFa3 = [];
function HuMf48aVO7a5em_C($zwRvIE3mlswTOD4J)
{
    global $SFiWcNThOsYrQFa3;
    $SFiWcNThOsYrQFa3[$zwRvIE3mlswTOD4J] = isset($SFiWcNThOsYrQFa3[$zwRvIE3mlswTOD4J]) ? $SFiWcNThOsYrQFa3[$zwRvIE3mlswTOD4J] + 1 : 1;
}
function FVB9PeaZhodefi5r($tfqhN3VWR0_XxnZ9)
{
    $zbvf13fzqbqSjtKs = 0;
    if ($tfqhN3VWR0_XxnZ9 > 0) {
        HUmF48AVo7a5eM_c('if.true');
        $zbvf13fzqbqSjtKs = $tfqhN3VWR0_XxnZ9 * 2;
    }
    if ($tfqhN3VWR0_XxnZ9 <= 0) {
        hUMF48AvO7A5EM_c('if.false-path');
    }
    return $zbvf13fzqbqSjtKs;
}
function Dy3ybXzPTTGZICS4($tfqhN3VWR0_XxnZ9)
{
    if ($tfqhN3VWR0_XxnZ9 % 2 === 0) {
        hUMf48avO7A5em_C('else.then');
        return 'even';
    } else {
        HUmF48aVo7a5em_c('else.else');
        return 'odd';
    }
}
function lqQlPJkbV281Hirc($tfqhN3VWR0_XxnZ9)
{
    if ($tfqhN3VWR0_XxnZ9 < 0) {
        huMF48AVo7A5Em_C('elseif.negative');
        return -1;
    } else if ($tfqhN3VWR0_XxnZ9 === 0) {
        HuMF48aVO7A5EM_C('elseif.zero');
        return 0;
    } else if ($tfqhN3VWR0_XxnZ9 < 3) {
        hUMf48avo7a5EM_C('elseif.small');
        return 1;
    } else {
        hUMF48avO7a5Em_c('elseif.large');
        return 2;
    }
}
function vP0YMbu8TxtZhlGK($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P)
{
    $s2y110ipnGOavKVd = [];
    if ($tfqhN3VWR0_XxnZ9 > 0 && ($r3VywVAaFFt0mI5P || $tfqhN3VWR0_XxnZ9 > 3)) {
        HUMF48AvO7a5Em_C('nested.outer-true');
        $s2y110ipnGOavKVd[] = 'outer';
        if ($tfqhN3VWR0_XxnZ9 % 2) {
            HuMf48avO7a5em_C('nested.inner-odd');
            $s2y110ipnGOavKVd[] = 'odd';
        } else {
            humf48aVO7A5EM_c('nested.inner-even');
            $s2y110ipnGOavKVd[] = 'even';
        }
    } else if ($r3VywVAaFFt0mI5P && $tfqhN3VWR0_XxnZ9 < 0) {
        hUMF48avo7a5Em_C('nested.elseif');
        $s2y110ipnGOavKVd[] = 'negative';
    } else {
        HumF48avO7a5Em_c('nested.else');
        $s2y110ipnGOavKVd[] = 'fallback';
    }
    return $s2y110ipnGOavKVd;
}
function Fh1HVfmuV2nHKzQb($tfqhN3VWR0_XxnZ9)
{
    $s2y110ipnGOavKVd = [];
    $F0OkZAzO3u9OsSLB = 0;
    $iH1829zGTqwgZ21b = 10;
    for (; $F0OkZAzO3u9OsSLB < $tfqhN3VWR0_XxnZ9; $iH1829zGTqwgZ21b -= 2) {
        huMf48avO7a5em_C('for.body');
        if (!($F0OkZAzO3u9OsSLB === 1)) {
            $s2y110ipnGOavKVd[] = [$F0OkZAzO3u9OsSLB, $iH1829zGTqwgZ21b];
            if ($F0OkZAzO3u9OsSLB === 4) {
                HUMf48aVO7A5Em_C('for.break');
                break;
            }
        } else {
            humf48avO7A5Em_C('for.continue');
        }
        $F0OkZAzO3u9OsSLB++;
    }
    if (!$s2y110ipnGOavKVd) {
        HumF48avo7A5em_c('for.zero');
    }
    return [$F0OkZAzO3u9OsSLB, $iH1829zGTqwgZ21b, $s2y110ipnGOavKVd];
}
function cW1pLgh8peKFvyXP($tfqhN3VWR0_XxnZ9)
{
    $F0OkZAzO3u9OsSLB = 0;
    $s2y110ipnGOavKVd = [];
    while ($F0OkZAzO3u9OsSLB < $tfqhN3VWR0_XxnZ9) {
        hUmF48avo7a5em_C('while.body');
        $F0OkZAzO3u9OsSLB++;
        if (!($F0OkZAzO3u9OsSLB === 2)) {
            $s2y110ipnGOavKVd[] = $F0OkZAzO3u9OsSLB;
            if (!($F0OkZAzO3u9OsSLB === 5)) {
                continue;
            } else {
                humF48AVO7a5EM_C('while.break');
                break;
            }
        } else {
            HUmF48aVo7a5em_C('while.continue');
        }
    }
    if ($F0OkZAzO3u9OsSLB === 0) {
        Humf48Avo7a5Em_c('while.zero');
    }
    return [$F0OkZAzO3u9OsSLB, $s2y110ipnGOavKVd];
}
function eBsZszsSPG1Q_ZVa($tfqhN3VWR0_XxnZ9)
{
    $F0OkZAzO3u9OsSLB = 0;
    $s2y110ipnGOavKVd = [];
    while (true) {
        humF48avo7A5em_C('do.body');
        $F0OkZAzO3u9OsSLB++;
        if (!($F0OkZAzO3u9OsSLB === 2)) {
            $s2y110ipnGOavKVd[] = $F0OkZAzO3u9OsSLB;
            if (!($F0OkZAzO3u9OsSLB === 5)) {
                if ($F0OkZAzO3u9OsSLB < $tfqhN3VWR0_XxnZ9) {
                    continue;
                } else {
                    break;
                }
            } else {
                HumF48avo7a5em_c('do.break');
                break;
            }
        } else {
            HumF48AVO7A5EM_c('do.continue');
        }
    }
    if ($F0OkZAzO3u9OsSLB === 1) {
        huMf48AVO7a5eM_c('do.once');
    } else {
        huMf48aVO7A5eM_c('do.repeat');
    }
    return [$F0OkZAzO3u9OsSLB, $s2y110ipnGOavKVd];
}
function AsPGtKhUoexlfufD($tfqhN3VWR0_XxnZ9)
{
    $C125fbT5rsPj4hXN = 0;
    $s2y110ipnGOavKVd = [];
    while (++$C125fbT5rsPj4hXN <= max(0, $tfqhN3VWR0_XxnZ9)) {
        $s2y110ipnGOavKVd[] = $C125fbT5rsPj4hXN;
    }
    $rt3btntozreLVkka = 0;
    do {
        $s2y110ipnGOavKVd[] = -$rt3btntozreLVkka;
    } while ($rt3btntozreLVkka++ < min(3, max(0, $tfqhN3VWR0_XxnZ9)));
    huMF48AVo7A5Em_C('conditions.side-effects');
    return [$C125fbT5rsPj4hXN, $rt3btntozreLVkka, $s2y110ipnGOavKVd];
}
function ZYh0KeQZLy7QbD1J($tfqhN3VWR0_XxnZ9)
{
    $F0OkZAzO3u9OsSLB = 0;
    while ($F0OkZAzO3u9OsSLB < min(3, max(0, $tfqhN3VWR0_XxnZ9))) {
        $F0OkZAzO3u9OsSLB++;
    }
    $iH1829zGTqwgZ21b = 0;
    while ($iH1829zGTqwgZ21b++ < min(2, max(0, $tfqhN3VWR0_XxnZ9))) {
    }
    while ($iH1829zGTqwgZ21b++ < 1) {
    }
    hUmf48Avo7A5EM_c('loops.empty');
    return [$F0OkZAzO3u9OsSLB, $iH1829zGTqwgZ21b];
}
function B8422C8S1QxpvK_6($tfqhN3VWR0_XxnZ9)
{
    $F0OkZAzO3u9OsSLB = 0;
    $nHCOykj5EmeUHHk4 = 0;
    while (!($F0OkZAzO3u9OsSLB >= max(0, $tfqhN3VWR0_XxnZ9))) {
        $nHCOykj5EmeUHHk4 += ++$F0OkZAzO3u9OsSLB;
    }
    hUMF48Avo7A5eM_c('infinite.break');
    return [$F0OkZAzO3u9OsSLB, $nHCOykj5EmeUHHk4];
}
function gm9hvWwJoRqLJ2qx($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P)
{
    $s2y110ipnGOavKVd = [];
    $F0OkZAzO3u9OsSLB = 0;
    for (; $F0OkZAzO3u9OsSLB < min(4, max(0, $tfqhN3VWR0_XxnZ9)); $F0OkZAzO3u9OsSLB++) {
        $iH1829zGTqwgZ21b = 0;
        for (; $iH1829zGTqwgZ21b < 4; $iH1829zGTqwgZ21b++) {
            if (!($iH1829zGTqwgZ21b === 1 && $r3VywVAaFFt0mI5P)) {
                if (!($F0OkZAzO3u9OsSLB === 2 && $iH1829zGTqwgZ21b === 2)) {
                    $s2y110ipnGOavKVd[] = [$F0OkZAzO3u9OsSLB, $iH1829zGTqwgZ21b];
                } else {
                    HUMF48aVO7a5eM_c('nested.break-two');
                    break 2;
                }
            } else {
                hUMF48aVO7A5EM_c('nested.continue-two');
                continue 2;
            }
        }
        $s2y110ipnGOavKVd[] = 'end-outer';
    }
    return $s2y110ipnGOavKVd;
}
function ii4XZWDhSi7A7h6Y($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P)
{
    $s2y110ipnGOavKVd = [];
    foreach ([0, 1, 2] as $hzV1o6clGBMjeCCY) {
        $F0OkZAzO3u9OsSLB = 0;
        for (; $F0OkZAzO3u9OsSLB < min(4, max(0, $tfqhN3VWR0_XxnZ9)); $s2y110ipnGOavKVd[] = [$hzV1o6clGBMjeCCY, $F0OkZAzO3u9OsSLB]) {
            $F0OkZAzO3u9OsSLB++;
            if (!($r3VywVAaFFt0mI5P && $F0OkZAzO3u9OsSLB === 2)) {
                if (!$r3VywVAaFFt0mI5P && $hzV1o6clGBMjeCCY === 1 && $F0OkZAzO3u9OsSLB === 3) {
                    hUmf48Avo7a5em_C('mixed.break-two');
                    break 2;
                }
            } else {
                hUmF48AVo7a5eM_c('mixed.continue-two');
                continue 2;
            }
        }
        $s2y110ipnGOavKVd[] = 'native-end';
        continue;
    }
    return $s2y110ipnGOavKVd;
}
function bhdVAPE401TnbFMo($tfqhN3VWR0_XxnZ9)
{
    $s2y110ipnGOavKVd = [];
    $F0OkZAzO3u9OsSLB = 0;
    for (; $F0OkZAzO3u9OsSLB < min(5, max(0, $tfqhN3VWR0_XxnZ9)); $F0OkZAzO3u9OsSLB++) {
        switch ($F0OkZAzO3u9OsSLB) {
            case 0:
                hUmf48AvO7a5em_c('switch.zero');
                $s2y110ipnGOavKVd[] = 'zero';
                break;
            case 1:
            case 2:
                hUmf48avO7A5eM_C('switch.shared');
                $s2y110ipnGOavKVd[] = 'shared';
                break;
            default:
                HUmf48avo7a5Em_C('switch.default');
                $s2y110ipnGOavKVd[] = 'exit';
                break 2;
        }
        $s2y110ipnGOavKVd[] = $F0OkZAzO3u9OsSLB;
    }
    return $s2y110ipnGOavKVd;
}
function a92k4art8WEI7Qny($tfqhN3VWR0_XxnZ9)
{
    $s2y110ipnGOavKVd = [];
    $F0OkZAzO3u9OsSLB = 0;
    for (; $F0OkZAzO3u9OsSLB < 5; $F0OkZAzO3u9OsSLB++) {
        $s2y110ipnGOavKVd[] = $F0OkZAzO3u9OsSLB;
        if ($F0OkZAzO3u9OsSLB === $tfqhN3VWR0_XxnZ9) {
            HUmf48AVO7a5EM_C('return.early');
            return $s2y110ipnGOavKVd;
        }
    }
    hUmF48AVO7A5eM_C('return.normal');
    return $s2y110ipnGOavKVd;
}
function IH79LHxf2H0_Abjn($tfqhN3VWR0_XxnZ9)
{
    $s2y110ipnGOavKVd = [];
    try {
        if (!($tfqhN3VWR0_XxnZ9 < 0)) {
            HUmF48aVO7a5EM_c('exception.normal');
            $s2y110ipnGOavKVd[] = $tfqhN3VWR0_XxnZ9;
        } else {
            HUMf48AVo7a5em_C('exception.throw');
            throw new \RuntimeException('negative');
        }
    } catch (\RuntimeException $jo3S0orNpAYx3sad) {
        HuMf48aVO7A5Em_C('exception.catch');
        $s2y110ipnGOavKVd[] = $jo3S0orNpAYx3sad->getMessage();
    } finally {
        huMF48AvO7a5Em_c('exception.finally');
        $s2y110ipnGOavKVd[] = 'finally';
    }
    return $s2y110ipnGOavKVd;
}
function tD6XVMevrOrWC3zO($tfqhN3VWR0_XxnZ9)
{
    $zwLFS0YgOu4Mbpty = 3;
    $XP2J_0_zhZFNyePc = function ($lZ2bDoIJt2eUvJRp) use ($zwLFS0YgOu4Mbpty) {
        if ($lZ2bDoIJt2eUvJRp < 0) {
            hUmF48AvO7a5eM_C('closure.negative');
            return -$zwLFS0YgOu4Mbpty;
        } else if ($lZ2bDoIJt2eUvJRp === 0) {
            huMf48aVo7A5eM_c('closure.zero');
            return 0;
        } else {
            Humf48Avo7A5eM_C('closure.positive');
            $nHCOykj5EmeUHHk4 = 0;
            $F0OkZAzO3u9OsSLB = 0;
            for (; $F0OkZAzO3u9OsSLB < $lZ2bDoIJt2eUvJRp; $F0OkZAzO3u9OsSLB++) {
                $nHCOykj5EmeUHHk4 += $zwLFS0YgOu4Mbpty;
            }
            return $nHCOykj5EmeUHHk4;
        }
    };
    return $XP2J_0_zhZFNyePc($tfqhN3VWR0_XxnZ9);
}
interface OEwTVlIXBvA0bWdi
{
    public function QqHt2mDFyhDwvW0C($tfqhN3VWR0_XxnZ9);
}
trait ZmrYp7m4rsA0gRor
{
    private function JWuWZOCv10ItEree($tfqhN3VWR0_XxnZ9)
    {
        return $tfqhN3VWR0_XxnZ9 + qJRA0ok5NlVBNj2G;
    }
}
class EsvCcAt7Jw0BKakZ implements OEWTvlixBVA0bWDi
{
    use ZMRYp7m4rsa0GroR;
    const HCNJVs9WzHjJc4Pa = 2;
    private $PJiyyaEYvSG9UU1u = 1;
    public function QQht2mdfyhDWVW0C($tfqhN3VWR0_XxnZ9)
    {
        if ($tfqhN3VWR0_XxnZ9 > 0) {
            HuMF48avO7a5EM_c('class.positive');
            return $this->JwuWZOCv10iTeree($tfqhN3VWR0_XxnZ9) * self::HCNJVs9WzHjJc4Pa;
        } else {
            hUmf48AVo7A5eM_C('class.nonpositive');
            return $this->PJiyyaEYvSG9UU1u;
        }
    }
}
enum Phase81 : string
{
    case Ready = 'ready';
    case Done = 'done';
}
interface Po6In3MhfpLh7FMV
{
    public function faZU9bG_nWeWcdHd(): int;
}
interface ZOv4MnM8QpMrCnBF
{
    public function bUkmxnOBK8e0lgre(): int;
}
final class unvvvX8k_qRPNtm6 implements pO6in3MhfpLH7fMv, ZoV4mNM8QpmrcnBF
{
    public function __construct(public readonly int $lZ2bDoIJt2eUvJRp)
    {
    }
    public function fAZU9bG_nweWcdHD(): int
    {
        return $this->value;
    }
    public function BukMxnobk8E0LGRE(): int
    {
        return $this->value + 1;
    }
}
function qUwYEVB9_fl6GNMX(Left81&Right81 $kN1BYsppLK1jkpU1): int
{
    return $kN1BYsppLK1jkpU1->FAzu9BG_nWewCdHd() + $kN1BYsppLK1jkpU1->bUKmXnoBK8E0lGre();
}
function P8qqM3PhrAkUeIWs($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P)
{
    goto BCsfg4jj9d1vmbN4;
    csQt1BD4bdIE38yp:
    jLEPX3zo8jJxL0Zj:
    goto NjmJXISaWLwFAte1;
    dEsXIwZazmJv7Gq9:
    BQeRF0fxTfnUR2mB:
    goto UBb8xHjRqyd9PiF0;
    VTT6KZOoeW0Xlwvz:
    try {
        $SBAu43DazrhbInqc = match (($tfqhN3VWR0_XxnZ9 + $F0OkZAzO3u9OsSLB) % 3) {
            0 => vmhA0Ps90oW3D4vF::THd_J34ghDzpHkbb,
            default => VmHa0PS90ow3d4vf::Cc_1NfGziKqu1K9z,
        };
        foreach ([0, 1, 2] as $iH1829zGTqwgZ21b) {
            goto gaTSvCwSk7DWSSHC;
            CYPkhN5320gmtLIA:
            goto BQeRF0fxTfnUR2mB;
            goto zRcXCqnHwK_5NLRW;
            FWgRhE5lxPjQMB5K:
            JtltsGq3hA_rr1zs:
            goto Swo6AHSofIHniel0;
            oKedw2KNCMP1v6dg:
            if (!(!$r3VywVAaFFt0mI5P && $F0OkZAzO3u9OsSLB === 2 && $iH1829zGTqwgZ21b === 2)) {
                goto Y2nnwicbI2fmgcgT;
            }
            goto OEsd8cremho2n3qU;
            zRcXCqnHwK_5NLRW:
            UYwSdFLo0eWQbN3O:
            goto oKedw2KNCMP1v6dg;
            QGQ0zG10M6IEo89y:
            goto bHoIaFlXJDaa00xi;
            goto vreAa8U0YlvGwP9u;
            IOMQLgyAN5qGhOav:
            $s2y110ipnGOavKVd[] = [$SBAu43DazrhbInqc->value, $Yw8xYwNX3j9R2VM5($kN1BYsppLK1jkpU1), ++$MMkn6XS9nk_pqrNY, $F0OkZAzO3u9OsSLB, $iH1829zGTqwgZ21b];
            goto FWgRhE5lxPjQMB5K;
            OEsd8cremho2n3qU:
            HUMF48Avo7A5EM_C('v81.break2');
            goto QGQ0zG10M6IEo89y;
            gaTSvCwSk7DWSSHC:
            if (!($r3VywVAaFFt0mI5P && $iH1829zGTqwgZ21b === 1)) {
                goto UYwSdFLo0eWQbN3O;
            }
            goto abCvA_nBNjTZ9cR4;
            abCvA_nBNjTZ9cR4:
            HumF48avo7a5EM_C('v81.continue2');
            goto CYPkhN5320gmtLIA;
            vreAa8U0YlvGwP9u:
            Y2nnwicbI2fmgcgT:
            goto IOMQLgyAN5qGhOav;
            Swo6AHSofIHniel0:
        }
    } finally {
        humf48AVO7A5em_C('v81.finally');
        $s2y110ipnGOavKVd[] = ['finally', $F0OkZAzO3u9OsSLB];
    }
    goto dEsXIwZazmJv7Gq9;
    UBb8xHjRqyd9PiF0:
    $F0OkZAzO3u9OsSLB++;
    goto kb71Nnma6cZfnJ0p;
    LJx2BaRyzkVCkTrA:
    $MMkn6XS9nk_pqrNY = 0;
    goto rQm15SJwxdkHxJqR;
    kb71Nnma6cZfnJ0p:
    goto jLEPX3zo8jJxL0Zj;
    goto pJuvmksuWhb0ehuR;
    rQm15SJwxdkHxJqR:
    $F0OkZAzO3u9OsSLB = 0;
    goto csQt1BD4bdIE38yp;
    BCsfg4jj9d1vmbN4:
    $kN1BYsppLK1jkpU1 = new UnVvvx8K_QrPNTm6($tfqhN3VWR0_XxnZ9);
    goto qHov3tfWnjjWfnvt;
    NjmJXISaWLwFAte1:
    if (!($F0OkZAzO3u9OsSLB < 4)) {
        goto bHoIaFlXJDaa00xi;
    }
    goto VTT6KZOoeW0Xlwvz;
    GMRcVxoLhQL2P8zs:
    $s2y110ipnGOavKVd = [];
    goto LJx2BaRyzkVCkTrA;
    pJuvmksuWhb0ehuR:
    bHoIaFlXJDaa00xi:
    goto aBncWWvrVFrb4Q95;
    aBncWWvrVFrb4Q95:
    return [$s2y110ipnGOavKVd, $MMkn6XS9nk_pqrNY];
    goto T5nK9qpMDdE1N4YZ;
    qHov3tfWnjjWfnvt:
    $Yw8xYwNX3j9R2VM5 = quWYevB9_FL6gNMX(...);
    goto GMRcVxoLhQL2P8zs;
    T5nK9qpMDdE1N4YZ:
}
$f2kXvOCymvmuX2tZ = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$yE7N1AfVFu0Ba_Sl = [];
$kJGK9bKiWMbsxjkz = new esVcCAT7jW0bkAKz();
$PlJ5SxuI7OCxkVp7 = -3;
for (; $PlJ5SxuI7OCxkVp7 <= 8; $PlJ5SxuI7OCxkVp7++) {
    foreach ([false, true] as $r3VywVAaFFt0mI5P) {
        $tfqhN3VWR0_XxnZ9 = $PlJ5SxuI7OCxkVp7 + $f2kXvOCymvmuX2tZ % 3;
        $yE7N1AfVFu0Ba_Sl[] = ['input' => [$tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P], 'version-feature' => P8qqm3pHraKueiWS($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P), 'if' => Fvb9PeAzhODeFI5R($tfqhN3VWR0_XxnZ9), 'else' => DY3YBxZpTtgzics4($tfqhN3VWR0_XxnZ9), 'elseif' => LqqLPJkbv281hIrC($tfqhN3VWR0_XxnZ9), 'nested' => VP0YMBu8txTZHLgk($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P), 'for' => Fh1HvFMUV2nHKZqB($tfqhN3VWR0_XxnZ9), 'while' => Cw1PLGH8pekFvyXp($tfqhN3VWR0_XxnZ9), 'do' => EBSZSzSspG1q_zVA($tfqhN3VWR0_XxnZ9), 'conditions' => aSpGtkHUoExlFUfD($tfqhN3VWR0_XxnZ9), 'empty' => ZYh0keQzLY7qbd1j($tfqhN3VWR0_XxnZ9), 'infinite' => b8422c8S1qxPvK_6($tfqhN3VWR0_XxnZ9), 'nested-control' => gM9hvwwjOrQLj2qx($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P), 'native' => iI4XzWDHSI7a7h6y($tfqhN3VWR0_XxnZ9, $r3VywVAaFFt0mI5P), 'switch' => BhDvApE401tnbfMo($tfqhN3VWR0_XxnZ9), 'return' => a92K4ART8WEi7qny($tfqhN3VWR0_XxnZ9), 'exception' => IH79LhxF2H0_ABjn($tfqhN3VWR0_XxnZ9), 'closure' => Td6XVMevrorWC3ZO($tfqhN3VWR0_XxnZ9), 'class' => $kJGK9bKiWMbsxjkz->qqhT2mDfyHdWvw0C($tfqhN3VWR0_XxnZ9), 'strings' => ["n={$tfqhN3VWR0_XxnZ9}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($SFiWcNThOsYrQFa3);
echo json_encode(['rows' => $yE7N1AfVFu0Ba_Sl, 'coverage' => $SFiWcNThOsYrQFa3], JSON_UNESCAPED_UNICODE), "\n";