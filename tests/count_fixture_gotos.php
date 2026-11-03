<?php
// Tokenize known test fixtures using their target runtime, without executing them.
$counts=[];
foreach (array_slice($argv,1) as $path) {
    $count=0;
    foreach(token_get_all(file_get_contents($path)) as $token) {
        if(is_array($token) && $token[0]===T_GOTO) $count++;
    }
    $counts[]=$count;
}
echo json_encode($counts);
