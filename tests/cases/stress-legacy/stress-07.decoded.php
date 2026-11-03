<?php

namespace OijAaKI4yYp6IJhv;

const Xn2crME5QlwrBHGp = 7;
$zU_cjF2BRXq49KfF = [];
function M5Znf6w1YyZuwLUr($BM7mylW1CnwCpdql)
{
    global $zU_cjF2BRXq49KfF;
    $zU_cjF2BRXq49KfF[$BM7mylW1CnwCpdql] = isset($zU_cjF2BRXq49KfF[$BM7mylW1CnwCpdql]) ? $zU_cjF2BRXq49KfF[$BM7mylW1CnwCpdql] + 1 : 1;
}
function F2qHSVQiuaiS9ICJ($BdA6fOCT1M7E2JCV)
{
    $Fvyo6rvVsVMihGWj = 0;
    if ($BdA6fOCT1M7E2JCV > 0) {
        M5zNf6w1yYZUWLuR('if.true');
        $Fvyo6rvVsVMihGWj = $BdA6fOCT1M7E2JCV * 2;
    }
    if ($BdA6fOCT1M7E2JCV <= 0) {
        M5ZnF6w1YyzUwlUr('if.false-path');
    }
    return $Fvyo6rvVsVMihGWj;
}
function HyKSaY92mHprACHI($BdA6fOCT1M7E2JCV)
{
    if ($BdA6fOCT1M7E2JCV % 2 === 0) {
        m5znf6w1YYZUwlUR('else.then');
        return 'even';
    } else {
        m5ZNf6W1YyZuwLur('else.else');
        return 'odd';
    }
}
function FIHTPjRg7CzOhv7h($BdA6fOCT1M7E2JCV)
{
    if ($BdA6fOCT1M7E2JCV < 0) {
        M5ZnF6w1YyZUwLUR('elseif.negative');
        return -1;
    } else if ($BdA6fOCT1M7E2JCV === 0) {
        M5znF6w1YyzuWluR('elseif.zero');
        return 0;
    } else if ($BdA6fOCT1M7E2JCV < 3) {
        m5Znf6W1yYzUwLur('elseif.small');
        return 1;
    } else {
        m5Znf6w1yyZuWluR('elseif.large');
        return 2;
    }
}
function aGyOoPak60klD9ve($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY)
{
    $d873ZGnDvf2zG4bY = [];
    if ($BdA6fOCT1M7E2JCV > 0 && ($ZzPgvYBcoBsfJXjY || $BdA6fOCT1M7E2JCV > 3)) {
        M5ZnF6W1YyzUWLuR('nested.outer-true');
        $d873ZGnDvf2zG4bY[] = 'outer';
        if ($BdA6fOCT1M7E2JCV % 2) {
            M5Znf6w1yYZUWluR('nested.inner-odd');
            $d873ZGnDvf2zG4bY[] = 'odd';
        } else {
            m5zNf6W1yyZuwlUr('nested.inner-even');
            $d873ZGnDvf2zG4bY[] = 'even';
        }
    } else if ($ZzPgvYBcoBsfJXjY && $BdA6fOCT1M7E2JCV < 0) {
        m5znf6W1YyzuwlUr('nested.elseif');
        $d873ZGnDvf2zG4bY[] = 'negative';
    } else {
        m5ZNF6W1yyZUwLUR('nested.else');
        $d873ZGnDvf2zG4bY[] = 'fallback';
    }
    return $d873ZGnDvf2zG4bY;
}
function OxFwXUY5LbsZZfvf($BdA6fOCT1M7E2JCV)
{
    $d873ZGnDvf2zG4bY = [];
    $sdMZMHSFp5J2Eud2 = 0;
    $sXxJHheoYgLfCoyk = 10;
    for (; $sdMZMHSFp5J2Eud2 < $BdA6fOCT1M7E2JCV; $sXxJHheoYgLfCoyk -= 2) {
        M5Znf6W1yyzuwlUR('for.body');
        if (!($sdMZMHSFp5J2Eud2 === 1)) {
            $d873ZGnDvf2zG4bY[] = [$sdMZMHSFp5J2Eud2, $sXxJHheoYgLfCoyk];
            if ($sdMZMHSFp5J2Eud2 === 4) {
                m5zNf6W1YYZUwLUR('for.break');
                break;
            }
        } else {
            m5znF6W1yYzuWLUr('for.continue');
        }
        $sdMZMHSFp5J2Eud2++;
    }
    if (!$d873ZGnDvf2zG4bY) {
        M5ZnF6w1yYzuwLUR('for.zero');
    }
    return [$sdMZMHSFp5J2Eud2, $sXxJHheoYgLfCoyk, $d873ZGnDvf2zG4bY];
}
function Nf2Bo73KSSb2zNAb($BdA6fOCT1M7E2JCV)
{
    $sdMZMHSFp5J2Eud2 = 0;
    $d873ZGnDvf2zG4bY = [];
    while ($sdMZMHSFp5J2Eud2 < $BdA6fOCT1M7E2JCV) {
        m5ZNf6W1YyZUwluR('while.body');
        $sdMZMHSFp5J2Eud2++;
        if (!($sdMZMHSFp5J2Eud2 === 2)) {
            $d873ZGnDvf2zG4bY[] = $sdMZMHSFp5J2Eud2;
            if (!($sdMZMHSFp5J2Eud2 === 5)) {
                continue;
            } else {
                M5Znf6w1YyZUWlUr('while.break');
                break;
            }
        } else {
            m5zNf6W1yyZuwLUr('while.continue');
        }
    }
    if ($sdMZMHSFp5J2Eud2 === 0) {
        m5znf6w1YYzuwLuR('while.zero');
    }
    return [$sdMZMHSFp5J2Eud2, $d873ZGnDvf2zG4bY];
}
function ADvygrw9ysg3AptG($BdA6fOCT1M7E2JCV)
{
    $sdMZMHSFp5J2Eud2 = 0;
    $d873ZGnDvf2zG4bY = [];
    while (true) {
        m5znf6w1yyZUwlur('do.body');
        $sdMZMHSFp5J2Eud2++;
        if (!($sdMZMHSFp5J2Eud2 === 2)) {
            $d873ZGnDvf2zG4bY[] = $sdMZMHSFp5J2Eud2;
            if (!($sdMZMHSFp5J2Eud2 === 5)) {
                if ($sdMZMHSFp5J2Eud2 < $BdA6fOCT1M7E2JCV) {
                    continue;
                } else {
                    break;
                }
            } else {
                m5znF6w1YyzUwLuR('do.break');
                break;
            }
        } else {
            m5zNf6W1YYZUwlUr('do.continue');
        }
    }
    if ($sdMZMHSFp5J2Eud2 === 1) {
        m5ZNf6w1YyzUWlUr('do.once');
    } else {
        m5znf6w1yYZUWluR('do.repeat');
    }
    return [$sdMZMHSFp5J2Eud2, $d873ZGnDvf2zG4bY];
}
function YGe3K4DLcm3Aq9rm($BdA6fOCT1M7E2JCV)
{
    $XXk3iLjkrrOllZtP = 0;
    $d873ZGnDvf2zG4bY = [];
    while (++$XXk3iLjkrrOllZtP <= max(0, $BdA6fOCT1M7E2JCV)) {
        $d873ZGnDvf2zG4bY[] = $XXk3iLjkrrOllZtP;
    }
    $QCkl_WAc_R5UgXqH = 0;
    do {
        $d873ZGnDvf2zG4bY[] = -$QCkl_WAc_R5UgXqH;
    } while ($QCkl_WAc_R5UgXqH++ < min(3, max(0, $BdA6fOCT1M7E2JCV)));
    M5zNF6W1YYZuWlur('conditions.side-effects');
    return [$XXk3iLjkrrOllZtP, $QCkl_WAc_R5UgXqH, $d873ZGnDvf2zG4bY];
}
function w4Tdvd3qmHOiz8Mr($BdA6fOCT1M7E2JCV)
{
    $sdMZMHSFp5J2Eud2 = 0;
    while ($sdMZMHSFp5J2Eud2 < min(3, max(0, $BdA6fOCT1M7E2JCV))) {
        $sdMZMHSFp5J2Eud2++;
    }
    $sXxJHheoYgLfCoyk = 0;
    while ($sXxJHheoYgLfCoyk++ < min(2, max(0, $BdA6fOCT1M7E2JCV))) {
    }
    while ($sXxJHheoYgLfCoyk++ < 1) {
    }
    m5Znf6W1yyzUwluR('loops.empty');
    return [$sdMZMHSFp5J2Eud2, $sXxJHheoYgLfCoyk];
}
function Cf3Va2181yQMaQlf($BdA6fOCT1M7E2JCV)
{
    $sdMZMHSFp5J2Eud2 = 0;
    $tLUeMLLBUdfQ1c5c = 0;
    while (!($sdMZMHSFp5J2Eud2 >= max(0, $BdA6fOCT1M7E2JCV))) {
        $tLUeMLLBUdfQ1c5c += ++$sdMZMHSFp5J2Eud2;
    }
    M5ZnF6w1yYzUwlur('infinite.break');
    return [$sdMZMHSFp5J2Eud2, $tLUeMLLBUdfQ1c5c];
}
function M5P4lPiPIMtfy2fq($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY)
{
    $d873ZGnDvf2zG4bY = [];
    $sdMZMHSFp5J2Eud2 = 0;
    for (; $sdMZMHSFp5J2Eud2 < min(4, max(0, $BdA6fOCT1M7E2JCV)); $sdMZMHSFp5J2Eud2++) {
        $sXxJHheoYgLfCoyk = 0;
        for (; $sXxJHheoYgLfCoyk < 4; $sXxJHheoYgLfCoyk++) {
            if (!($sXxJHheoYgLfCoyk === 1 && $ZzPgvYBcoBsfJXjY)) {
                if (!($sdMZMHSFp5J2Eud2 === 2 && $sXxJHheoYgLfCoyk === 2)) {
                    $d873ZGnDvf2zG4bY[] = [$sdMZMHSFp5J2Eud2, $sXxJHheoYgLfCoyk];
                } else {
                    M5ZnF6W1YyZuWlUR('nested.break-two');
                    break 2;
                }
            } else {
                M5znf6W1yYzUWLur('nested.continue-two');
                continue 2;
            }
        }
        $d873ZGnDvf2zG4bY[] = 'end-outer';
    }
    return $d873ZGnDvf2zG4bY;
}
function ic4UTd9jLb_yNwae($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY)
{
    $d873ZGnDvf2zG4bY = [];
    foreach ([0, 1, 2] as $BRyT0xQMOScR4jiV) {
        $sdMZMHSFp5J2Eud2 = 0;
        for (; $sdMZMHSFp5J2Eud2 < min(4, max(0, $BdA6fOCT1M7E2JCV)); $d873ZGnDvf2zG4bY[] = [$BRyT0xQMOScR4jiV, $sdMZMHSFp5J2Eud2]) {
            $sdMZMHSFp5J2Eud2++;
            if (!($ZzPgvYBcoBsfJXjY && $sdMZMHSFp5J2Eud2 === 2)) {
                if (!$ZzPgvYBcoBsfJXjY && $BRyT0xQMOScR4jiV === 1 && $sdMZMHSFp5J2Eud2 === 3) {
                    m5znf6W1yyZuWluR('mixed.break-two');
                    break 2;
                }
            } else {
                m5ZnF6w1yyZuWluR('mixed.continue-two');
                continue 2;
            }
        }
        $d873ZGnDvf2zG4bY[] = 'native-end';
        continue;
    }
    return $d873ZGnDvf2zG4bY;
}
function H7cfeZ493N1x3gmG($BdA6fOCT1M7E2JCV)
{
    $d873ZGnDvf2zG4bY = [];
    $sdMZMHSFp5J2Eud2 = 0;
    for (; $sdMZMHSFp5J2Eud2 < min(5, max(0, $BdA6fOCT1M7E2JCV)); $sdMZMHSFp5J2Eud2++) {
        switch ($sdMZMHSFp5J2Eud2) {
            case 0:
                m5zNf6w1yYZuwlUr('switch.zero');
                $d873ZGnDvf2zG4bY[] = 'zero';
                break;
            case 1:
            case 2:
                M5ZnF6W1YyzuwLUR('switch.shared');
                $d873ZGnDvf2zG4bY[] = 'shared';
                break;
            default:
                m5znF6w1yYZUwluR('switch.default');
                $d873ZGnDvf2zG4bY[] = 'exit';
                break 2;
        }
        $d873ZGnDvf2zG4bY[] = $sdMZMHSFp5J2Eud2;
    }
    return $d873ZGnDvf2zG4bY;
}
function pcESP6P1JmFsAWZu($BdA6fOCT1M7E2JCV)
{
    $d873ZGnDvf2zG4bY = [];
    $sdMZMHSFp5J2Eud2 = 0;
    for (; $sdMZMHSFp5J2Eud2 < 5; $sdMZMHSFp5J2Eud2++) {
        $d873ZGnDvf2zG4bY[] = $sdMZMHSFp5J2Eud2;
        if ($sdMZMHSFp5J2Eud2 === $BdA6fOCT1M7E2JCV) {
            m5znF6w1yyzUwlUR('return.early');
            return $d873ZGnDvf2zG4bY;
        }
    }
    M5ZnF6w1YYzuwlUR('return.normal');
    return $d873ZGnDvf2zG4bY;
}
function m_k1119RQcWQ03eZ($BdA6fOCT1M7E2JCV)
{
    $d873ZGnDvf2zG4bY = [];
    try {
        if ($BdA6fOCT1M7E2JCV < 0) {
            m5zNf6w1yYzuwluR('exception.throw');
            throw new \RuntimeException('negative');
        }
        m5zNF6w1YYZUwluR('exception.normal');
        $d873ZGnDvf2zG4bY[] = $BdA6fOCT1M7E2JCV;
    } catch (\RuntimeException $ZGsg6C647LT8_O0p) {
        M5Znf6w1YyZUWLur('exception.catch');
        $d873ZGnDvf2zG4bY[] = $ZGsg6C647LT8_O0p->getMessage();
    } finally {
        M5znf6w1yyZuWLUR('exception.finally');
        $d873ZGnDvf2zG4bY[] = 'finally';
    }
    return $d873ZGnDvf2zG4bY;
}
function pMefQJvdsmKzvYL_($BdA6fOCT1M7E2JCV)
{
    $HNkByCtb83fjuL0J = 3;
    $EfPA4V0xxFXqCxq3 = function ($pCG1vbvQ4Ix_bg88) use ($HNkByCtb83fjuL0J) {
        if ($pCG1vbvQ4Ix_bg88 < 0) {
            M5ZNF6w1YYZUwLur('closure.negative');
            return -$HNkByCtb83fjuL0J;
        } else if ($pCG1vbvQ4Ix_bg88 === 0) {
            M5znf6W1yyzUWLUR('closure.zero');
            return 0;
        } else {
            m5ZNf6W1yYzuWlUR('closure.positive');
            $tLUeMLLBUdfQ1c5c = 0;
            $sdMZMHSFp5J2Eud2 = 0;
            for (; $sdMZMHSFp5J2Eud2 < $pCG1vbvQ4Ix_bg88; $sdMZMHSFp5J2Eud2++) {
                $tLUeMLLBUdfQ1c5c += $HNkByCtb83fjuL0J;
            }
            return $tLUeMLLBUdfQ1c5c;
        }
    };
    return $EfPA4V0xxFXqCxq3($BdA6fOCT1M7E2JCV);
}
interface TBIHTwtu6sjnKEFI
{
    public function PRAozH05Ho2ZTKB6($BdA6fOCT1M7E2JCV);
}
trait Z1WwxCTuvMNbOs0Y
{
    private function O3FCmIF_emilFO2U($BdA6fOCT1M7E2JCV)
    {
        return $BdA6fOCT1M7E2JCV + Xn2crME5QlwrBHGp;
    }
}
class zBYnwk3Da_ZqrBHm implements tbIhtWTu6SjNkefI
{
    use Z1WwxctUvmNbOS0Y;
    const goXqOVrGMEYKz418 = 2;
    private $Vp42htxbIGeE_osO = 1;
    public function PrAOZh05hO2ztkB6($BdA6fOCT1M7E2JCV)
    {
        if ($BdA6fOCT1M7E2JCV > 0) {
            m5znF6W1YYZuwLuR('class.positive');
            return $this->O3FCMiF_EMiLfo2u($BdA6fOCT1M7E2JCV) * self::goXqOVrGMEYKz418;
        } else {
            m5Znf6W1yyZuWlUr('class.nonpositive');
            return $this->Vp42htxbIGeE_osO;
        }
    }
}
$wXPM1VKVbOvuBCWy = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$sXeh3Exw3eSjsTcA = [];
$c5xCMZsgUW7BaKnu = new zByNwk3dA_ZQRBHM();
$FYUI7TYUr4k658rJ = -3;
for (; $FYUI7TYUr4k658rJ <= 8; $FYUI7TYUr4k658rJ++) {
    foreach ([false, true] as $ZzPgvYBcoBsfJXjY) {
        $BdA6fOCT1M7E2JCV = $FYUI7TYUr4k658rJ + $wXPM1VKVbOvuBCWy % 3;
        $sXeh3Exw3eSjsTcA[] = ['input' => [$BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY], 'if' => f2qhsVQiUAiS9icj($BdA6fOCT1M7E2JCV), 'else' => hYKSAY92MHPraChi($BdA6fOCT1M7E2JCV), 'elseif' => fihTPjrg7CzoHv7H($BdA6fOCT1M7E2JCV), 'nested' => AgyOOPAK60klD9ve($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY), 'for' => oXFwXUy5lBSZZFVF($BdA6fOCT1M7E2JCV), 'while' => Nf2bO73kssb2Znab($BdA6fOCT1M7E2JCV), 'do' => adVygrW9ySG3aPtg($BdA6fOCT1M7E2JCV), 'conditions' => YgE3k4DLcM3aq9rM($BdA6fOCT1M7E2JCV), 'empty' => w4TDVD3QmHOiz8MR($BdA6fOCT1M7E2JCV), 'infinite' => cf3VA2181YqmaqLF($BdA6fOCT1M7E2JCV), 'nested-control' => m5p4lpipimTfy2fQ($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY), 'native' => iC4uTD9Jlb_YnWAe($BdA6fOCT1M7E2JCV, $ZzPgvYBcoBsfJXjY), 'switch' => h7cFeZ493n1X3gmG($BdA6fOCT1M7E2JCV), 'return' => PcESp6p1JMFSAwZU($BdA6fOCT1M7E2JCV), 'exception' => M_k1119rQCwQ03ez($BdA6fOCT1M7E2JCV), 'closure' => PmEFqJvdsMkZvyl_($BdA6fOCT1M7E2JCV), 'class' => $c5xCMZsgUW7BaKnu->PRaOZh05Ho2Ztkb6($BdA6fOCT1M7E2JCV), 'strings' => ["n={$BdA6fOCT1M7E2JCV}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($zU_cjF2BRXq49KfF);
echo json_encode(['rows' => $sXeh3Exw3eSjsTcA, 'coverage' => $zU_cjF2BRXq49KfF], JSON_UNESCAPED_UNICODE), "\n";