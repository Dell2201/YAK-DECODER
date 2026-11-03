<?php
namespace StressSuiteB;
$hits=[];
function hit(string $name): void {global $hits;$hits[$name]=($hits[$name]??0)+1;}
// PHP 8.2: readonly class, DNF, trait constants, standalone literal types.
trait Policy82 {public const LIMIT=5;}
interface Left82 {public function left():int;}
interface Right82 {public function right():int;}
readonly class Node82 implements Left82,Right82 {
 use Policy82;
 public function __construct(public int $id,public array $next){}
 public function left():int{return $this->id;}
 public function right():int{return count($this->next);}
}
function score82((Left82&Right82)|null $node):int {return $node===null?-1:$node->left()+$node->right();}
function reject82():false {return false;}
function accept82():true {return true;}
function empty82():null {return null;}
function walk82(array $graph,int $id,array &$seen,array &$trace):\Generator {
 if(isset($seen[$id])){hit('graph.cycle');$trace[]=['cycle',$id];return;}
 $seen[$id]=true;
 try {
  if(!isset($graph[$id])){hit('graph.missing');yield ['missing',$id];return;}
  $node=$graph[$id];yield [$node->id,score82($node)];hit('graph.visit');
  foreach($node->next as $next){if($next<0){hit('graph.negative');continue;}yield from walk82($graph,$next,$seen,$trace);}
 } finally {$trace[]=['leave',$id];hit('graph.finally');}
}
function nested82(int $seed):array {
 $trace=[];
 foreach([0,1,2] as $a) {
  for($b=0;$b<4;$b++) {
   try {
    switch(($a+$b+$seed)%3){
     case 0:hit('nest.continue3');continue 3;
     case 1:if($seed<0 && $b===0){hit('nest.break3');break 3;} $trace[]=accept82();break;
     default:$trace[]=[reject82(),score82(empty82())];hit('nest.default');
    }
   } finally {$trace[]=[$a,$b];hit('nest.finally');}
  }
 }
 return $trace;
}
function runVersion(int $seed):array {
 $graph=[0=>new Node82($seed,[1,2,-1]),1=>new Node82(1,[2]),2=>new Node82(2,[0,3])];$seen=[];$trace=[];
 $values=iterator_to_array(walk82($graph,0,$seen,$trace),false);return [$values,$seen,$trace,nested82($seed),Node82::LIMIT];
}
$seed=(int)($argv[1]??0);
$rows=[];
foreach([-3,-1,0,1,3,8] as $offset){$rows[]=[$seed+$offset,runVersion($seed+$offset)];}
ksort($hits);echo json_encode(['rows'=>$rows,'coverage'=>$hits],JSON_UNESCAPED_UNICODE|JSON_THROW_ON_ERROR), "\n";
