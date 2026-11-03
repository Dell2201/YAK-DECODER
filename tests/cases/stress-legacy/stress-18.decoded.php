<?php

namespace d7XPd_l9ryMcUOUH;

const IdH5BqLn6wgW4Wub = 7;
$aa52r82G4ddU6cP0 = [];
function AFatKpWvIu_dwo5V($jStgIrPFixVM3_xT)
{
    global $aa52r82G4ddU6cP0;
    $aa52r82G4ddU6cP0[$jStgIrPFixVM3_xT] = isset($aa52r82G4ddU6cP0[$jStgIrPFixVM3_xT]) ? $aa52r82G4ddU6cP0[$jStgIrPFixVM3_xT] + 1 : 1;
}
function Ada5Nqrr6i0NcaYI($nR4FWlMzNN95qbfL)
{
    $CmYtynOFcKs33Y3_ = 0;
    if ($nR4FWlMzNN95qbfL > 0) {
        AFAtKpwvIu_dWO5V('if.true');
        $CmYtynOFcKs33Y3_ = $nR4FWlMzNN95qbfL * 2;
    }
    if ($nR4FWlMzNN95qbfL <= 0) {
        aFATkpWviU_DWo5V('if.false-path');
    }
    return $CmYtynOFcKs33Y3_;
}
function qg_cZ7HVAjBzhGnZ($nR4FWlMzNN95qbfL)
{
    if ($nR4FWlMzNN95qbfL % 2 === 0) {
        AFATKpwviU_dWo5v('else.then');
        return 'even';
    } else {
        AfAtKpwviU_DWO5v('else.else');
        return 'odd';
    }
}
function QDNq6SwmNBGpNwnt($nR4FWlMzNN95qbfL)
{
    if ($nR4FWlMzNN95qbfL < 0) {
        AFAtkpwVIU_DWO5V('elseif.negative');
        return -1;
    } else if ($nR4FWlMzNN95qbfL === 0) {
        AfAtkPwVIU_dWo5v('elseif.zero');
        return 0;
    } else if ($nR4FWlMzNN95qbfL < 3) {
        afATKpwviu_DwO5V('elseif.small');
        return 1;
    } else {
        aFAtKPWVIU_dwO5v('elseif.large');
        return 2;
    }
}
function fGmEWta5aAnPMnnI($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq)
{
    $e7wNOoWNA0kbFMEg = [];
    if ($nR4FWlMzNN95qbfL > 0 && ($jb3FuJzU8pCDc9bq || $nR4FWlMzNN95qbfL > 3)) {
        afAtkpwViu_dWo5v('nested.outer-true');
        $e7wNOoWNA0kbFMEg[] = 'outer';
        if ($nR4FWlMzNN95qbfL % 2) {
            afatKpWViU_dWo5v('nested.inner-odd');
            $e7wNOoWNA0kbFMEg[] = 'odd';
        } else {
            aFatkpWviu_Dwo5v('nested.inner-even');
            $e7wNOoWNA0kbFMEg[] = 'even';
        }
    } else if ($jb3FuJzU8pCDc9bq && $nR4FWlMzNN95qbfL < 0) {
        AfATkpwVIu_Dwo5V('nested.elseif');
        $e7wNOoWNA0kbFMEg[] = 'negative';
    } else {
        aFatKPWViU_dWO5v('nested.else');
        $e7wNOoWNA0kbFMEg[] = 'fallback';
    }
    return $e7wNOoWNA0kbFMEg;
}
function QbTKmjCefTJPcGhx($nR4FWlMzNN95qbfL)
{
    $e7wNOoWNA0kbFMEg = [];
    $vpB3pGCu6yEXzfgt = 0;
    $OlCTPzxQ_owsxyfz = 10;
    for (; $vpB3pGCu6yEXzfgt < $nR4FWlMzNN95qbfL; $OlCTPzxQ_owsxyfz -= 2) {
        AFATKpWViU_dwO5v('for.body');
        if (!($vpB3pGCu6yEXzfgt === 1)) {
            $e7wNOoWNA0kbFMEg[] = [$vpB3pGCu6yEXzfgt, $OlCTPzxQ_owsxyfz];
            if ($vpB3pGCu6yEXzfgt === 4) {
                afaTkPwViU_dWO5v('for.break');
                break;
            }
        } else {
            afAtkpWvIu_Dwo5V('for.continue');
        }
        $vpB3pGCu6yEXzfgt++;
    }
    if (!$e7wNOoWNA0kbFMEg) {
        afaTKPwViU_dwO5V('for.zero');
    }
    return [$vpB3pGCu6yEXzfgt, $OlCTPzxQ_owsxyfz, $e7wNOoWNA0kbFMEg];
}
function YNTPPutP7MgMnEB5($nR4FWlMzNN95qbfL)
{
    $vpB3pGCu6yEXzfgt = 0;
    $e7wNOoWNA0kbFMEg = [];
    while ($vpB3pGCu6yEXzfgt < $nR4FWlMzNN95qbfL) {
        afaTKpWVIu_dwo5V('while.body');
        $vpB3pGCu6yEXzfgt++;
        if (!($vpB3pGCu6yEXzfgt === 2)) {
            $e7wNOoWNA0kbFMEg[] = $vpB3pGCu6yEXzfgt;
            if (!($vpB3pGCu6yEXzfgt === 5)) {
                continue;
            } else {
                afATKPWViU_DwO5V('while.break');
                break;
            }
        } else {
            afATkpWviU_DWO5V('while.continue');
        }
    }
    if ($vpB3pGCu6yEXzfgt === 0) {
        AFAtKPWvIU_DWo5V('while.zero');
    }
    return [$vpB3pGCu6yEXzfgt, $e7wNOoWNA0kbFMEg];
}
function z29qy1YKjLeU2Yvl($nR4FWlMzNN95qbfL)
{
    $vpB3pGCu6yEXzfgt = 0;
    $e7wNOoWNA0kbFMEg = [];
    while (true) {
        AFATkpWViU_Dwo5V('do.body');
        $vpB3pGCu6yEXzfgt++;
        if (!($vpB3pGCu6yEXzfgt === 2)) {
            $e7wNOoWNA0kbFMEg[] = $vpB3pGCu6yEXzfgt;
            if (!($vpB3pGCu6yEXzfgt === 5)) {
                if ($vpB3pGCu6yEXzfgt < $nR4FWlMzNN95qbfL) {
                    continue;
                } else {
                    break;
                }
            } else {
                aFAtkpwVIu_DWO5v('do.break');
                break;
            }
        } else {
            AfaTKPwvIu_DWo5V('do.continue');
        }
    }
    if ($vpB3pGCu6yEXzfgt === 1) {
        AfATkPwVIU_dWo5v('do.once');
    } else {
        afATkPWViu_dwO5v('do.repeat');
    }
    return [$vpB3pGCu6yEXzfgt, $e7wNOoWNA0kbFMEg];
}
function KjVfpJA_UdakCFsk($nR4FWlMzNN95qbfL)
{
    $DS0E2w_XJhTWnIuv = 0;
    $e7wNOoWNA0kbFMEg = [];
    while (++$DS0E2w_XJhTWnIuv <= max(0, $nR4FWlMzNN95qbfL)) {
        $e7wNOoWNA0kbFMEg[] = $DS0E2w_XJhTWnIuv;
    }
    $igRuSs9QfZdZCfwJ = 0;
    do {
        $e7wNOoWNA0kbFMEg[] = -$igRuSs9QfZdZCfwJ;
    } while ($igRuSs9QfZdZCfwJ++ < min(3, max(0, $nR4FWlMzNN95qbfL)));
    aFAtKPwVIU_dWo5v('conditions.side-effects');
    return [$DS0E2w_XJhTWnIuv, $igRuSs9QfZdZCfwJ, $e7wNOoWNA0kbFMEg];
}
function ChPW7TDrTijt2ok0($nR4FWlMzNN95qbfL)
{
    $vpB3pGCu6yEXzfgt = 0;
    while ($vpB3pGCu6yEXzfgt < min(3, max(0, $nR4FWlMzNN95qbfL))) {
        $vpB3pGCu6yEXzfgt++;
    }
    $OlCTPzxQ_owsxyfz = 0;
    while ($OlCTPzxQ_owsxyfz++ < min(2, max(0, $nR4FWlMzNN95qbfL))) {
    }
    while ($OlCTPzxQ_owsxyfz++ < 1) {
    }
    AfaTkPwvIU_DwO5v('loops.empty');
    return [$vpB3pGCu6yEXzfgt, $OlCTPzxQ_owsxyfz];
}
function YXiqnptrwNIWvjDZ($nR4FWlMzNN95qbfL)
{
    $vpB3pGCu6yEXzfgt = 0;
    $wi_l5TrjRRGhexrp = 0;
    while (!($vpB3pGCu6yEXzfgt >= max(0, $nR4FWlMzNN95qbfL))) {
        $wi_l5TrjRRGhexrp += ++$vpB3pGCu6yEXzfgt;
    }
    aFAtKPWvIu_DWO5v('infinite.break');
    return [$vpB3pGCu6yEXzfgt, $wi_l5TrjRRGhexrp];
}
function GXSyvwABVUgDTEAj($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq)
{
    $e7wNOoWNA0kbFMEg = [];
    $vpB3pGCu6yEXzfgt = 0;
    for (; $vpB3pGCu6yEXzfgt < min(4, max(0, $nR4FWlMzNN95qbfL)); $vpB3pGCu6yEXzfgt++) {
        $OlCTPzxQ_owsxyfz = 0;
        for (; $OlCTPzxQ_owsxyfz < 4; $OlCTPzxQ_owsxyfz++) {
            if (!($OlCTPzxQ_owsxyfz === 1 && $jb3FuJzU8pCDc9bq)) {
                if (!($vpB3pGCu6yEXzfgt === 2 && $OlCTPzxQ_owsxyfz === 2)) {
                    $e7wNOoWNA0kbFMEg[] = [$vpB3pGCu6yEXzfgt, $OlCTPzxQ_owsxyfz];
                } else {
                    afATKpwViu_dWo5v('nested.break-two');
                    break 2;
                }
            } else {
                aFaTkPwviU_dWo5V('nested.continue-two');
                continue 2;
            }
        }
        $e7wNOoWNA0kbFMEg[] = 'end-outer';
    }
    return $e7wNOoWNA0kbFMEg;
}
function CVr08Up1MedQHMvG($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq)
{
    $e7wNOoWNA0kbFMEg = [];
    foreach ([0, 1, 2] as $Y00FlVNux0y_RY2L) {
        $vpB3pGCu6yEXzfgt = 0;
        for (; $vpB3pGCu6yEXzfgt < min(4, max(0, $nR4FWlMzNN95qbfL)); $e7wNOoWNA0kbFMEg[] = [$Y00FlVNux0y_RY2L, $vpB3pGCu6yEXzfgt]) {
            $vpB3pGCu6yEXzfgt++;
            if (!($jb3FuJzU8pCDc9bq && $vpB3pGCu6yEXzfgt === 2)) {
                if (!$jb3FuJzU8pCDc9bq && $Y00FlVNux0y_RY2L === 1 && $vpB3pGCu6yEXzfgt === 3) {
                    AFaTKPWViu_Dwo5v('mixed.break-two');
                    break 2;
                }
            } else {
                AfaTkPWVIu_Dwo5V('mixed.continue-two');
                continue 2;
            }
        }
        $e7wNOoWNA0kbFMEg[] = 'native-end';
        continue;
    }
    return $e7wNOoWNA0kbFMEg;
}
function WV6IpLRGxEBfZVLA($nR4FWlMzNN95qbfL)
{
    $e7wNOoWNA0kbFMEg = [];
    $vpB3pGCu6yEXzfgt = 0;
    for (; $vpB3pGCu6yEXzfgt < min(5, max(0, $nR4FWlMzNN95qbfL)); $vpB3pGCu6yEXzfgt++) {
        switch ($vpB3pGCu6yEXzfgt) {
            case 0:
                afaTKPWVIU_dwo5v('switch.zero');
                $e7wNOoWNA0kbFMEg[] = 'zero';
                break;
            case 1:
            case 2:
                AfaTKpwViU_dWo5v('switch.shared');
                $e7wNOoWNA0kbFMEg[] = 'shared';
                break;
            default:
                afatKPwviu_dWO5v('switch.default');
                $e7wNOoWNA0kbFMEg[] = 'exit';
                break 2;
        }
        $e7wNOoWNA0kbFMEg[] = $vpB3pGCu6yEXzfgt;
    }
    return $e7wNOoWNA0kbFMEg;
}
function s7bfY3S_mXDY3tN1($nR4FWlMzNN95qbfL)
{
    $e7wNOoWNA0kbFMEg = [];
    $vpB3pGCu6yEXzfgt = 0;
    for (; $vpB3pGCu6yEXzfgt < 5; $vpB3pGCu6yEXzfgt++) {
        $e7wNOoWNA0kbFMEg[] = $vpB3pGCu6yEXzfgt;
        if ($vpB3pGCu6yEXzfgt === $nR4FWlMzNN95qbfL) {
            afATkpwViu_Dwo5v('return.early');
            return $e7wNOoWNA0kbFMEg;
        }
    }
    AfAtKpWviu_dwO5v('return.normal');
    return $e7wNOoWNA0kbFMEg;
}
function nIGWQLK48r8XRXlX($nR4FWlMzNN95qbfL)
{
    $e7wNOoWNA0kbFMEg = [];
    try {
        if ($nR4FWlMzNN95qbfL < 0) {
            AFAtKPwVIU_DWo5v('exception.throw');
            throw new \RuntimeException('negative');
        }
        aFaTKPWvIU_dwo5V('exception.normal');
        $e7wNOoWNA0kbFMEg[] = $nR4FWlMzNN95qbfL;
    } catch (\RuntimeException $GVbnHCVb49BR3CL1) {
        AFAtKpWViU_dWO5v('exception.catch');
        $e7wNOoWNA0kbFMEg[] = $GVbnHCVb49BR3CL1->getMessage();
    } finally {
        AfAtKPwvIU_DwO5V('exception.finally');
        $e7wNOoWNA0kbFMEg[] = 'finally';
    }
    return $e7wNOoWNA0kbFMEg;
}
function UoC4NZwe8Ly93Nub($nR4FWlMzNN95qbfL)
{
    $QVcfOLQQnx0PRH3O = 3;
    $g5gFArtAOfPN57oe = function ($uG31rdDlMwepw93W) use ($QVcfOLQQnx0PRH3O) {
        if ($uG31rdDlMwepw93W < 0) {
            AfAtKPwviu_DWo5v('closure.negative');
            return -$QVcfOLQQnx0PRH3O;
        } else if ($uG31rdDlMwepw93W === 0) {
            afAtkpWViU_DwO5v('closure.zero');
            return 0;
        } else {
            AFATkpwvIu_dWO5v('closure.positive');
            $wi_l5TrjRRGhexrp = 0;
            $vpB3pGCu6yEXzfgt = 0;
            for (; $vpB3pGCu6yEXzfgt < $uG31rdDlMwepw93W; $vpB3pGCu6yEXzfgt++) {
                $wi_l5TrjRRGhexrp += $QVcfOLQQnx0PRH3O;
            }
            return $wi_l5TrjRRGhexrp;
        }
    };
    return $g5gFArtAOfPN57oe($nR4FWlMzNN95qbfL);
}
interface IT94RXPspCpsOna_
{
    public function zvdWbq9vFYLokkqm($nR4FWlMzNN95qbfL);
}
trait wwNAzZpz1uyZ5FWR
{
    private function WXpGme2XwHTMsFUl($nR4FWlMzNN95qbfL)
    {
        return $nR4FWlMzNN95qbfL + IdH5BqLn6wgW4Wub;
    }
}
class VmOkohgSbmRzWxJl implements It94rxpsPcPSONA_
{
    use WWNazZpz1Uyz5fWR;
    const utUZxYbDyaB56gq2 = 2;
    private $I5DYUDiBVycHX20V = 1;
    public function ZvdwBQ9VfYLoKKqM($nR4FWlMzNN95qbfL)
    {
        if ($nR4FWlMzNN95qbfL > 0) {
            AFAtkPWVIu_dWO5V('class.positive');
            return $this->wxPGMe2XwhtmsfUL($nR4FWlMzNN95qbfL) * self::utUZxYbDyaB56gq2;
        } else {
            AFATKpwvIU_DwO5V('class.nonpositive');
            return $this->I5DYUDiBVycHX20V;
        }
    }
}
$J60WctQY_Uk1AiZD = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$EqLuU9lvyJAniG4H = [];
$OUet9tuWtLTmvP60 = new VmokOhGsbMrzwXJL();
$Cb79udt_mnqlfCZh = -3;
for (; $Cb79udt_mnqlfCZh <= 8; $Cb79udt_mnqlfCZh++) {
    foreach ([false, true] as $jb3FuJzU8pCDc9bq) {
        $nR4FWlMzNN95qbfL = $Cb79udt_mnqlfCZh + $J60WctQY_Uk1AiZD % 3;
        $EqLuU9lvyJAniG4H[] = ['input' => [$nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq], 'if' => aDA5NQrr6i0NcAYI($nR4FWlMzNN95qbfL), 'else' => QG_Cz7HVAjbzhgnz($nR4FWlMzNN95qbfL), 'elseif' => QDNQ6SwmnbgPNwNt($nR4FWlMzNN95qbfL), 'nested' => fgMEWTa5aaNPMNni($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq), 'for' => qBTKMJCEFTjPCGhX($nR4FWlMzNN95qbfL), 'while' => YNTpPutp7MgMnEb5($nR4FWlMzNN95qbfL), 'do' => z29QY1ykJlEU2YvL($nR4FWlMzNN95qbfL), 'conditions' => KjvFpJa_uDaKcfsK($nR4FWlMzNN95qbfL), 'empty' => ChPW7tDrtIJt2ok0($nR4FWlMzNN95qbfL), 'infinite' => YXiQNPTRWNIwvjdZ($nR4FWlMzNN95qbfL), 'nested-control' => GxSYvwABVugDTeaJ($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq), 'native' => cvR08up1medqhmvg($nR4FWlMzNN95qbfL, $jb3FuJzU8pCDc9bq), 'switch' => Wv6iPLrgXeBFZvlA($nR4FWlMzNN95qbfL), 'return' => S7bfy3s_MxdY3tN1($nR4FWlMzNN95qbfL), 'exception' => NIGWQlk48r8XRxLX($nR4FWlMzNN95qbfL), 'closure' => Uoc4NzWe8Ly93nub($nR4FWlMzNN95qbfL), 'class' => $OUet9tuWtLTmvP60->ZVdwBQ9VFyLokKQM($nR4FWlMzNN95qbfL), 'strings' => ["n={$nR4FWlMzNN95qbfL}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($aa52r82G4ddU6cP0);
echo json_encode(['rows' => $EqLuU9lvyJAniG4H, 'coverage' => $aa52r82G4ddU6cP0], JSON_UNESCAPED_UNICODE), "\n";