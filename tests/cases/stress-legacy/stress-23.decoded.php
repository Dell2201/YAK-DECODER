<?php

namespace dD7PiCqy3KJLI3kV;

const hSQgnIP1vxct63Et = 7;
$Assy090xiZBtenKr = [];
function V65WalbLg9pHlFuB($tKsWe5LI6C_pmvog)
{
    global $Assy090xiZBtenKr;
    $Assy090xiZBtenKr[$tKsWe5LI6C_pmvog] = isset($Assy090xiZBtenKr[$tKsWe5LI6C_pmvog]) ? $Assy090xiZBtenKr[$tKsWe5LI6C_pmvog] + 1 : 1;
}
function nW7i4GsXLF6ux1lt($SKb9Xe57v7RuWUm3)
{
    $MwIVGuOFwG3hWQQs = 0;
    if ($SKb9Xe57v7RuWUm3 > 0) {
        V65wAlblG9PhlFUb('if.true');
        $MwIVGuOFwG3hWQQs = $SKb9Xe57v7RuWUm3 * 2;
    }
    if ($SKb9Xe57v7RuWUm3 <= 0) {
        v65walblg9PhLfUb('if.false-path');
    }
    return $MwIVGuOFwG3hWQQs;
}
function Ez9ASzGlqI3bgYjB($SKb9Xe57v7RuWUm3)
{
    if ($SKb9Xe57v7RuWUm3 % 2 === 0) {
        v65WALblg9PHLfuB('else.then');
        return 'even';
    } else {
        V65wAlbLg9pHlfuB('else.else');
        return 'odd';
    }
}
function fP8c2rzShCMXaB6B($SKb9Xe57v7RuWUm3)
{
    if ($SKb9Xe57v7RuWUm3 < 0) {
        V65wAlBLg9PHlFub('elseif.negative');
        return -1;
    } else if ($SKb9Xe57v7RuWUm3 === 0) {
        V65WAlBLG9pHLfUb('elseif.zero');
        return 0;
    } else if ($SKb9Xe57v7RuWUm3 < 3) {
        v65WAlBlG9PHlFub('elseif.small');
        return 1;
    } else {
        V65WALBLg9pHlFUB('elseif.large');
        return 2;
    }
}
function uGQZ1dzi1SUHlhDf($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT)
{
    $DWgseg_TKI7VkWED = [];
    if ($SKb9Xe57v7RuWUm3 > 0 && ($EghRO3DynQYIFYgT || $SKb9Xe57v7RuWUm3 > 3)) {
        V65wALblg9PhLFub('nested.outer-true');
        $DWgseg_TKI7VkWED[] = 'outer';
        if ($SKb9Xe57v7RuWUm3 % 2) {
            v65WAlblG9PHLFub('nested.inner-odd');
            $DWgseg_TKI7VkWED[] = 'odd';
        } else {
            V65WalBlg9PhlFUB('nested.inner-even');
            $DWgseg_TKI7VkWED[] = 'even';
        }
    } else if ($EghRO3DynQYIFYgT && $SKb9Xe57v7RuWUm3 < 0) {
        V65walblG9phLFUb('nested.elseif');
        $DWgseg_TKI7VkWED[] = 'negative';
    } else {
        v65WaLblg9PHlfuB('nested.else');
        $DWgseg_TKI7VkWED[] = 'fallback';
    }
    return $DWgseg_TKI7VkWED;
}
function qoAQK501YKvTvo0p($SKb9Xe57v7RuWUm3)
{
    $DWgseg_TKI7VkWED = [];
    $deOk7Krpfo3F0vPI = 0;
    $jdf04034imZD_qHJ = 10;
    for (; $deOk7Krpfo3F0vPI < $SKb9Xe57v7RuWUm3; $jdf04034imZD_qHJ -= 2) {
        v65walBlG9phLFUB('for.body');
        if (!($deOk7Krpfo3F0vPI === 1)) {
            $DWgseg_TKI7VkWED[] = [$deOk7Krpfo3F0vPI, $jdf04034imZD_qHJ];
            if ($deOk7Krpfo3F0vPI === 4) {
                v65waLBLg9PhLfub('for.break');
                break;
            }
        } else {
            V65WalBLG9PhLfUb('for.continue');
        }
        $deOk7Krpfo3F0vPI++;
    }
    if (!$DWgseg_TKI7VkWED) {
        V65wAlbLg9PHLfuB('for.zero');
    }
    return [$deOk7Krpfo3F0vPI, $jdf04034imZD_qHJ, $DWgseg_TKI7VkWED];
}
function nKTGZtwhSVlvzt6v($SKb9Xe57v7RuWUm3)
{
    $deOk7Krpfo3F0vPI = 0;
    $DWgseg_TKI7VkWED = [];
    while ($deOk7Krpfo3F0vPI < $SKb9Xe57v7RuWUm3) {
        v65wAlblg9PHLfUB('while.body');
        $deOk7Krpfo3F0vPI++;
        if (!($deOk7Krpfo3F0vPI === 2)) {
            $DWgseg_TKI7VkWED[] = $deOk7Krpfo3F0vPI;
            if (!($deOk7Krpfo3F0vPI === 5)) {
                continue;
            } else {
                v65WAlBlg9pHLfUb('while.break');
                break;
            }
        } else {
            V65WalbLg9pHLfub('while.continue');
        }
    }
    if ($deOk7Krpfo3F0vPI === 0) {
        v65WALblg9PhlFUb('while.zero');
    }
    return [$deOk7Krpfo3F0vPI, $DWgseg_TKI7VkWED];
}
function Ndpg2KFRc13NxokD($SKb9Xe57v7RuWUm3)
{
    $deOk7Krpfo3F0vPI = 0;
    $DWgseg_TKI7VkWED = [];
    while (true) {
        V65walBlG9pHlfub('do.body');
        $deOk7Krpfo3F0vPI++;
        if (!($deOk7Krpfo3F0vPI === 2)) {
            $DWgseg_TKI7VkWED[] = $deOk7Krpfo3F0vPI;
            if (!($deOk7Krpfo3F0vPI === 5)) {
                if ($deOk7Krpfo3F0vPI < $SKb9Xe57v7RuWUm3) {
                    continue;
                } else {
                    break;
                }
            } else {
                v65wALBLG9pHLfUb('do.break');
                break;
            }
        } else {
            V65wALbLg9pHlFuB('do.continue');
        }
    }
    if ($deOk7Krpfo3F0vPI === 1) {
        v65waLbLg9PHlfuB('do.once');
    } else {
        v65waLblg9PhLFUb('do.repeat');
    }
    return [$deOk7Krpfo3F0vPI, $DWgseg_TKI7VkWED];
}
function e1O8s9bKuvbxBdrr($SKb9Xe57v7RuWUm3)
{
    $dDtUoLleuqClI_TA = 0;
    $DWgseg_TKI7VkWED = [];
    while (++$dDtUoLleuqClI_TA <= max(0, $SKb9Xe57v7RuWUm3)) {
        $DWgseg_TKI7VkWED[] = $dDtUoLleuqClI_TA;
    }
    $A6NahypOiIWTjRHp = 0;
    do {
        $DWgseg_TKI7VkWED[] = -$A6NahypOiIWTjRHp;
    } while ($A6NahypOiIWTjRHp++ < min(3, max(0, $SKb9Xe57v7RuWUm3)));
    v65WaLBlg9Phlfub('conditions.side-effects');
    return [$dDtUoLleuqClI_TA, $A6NahypOiIWTjRHp, $DWgseg_TKI7VkWED];
}
function nQom83ZYKnpkiJeM($SKb9Xe57v7RuWUm3)
{
    $deOk7Krpfo3F0vPI = 0;
    while ($deOk7Krpfo3F0vPI < min(3, max(0, $SKb9Xe57v7RuWUm3))) {
        $deOk7Krpfo3F0vPI++;
    }
    $jdf04034imZD_qHJ = 0;
    while ($jdf04034imZD_qHJ++ < min(2, max(0, $SKb9Xe57v7RuWUm3))) {
    }
    while ($jdf04034imZD_qHJ++ < 1) {
    }
    V65walblG9pHLFub('loops.empty');
    return [$deOk7Krpfo3F0vPI, $jdf04034imZD_qHJ];
}
function qrOGtXbxEz0E1OzY($SKb9Xe57v7RuWUm3)
{
    $deOk7Krpfo3F0vPI = 0;
    $bVe1Kg1eQE52wf0g = 0;
    while (!($deOk7Krpfo3F0vPI >= max(0, $SKb9Xe57v7RuWUm3))) {
        $bVe1Kg1eQE52wf0g += ++$deOk7Krpfo3F0vPI;
    }
    v65WAlBlG9PhLfUb('infinite.break');
    return [$deOk7Krpfo3F0vPI, $bVe1Kg1eQE52wf0g];
}
function PH0Ra2Lc3RWz1wTL($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT)
{
    $DWgseg_TKI7VkWED = [];
    $deOk7Krpfo3F0vPI = 0;
    for (; $deOk7Krpfo3F0vPI < min(4, max(0, $SKb9Xe57v7RuWUm3)); $deOk7Krpfo3F0vPI++) {
        $jdf04034imZD_qHJ = 0;
        for (; $jdf04034imZD_qHJ < 4; $jdf04034imZD_qHJ++) {
            if (!($jdf04034imZD_qHJ === 1 && $EghRO3DynQYIFYgT)) {
                if (!($deOk7Krpfo3F0vPI === 2 && $jdf04034imZD_qHJ === 2)) {
                    $DWgseg_TKI7VkWED[] = [$deOk7Krpfo3F0vPI, $jdf04034imZD_qHJ];
                } else {
                    v65WAlBlg9phlfUB('nested.break-two');
                    break 2;
                }
            } else {
                v65WAlbLG9PhLfUb('nested.continue-two');
                continue 2;
            }
        }
        $DWgseg_TKI7VkWED[] = 'end-outer';
    }
    return $DWgseg_TKI7VkWED;
}
function uEwdPaqhYFt93och($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT)
{
    $DWgseg_TKI7VkWED = [];
    foreach ([0, 1, 2] as $XBeUw7V3LRC3Kd9Y) {
        $deOk7Krpfo3F0vPI = 0;
        for (; $deOk7Krpfo3F0vPI < min(4, max(0, $SKb9Xe57v7RuWUm3)); $DWgseg_TKI7VkWED[] = [$XBeUw7V3LRC3Kd9Y, $deOk7Krpfo3F0vPI]) {
            $deOk7Krpfo3F0vPI++;
            if (!($EghRO3DynQYIFYgT && $deOk7Krpfo3F0vPI === 2)) {
                if (!$EghRO3DynQYIFYgT && $XBeUw7V3LRC3Kd9Y === 1 && $deOk7Krpfo3F0vPI === 3) {
                    v65WaLBlg9pHLfUB('mixed.break-two');
                    break 2;
                }
            } else {
                v65waLBLG9pHlfub('mixed.continue-two');
                continue 2;
            }
        }
        $DWgseg_TKI7VkWED[] = 'native-end';
        continue;
    }
    return $DWgseg_TKI7VkWED;
}
function M4sP4dyX4rbDYS4F($SKb9Xe57v7RuWUm3)
{
    $DWgseg_TKI7VkWED = [];
    $deOk7Krpfo3F0vPI = 0;
    for (; $deOk7Krpfo3F0vPI < min(5, max(0, $SKb9Xe57v7RuWUm3)); $deOk7Krpfo3F0vPI++) {
        switch ($deOk7Krpfo3F0vPI) {
            case 0:
                V65WalBlG9pHLFub('switch.zero');
                $DWgseg_TKI7VkWED[] = 'zero';
                break;
            case 1:
            case 2:
                V65WalBlG9PHlfUB('switch.shared');
                $DWgseg_TKI7VkWED[] = 'shared';
                break;
            default:
                v65waLblg9phlFuB('switch.default');
                $DWgseg_TKI7VkWED[] = 'exit';
                break 2;
        }
        $DWgseg_TKI7VkWED[] = $deOk7Krpfo3F0vPI;
    }
    return $DWgseg_TKI7VkWED;
}
function X8Rz9997CKozSGw7($SKb9Xe57v7RuWUm3)
{
    $DWgseg_TKI7VkWED = [];
    $deOk7Krpfo3F0vPI = 0;
    for (; $deOk7Krpfo3F0vPI < 5; $deOk7Krpfo3F0vPI++) {
        $DWgseg_TKI7VkWED[] = $deOk7Krpfo3F0vPI;
        if ($deOk7Krpfo3F0vPI === $SKb9Xe57v7RuWUm3) {
            v65wALblg9pHLFUb('return.early');
            return $DWgseg_TKI7VkWED;
        }
    }
    V65WaLbLG9pHlfuB('return.normal');
    return $DWgseg_TKI7VkWED;
}
function Lcu5uKe3xqX9QXNo($SKb9Xe57v7RuWUm3)
{
    $DWgseg_TKI7VkWED = [];
    try {
        if ($SKb9Xe57v7RuWUm3 < 0) {
            v65WAlBlg9PHLfUB('exception.throw');
            throw new \RuntimeException('negative');
        }
        v65wAlbLG9phLFUb('exception.normal');
        $DWgseg_TKI7VkWED[] = $SKb9Xe57v7RuWUm3;
    } catch (\RuntimeException $UrMUEjrHps8xP1vw) {
        v65WaLBLg9pHlFuB('exception.catch');
        $DWgseg_TKI7VkWED[] = $UrMUEjrHps8xP1vw->getMessage();
    } finally {
        V65WalbLg9phlFuB('exception.finally');
        $DWgseg_TKI7VkWED[] = 'finally';
    }
    return $DWgseg_TKI7VkWED;
}
function u8JMpAbpUlXuBSyj($SKb9Xe57v7RuWUm3)
{
    $wr3VZ1PCRZzJR8KQ = 3;
    $XIMohx846zalNgTN = function ($SGKx1Ze53SHKprKQ) use ($wr3VZ1PCRZzJR8KQ) {
        if ($SGKx1Ze53SHKprKQ < 0) {
            v65WAlblg9pHLfub('closure.negative');
            return -$wr3VZ1PCRZzJR8KQ;
        } else if ($SGKx1Ze53SHKprKQ === 0) {
            V65wALbLg9PhLFUB('closure.zero');
            return 0;
        } else {
            V65walBLG9phlFub('closure.positive');
            $bVe1Kg1eQE52wf0g = 0;
            $deOk7Krpfo3F0vPI = 0;
            for (; $deOk7Krpfo3F0vPI < $SGKx1Ze53SHKprKQ; $deOk7Krpfo3F0vPI++) {
                $bVe1Kg1eQE52wf0g += $wr3VZ1PCRZzJR8KQ;
            }
            return $bVe1Kg1eQE52wf0g;
        }
    };
    return $XIMohx846zalNgTN($SKb9Xe57v7RuWUm3);
}
interface en4GcqFFxjCNruGh
{
    public function Dsx3b9Tot2YTPHpC($SKb9Xe57v7RuWUm3);
}
trait Rme6DSOTWXiYyOy6
{
    private function bJwVo4dJ3HvMFUuK($SKb9Xe57v7RuWUm3)
    {
        return $SKb9Xe57v7RuWUm3 + hSQgnIP1vxct63Et;
    }
}
class ffhEKkjLPzGE7Vwh implements En4GcQffxJCNRuGh
{
    use rME6DSOtWXiYYOy6;
    const WDRL57NJTI6vy6og = 2;
    private $L2WGCIdbVdUx6iZ3 = 1;
    public function dSX3B9TOT2ytpHPc($SKb9Xe57v7RuWUm3)
    {
        if ($SKb9Xe57v7RuWUm3 > 0) {
            V65wALblg9pHLFUB('class.positive');
            return $this->BjwVO4dJ3HvmFUUk($SKb9Xe57v7RuWUm3) * self::WDRL57NJTI6vy6og;
        } else {
            v65WaLblG9pHlFuB('class.nonpositive');
            return $this->L2WGCIdbVdUx6iZ3;
        }
    }
}
$SVwKTogpIWxJAMhK = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$xL81jXYkHBI0T70B = [];
$ROJ0NYlZlPJuUzT7 = new fFhEkkJLpZge7vwh();
$pRb5TpOBJRPRSmqZ = -3;
for (; $pRb5TpOBJRPRSmqZ <= 8; $pRb5TpOBJRPRSmqZ++) {
    foreach ([false, true] as $EghRO3DynQYIFYgT) {
        $SKb9Xe57v7RuWUm3 = $pRb5TpOBJRPRSmqZ + $SVwKTogpIWxJAMhK % 3;
        $xL81jXYkHBI0T70B[] = ['input' => [$SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT], 'if' => NW7I4gSXlf6uX1LT($SKb9Xe57v7RuWUm3), 'else' => eZ9aSZglqI3bGyJB($SKb9Xe57v7RuWUm3), 'elseif' => FP8c2rzshcmXaB6b($SKb9Xe57v7RuWUm3), 'nested' => UGQz1dZI1SuhLHDf($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT), 'for' => QOaqk501YKVTVo0P($SKb9Xe57v7RuWUm3), 'while' => nKTgzTWhSVlvzT6V($SKb9Xe57v7RuWUm3), 'do' => ndpg2Kfrc13NXOKD($SKb9Xe57v7RuWUm3), 'conditions' => E1O8s9BKuVBxBdrR($SKb9Xe57v7RuWUm3), 'empty' => nqOm83zyknPkijEm($SKb9Xe57v7RuWUm3), 'infinite' => QrOgtxBXEZ0E1OZy($SKb9Xe57v7RuWUm3), 'nested-control' => PH0RA2Lc3RWz1WTL($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT), 'native' => uEWdpAQHyfT93OCh($SKb9Xe57v7RuWUm3, $EghRO3DynQYIFYgT), 'switch' => M4sP4Dyx4rBdYS4F($SKb9Xe57v7RuWUm3), 'return' => x8Rz9997CKoZsGw7($SKb9Xe57v7RuWUm3), 'exception' => LCU5uke3xQx9qxnO($SKb9Xe57v7RuWUm3), 'closure' => U8jMPaBPuLxUBSYj($SKb9Xe57v7RuWUm3), 'class' => $ROJ0NYlZlPJuUzT7->Dsx3B9toT2YtPhpc($SKb9Xe57v7RuWUm3), 'strings' => ["n={$SKb9Xe57v7RuWUm3}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($Assy090xiZBtenKr);
echo json_encode(['rows' => $xL81jXYkHBI0T70B, 'coverage' => $Assy090xiZBtenKr], JSON_UNESCAPED_UNICODE), "\n";