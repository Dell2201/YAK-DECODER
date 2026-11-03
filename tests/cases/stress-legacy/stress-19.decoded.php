<?php

namespace wkS6BzaGEYLGZbYB;

const QBIihL3NTHy421ER = 7;
$CObr2zXixP7dyQ0t = [];
function IFb4lLH_x4XruT0a($QFIetVHutRpLYUhE)
{
    global $CObr2zXixP7dyQ0t;
    $CObr2zXixP7dyQ0t[$QFIetVHutRpLYUhE] = isset($CObr2zXixP7dyQ0t[$QFIetVHutRpLYUhE]) ? $CObr2zXixP7dyQ0t[$QFIetVHutRpLYUhE] + 1 : 1;
}
function natxzfVYN8pcsDJY($TrXqggvQAsxKsI2z)
{
    $FsSMCI2ljri3IU8p = 0;
    if ($TrXqggvQAsxKsI2z > 0) {
        IfB4lLh_X4XRut0a('if.true');
        $FsSMCI2ljri3IU8p = $TrXqggvQAsxKsI2z * 2;
    }
    if ($TrXqggvQAsxKsI2z <= 0) {
        IFB4LlH_X4xrUt0a('if.false-path');
    }
    return $FsSMCI2ljri3IU8p;
}
function lgbMMuoKlCoxlFcB($TrXqggvQAsxKsI2z)
{
    if ($TrXqggvQAsxKsI2z % 2 === 0) {
        iFb4llH_x4XRUT0A('else.then');
        return 'even';
    } else {
        Ifb4lLh_X4XrUT0A('else.else');
        return 'odd';
    }
}
function A1xpio1uyT5xCkl3($TrXqggvQAsxKsI2z)
{
    if ($TrXqggvQAsxKsI2z < 0) {
        iFB4lLh_x4xrUt0a('elseif.negative');
        return -1;
    } else if ($TrXqggvQAsxKsI2z === 0) {
        IFB4llh_X4Xrut0a('elseif.zero');
        return 0;
    } else if ($TrXqggvQAsxKsI2z < 3) {
        IFb4Llh_x4xrut0A('elseif.small');
        return 1;
    } else {
        Ifb4Llh_X4xrUT0a('elseif.large');
        return 2;
    }
}
function CYLX3EZLvB1E0aDq($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt)
{
    $H1SrW4sntu_0yCMN = [];
    if ($TrXqggvQAsxKsI2z > 0 && ($Hg4iE4ufHb2hxAHt || $TrXqggvQAsxKsI2z > 3)) {
        IFB4LLH_x4xrUt0A('nested.outer-true');
        $H1SrW4sntu_0yCMN[] = 'outer';
        if ($TrXqggvQAsxKsI2z % 2) {
            Ifb4llH_x4xRut0A('nested.inner-odd');
            $H1SrW4sntu_0yCMN[] = 'odd';
        } else {
            ifB4LLH_x4xrUT0a('nested.inner-even');
            $H1SrW4sntu_0yCMN[] = 'even';
        }
    } else if ($Hg4iE4ufHb2hxAHt && $TrXqggvQAsxKsI2z < 0) {
        ifb4LLh_x4XrUT0a('nested.elseif');
        $H1SrW4sntu_0yCMN[] = 'negative';
    } else {
        Ifb4lLh_X4XRuT0A('nested.else');
        $H1SrW4sntu_0yCMN[] = 'fallback';
    }
    return $H1SrW4sntu_0yCMN;
}
function QFdadRvEhz5FqTR_($TrXqggvQAsxKsI2z)
{
    $H1SrW4sntu_0yCMN = [];
    $JA1LEcvOI52FXi4Z = 0;
    $RKoLzxnOIQpt0MXa = 10;
    for (; $JA1LEcvOI52FXi4Z < $TrXqggvQAsxKsI2z; $RKoLzxnOIQpt0MXa -= 2) {
        ifB4LLh_X4XruT0A('for.body');
        if (!($JA1LEcvOI52FXi4Z === 1)) {
            $H1SrW4sntu_0yCMN[] = [$JA1LEcvOI52FXi4Z, $RKoLzxnOIQpt0MXa];
            if ($JA1LEcvOI52FXi4Z === 4) {
                Ifb4llh_X4XRUT0a('for.break');
                break;
            }
        } else {
            IfB4LLH_x4xrut0a('for.continue');
        }
        $JA1LEcvOI52FXi4Z++;
    }
    if (!$H1SrW4sntu_0yCMN) {
        IFb4lLh_x4xrUt0a('for.zero');
    }
    return [$JA1LEcvOI52FXi4Z, $RKoLzxnOIQpt0MXa, $H1SrW4sntu_0yCMN];
}
function Afy71SoXE5sGEOf0($TrXqggvQAsxKsI2z)
{
    $JA1LEcvOI52FXi4Z = 0;
    $H1SrW4sntu_0yCMN = [];
    while ($JA1LEcvOI52FXi4Z < $TrXqggvQAsxKsI2z) {
        IfB4llh_x4XRut0a('while.body');
        $JA1LEcvOI52FXi4Z++;
        if (!($JA1LEcvOI52FXi4Z === 2)) {
            $H1SrW4sntu_0yCMN[] = $JA1LEcvOI52FXi4Z;
            if (!($JA1LEcvOI52FXi4Z === 5)) {
                continue;
            } else {
                IFb4lLh_x4XRuT0a('while.break');
                break;
            }
        } else {
            IFB4Llh_x4xRUT0a('while.continue');
        }
    }
    if ($JA1LEcvOI52FXi4Z === 0) {
        IFb4Llh_x4xrut0a('while.zero');
    }
    return [$JA1LEcvOI52FXi4Z, $H1SrW4sntu_0yCMN];
}
function Fq4RZKCnosBNzyf7($TrXqggvQAsxKsI2z)
{
    $JA1LEcvOI52FXi4Z = 0;
    $H1SrW4sntu_0yCMN = [];
    while (true) {
        IFB4llH_x4xRut0a('do.body');
        $JA1LEcvOI52FXi4Z++;
        if (!($JA1LEcvOI52FXi4Z === 2)) {
            $H1SrW4sntu_0yCMN[] = $JA1LEcvOI52FXi4Z;
            if (!($JA1LEcvOI52FXi4Z === 5)) {
                if ($JA1LEcvOI52FXi4Z < $TrXqggvQAsxKsI2z) {
                    continue;
                } else {
                    break;
                }
            } else {
                ifB4llH_x4XRUt0A('do.break');
                break;
            }
        } else {
            ifB4LlH_x4xruT0a('do.continue');
        }
    }
    if ($JA1LEcvOI52FXi4Z === 1) {
        iFB4llh_x4XrUT0a('do.once');
    } else {
        IFB4lLh_X4XRuT0A('do.repeat');
    }
    return [$JA1LEcvOI52FXi4Z, $H1SrW4sntu_0yCMN];
}
function Nnv2gibq1sAQanB7($TrXqggvQAsxKsI2z)
{
    $vYlYAZJEK564F3cQ = 0;
    $H1SrW4sntu_0yCMN = [];
    while (++$vYlYAZJEK564F3cQ <= max(0, $TrXqggvQAsxKsI2z)) {
        $H1SrW4sntu_0yCMN[] = $vYlYAZJEK564F3cQ;
    }
    $WXde01asg7jVLnTL = 0;
    do {
        $H1SrW4sntu_0yCMN[] = -$WXde01asg7jVLnTL;
    } while ($WXde01asg7jVLnTL++ < min(3, max(0, $TrXqggvQAsxKsI2z)));
    iFb4LLh_x4XRUt0a('conditions.side-effects');
    return [$vYlYAZJEK564F3cQ, $WXde01asg7jVLnTL, $H1SrW4sntu_0yCMN];
}
function jg_bZmwEAccRlErP($TrXqggvQAsxKsI2z)
{
    $JA1LEcvOI52FXi4Z = 0;
    while ($JA1LEcvOI52FXi4Z < min(3, max(0, $TrXqggvQAsxKsI2z))) {
        $JA1LEcvOI52FXi4Z++;
    }
    $RKoLzxnOIQpt0MXa = 0;
    while ($RKoLzxnOIQpt0MXa++ < min(2, max(0, $TrXqggvQAsxKsI2z))) {
    }
    while ($RKoLzxnOIQpt0MXa++ < 1) {
    }
    ifB4LLH_x4xRUt0a('loops.empty');
    return [$JA1LEcvOI52FXi4Z, $RKoLzxnOIQpt0MXa];
}
function aQAIAOevQ9Gof_i7($TrXqggvQAsxKsI2z)
{
    $JA1LEcvOI52FXi4Z = 0;
    $URs4sNdRMMqv3f3u = 0;
    while (!($JA1LEcvOI52FXi4Z >= max(0, $TrXqggvQAsxKsI2z))) {
        $URs4sNdRMMqv3f3u += ++$JA1LEcvOI52FXi4Z;
    }
    Ifb4Llh_X4xrUt0A('infinite.break');
    return [$JA1LEcvOI52FXi4Z, $URs4sNdRMMqv3f3u];
}
function JOIjtu35bsuUAMUi($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt)
{
    $H1SrW4sntu_0yCMN = [];
    $JA1LEcvOI52FXi4Z = 0;
    for (; $JA1LEcvOI52FXi4Z < min(4, max(0, $TrXqggvQAsxKsI2z)); $JA1LEcvOI52FXi4Z++) {
        $RKoLzxnOIQpt0MXa = 0;
        for (; $RKoLzxnOIQpt0MXa < 4; $RKoLzxnOIQpt0MXa++) {
            if (!($RKoLzxnOIQpt0MXa === 1 && $Hg4iE4ufHb2hxAHt)) {
                if (!($JA1LEcvOI52FXi4Z === 2 && $RKoLzxnOIQpt0MXa === 2)) {
                    $H1SrW4sntu_0yCMN[] = [$JA1LEcvOI52FXi4Z, $RKoLzxnOIQpt0MXa];
                } else {
                    Ifb4LLH_X4xRut0A('nested.break-two');
                    break 2;
                }
            } else {
                Ifb4LLh_X4xrut0a('nested.continue-two');
                continue 2;
            }
        }
        $H1SrW4sntu_0yCMN[] = 'end-outer';
    }
    return $H1SrW4sntu_0yCMN;
}
function pYHY3sqAy78jBgak($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt)
{
    $H1SrW4sntu_0yCMN = [];
    foreach ([0, 1, 2] as $oQhGFUL1b108WuBD) {
        $JA1LEcvOI52FXi4Z = 0;
        for (; $JA1LEcvOI52FXi4Z < min(4, max(0, $TrXqggvQAsxKsI2z)); $H1SrW4sntu_0yCMN[] = [$oQhGFUL1b108WuBD, $JA1LEcvOI52FXi4Z]) {
            $JA1LEcvOI52FXi4Z++;
            if (!($Hg4iE4ufHb2hxAHt && $JA1LEcvOI52FXi4Z === 2)) {
                if (!$Hg4iE4ufHb2hxAHt && $oQhGFUL1b108WuBD === 1 && $JA1LEcvOI52FXi4Z === 3) {
                    iFb4lLh_x4xRUT0a('mixed.break-two');
                    break 2;
                }
            } else {
                iFb4llH_X4XRUt0A('mixed.continue-two');
                continue 2;
            }
        }
        $H1SrW4sntu_0yCMN[] = 'native-end';
        continue;
    }
    return $H1SrW4sntu_0yCMN;
}
function hNWNvPClycVEw8bZ($TrXqggvQAsxKsI2z)
{
    $H1SrW4sntu_0yCMN = [];
    $JA1LEcvOI52FXi4Z = 0;
    for (; $JA1LEcvOI52FXi4Z < min(5, max(0, $TrXqggvQAsxKsI2z)); $JA1LEcvOI52FXi4Z++) {
        switch ($JA1LEcvOI52FXi4Z) {
            case 0:
                Ifb4LLh_X4xRut0A('switch.zero');
                $H1SrW4sntu_0yCMN[] = 'zero';
                break;
            case 1:
            case 2:
                IFB4llh_X4xrUT0A('switch.shared');
                $H1SrW4sntu_0yCMN[] = 'shared';
                break;
            default:
                IFb4llH_x4XruT0a('switch.default');
                $H1SrW4sntu_0yCMN[] = 'exit';
                break 2;
        }
        $H1SrW4sntu_0yCMN[] = $JA1LEcvOI52FXi4Z;
    }
    return $H1SrW4sntu_0yCMN;
}
function YJSEMqeuUS7ugrWB($TrXqggvQAsxKsI2z)
{
    $H1SrW4sntu_0yCMN = [];
    $JA1LEcvOI52FXi4Z = 0;
    for (; $JA1LEcvOI52FXi4Z < 5; $JA1LEcvOI52FXi4Z++) {
        $H1SrW4sntu_0yCMN[] = $JA1LEcvOI52FXi4Z;
        if ($JA1LEcvOI52FXi4Z === $TrXqggvQAsxKsI2z) {
            IfB4LLH_X4XruT0a('return.early');
            return $H1SrW4sntu_0yCMN;
        }
    }
    ifb4lLH_X4XrUt0A('return.normal');
    return $H1SrW4sntu_0yCMN;
}
function L1RqqKHImLlaXbX1($TrXqggvQAsxKsI2z)
{
    $H1SrW4sntu_0yCMN = [];
    try {
        if ($TrXqggvQAsxKsI2z < 0) {
            iFb4LLh_x4XRUt0a('exception.throw');
            throw new \RuntimeException('negative');
        }
        IFb4LLH_X4xRUt0A('exception.normal');
        $H1SrW4sntu_0yCMN[] = $TrXqggvQAsxKsI2z;
    } catch (\RuntimeException $juv6CdxDZGN27Ebl) {
        ifB4llh_x4xrUT0A('exception.catch');
        $H1SrW4sntu_0yCMN[] = $juv6CdxDZGN27Ebl->getMessage();
    } finally {
        IFB4LlH_x4XruT0A('exception.finally');
        $H1SrW4sntu_0yCMN[] = 'finally';
    }
    return $H1SrW4sntu_0yCMN;
}
function lwavdtdmwnQCVwt7($TrXqggvQAsxKsI2z)
{
    $s_C51FHnUQGOT3f3 = 3;
    $kTjrciQtXLDL0Ffp = function ($acuJwjfqI9y6EusY) use ($s_C51FHnUQGOT3f3) {
        if ($acuJwjfqI9y6EusY < 0) {
            iFb4LLh_x4xrut0A('closure.negative');
            return -$s_C51FHnUQGOT3f3;
        } else if ($acuJwjfqI9y6EusY === 0) {
            Ifb4lLH_X4xRuT0a('closure.zero');
            return 0;
        } else {
            ifb4LLh_x4XRut0a('closure.positive');
            $URs4sNdRMMqv3f3u = 0;
            $JA1LEcvOI52FXi4Z = 0;
            for (; $JA1LEcvOI52FXi4Z < $acuJwjfqI9y6EusY; $JA1LEcvOI52FXi4Z++) {
                $URs4sNdRMMqv3f3u += $s_C51FHnUQGOT3f3;
            }
            return $URs4sNdRMMqv3f3u;
        }
    };
    return $kTjrciQtXLDL0Ffp($TrXqggvQAsxKsI2z);
}
interface W1AmfQOsuhdSMUEI
{
    public function p07yhXYaJD8R_BbD($TrXqggvQAsxKsI2z);
}
trait bhD7NtAJLrZ9zrNn
{
    private function c9k2sGyfwJgUrdYn($TrXqggvQAsxKsI2z)
    {
        return $TrXqggvQAsxKsI2z + QBIihL3NTHy421ER;
    }
}
class djFjgS0Wt18CShZf implements W1AmfQOsuhDSMueI
{
    use bhd7NtajLRz9zRnN;
    const n0_3YAAmilyp0AXR = 2;
    private $KifSYokGtzuYdWK4 = 1;
    public function P07yhXYAjd8R_Bbd($TrXqggvQAsxKsI2z)
    {
        if ($TrXqggvQAsxKsI2z > 0) {
            ifB4lLh_X4XrUT0A('class.positive');
            return $this->c9k2SGYFwJgurdYn($TrXqggvQAsxKsI2z) * self::n0_3YAAmilyp0AXR;
        } else {
            ifB4llH_X4XRUt0A('class.nonpositive');
            return $this->KifSYokGtzuYdWK4;
        }
    }
}
$tbKphijEYRbYBO3l = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$ESliPDlLh_mzHqwA = [];
$KqB3HYuspMP2R2jp = new djFJGs0WT18CSHzf();
$IR9_lQfUgHO5yZFX = -3;
for (; $IR9_lQfUgHO5yZFX <= 8; $IR9_lQfUgHO5yZFX++) {
    foreach ([false, true] as $Hg4iE4ufHb2hxAHt) {
        $TrXqggvQAsxKsI2z = $IR9_lQfUgHO5yZFX + $tbKphijEYRbYBO3l % 3;
        $ESliPDlLh_mzHqwA[] = ['input' => [$TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt], 'if' => natXZFvyn8PcsDjy($TrXqggvQAsxKsI2z), 'else' => LgBMMuoKLcoxlfCb($TrXqggvQAsxKsI2z), 'elseif' => A1xPIo1uYt5XckL3($TrXqggvQAsxKsI2z), 'nested' => cylX3EZlvb1E0adq($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt), 'for' => qFDadRvEHZ5fqtr_($TrXqggvQAsxKsI2z), 'while' => AfY71soxE5SgEOF0($TrXqggvQAsxKsI2z), 'do' => FQ4RzkCNosbNzYF7($TrXqggvQAsxKsI2z), 'conditions' => nNv2GIBQ1SaQANb7($TrXqggvQAsxKsI2z), 'empty' => jg_bZmWeACcrLeRp($TrXqggvQAsxKsI2z), 'infinite' => AqAIAOEvQ9gOF_i7($TrXqggvQAsxKsI2z), 'nested-control' => JoIJTu35BSuuAMUi($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt), 'native' => PYhy3sqay78jBgak($TrXqggvQAsxKsI2z, $Hg4iE4ufHb2hxAHt), 'switch' => HnWnvpclyCvEw8BZ($TrXqggvQAsxKsI2z), 'return' => YJSeMQEUUS7UgrWB($TrXqggvQAsxKsI2z), 'exception' => l1rQqkhIMLlAXbX1($TrXqggvQAsxKsI2z), 'closure' => lwavDTDMwnqCVWT7($TrXqggvQAsxKsI2z), 'class' => $KqB3HYuspMP2R2jp->P07YhXYaJD8r_BbD($TrXqggvQAsxKsI2z), 'strings' => ["n={$TrXqggvQAsxKsI2z}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($CObr2zXixP7dyQ0t);
echo json_encode(['rows' => $ESliPDlLh_mzHqwA, 'coverage' => $CObr2zXixP7dyQ0t], JSON_UNESCAPED_UNICODE), "\n";