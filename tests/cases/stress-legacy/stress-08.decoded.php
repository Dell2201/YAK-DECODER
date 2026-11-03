<?php

namespace t2z8i_qZVW5FM34a;

const lW2tFLs6gwMEqFST = 7;
$wXSTk2FGnKH7ULRA = [];
function Q_AijEkN1OkiQY6n($lTm1ND4UXlWlxlHL)
{
    global $wXSTk2FGnKH7ULRA;
    $wXSTk2FGnKH7ULRA[$lTm1ND4UXlWlxlHL] = isset($wXSTk2FGnKH7ULRA[$lTm1ND4UXlWlxlHL]) ? $wXSTk2FGnKH7ULRA[$lTm1ND4UXlWlxlHL] + 1 : 1;
}
function DzAqD9ERffuiSIam($a_X_uhYBZ7hOJ0wP)
{
    $yKxupmOuxOOxpXLL = 0;
    if ($a_X_uhYBZ7hOJ0wP > 0) {
        Q_aIjeKn1okiQY6N('if.true');
        $yKxupmOuxOOxpXLL = $a_X_uhYBZ7hOJ0wP * 2;
    }
    if ($a_X_uhYBZ7hOJ0wP <= 0) {
        Q_aIJEkn1OkIqY6N('if.false-path');
    }
    return $yKxupmOuxOOxpXLL;
}
function PK4vU58K4ATi6Mo8($a_X_uhYBZ7hOJ0wP)
{
    if ($a_X_uhYBZ7hOJ0wP % 2 === 0) {
        q_AIJEKn1OkIQY6n('else.then');
        return 'even';
    } else {
        Q_aIjekN1OkiqY6N('else.else');
        return 'odd';
    }
}
function yqIefOINRXHVg6dF($a_X_uhYBZ7hOJ0wP)
{
    if ($a_X_uhYBZ7hOJ0wP < 0) {
        Q_AiJEKn1OkIQy6N('elseif.negative');
        return -1;
    } else if ($a_X_uhYBZ7hOJ0wP === 0) {
        Q_AiJekN1okiQy6N('elseif.zero');
        return 0;
    } else if ($a_X_uhYBZ7hOJ0wP < 3) {
        Q_AiJEkN1oKIQY6N('elseif.small');
        return 1;
    } else {
        q_aIJeKN1oKIqY6N('elseif.large');
        return 2;
    }
}
function QYFLtCrwNPqMQZWl($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP)
{
    $dsIXJfHV9Reo42SD = [];
    if ($a_X_uhYBZ7hOJ0wP > 0 && ($XyZySKc5TSZdbBRP || $a_X_uhYBZ7hOJ0wP > 3)) {
        q_aIjEkn1okiQy6n('nested.outer-true');
        $dsIXJfHV9Reo42SD[] = 'outer';
        if ($a_X_uhYBZ7hOJ0wP % 2) {
            Q_aIjEkn1OkiQy6n('nested.inner-odd');
            $dsIXJfHV9Reo42SD[] = 'odd';
        } else {
            q_AIjeKN1oKiqy6n('nested.inner-even');
            $dsIXJfHV9Reo42SD[] = 'even';
        }
    } else if ($XyZySKc5TSZdbBRP && $a_X_uhYBZ7hOJ0wP < 0) {
        Q_AIjEKN1OkIqY6n('nested.elseif');
        $dsIXJfHV9Reo42SD[] = 'negative';
    } else {
        q_aiJEkn1OKiQy6N('nested.else');
        $dsIXJfHV9Reo42SD[] = 'fallback';
    }
    return $dsIXJfHV9Reo42SD;
}
function aqs3DbWSPXKWAnCF($a_X_uhYBZ7hOJ0wP)
{
    $dsIXJfHV9Reo42SD = [];
    $mTzYtvMv5YfdIZy4 = 0;
    $N2BvfUFp_C63sU4P = 10;
    for (; $mTzYtvMv5YfdIZy4 < $a_X_uhYBZ7hOJ0wP; $N2BvfUFp_C63sU4P -= 2) {
        Q_aijEKN1OKiqY6n('for.body');
        if (!($mTzYtvMv5YfdIZy4 === 1)) {
            $dsIXJfHV9Reo42SD[] = [$mTzYtvMv5YfdIZy4, $N2BvfUFp_C63sU4P];
            if ($mTzYtvMv5YfdIZy4 === 4) {
                q_aIjekN1OkIQy6N('for.break');
                break;
            }
        } else {
            q_aIjEKn1OKIqy6n('for.continue');
        }
        $mTzYtvMv5YfdIZy4++;
    }
    if (!$dsIXJfHV9Reo42SD) {
        Q_AijeKn1oKIQY6n('for.zero');
    }
    return [$mTzYtvMv5YfdIZy4, $N2BvfUFp_C63sU4P, $dsIXJfHV9Reo42SD];
}
function kr3xBKYQv9UpWnQr($a_X_uhYBZ7hOJ0wP)
{
    $mTzYtvMv5YfdIZy4 = 0;
    $dsIXJfHV9Reo42SD = [];
    while ($mTzYtvMv5YfdIZy4 < $a_X_uhYBZ7hOJ0wP) {
        q_AijekN1oKiqY6N('while.body');
        $mTzYtvMv5YfdIZy4++;
        if (!($mTzYtvMv5YfdIZy4 === 2)) {
            $dsIXJfHV9Reo42SD[] = $mTzYtvMv5YfdIZy4;
            if (!($mTzYtvMv5YfdIZy4 === 5)) {
                continue;
            } else {
                Q_aijekN1OkiQy6n('while.break');
                break;
            }
        } else {
            Q_aiJEkn1oKiqy6N('while.continue');
        }
    }
    if ($mTzYtvMv5YfdIZy4 === 0) {
        Q_aIJeKn1okiQy6n('while.zero');
    }
    return [$mTzYtvMv5YfdIZy4, $dsIXJfHV9Reo42SD];
}
function mEp2VilYogW2B6Zf($a_X_uhYBZ7hOJ0wP)
{
    $mTzYtvMv5YfdIZy4 = 0;
    $dsIXJfHV9Reo42SD = [];
    while (true) {
        q_aIjEKn1oKIQy6N('do.body');
        $mTzYtvMv5YfdIZy4++;
        if (!($mTzYtvMv5YfdIZy4 === 2)) {
            $dsIXJfHV9Reo42SD[] = $mTzYtvMv5YfdIZy4;
            if (!($mTzYtvMv5YfdIZy4 === 5)) {
                if ($mTzYtvMv5YfdIZy4 < $a_X_uhYBZ7hOJ0wP) {
                    continue;
                } else {
                    break;
                }
            } else {
                Q_Aijekn1OKIQY6n('do.break');
                break;
            }
        } else {
            Q_AiJekn1oKiQY6N('do.continue');
        }
    }
    if ($mTzYtvMv5YfdIZy4 === 1) {
        q_AIJEKn1Okiqy6N('do.once');
    } else {
        q_AIjekN1okIqY6N('do.repeat');
    }
    return [$mTzYtvMv5YfdIZy4, $dsIXJfHV9Reo42SD];
}
function PanY9rtmqPEx2B0q($a_X_uhYBZ7hOJ0wP)
{
    $g3yNTgg2tl0Z1oSK = 0;
    $dsIXJfHV9Reo42SD = [];
    while (++$g3yNTgg2tl0Z1oSK <= max(0, $a_X_uhYBZ7hOJ0wP)) {
        $dsIXJfHV9Reo42SD[] = $g3yNTgg2tl0Z1oSK;
    }
    $CYyM0QHa8ViyZVVJ = 0;
    do {
        $dsIXJfHV9Reo42SD[] = -$CYyM0QHa8ViyZVVJ;
    } while ($CYyM0QHa8ViyZVVJ++ < min(3, max(0, $a_X_uhYBZ7hOJ0wP)));
    Q_aiJEKn1okiqY6N('conditions.side-effects');
    return [$g3yNTgg2tl0Z1oSK, $CYyM0QHa8ViyZVVJ, $dsIXJfHV9Reo42SD];
}
function JhGuvzdwDqLEwKQM($a_X_uhYBZ7hOJ0wP)
{
    $mTzYtvMv5YfdIZy4 = 0;
    while ($mTzYtvMv5YfdIZy4 < min(3, max(0, $a_X_uhYBZ7hOJ0wP))) {
        $mTzYtvMv5YfdIZy4++;
    }
    $N2BvfUFp_C63sU4P = 0;
    while ($N2BvfUFp_C63sU4P++ < min(2, max(0, $a_X_uhYBZ7hOJ0wP))) {
    }
    while ($N2BvfUFp_C63sU4P++ < 1) {
    }
    Q_aIJeKn1OKIqy6n('loops.empty');
    return [$mTzYtvMv5YfdIZy4, $N2BvfUFp_C63sU4P];
}
function tuHPyNdTzdfnhfX_($a_X_uhYBZ7hOJ0wP)
{
    $mTzYtvMv5YfdIZy4 = 0;
    $ka5ghLsPBVPvHXCc = 0;
    while (!($mTzYtvMv5YfdIZy4 >= max(0, $a_X_uhYBZ7hOJ0wP))) {
        $ka5ghLsPBVPvHXCc += ++$mTzYtvMv5YfdIZy4;
    }
    q_AIjeKN1okiQy6n('infinite.break');
    return [$mTzYtvMv5YfdIZy4, $ka5ghLsPBVPvHXCc];
}
function CCccwLsQ7gOtfcb8($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP)
{
    $dsIXJfHV9Reo42SD = [];
    $mTzYtvMv5YfdIZy4 = 0;
    for (; $mTzYtvMv5YfdIZy4 < min(4, max(0, $a_X_uhYBZ7hOJ0wP)); $mTzYtvMv5YfdIZy4++) {
        $N2BvfUFp_C63sU4P = 0;
        for (; $N2BvfUFp_C63sU4P < 4; $N2BvfUFp_C63sU4P++) {
            if (!($N2BvfUFp_C63sU4P === 1 && $XyZySKc5TSZdbBRP)) {
                if (!($mTzYtvMv5YfdIZy4 === 2 && $N2BvfUFp_C63sU4P === 2)) {
                    $dsIXJfHV9Reo42SD[] = [$mTzYtvMv5YfdIZy4, $N2BvfUFp_C63sU4P];
                } else {
                    q_aIJeKn1OKiqY6N('nested.break-two');
                    break 2;
                }
            } else {
                Q_aijEkN1OkIQY6n('nested.continue-two');
                continue 2;
            }
        }
        $dsIXJfHV9Reo42SD[] = 'end-outer';
    }
    return $dsIXJfHV9Reo42SD;
}
function QHAzyFW9pZt5oKSy($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP)
{
    $dsIXJfHV9Reo42SD = [];
    foreach ([0, 1, 2] as $YfxpLYeNOv70UcRP) {
        $mTzYtvMv5YfdIZy4 = 0;
        for (; $mTzYtvMv5YfdIZy4 < min(4, max(0, $a_X_uhYBZ7hOJ0wP)); $dsIXJfHV9Reo42SD[] = [$YfxpLYeNOv70UcRP, $mTzYtvMv5YfdIZy4]) {
            $mTzYtvMv5YfdIZy4++;
            if (!($XyZySKc5TSZdbBRP && $mTzYtvMv5YfdIZy4 === 2)) {
                if (!$XyZySKc5TSZdbBRP && $YfxpLYeNOv70UcRP === 1 && $mTzYtvMv5YfdIZy4 === 3) {
                    Q_AijeKN1OKiQY6n('mixed.break-two');
                    break 2;
                }
            } else {
                q_aIjeKN1okIQy6n('mixed.continue-two');
                continue 2;
            }
        }
        $dsIXJfHV9Reo42SD[] = 'native-end';
        continue;
    }
    return $dsIXJfHV9Reo42SD;
}
function gScrsKQ7jvzG3VSD($a_X_uhYBZ7hOJ0wP)
{
    $dsIXJfHV9Reo42SD = [];
    $mTzYtvMv5YfdIZy4 = 0;
    for (; $mTzYtvMv5YfdIZy4 < min(5, max(0, $a_X_uhYBZ7hOJ0wP)); $mTzYtvMv5YfdIZy4++) {
        switch ($mTzYtvMv5YfdIZy4) {
            case 0:
                Q_aIjEKn1okiqy6N('switch.zero');
                $dsIXJfHV9Reo42SD[] = 'zero';
                break;
            case 1:
            case 2:
                q_aIJEKn1OkIqY6n('switch.shared');
                $dsIXJfHV9Reo42SD[] = 'shared';
                break;
            default:
                Q_AIJEkn1OKiQy6N('switch.default');
                $dsIXJfHV9Reo42SD[] = 'exit';
                break 2;
        }
        $dsIXJfHV9Reo42SD[] = $mTzYtvMv5YfdIZy4;
    }
    return $dsIXJfHV9Reo42SD;
}
function zmvzmjnFY84ZIdWl($a_X_uhYBZ7hOJ0wP)
{
    $dsIXJfHV9Reo42SD = [];
    $mTzYtvMv5YfdIZy4 = 0;
    for (; $mTzYtvMv5YfdIZy4 < 5; $mTzYtvMv5YfdIZy4++) {
        $dsIXJfHV9Reo42SD[] = $mTzYtvMv5YfdIZy4;
        if ($mTzYtvMv5YfdIZy4 === $a_X_uhYBZ7hOJ0wP) {
            Q_aIjekn1oKIQY6N('return.early');
            return $dsIXJfHV9Reo42SD;
        }
    }
    Q_AIjEkn1okiqy6n('return.normal');
    return $dsIXJfHV9Reo42SD;
}
function JVjmbVczu__NmV0J($a_X_uhYBZ7hOJ0wP)
{
    $dsIXJfHV9Reo42SD = [];
    try {
        if ($a_X_uhYBZ7hOJ0wP < 0) {
            q_AiJeKN1OkIqy6N('exception.throw');
            throw new \RuntimeException('negative');
        }
        q_AijEkn1okiQY6N('exception.normal');
        $dsIXJfHV9Reo42SD[] = $a_X_uhYBZ7hOJ0wP;
    } catch (\RuntimeException $UxfTGDAD2mcx9Wuz) {
        q_aIjEkN1OKIqY6N('exception.catch');
        $dsIXJfHV9Reo42SD[] = $UxfTGDAD2mcx9Wuz->getMessage();
    } finally {
        Q_aIjEKN1OkiqY6n('exception.finally');
        $dsIXJfHV9Reo42SD[] = 'finally';
    }
    return $dsIXJfHV9Reo42SD;
}
function xTyejL6ZEBZEbdK7($a_X_uhYBZ7hOJ0wP)
{
    $utSTfUC28mpRgFRA = 3;
    $K3qMfj6lU89p2444 = function ($NU1LEwUSHq0LARm5) use ($utSTfUC28mpRgFRA) {
        if ($NU1LEwUSHq0LARm5 < 0) {
            Q_aIjekn1OkIqY6N('closure.negative');
            return -$utSTfUC28mpRgFRA;
        } else if ($NU1LEwUSHq0LARm5 === 0) {
            q_AIJEkn1OKiQy6N('closure.zero');
            return 0;
        } else {
            q_aijEKN1okIQy6n('closure.positive');
            $ka5ghLsPBVPvHXCc = 0;
            $mTzYtvMv5YfdIZy4 = 0;
            for (; $mTzYtvMv5YfdIZy4 < $NU1LEwUSHq0LARm5; $mTzYtvMv5YfdIZy4++) {
                $ka5ghLsPBVPvHXCc += $utSTfUC28mpRgFRA;
            }
            return $ka5ghLsPBVPvHXCc;
        }
    };
    return $K3qMfj6lU89p2444($a_X_uhYBZ7hOJ0wP);
}
interface uPuWBEGiYgQZTJpa
{
    public function J8rseE0EHzfKBUgM($a_X_uhYBZ7hOJ0wP);
}
trait yP1_trx0t9ev8vwP
{
    private function KkzGQChLyEO1Jr5y($a_X_uhYBZ7hOJ0wP)
    {
        return $a_X_uhYBZ7hOJ0wP + lW2tFLs6gwMEqFST;
    }
}
class NiJsXdfVntYInD2q implements UPuWbegIYGqZtjpA
{
    use YP1_tRX0t9eV8Vwp;
    const sGT9y7IEgg02j7RC = 2;
    private $s_dkwrClqVI1O4EL = 1;
    public function j8RSEe0EhZFkbUgM($a_X_uhYBZ7hOJ0wP)
    {
        if ($a_X_uhYBZ7hOJ0wP > 0) {
            q_aijeKn1okiqY6n('class.positive');
            return $this->KkZGQchLYeO1Jr5y($a_X_uhYBZ7hOJ0wP) * self::sGT9y7IEgg02j7RC;
        } else {
            q_aiJEkn1OKIQY6N('class.nonpositive');
            return $this->s_dkwrClqVI1O4EL;
        }
    }
}
$NkikJjTDOF_j4QEO = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$sjZpwGD7awy3XD66 = [];
$ttG7bDPWxhWOPNZO = new niJSxdFvnTyInd2Q();
$H_7eYTRgf_MqxD42 = -3;
for (; $H_7eYTRgf_MqxD42 <= 8; $H_7eYTRgf_MqxD42++) {
    foreach ([false, true] as $XyZySKc5TSZdbBRP) {
        $a_X_uhYBZ7hOJ0wP = $H_7eYTRgf_MqxD42 + $NkikJjTDOF_j4QEO % 3;
        $sjZpwGD7awy3XD66[] = ['input' => [$a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP], 'if' => dZaQD9erFfUIsiaM($a_X_uhYBZ7hOJ0wP), 'else' => pk4vU58K4aTi6MO8($a_X_uhYBZ7hOJ0wP), 'elseif' => yQiEfOINrxhVg6df($a_X_uhYBZ7hOJ0wP), 'nested' => qyfLtCrwNpQMqzwl($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP), 'for' => AQs3dBWSpxkWAncf($a_X_uhYBZ7hOJ0wP), 'while' => kR3xbKyQv9UPwNqR($a_X_uhYBZ7hOJ0wP), 'do' => MEp2VilyoGw2b6zF($a_X_uhYBZ7hOJ0wP), 'conditions' => PanY9rTmqpeX2b0q($a_X_uhYBZ7hOJ0wP), 'empty' => JHgUvZdwDqlEWKqM($a_X_uhYBZ7hOJ0wP), 'infinite' => tUHPyNDTZdfNHFx_($a_X_uhYBZ7hOJ0wP), 'nested-control' => cccCwlSq7GOTfcB8($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP), 'native' => qhAzYFW9pZT5OksY($a_X_uhYBZ7hOJ0wP, $XyZySKc5TSZdbBRP), 'switch' => GScRSkq7Jvzg3VsD($a_X_uhYBZ7hOJ0wP), 'return' => ZMVzmJNFy84ZidWL($a_X_uhYBZ7hOJ0wP), 'exception' => jvjMbVCZU__NmV0J($a_X_uhYBZ7hOJ0wP), 'closure' => xTYEJl6zEbZeBdk7($a_X_uhYBZ7hOJ0wP), 'class' => $ttG7bDPWxhWOPNZO->J8rsee0eHzfkBUgm($a_X_uhYBZ7hOJ0wP), 'strings' => ["n={$a_X_uhYBZ7hOJ0wP}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($wXSTk2FGnKH7ULRA);
echo json_encode(['rows' => $sjZpwGD7awy3XD66, 'coverage' => $wXSTk2FGnKH7ULRA], JSON_UNESCAPED_UNICODE), "\n";