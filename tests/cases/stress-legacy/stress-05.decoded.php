<?php

namespace VF80HanHZoJERtxG;

const wXg2erkbYlxm0AvB = 7;
$LjQ8ZmTQ_nt1YWXD = [];
function M_ekMgqGN6jITckS($nXyVSkDjHjI_N0ho)
{
    global $LjQ8ZmTQ_nt1YWXD;
    $LjQ8ZmTQ_nt1YWXD[$nXyVSkDjHjI_N0ho] = isset($LjQ8ZmTQ_nt1YWXD[$nXyVSkDjHjI_N0ho]) ? $LjQ8ZmTQ_nt1YWXD[$nXyVSkDjHjI_N0ho] + 1 : 1;
}
function lNpJqp5YgHnKqAmC($MSo3UTsbh962tRAB)
{
    $Z2A4Wzl8DjkIWIPP = 0;
    if ($MSo3UTsbh962tRAB > 0) {
        M_EKmgqgN6jiTcks('if.true');
        $Z2A4Wzl8DjkIWIPP = $MSo3UTsbh962tRAB * 2;
    }
    if ($MSo3UTsbh962tRAB <= 0) {
        M_eKmGQgn6JitcKS('if.false-path');
    }
    return $Z2A4Wzl8DjkIWIPP;
}
function XZkjEON3vaCIOlpI($MSo3UTsbh962tRAB)
{
    if ($MSo3UTsbh962tRAB % 2 === 0) {
        M_EkmgQGn6JitCKS('else.then');
        return 'even';
    } else {
        m_eKMgQgN6JITCks('else.else');
        return 'odd';
    }
}
function h9thJYUD3NA7sDcj($MSo3UTsbh962tRAB)
{
    if ($MSo3UTsbh962tRAB < 0) {
        M_EKMgQgN6jItCks('elseif.negative');
        return -1;
    } else if ($MSo3UTsbh962tRAB === 0) {
        M_eKMgQGn6JITcKS('elseif.zero');
        return 0;
    } else if ($MSo3UTsbh962tRAB < 3) {
        M_EkmGqGn6JiTckS('elseif.small');
        return 1;
    } else {
        M_EkmGQGN6JiTcKS('elseif.large');
        return 2;
    }
}
function ovuNCYI6Z74f2jLZ($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl)
{
    $lcAOkP7gQ7x9jX_q = [];
    if ($MSo3UTsbh962tRAB > 0 && ($efdv4OfMYLoeWWYl || $MSo3UTsbh962tRAB > 3)) {
        M_EkMGqGn6JItckS('nested.outer-true');
        $lcAOkP7gQ7x9jX_q[] = 'outer';
        if ($MSo3UTsbh962tRAB % 2) {
            M_ekMgQGn6JITcKs('nested.inner-odd');
            $lcAOkP7gQ7x9jX_q[] = 'odd';
        } else {
            m_EkMGQGn6JITCKS('nested.inner-even');
            $lcAOkP7gQ7x9jX_q[] = 'even';
        }
    } else if ($efdv4OfMYLoeWWYl && $MSo3UTsbh962tRAB < 0) {
        M_eKMgQgn6JitCks('nested.elseif');
        $lcAOkP7gQ7x9jX_q[] = 'negative';
    } else {
        M_ekmGqGN6Jitcks('nested.else');
        $lcAOkP7gQ7x9jX_q[] = 'fallback';
    }
    return $lcAOkP7gQ7x9jX_q;
}
function Za9NfpoXBOlhsI73($MSo3UTsbh962tRAB)
{
    $lcAOkP7gQ7x9jX_q = [];
    $N80aTYrTxcNPKNHg = 0;
    $TDmX9GlaEpORc0sS = 10;
    for (; $N80aTYrTxcNPKNHg < $MSo3UTsbh962tRAB; $TDmX9GlaEpORc0sS -= 2) {
        M_EKmGQGN6jITCKS('for.body');
        if (!($N80aTYrTxcNPKNHg === 1)) {
            $lcAOkP7gQ7x9jX_q[] = [$N80aTYrTxcNPKNHg, $TDmX9GlaEpORc0sS];
            if ($N80aTYrTxcNPKNHg === 4) {
                M_eKMGqgN6JItcKs('for.break');
                break;
            }
        } else {
            M_eKMGqgn6JITcKS('for.continue');
        }
        $N80aTYrTxcNPKNHg++;
    }
    if (!$lcAOkP7gQ7x9jX_q) {
        m_eKMgQgN6JITCkS('for.zero');
    }
    return [$N80aTYrTxcNPKNHg, $TDmX9GlaEpORc0sS, $lcAOkP7gQ7x9jX_q];
}
function gO_nH9K9FP8LsF_V($MSo3UTsbh962tRAB)
{
    $N80aTYrTxcNPKNHg = 0;
    $lcAOkP7gQ7x9jX_q = [];
    while ($N80aTYrTxcNPKNHg < $MSo3UTsbh962tRAB) {
        m_EKmGqgn6JitCkS('while.body');
        $N80aTYrTxcNPKNHg++;
        if (!($N80aTYrTxcNPKNHg === 2)) {
            $lcAOkP7gQ7x9jX_q[] = $N80aTYrTxcNPKNHg;
            if (!($N80aTYrTxcNPKNHg === 5)) {
                continue;
            } else {
                m_EkMgqGN6jitCkS('while.break');
                break;
            }
        } else {
            m_ekMGqgN6jiTCks('while.continue');
        }
    }
    if ($N80aTYrTxcNPKNHg === 0) {
        m_EKMGqGn6jItCkS('while.zero');
    }
    return [$N80aTYrTxcNPKNHg, $lcAOkP7gQ7x9jX_q];
}
function vQTVe8wkiO4f2mVQ($MSo3UTsbh962tRAB)
{
    $N80aTYrTxcNPKNHg = 0;
    $lcAOkP7gQ7x9jX_q = [];
    while (true) {
        m_eKMGqgN6jitCKS('do.body');
        $N80aTYrTxcNPKNHg++;
        if (!($N80aTYrTxcNPKNHg === 2)) {
            $lcAOkP7gQ7x9jX_q[] = $N80aTYrTxcNPKNHg;
            if (!($N80aTYrTxcNPKNHg === 5)) {
                if ($N80aTYrTxcNPKNHg < $MSo3UTsbh962tRAB) {
                    continue;
                } else {
                    break;
                }
            } else {
                M_eKmgQGn6JiTcks('do.break');
                break;
            }
        } else {
            m_EKMGQgN6jitcKS('do.continue');
        }
    }
    if ($N80aTYrTxcNPKNHg === 1) {
        m_EKMGQGN6JItcKs('do.once');
    } else {
        M_eKMgqgn6JItckS('do.repeat');
    }
    return [$N80aTYrTxcNPKNHg, $lcAOkP7gQ7x9jX_q];
}
function Ja3CxHmRrZtAsLIZ($MSo3UTsbh962tRAB)
{
    $ihlDiudrwSBZYo18 = 0;
    $lcAOkP7gQ7x9jX_q = [];
    while (++$ihlDiudrwSBZYo18 <= max(0, $MSo3UTsbh962tRAB)) {
        $lcAOkP7gQ7x9jX_q[] = $ihlDiudrwSBZYo18;
    }
    $efvGwxV3fJhZy4GX = 0;
    do {
        $lcAOkP7gQ7x9jX_q[] = -$efvGwxV3fJhZy4GX;
    } while ($efvGwxV3fJhZy4GX++ < min(3, max(0, $MSo3UTsbh962tRAB)));
    m_ekmGqGn6JitckS('conditions.side-effects');
    return [$ihlDiudrwSBZYo18, $efvGwxV3fJhZy4GX, $lcAOkP7gQ7x9jX_q];
}
function m884cTGPNYjo_hCq($MSo3UTsbh962tRAB)
{
    $N80aTYrTxcNPKNHg = 0;
    while ($N80aTYrTxcNPKNHg < min(3, max(0, $MSo3UTsbh962tRAB))) {
        $N80aTYrTxcNPKNHg++;
    }
    $TDmX9GlaEpORc0sS = 0;
    while ($TDmX9GlaEpORc0sS++ < min(2, max(0, $MSo3UTsbh962tRAB))) {
    }
    while ($TDmX9GlaEpORc0sS++ < 1) {
    }
    M_ekMgQgn6JitCKs('loops.empty');
    return [$N80aTYrTxcNPKNHg, $TDmX9GlaEpORc0sS];
}
function XqjTmZuc1eGyCMRn($MSo3UTsbh962tRAB)
{
    $N80aTYrTxcNPKNHg = 0;
    $qsHs4A_5OmZtD99Y = 0;
    while (!($N80aTYrTxcNPKNHg >= max(0, $MSo3UTsbh962tRAB))) {
        $qsHs4A_5OmZtD99Y += ++$N80aTYrTxcNPKNHg;
    }
    m_ekmGqgN6jItCKs('infinite.break');
    return [$N80aTYrTxcNPKNHg, $qsHs4A_5OmZtD99Y];
}
function tCWL4eCPdYINkHZd($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl)
{
    $lcAOkP7gQ7x9jX_q = [];
    $N80aTYrTxcNPKNHg = 0;
    for (; $N80aTYrTxcNPKNHg < min(4, max(0, $MSo3UTsbh962tRAB)); $N80aTYrTxcNPKNHg++) {
        $TDmX9GlaEpORc0sS = 0;
        for (; $TDmX9GlaEpORc0sS < 4; $TDmX9GlaEpORc0sS++) {
            if (!($TDmX9GlaEpORc0sS === 1 && $efdv4OfMYLoeWWYl)) {
                if (!($N80aTYrTxcNPKNHg === 2 && $TDmX9GlaEpORc0sS === 2)) {
                    $lcAOkP7gQ7x9jX_q[] = [$N80aTYrTxcNPKNHg, $TDmX9GlaEpORc0sS];
                } else {
                    M_EKMgqGN6JitckS('nested.break-two');
                    break 2;
                }
            } else {
                M_eKMgqgn6JItCKS('nested.continue-two');
                continue 2;
            }
        }
        $lcAOkP7gQ7x9jX_q[] = 'end-outer';
    }
    return $lcAOkP7gQ7x9jX_q;
}
function rcTGN_Prlm4jE6fK($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl)
{
    $lcAOkP7gQ7x9jX_q = [];
    foreach ([0, 1, 2] as $rhHrZa6VzJC9yims) {
        $N80aTYrTxcNPKNHg = 0;
        for (; $N80aTYrTxcNPKNHg < min(4, max(0, $MSo3UTsbh962tRAB)); $lcAOkP7gQ7x9jX_q[] = [$rhHrZa6VzJC9yims, $N80aTYrTxcNPKNHg]) {
            $N80aTYrTxcNPKNHg++;
            if (!($efdv4OfMYLoeWWYl && $N80aTYrTxcNPKNHg === 2)) {
                if (!$efdv4OfMYLoeWWYl && $rhHrZa6VzJC9yims === 1 && $N80aTYrTxcNPKNHg === 3) {
                    M_ekMGQGn6JItcKS('mixed.break-two');
                    break 2;
                }
            } else {
                M_eKMgqGN6jITCKS('mixed.continue-two');
                continue 2;
            }
        }
        $lcAOkP7gQ7x9jX_q[] = 'native-end';
        continue;
    }
    return $lcAOkP7gQ7x9jX_q;
}
function BKw_aY4GrDTUD6rk($MSo3UTsbh962tRAB)
{
    $lcAOkP7gQ7x9jX_q = [];
    $N80aTYrTxcNPKNHg = 0;
    for (; $N80aTYrTxcNPKNHg < min(5, max(0, $MSo3UTsbh962tRAB)); $N80aTYrTxcNPKNHg++) {
        switch ($N80aTYrTxcNPKNHg) {
            case 0:
                M_EKMGqGn6jITCkS('switch.zero');
                $lcAOkP7gQ7x9jX_q[] = 'zero';
                break;
            case 1:
            case 2:
                m_ekmgQgN6Jitcks('switch.shared');
                $lcAOkP7gQ7x9jX_q[] = 'shared';
                break;
            default:
                M_EKMGQgn6jItcKs('switch.default');
                $lcAOkP7gQ7x9jX_q[] = 'exit';
                break 2;
        }
        $lcAOkP7gQ7x9jX_q[] = $N80aTYrTxcNPKNHg;
    }
    return $lcAOkP7gQ7x9jX_q;
}
function TBriDMNoIBWBOPTP($MSo3UTsbh962tRAB)
{
    $lcAOkP7gQ7x9jX_q = [];
    $N80aTYrTxcNPKNHg = 0;
    for (; $N80aTYrTxcNPKNHg < 5; $N80aTYrTxcNPKNHg++) {
        $lcAOkP7gQ7x9jX_q[] = $N80aTYrTxcNPKNHg;
        if ($N80aTYrTxcNPKNHg === $MSo3UTsbh962tRAB) {
            M_EkmGQgN6jITCKS('return.early');
            return $lcAOkP7gQ7x9jX_q;
        }
    }
    m_ekmgqGN6JItcKS('return.normal');
    return $lcAOkP7gQ7x9jX_q;
}
function L_KYhpRsA6VyjYJO($MSo3UTsbh962tRAB)
{
    $lcAOkP7gQ7x9jX_q = [];
    try {
        if ($MSo3UTsbh962tRAB < 0) {
            M_EKmgqgn6jITCKS('exception.throw');
            throw new \RuntimeException('negative');
        }
        M_EKmgqgN6jItCkS('exception.normal');
        $lcAOkP7gQ7x9jX_q[] = $MSo3UTsbh962tRAB;
    } catch (\RuntimeException $PFNucVyMYlc2FuGm) {
        m_eKmgQGn6jiTcks('exception.catch');
        $lcAOkP7gQ7x9jX_q[] = $PFNucVyMYlc2FuGm->getMessage();
    } finally {
        M_eKmgQGN6JitcKS('exception.finally');
        $lcAOkP7gQ7x9jX_q[] = 'finally';
    }
    return $lcAOkP7gQ7x9jX_q;
}
function QS2rW95bR4ZpgUH7($MSo3UTsbh962tRAB)
{
    $smiNANzCkW2lhj3D = 3;
    $IQuGb8RO3mob6uiD = function ($FpHH3RG1chkNI8Ul) use ($smiNANzCkW2lhj3D) {
        if ($FpHH3RG1chkNI8Ul < 0) {
            M_ekMgqgn6JiTCkS('closure.negative');
            return -$smiNANzCkW2lhj3D;
        } else if ($FpHH3RG1chkNI8Ul === 0) {
            M_EKmGQgN6JitCks('closure.zero');
            return 0;
        } else {
            m_ekmgQgn6jiTcks('closure.positive');
            $qsHs4A_5OmZtD99Y = 0;
            $N80aTYrTxcNPKNHg = 0;
            for (; $N80aTYrTxcNPKNHg < $FpHH3RG1chkNI8Ul; $N80aTYrTxcNPKNHg++) {
                $qsHs4A_5OmZtD99Y += $smiNANzCkW2lhj3D;
            }
            return $qsHs4A_5OmZtD99Y;
        }
    };
    return $IQuGb8RO3mob6uiD($MSo3UTsbh962tRAB);
}
interface hPvhCyv1mZFZrxW7
{
    public function GWoaaiVVou7096os($MSo3UTsbh962tRAB);
}
trait l_Ajq4QzGMQA1Bws
{
    private function kfZgNikjfGvkX25x($MSo3UTsbh962tRAB)
    {
        return $MSo3UTsbh962tRAB + wXg2erkbYlxm0AvB;
    }
}
class fHXCT78wyCbJBD1X implements HpvhCyV1mzfZrXW7
{
    use l_AJq4QzgMQa1BWs;
    const zia2BVQXmbs31MyR = 2;
    private $vaOeIFFfYNRyiSvi = 1;
    public function GwOaaiVVOU7096oS($MSo3UTsbh962tRAB)
    {
        if ($MSo3UTsbh962tRAB > 0) {
            M_eKMGQGN6JitckS('class.positive');
            return $this->kFzgNikjFgvKx25X($MSo3UTsbh962tRAB) * self::zia2BVQXmbs31MyR;
        } else {
            M_ekMGqGn6JItCKs('class.nonpositive');
            return $this->vaOeIFFfYNRyiSvi;
        }
    }
}
$Og1CTnmLtwkIzVV7 = isset($_SERVER['argv'][1]) ? (int) $_SERVER['argv'][1] : 0;
$OuD1uJAn0KJTVC1R = [];
$XlK5yuyLFtBaWEa_ = new fHXCt78WyCBjbD1X();
$cvr6PiuOREuNDKmo = -3;
for (; $cvr6PiuOREuNDKmo <= 8; $cvr6PiuOREuNDKmo++) {
    foreach ([false, true] as $efdv4OfMYLoeWWYl) {
        $MSo3UTsbh962tRAB = $cvr6PiuOREuNDKmo + $Og1CTnmLtwkIzVV7 % 3;
        $OuD1uJAn0KJTVC1R[] = ['input' => [$MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl], 'if' => lNpJqP5YghNKqAmc($MSo3UTsbh962tRAB), 'else' => xZkJEON3vAcIoLpi($MSo3UTsbh962tRAB), 'elseif' => h9THJyuD3Na7SdcJ($MSo3UTsbh962tRAB), 'nested' => ovUNcyI6z74F2JLZ($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl), 'for' => za9NfPoXBolHSi73($MSo3UTsbh962tRAB), 'while' => Go_nh9k9Fp8lSf_v($MSo3UTsbh962tRAB), 'do' => vqTVE8wKio4F2MVQ($MSo3UTsbh962tRAB), 'conditions' => JA3cXhMrrztaSlIZ($MSo3UTsbh962tRAB), 'empty' => M884CTGpNYJO_hcq($MSo3UTsbh962tRAB), 'infinite' => XqjtmZUC1EgYcmrn($MSo3UTsbh962tRAB), 'nested-control' => tcWl4eCpDyINkhzD($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl), 'native' => rCtgn_Prlm4je6Fk($MSo3UTsbh962tRAB, $efdv4OfMYLoeWWYl), 'switch' => BKW_AY4GRdtUD6RK($MSo3UTsbh962tRAB), 'return' => tbrIdmnOibwBoPtP($MSo3UTsbh962tRAB), 'exception' => l_KyHPRSa6VyjYJo($MSo3UTsbh962tRAB), 'closure' => qS2rw95br4zpgUH7($MSo3UTsbh962tRAB), 'class' => $XlK5yuyLFtBaWEa_->GwOAaIVVOU7096OS($MSo3UTsbh962tRAB), 'strings' => ["n={$MSo3UTsbh962tRAB}\n", 'кириллица', "quote:\" slash:\\ dollar:\$ nul:\x00"]];
        continue;
    }
}
ksort($LjQ8ZmTQ_nt1YWXD);
echo json_encode(['rows' => $OuD1uJAn0KJTVC1R, 'coverage' => $LjQ8ZmTQ_nt1YWXD], JSON_UNESCAPED_UNICODE), "\n";