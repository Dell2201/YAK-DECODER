<?php
// usage: php -n dump_method.php <libRoot> <file> <methodName>
$lib = rtrim($argv[1], "/\\");
[, , $in, $method] = $argv + [null, null, null, null];
require $lib . '/Deobfuscator.php';

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;

$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$ast = $parser->parse(file_get_contents($in));
$trav = new \PhpParser\NodeTraverser();
$trav->addVisitor(new class extends \PhpParser\NodeVisitorAbstract {
    public function enterNode(Node $node) {
        $comments = array_filter($node->getComments(), function ($c) {
            return strpos($c->getText(), 'Obfuscated by YAK Pro') === false;
        });
        $node->setAttribute('comments', array_values($comments));
        return null;
    }
});
$ast = $trav->traverse($ast);

// find method
$methodNode = null;
(new \PhpParser\NodeTraverser())->addVisitor(new class($methodNode, $method, $in) extends \PhpParser\NodeVisitorAbstract {
    public $methodNode = null, $method;
    public function __construct(&$methodNode, $method) { $this->methodNode = &$methodNode; $this->method = $method; }
    public function enterNode(Node $node) {
        if ($node instanceof Stmt\ClassMethod && $node->name->toString() === $this->method) { $this->methodNode = $node; }
        return null;
    }
});
$finder = new \PhpParser\NodeFinder();
$m = $finder->findFirst($ast, function ($n) use ($method) {
    return $n instanceof Stmt\ClassMethod && $n->name->toString() === $method;
});
if ($m === null) { echo "method $method not found\n"; exit(1); }

$body = $m->stmts;
echo 'method ', $method, ': ', count($body), " top-level stmts\n";
$preWalk = new Deobfuscator();
$cloner = new \PhpParser\NodeTraverser();
$cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
$work = $cloner->traverse($body);
try {
    $st = new CfgStructurer($work, [], null, null, []);
    $st->reach = $st->reachable();
    $st->nodes = array_values($st->reach);
    $st->dom = $st->dominators($st->nodes);
    $st->loops = $st->findLoops();
    $result = $st->emitRegion();
    echo "emitted top-level: ", count($result), " stmts\n";
    $pr = new DeobPrinter();
    echo $pr->prettyPrint($result), "\n";
    $finder2 = new \PhpParser\NodeFinder();
    foreach ($finder2->findInstanceOf($result, Node::class) as $s) {
        $ctl = $s->getAttribute('deob_controls');
        if ($ctl !== null) {
            $desc = [];
            foreach ($ctl as $k => $v) { $desc[] = $k . '=>' . $v['kind'] . $v['depth']; }
            echo '  ', $s->getType(), ' controls{', implode(', ', $desc), "}\n";
        }
    }
    $gotos = $finder2->findInstanceOf($result, Stmt\Goto_::class);
    $labels = $finder2->findInstanceOf($result, Stmt\Label::class);
    echo 'result: gotos=', count($gotos), ' labels=', count($labels), "\n";
} catch (Throwable $e) {
    echo 'CFG error: ', $e->getMessage(), "\n";
}
