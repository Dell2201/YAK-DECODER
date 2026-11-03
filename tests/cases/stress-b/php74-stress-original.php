<?php
namespace StressSuiteB;
$hits=[];
function hit(string $name): void {global $hits;$hits[$name]=($hits[$name]??0)+1;}
// PHP 7.4: typed properties, arrow functions, ??= and array unpacking.
final class Ledger74 {public array $events=[];public int $balance=0;}
function transactions74(int $seed): array {
 $book=new Ledger74();$undo=[];
 for($batch=0;$batch<4;$batch++) {
  try {
   foreach([-2,0,3,5] as $index=>$amount) {
    $amount += $seed%3;
    switch(($batch+$index)%4) {
     case 0: hit('tx.skip');continue 2;
     case 1: $undo[]=$book->balance;$book->balance+=$amount;hit('tx.apply');break;
     case 2:
      if($amount<0){hit('tx.rollback');$book->balance=array_pop($undo)??0;continue 2;}
      $book->balance-=$amount;hit('tx.subtract');break;
     default:
      if($seed<0 && $batch===2){hit('tx.abort');throw new \RuntimeException('abort');}
      $book->events[]=[$batch,$index,$book->balance];hit('tx.record');
    }
   }
  } catch(\RuntimeException $e){$book->events[]=$e->getMessage();hit('tx.catch');}
  finally {$book->events[]=['close',$batch];hit('tx.finally');}
 }
 return [$book->balance,$book->events];
}
function stream74(int $seed,array &$trace): \Generator {
 try {
  for($i=0;$i<5;$i++) {
   if(($i+$seed)%2===0){hit('gen.even');yield $i=>$i+$seed;}
   else {hit('gen.odd');yield from [$i=>$i*$seed];}
   if($i===3 && $seed<0){hit('gen.early');return 99;}
  }
  hit('gen.normal');return 17;
 } finally {$trace[]='closed';hit('gen.finally');}
}
function closures74(int $seed): array {
 $total=0;$memo=[];$trace=[];
 $add=function(int $value) use (&$total,&$memo):int {$memo[$value]??=$value*2;$total+=$memo[$value];hit('closure.add');return $total;};
 $offset=fn(int $v):int=>$v+$seed;
 foreach([1,2,1,3] as $value){if($seed<0 && $value===3){hit('closure.break');break;}$trace[]=$add($offset($value));}
 return [$trace,$memo,[...$trace,1_000],$total];
}
function runVersion(int $seed): array {
 $trace=[];$g=stream74($seed,$trace);$values=iterator_to_array($g);return [transactions74($seed),$values,$g->getReturn(),$trace,closures74($seed)];
}
$seed=(int)($argv[1]??0);
$rows=[];
foreach([-3,-1,0,1,3,8] as $offset){$rows[]=[$seed+$offset,runVersion($seed+$offset)];}
ksort($hits);echo json_encode(['rows'=>$rows,'coverage'=>$hits],JSON_UNESCAPED_UNICODE|JSON_THROW_ON_ERROR), "\n";
