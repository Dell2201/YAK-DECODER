<?php

namespace I1SA3Vid_TlxFjEO;

const W7V2_kpMjrfXb9Ky = 7;
$igS7QW1p1Ddt0UMO = [];
function EgyS3CMGCUKcqPRN($j6Eq6AUYdcBm2Buc)
{
    global $igS7QW1p1Ddt0UMO;
    $igS7QW1p1Ddt0UMO[$j6Eq6AUYdcBm2Buc] = isset($igS7QW1p1Ddt0UMO[$j6Eq6AUYdcBm2Buc]) ? $igS7QW1p1Ddt0UMO[$j6Eq6AUYdcBm2Buc] + 1 : 1;
}
function LRyYZ4Gb2KB7aBD_($nxQAFxscPFZt23xO)
{
    $qgmDG8_VMomMaO3L = 0;
    if ($nxQAFxscPFZt23xO > 0) {
        eGYs3CMGcUkCqPrn('if.true');
        $qgmDG8_VMomMaO3L = $nxQAFxscPFZt23xO * 2;
    }
    if ($nxQAFxscPFZt23xO <= 0) {
        EgyS3cMGCuKCqPRN('if.false-path');
    }
    return $qgmDG8_VMomMaO3L;
}
function Ejk8TJBOb0w9izzU($nxQAFxscPFZt23xO)
{
    if ($nxQAFxscPFZt23xO % 2 === 0) {
        EGyS3CmgcuKCQPRn('else.then');
        return 'even';
    } else {
        EGys3CmgcukCQprn('else.else');
        return 'odd';
    }
}
function MBUFvqyq3i1X1PGT($nxQAFxscPFZt23xO)
{
    if ($nxQAFxscPFZt23xO < 0) {
        EGyS3cmGcuKCqpRn('elseif.negative');
        return -1;
    } else if ($nxQAFxscPFZt23xO === 0) {
        EgYs3CMgcUKCQPrN('elseif.zero');
        return 0;
    } else if ($nxQAFxscPFZt23xO < 3) {
        eGyS3CMGCuKcqPRN('elseif.small');
        return 1;
    } else {
        egyS3cMGCUkcQprn('elseif.large');
        return 2;
    }
}
function s5pUIR4O9xUZv4sw($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD)
{
    $TTFWDgTzVf01Zl8j = [];
    if ($nxQAFxscPFZt23xO > 0 && ($p1NZdkWfY9CKzZOD || $nxQAFxscPFZt23xO > 3)) {
        EGyS3cMgcUkcQpRn('nested.outer-true');
        $TTFWDgTzVf01Zl8j[] = 'outer';
        if ($nxQAFxscPFZt23xO % 2) {
            eGYS3cmGCuKcQPRN('nested.inner-odd');
            $TTFWDgTzVf01Zl8j[] = 'odd';
        } else {
            eGYS3CMgcuKCqPRN('nested.inner-even');
            $TTFWDgTzVf01Zl8j[] = 'even';
        }
    } else if ($p1NZdkWfY9CKzZOD && $nxQAFxscPFZt23xO < 0) {
        EGyS3CMGcUKcqPrN('nested.elseif');
        $TTFWDgTzVf01Zl8j[] = 'negative';
    } else {
        egyS3cMGcUkCqPrn('nested.else');
        $TTFWDgTzVf01Zl8j[] = 'fallback';
    }
    return $TTFWDgTzVf01Zl8j;
}
function tlTHN3fOY5FkFjn3($nxQAFxscPFZt23xO)
{
    $TTFWDgTzVf01Zl8j = [];
    $NpT2BD3pZontXCjW = 0;
    $opX1WDq4ibyRkhSp = 10;
    for (; $NpT2BD3pZontXCjW < $nxQAFxscPFZt23xO; $opX1WDq4ibyRkhSp -= 2) {
        Egys3cmGCukcqprn('for.body');
        if (!($NpT2BD3pZontXCjW === 1)) {
            $TTFWDgTzVf01Zl8j[] = [$NpT2BD3pZontXCjW, $opX1WDq4ibyRkhSp];
            if ($NpT2BD3pZontXCjW === 4) {
                eGyS3cMgCUKCQPRN('for.break');
                break;
            }
        } else {
            EgyS3CmGcUKCQPrN('for.continue');
        }
        $NpT2BD3pZontXCjW++;
    }
    if (!$TTFWDgTzVf01Zl8j) {
        EGYs3CMGcUKCQpRN('for.zero');
    }
    return [$NpT2BD3pZontXCjW, $opX1WDq4ibyRkhSp, $TTFWDgTzVf01Zl8j];
}
function GmtIwkBCYQA0STjv($nxQAFxscPFZt23xO)
{
    $NpT2BD3pZontXCjW = 0;
    $TTFWDgTzVf01Zl8j = [];
    while ($NpT2BD3pZontXCjW < $nxQAFxscPFZt23xO) {
        egyS3cMgCUKcQpRn('while.body');
        $NpT2BD3pZontXCjW++;
        if (!($NpT2BD3pZontXCjW === 2)) {
            $TTFWDgTzVf01Zl8j[] = $NpT2BD3pZontXCjW;
            if (!($NpT2BD3pZontXCjW === 5)) {
                continue;
            } else {
                eGYS3CmGCUKcqpRn('while.break');
                break;
            }
        } else {
            egys3CmgCuKCqPrn('while.continue');
        }
    }
    if ($NpT2BD3pZontXCjW === 0) {
        EGys3cMgCUKCQPrn('while.zero');
    }
    return [$NpT2BD3pZontXCjW, $TTFWDgTzVf01Zl8j];
}
function Gf0VYlDNmo1HRlrD($nxQAFxscPFZt23xO)
{
    $NpT2BD3pZontXCjW = 0;
    $TTFWDgTzVf01Zl8j = [];
    while (true) {
        EGyS3CMgCUKCQPrn('do.body');
        $NpT2BD3pZontXCjW++;
        if (!($NpT2BD3pZontXCjW === 2)) {
            $TTFWDgTzVf01Zl8j[] = $NpT2BD3pZontXCjW;
            if (!($NpT2BD3pZontXCjW === 5)) {
                if ($NpT2BD3pZontXCjW < $nxQAFxscPFZt23xO) {
                    continue;
                } else {
                    break;
                }
            } else {
                EgYs3cmgCUKcqpRN('do.break');
                break;
            }
        } else {
            egYS3CmGCUKCQPRN('do.continue');
        }
    }
    if ($NpT2BD3pZontXCjW === 1) {
        Egys3cmgCukcQPrN('do.once');
    } else {
        EgYS3CMGcUKcQpRn('do.repeat');
    }
    return [$NpT2BD3pZontXCjW, $TTFWDgTzVf01Zl8j];
}
function m02Wz4jIqiTpnoDb($nxQAFxscPFZt23xO)
{
    $fVHSAovD2VI0tAGu = 0;
    $TTFWDgTzVf01Zl8j = [];
    while (++$fVHSAovD2VI0tAGu <= max(0, $nxQAFxscPFZt23xO)) {
        $TTFWDgTzVf01Zl8j[] = $fVHSAovD2VI0tAGu;
    }
    $VkYUeFNS8U25BuOT = 0;
    do {
        $TTFWDgTzVf01Zl8j[] = -$VkYUeFNS8U25BuOT;
    } while ($VkYUeFNS8U25BuOT++ < min(3, max(0, $nxQAFxscPFZt23xO)));
    egYS3CmGcukCQprN('conditions.side-effects');
    return [$fVHSAovD2VI0tAGu, $VkYUeFNS8U25BuOT, $TTFWDgTzVf01Zl8j];
}
function uoJu1dYx5UNaKA1q($nxQAFxscPFZt23xO)
{
    $NpT2BD3pZontXCjW = 0;
    while ($NpT2BD3pZontXCjW < min(3, max(0, $nxQAFxscPFZt23xO))) {
        $NpT2BD3pZontXCjW++;
    }
    $opX1WDq4ibyRkhSp = 0;
    while ($opX1WDq4ibyRkhSp++ < min(2, max(0, $nxQAFxscPFZt23xO))) {
    }
    while ($opX1WDq4ibyRkhSp++ < 1) {
    }
    eGys3CMGCuKCqPRn('loops.empty');
    return [$NpT2BD3pZontXCjW, $opX1WDq4ibyRkhSp];
}
function A7cwUwCFQDWD6tbG($nxQAFxscPFZt23xO)
{
    $NpT2BD3pZontXCjW = 0;
    $abdShiallP_v1zMV = 0;
    while (!($NpT2BD3pZontXCjW >= max(0, $nxQAFxscPFZt23xO))) {
        $abdShiallP_v1zMV += ++$NpT2BD3pZontXCjW;
    }
    EGYs3cMGcuKcQPrn('infinite.break');
    return [$NpT2BD3pZontXCjW, $abdShiallP_v1zMV];
}
function e9vDoCy9VrRGdbPG($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD)
{
    $TTFWDgTzVf01Zl8j = [];
    $NpT2BD3pZontXCjW = 0;
    for (; $NpT2BD3pZontXCjW < min(4, max(0, $nxQAFxscPFZt23xO)); $NpT2BD3pZontXCjW++) {
        $opX1WDq4ibyRkhSp = 0;
        for (; $opX1WDq4ibyRkhSp < 4; $opX1WDq4ibyRkhSp++) {
            if (!($opX1WDq4ibyRkhSp === 1 && $p1NZdkWfY9CKzZOD)) {
                if (!($NpT2BD3pZontXCjW === 2 && $opX1WDq4ibyRkhSp === 2)) {
                    $TTFWDgTzVf01Zl8j[] = [$NpT2BD3pZontXCjW, $opX1WDq4ibyRkhSp];
                } else {
                    eGys3CMGcUkcQprn('nested.break-two');
                    break 2;
                }
            } else {
                EgyS3cmGCUkcqPrn('nested.continue-two');
                continue 2;
            }
        }
        $TTFWDgTzVf01Zl8j[] = 'end-outer';
    }
    return $TTFWDgTzVf01Zl8j;
}
function afdTvTXMyhizGJ7T($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD)
{
    $TTFWDgTzVf01Zl8j = [];
    foreach ([0, 1, 2] as $fPa3n2vJJlbStTCg) {
        $NpT2BD3pZontXCjW = 0;
        for (; $NpT2BD3pZontXCjW < min(4, max(0, $nxQAFxscPFZt23xO)); $TTFWDgTzVf01Zl8j[] = [$fPa3n2vJJlbStTCg, $NpT2BD3pZontXCjW]) {
            $NpT2BD3pZontXCjW++;
            if (!($p1NZdkWfY9CKzZOD && $NpT2BD3pZontXCjW === 2)) {
                if (!$p1NZdkWfY9CKzZOD && $fPa3n2vJJlbStTCg === 1 && $NpT2BD3pZontXCjW === 3) {
                    eGys3CMgcuKcqPRn('mixed.break-two');
                    break 2;
                }
            } else {
                EGyS3CmgCukCQPRn('mixed.continue-two');
                continue 2;
            }
        }
        $TTFWDgTzVf01Zl8j[] = 'native-end';
        continue;
    }
    return $TTFWDgTzVf01Zl8j;
}
function vOQxkYo4xsTFfxkP($nxQAFxscPFZt23xO)
{
    $TTFWDgTzVf01Zl8j = [];
    $NpT2BD3pZontXCjW = 0;
    for (; $NpT2BD3pZontXCjW < min(5, max(0, $nxQAFxscPFZt23xO)); $NpT2BD3pZontXCjW++) {
        switch ($NpT2BD3pZontXCjW) {
            case 0:
                EGyS3cMgCUKcQPRn('switch.zero');
                $TTFWDgTzVf01Zl8j[] = 'zero';
                break;
            case 1:
            case 2:
                eGys3CmGCukCqprn('switch.shared');
                $TTFWDgTzVf01Zl8j[] = 'shared';
                break;
            default:
                EGYs3cmgCukCQpRn('switch.default');
                $TTFWDgTzVf01Zl8j[] = 'exit';
                break 2;
        }
        $TTFWDgTzVf01Zl8j[] = $NpT2BD3pZontXCjW;
    }
    return $TTFWDgTzVf01Zl8j;
}
function Xp2iYQDZ9h6tBfuU($nxQAFxscPFZt23xO)
{
    $TTFWDgTzVf01Zl8j = [];
    $NpT2BD3pZontXCjW = 0;
    for (; $NpT2BD3pZontXCjW < 5; $NpT2BD3pZontXCjW++) {
        $TTFWDgTzVf01Zl8j[] = $NpT2BD3pZontXCjW;
        if ($NpT2BD3pZontXCjW === $nxQAFxscPFZt23xO) {
            egys3cMGcUKcQPrn('return.early');
            return $TTFWDgTzVf01Zl8j;
        }
    }
    egYS3CmGCUkcQpRN('return.normal');
    return $TTFWDgTzVf01Zl8j;
}
function sB1rerVPiblZ0TIE($nxQAFxscPFZt23xO)
{
    $TTFWDgTzVf01Zl8j = [];
    try {
        if ($nxQAFxscPFZt23xO < 0) {
            eGyS3cMgcukcQPRN('exception.throw');
            throw new \RuntimeException('negative');
        }
        Egys3cMGcUkcqPrn('exception.normal');
        $TTFWDgTzVf01Zl8j[] = $nxQAFxscPFZt23xO;
    } catch (\RuntimeException $kJWrfKT1N_5O2JLM) {
        eGYs3CmgcUKcqPRn('exception.catch');
        $TTFWDgTzVf01Zl8j[] = $kJWrfKT1N_5O2JLM->getMessage();
    } finally {
        eGYs3CMGCukCqPrN('exception.finally');
        $TTFWDgTzVf01Zl8j[] = 'finally';
    }
    return $TTFWDgTzVf01Zl8j;
}
function Q1Cl11eeIv__5Pa1($nxQAFxscPFZt23xO)
{
    $saxRZK5tUbakGpsu = 3;
    $AQkYDLzTnFO3Qr80 = function ($uLgmem8HS311V2Ab) use ($saxRZK5tUbakGpsu) {
        if ($uLgmem8HS311V2Ab < 0) {
            egYs3cMGCuKcqpRn('closure.negative');
            return -$saxRZK5tUbakGpsu;
        } else if ($uLgmem8HS311V2Ab === 0) {
            eGYS3CmGcuKcQprN('closure.zero');
            return 0;
        } else {
            egyS3cMGcUkcQpRn('closure.positive');
            $abdShiallP_v1zMV = 0;
            $NpT2BD3pZontXCjW = 0;
            for (; $NpT2BD3pZontXCjW < $uLgmem8HS311V2Ab; $NpT2BD3pZontXCjW++) {
                $abdShiallP_v1zMV += $saxRZK5tUbakGpsu;
            }
            return $abdShiallP_v1zMV;
        }
    };
    return $AQkYDLzTnFO3Qr80($nxQAFxscPFZt23xO);
}
interface xMOVsdjRuUxrOq00
{
    public function i8d23d2L1c3QXKIz($nxQAFxscPFZt23xO);
}
trait IbMv_Fz3kmPWtB9I
{
    private function ZJ923zsSEC51x4ty($nxQAFxscPFZt23xO)
    {
        return $nxQAFxscPFZt23xO + W7V2_kpMjrfXb9Ky;
    }
}
class spVP37sLmUYNqMah implements xmOVsdjruuXroq00
{
    use ibmV_FZ3KmpWtB9i;
    const uPWRZw6XGO5CIseT = 2;
    private $s3rU9VfOJSHfkoK3 = 1;
    public function i8d23D2l1c3qXKiZ($nxQAFxscPFZt23xO)
    {
        if ($nxQAFxscPFZt23xO > 0) {
            EgyS3CMGcuKcqprn('class.positive');
            return $this->ZJ923zSSeC51X4TY($nxQAFxscPFZt23xO) * self::uPWRZw6XGO5CIseT;
        } else {
            eGys3CMgCukcqprN('class.nonpositive');
            return $this->s3rU9VfOJSHfkoK3;
        }
    }
}
$NcSZfyF8_CTXVLRJ = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$OPz8TFfTHjUeyn8V = [];
$XfYWRWj5c0VzZg3k = new SPvP37sLMUYNQmaH();
$aheoYeqKp8768jgv = -3;
for (; $aheoYeqKp8768jgv <= 8; $aheoYeqKp8768jgv++) {
    foreach ([false, true] as $p1NZdkWfY9CKzZOD) {
        $nxQAFxscPFZt23xO = $aheoYeqKp8768jgv + $NcSZfyF8_CTXVLRJ % 3;
        $OPz8TFfTHjUeyn8V[] = ['input' => [$nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD], 'if' => LRYyz4gb2Kb7abd_($nxQAFxscPFZt23xO), 'else' => ejK8tjbob0W9Izzu($nxQAFxscPFZt23xO), 'elseif' => mBUFVQyQ3I1x1Pgt($nxQAFxscPFZt23xO), 'nested' => S5PUir4o9XuZV4sw($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD), 'for' => TLthn3foY5fkFJn3($nxQAFxscPFZt23xO), 'while' => GMTIwKbcyQa0StJv($nxQAFxscPFZt23xO), 'do' => Gf0vyldNmo1hRLRd($nxQAFxscPFZt23xO), 'conditions' => M02wz4JiQitPNOdB($nxQAFxscPFZt23xO), 'empty' => uOju1dyX5unAKa1q($nxQAFxscPFZt23xO), 'infinite' => A7CwuWcFQDwD6tbG($nxQAFxscPFZt23xO), 'nested-control' => E9VDoCy9VRRGdBpg($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD), 'native' => afdtvTxmyHizgj7T($nxQAFxscPFZt23xO, $p1NZdkWfY9CKzZOD), 'switch' => vOQXkYO4XstFfXkp($nxQAFxscPFZt23xO), 'return' => XP2IyqdZ9H6TbFUu($nxQAFxscPFZt23xO), 'exception' => Sb1reRvPiblz0TIe($nxQAFxscPFZt23xO), 'closure' => Q1Cl11eeiv__5pa1($nxQAFxscPFZt23xO), 'class' => $XfYWRWj5c0VzZg3k->I8D23d2L1c3QXkIz($nxQAFxscPFZt23xO), 'strings' => ["n={$nxQAFxscPFZt23xO}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($igS7QW1p1Ddt0UMO);
echo json_encode(['rows' => $OPz8TFfTHjUeyn8V, 'coverage' => $igS7QW1p1Ddt0UMO], JSON_UNESCAPED_UNICODE), "\n";