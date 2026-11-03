<?php

namespace oqH1LDNMytIlYTXD;

const iUtlpL5Z0W_hRBxg = 7;
$yDndNGecvFDDKdTf = [];
function QUEkJblJV7VTytMP($kUdAp1hSjRE52GYp)
{
    global $yDndNGecvFDDKdTf;
    $yDndNGecvFDDKdTf[$kUdAp1hSjRE52GYp] = isset($yDndNGecvFDDKdTf[$kUdAp1hSjRE52GYp]) ? $yDndNGecvFDDKdTf[$kUdAp1hSjRE52GYp] + 1 : 1;
}
function kFviLwJA44kPTsBc($foIOLJafdEDjkTQi)
{
    $KdK1iEQrY1SXdQ64 = 0;
    if ($foIOLJafdEDjkTQi > 0) {
        QUekJBLjV7VTytMP('if.true');
        $KdK1iEQrY1SXdQ64 = $foIOLJafdEDjkTQi * 2;
    }
    if ($foIOLJafdEDjkTQi <= 0) {
        QUeKjbLjv7VtytMp('if.false-path');
    }
    return $KdK1iEQrY1SXdQ64;
}
function AHFzrqBKwvOR_iKU($foIOLJafdEDjkTQi)
{
    if ($foIOLJafdEDjkTQi % 2 === 0) {
        QUEkjBljv7VTytmp('else.then');
        return 'even';
    } else {
        QuekjbLJV7vtyTMp('else.else');
        return 'odd';
    }
}
function h8lG1ekp7W4lbAga($foIOLJafdEDjkTQi)
{
    if ($foIOLJafdEDjkTQi < 0) {
        QUEkjblJV7VtyTmp('elseif.negative');
        return -1;
    } else if ($foIOLJafdEDjkTQi === 0) {
        qUEkjbLjV7VTyTmp('elseif.zero');
        return 0;
    } else if ($foIOLJafdEDjkTQi < 3) {
        qUEKjBLjv7VtyTmp('elseif.small');
        return 1;
    } else {
        quEKJbljv7vtYTmP('elseif.large');
        return 2;
    }
}
function F_549rK9XjQ4LLiN($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm)
{
    $nU9mWqRoz0sGkdnT = [];
    if ($foIOLJafdEDjkTQi > 0 && ($kw9fefeqQCgYbZtm || $foIOLJafdEDjkTQi > 3)) {
        quEKjblJV7vtYtMp('nested.outer-true');
        $nU9mWqRoz0sGkdnT[] = 'outer';
        if ($foIOLJafdEDjkTQi % 2) {
            quEkJbLjv7VtYTmp('nested.inner-odd');
            $nU9mWqRoz0sGkdnT[] = 'odd';
        } else {
            queKjbljv7vtYtMP('nested.inner-even');
            $nU9mWqRoz0sGkdnT[] = 'even';
        }
    } else if ($kw9fefeqQCgYbZtm && $foIOLJafdEDjkTQi < 0) {
        qUEKJbLjV7VtYTmP('nested.elseif');
        $nU9mWqRoz0sGkdnT[] = 'negative';
    } else {
        QuEkjbLJV7VTYtMP('nested.else');
        $nU9mWqRoz0sGkdnT[] = 'fallback';
    }
    return $nU9mWqRoz0sGkdnT;
}
function v1q1ybkKpNNcK39P($foIOLJafdEDjkTQi)
{
    $nU9mWqRoz0sGkdnT = [];
    $VPSpz88cfWUY5mDy = 0;
    $uV0CMabH6qyb27Yf = 10;
    for (; $VPSpz88cfWUY5mDy < $foIOLJafdEDjkTQi; $uV0CMabH6qyb27Yf -= 2) {
        qUEKJBLjv7vtYTmp('for.body');
        if (!($VPSpz88cfWUY5mDy === 1)) {
            $nU9mWqRoz0sGkdnT[] = [$VPSpz88cfWUY5mDy, $uV0CMabH6qyb27Yf];
            if ($VPSpz88cfWUY5mDy === 4) {
                qUekjblJv7VTYTMp('for.break');
                break;
            }
        } else {
            queKjbljv7VTyTmP('for.continue');
        }
        $VPSpz88cfWUY5mDy++;
    }
    if (!$nU9mWqRoz0sGkdnT) {
        qUEkjbLJv7VTyTMP('for.zero');
    }
    return [$VPSpz88cfWUY5mDy, $uV0CMabH6qyb27Yf, $nU9mWqRoz0sGkdnT];
}
function UQu_GGwQtmiN_NGd($foIOLJafdEDjkTQi)
{
    $VPSpz88cfWUY5mDy = 0;
    $nU9mWqRoz0sGkdnT = [];
    while ($VPSpz88cfWUY5mDy < $foIOLJafdEDjkTQi) {
        QuEkJBLJv7VTyTMp('while.body');
        $VPSpz88cfWUY5mDy++;
        if (!($VPSpz88cfWUY5mDy === 2)) {
            $nU9mWqRoz0sGkdnT[] = $VPSpz88cfWUY5mDy;
            if (!($VPSpz88cfWUY5mDy === 5)) {
                continue;
            } else {
                QUeKjbLJv7vTYTmP('while.break');
                break;
            }
        } else {
            quekJBljV7vtYTMp('while.continue');
        }
    }
    if ($VPSpz88cfWUY5mDy === 0) {
        QuekjBLJV7VTytmP('while.zero');
    }
    return [$VPSpz88cfWUY5mDy, $nU9mWqRoz0sGkdnT];
}
function WQuhUe9c7q0YPK2J($foIOLJafdEDjkTQi)
{
    $VPSpz88cfWUY5mDy = 0;
    $nU9mWqRoz0sGkdnT = [];
    while (true) {
        qUeKjBlJV7VtytmP('do.body');
        $VPSpz88cfWUY5mDy++;
        if (!($VPSpz88cfWUY5mDy === 2)) {
            $nU9mWqRoz0sGkdnT[] = $VPSpz88cfWUY5mDy;
            if (!($VPSpz88cfWUY5mDy === 5)) {
                if ($VPSpz88cfWUY5mDy < $foIOLJafdEDjkTQi) {
                    continue;
                } else {
                    break;
                }
            } else {
                qUEKJbLJV7VtYTmP('do.break');
                break;
            }
        } else {
            QUEkjBlJV7vTYTMP('do.continue');
        }
    }
    if ($VPSpz88cfWUY5mDy === 1) {
        QUEkJblJv7VtyTmp('do.once');
    } else {
        QueKjbLjv7VTytMP('do.repeat');
    }
    return [$VPSpz88cfWUY5mDy, $nU9mWqRoz0sGkdnT];
}
function htLteBj67SSF3tFT($foIOLJafdEDjkTQi)
{
    $nheezlMw5QQQRZ9C = 0;
    $nU9mWqRoz0sGkdnT = [];
    while (++$nheezlMw5QQQRZ9C <= max(0, $foIOLJafdEDjkTQi)) {
        $nU9mWqRoz0sGkdnT[] = $nheezlMw5QQQRZ9C;
    }
    $qR3JZe4iS1qgdG6K = 0;
    do {
        $nU9mWqRoz0sGkdnT[] = -$qR3JZe4iS1qgdG6K;
    } while ($qR3JZe4iS1qgdG6K++ < min(3, max(0, $foIOLJafdEDjkTQi)));
    qUEKjbLjV7VtYtMP('conditions.side-effects');
    return [$nheezlMw5QQQRZ9C, $qR3JZe4iS1qgdG6K, $nU9mWqRoz0sGkdnT];
}
function MymWyv3zJnuJjK_G($foIOLJafdEDjkTQi)
{
    $VPSpz88cfWUY5mDy = 0;
    while ($VPSpz88cfWUY5mDy < min(3, max(0, $foIOLJafdEDjkTQi))) {
        $VPSpz88cfWUY5mDy++;
    }
    $uV0CMabH6qyb27Yf = 0;
    while ($uV0CMabH6qyb27Yf++ < min(2, max(0, $foIOLJafdEDjkTQi))) {
    }
    while ($uV0CMabH6qyb27Yf++ < 1) {
    }
    QuekJBljV7VTYtMP('loops.empty');
    return [$VPSpz88cfWUY5mDy, $uV0CMabH6qyb27Yf];
}
function Bf7H7sPxPmVc8twX($foIOLJafdEDjkTQi)
{
    $VPSpz88cfWUY5mDy = 0;
    $wFB2VG5UKknlqYy6 = 0;
    while (!($VPSpz88cfWUY5mDy >= max(0, $foIOLJafdEDjkTQi))) {
        $wFB2VG5UKknlqYy6 += ++$VPSpz88cfWUY5mDy;
    }
    queKJBlJv7VtytmP('infinite.break');
    return [$VPSpz88cfWUY5mDy, $wFB2VG5UKknlqYy6];
}
function sI13REWAATVICuPU($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm)
{
    $nU9mWqRoz0sGkdnT = [];
    $VPSpz88cfWUY5mDy = 0;
    for (; $VPSpz88cfWUY5mDy < min(4, max(0, $foIOLJafdEDjkTQi)); $VPSpz88cfWUY5mDy++) {
        $uV0CMabH6qyb27Yf = 0;
        for (; $uV0CMabH6qyb27Yf < 4; $uV0CMabH6qyb27Yf++) {
            if (!($uV0CMabH6qyb27Yf === 1 && $kw9fefeqQCgYbZtm)) {
                if (!($VPSpz88cfWUY5mDy === 2 && $uV0CMabH6qyb27Yf === 2)) {
                    $nU9mWqRoz0sGkdnT[] = [$VPSpz88cfWUY5mDy, $uV0CMabH6qyb27Yf];
                } else {
                    QueKJBljV7VTytMP('nested.break-two');
                    break 2;
                }
            } else {
                qUekJbLjV7VtytMP('nested.continue-two');
                continue 2;
            }
        }
        $nU9mWqRoz0sGkdnT[] = 'end-outer';
    }
    return $nU9mWqRoz0sGkdnT;
}
function eQ_WI7DKaFxNU2gW($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm)
{
    $nU9mWqRoz0sGkdnT = [];
    foreach ([0, 1, 2] as $l5sY9U4RdyBrJvdJ) {
        $VPSpz88cfWUY5mDy = 0;
        for (; $VPSpz88cfWUY5mDy < min(4, max(0, $foIOLJafdEDjkTQi)); $nU9mWqRoz0sGkdnT[] = [$l5sY9U4RdyBrJvdJ, $VPSpz88cfWUY5mDy]) {
            $VPSpz88cfWUY5mDy++;
            if (!($kw9fefeqQCgYbZtm && $VPSpz88cfWUY5mDy === 2)) {
                if (!$kw9fefeqQCgYbZtm && $l5sY9U4RdyBrJvdJ === 1 && $VPSpz88cfWUY5mDy === 3) {
                    QuEKjblJV7vTyTmP('mixed.break-two');
                    break 2;
                }
            } else {
                queKjBLJv7VTYTmP('mixed.continue-two');
                continue 2;
            }
        }
        $nU9mWqRoz0sGkdnT[] = 'native-end';
        continue;
    }
    return $nU9mWqRoz0sGkdnT;
}
function b8fPYlnLZoycyWL5($foIOLJafdEDjkTQi)
{
    $nU9mWqRoz0sGkdnT = [];
    $VPSpz88cfWUY5mDy = 0;
    for (; $VPSpz88cfWUY5mDy < min(5, max(0, $foIOLJafdEDjkTQi)); $VPSpz88cfWUY5mDy++) {
        switch ($VPSpz88cfWUY5mDy) {
            case 0:
                QUEKjblJv7vtytMP('switch.zero');
                $nU9mWqRoz0sGkdnT[] = 'zero';
                break;
            case 1:
            case 2:
                QueKJbLjv7vTyTMp('switch.shared');
                $nU9mWqRoz0sGkdnT[] = 'shared';
                break;
            default:
                QuekjBLJV7VtYtMp('switch.default');
                $nU9mWqRoz0sGkdnT[] = 'exit';
                break 2;
        }
        $nU9mWqRoz0sGkdnT[] = $VPSpz88cfWUY5mDy;
    }
    return $nU9mWqRoz0sGkdnT;
}
function kAH5Yw3pbGjtWJNw($foIOLJafdEDjkTQi)
{
    $nU9mWqRoz0sGkdnT = [];
    $VPSpz88cfWUY5mDy = 0;
    for (; $VPSpz88cfWUY5mDy < 5; $VPSpz88cfWUY5mDy++) {
        $nU9mWqRoz0sGkdnT[] = $VPSpz88cfWUY5mDy;
        if ($VPSpz88cfWUY5mDy === $foIOLJafdEDjkTQi) {
            QUekjBlJV7VTyTmp('return.early');
            return $nU9mWqRoz0sGkdnT;
        }
    }
    qUEKJblJV7VTyTmp('return.normal');
    return $nU9mWqRoz0sGkdnT;
}
function luj8W2ukXncMgKmI($foIOLJafdEDjkTQi)
{
    $nU9mWqRoz0sGkdnT = [];
    try {
        if ($foIOLJafdEDjkTQi < 0) {
            QUeKJbLJV7VtytMP('exception.throw');
            throw new \RuntimeException('negative');
        }
        QuEKjBLJV7vtYTmP('exception.normal');
        $nU9mWqRoz0sGkdnT[] = $foIOLJafdEDjkTQi;
    } catch (\RuntimeException $vUusXc5K1TauKeX9) {
        qUekJblJv7VtyTmP('exception.catch');
        $nU9mWqRoz0sGkdnT[] = $vUusXc5K1TauKeX9->getMessage();
    } finally {
        QUekjbLjv7VTytmP('exception.finally');
        $nU9mWqRoz0sGkdnT[] = 'finally';
    }
    return $nU9mWqRoz0sGkdnT;
}
function CvNMQ9ynZsEsU6aQ($foIOLJafdEDjkTQi)
{
    $WBFmFVLaENdRz4jO = 3;
    $ZyKxXJylRxJOrJpU = function ($g1RU_WGFoXzqAQmu) use ($WBFmFVLaENdRz4jO) {
        if ($g1RU_WGFoXzqAQmu < 0) {
            queKJbLJv7vTyTmP('closure.negative');
            return -$WBFmFVLaENdRz4jO;
        } else if ($g1RU_WGFoXzqAQmu === 0) {
            qUekjbLjv7VTyTmP('closure.zero');
            return 0;
        } else {
            QueKJBljv7VtYTmp('closure.positive');
            $wFB2VG5UKknlqYy6 = 0;
            $VPSpz88cfWUY5mDy = 0;
            for (; $VPSpz88cfWUY5mDy < $g1RU_WGFoXzqAQmu; $VPSpz88cfWUY5mDy++) {
                $wFB2VG5UKknlqYy6 += $WBFmFVLaENdRz4jO;
            }
            return $wFB2VG5UKknlqYy6;
        }
    };
    return $ZyKxXJylRxJOrJpU($foIOLJafdEDjkTQi);
}
interface Ba9_qEXRbbUXL9yz
{
    public function S0o_Ua_BicmaEwBt($foIOLJafdEDjkTQi);
}
trait ZVDl7_gyuhoGuazE
{
    private function Fn8XCHSLElgMSl87($foIOLJafdEDjkTQi)
    {
        return $foIOLJafdEDjkTQi + iUtlpL5Z0W_hRBxg;
    }
}
class dSzDVzQJjkha3XXe implements bA9_qExrBBuXl9yz
{
    use zVDl7_GyuHoGuAZe;
    const h8yjhwwTDtQtDC4o = 2;
    private $qhaIZlRIxQdIpkqb = 1;
    public function s0o_Ua_bIcmaEWbT($foIOLJafdEDjkTQi)
    {
        if ($foIOLJafdEDjkTQi > 0) {
            QUekjbLJv7VTyTMp('class.positive');
            return $this->FN8XChslElGmsl87($foIOLJafdEDjkTQi) * self::h8yjhwwTDtQtDC4o;
        } else {
            qUEkJBljV7VTytMP('class.nonpositive');
            return $this->qhaIZlRIxQdIpkqb;
        }
    }
}
$BOOg70eLk_YsKjmM = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$CBxR9h0Ax7o6jpMi = [];
$BvuPGH3DSkGnrXfB = new DSZdVZQJJkha3xXE();
$YnLqRhLoOPzYBdL7 = -3;
for (; $YnLqRhLoOPzYBdL7 <= 8; $YnLqRhLoOPzYBdL7++) {
    foreach ([false, true] as $kw9fefeqQCgYbZtm) {
        $foIOLJafdEDjkTQi = $YnLqRhLoOPzYBdL7 + $BOOg70eLk_YsKjmM % 3;
        $CBxR9h0Ax7o6jpMi[] = ['input' => [$foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm], 'if' => KfvIlWjA44kptsBc($foIOLJafdEDjkTQi), 'else' => AhfzrqBkWVoR_IKU($foIOLJafdEDjkTQi), 'elseif' => h8lg1Ekp7W4LbagA($foIOLJafdEDjkTQi), 'nested' => F_549rK9xJQ4lLin($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm), 'for' => v1q1YbKKPnNCk39P($foIOLJafdEDjkTQi), 'while' => Uqu_ggwqtmIn_nGd($foIOLJafdEDjkTQi), 'do' => wQuhue9C7q0ypK2j($foIOLJafdEDjkTQi), 'conditions' => htLTebJ67SsF3tFt($foIOLJafdEDjkTQi), 'empty' => mYmWyV3zjNuJjK_G($foIOLJafdEDjkTQi), 'infinite' => BF7H7sPxPmVc8tWX($foIOLJafdEDjkTQi), 'nested-control' => SI13rewaAtvICupU($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm), 'native' => eQ_wi7dKAFxnU2GW($foIOLJafdEDjkTQi, $kw9fefeqQCgYbZtm), 'switch' => B8FpYLNlzOyCYWl5($foIOLJafdEDjkTQi), 'return' => kAh5Yw3PbGJtWJnW($foIOLJafdEDjkTQi), 'exception' => lUj8W2ukxnCmGKmi($foIOLJafdEDjkTQi), 'closure' => cVNmq9ynZSeSu6aQ($foIOLJafdEDjkTQi), 'class' => $BvuPGH3DSkGnrXfB->s0o_UA_BicmAeWBT($foIOLJafdEDjkTQi), 'strings' => ["n={$foIOLJafdEDjkTQi}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($yDndNGecvFDDKdTf);
echo json_encode(['rows' => $CBxR9h0Ax7o6jpMi, 'coverage' => $yDndNGecvFDDKdTf], JSON_UNESCAPED_UNICODE), "\n";