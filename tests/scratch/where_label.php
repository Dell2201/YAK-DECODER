<?php
// usage: php -n where_label.php <file> <label>
require __DIR__ . '/../../lib/decoder/autoload.php';
use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use PhpParser\ParserFactory;

[, $file, $label] = $argv + [null, null, null];
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$ast = $parser->parse(file_get_contents($file));

$hits = [];
$path = [];
$trav = new NodeTraverser();
$trav->addVisitor(new class($path, $hits, $label) extends NodeVisitorAbstract {
    public $path = [], $hits = [], $label;
    public function __construct(&$path, &$hits, $label) { $this->path = &$path; $this->hits = &$hits; $this->label = $label; }
    public function enterNode(Node $node) {
        $this->path[] = $node;
        if (($node instanceof Stmt\Goto_ && $node->name->name === $this->label)
            || ($node instanceof Stmt\Label && $node->name->name === $this->label)) {
            $desc = [];
            foreach ($this->path as $p) {
                $d = $p->getType();
                if ($p instanceof Stmt\ClassMethod) { $d .= '(' . $p->name->toString() . ')'; }
                if ($p instanceof Stmt\If_ || $p instanceof Stmt\Foreach_ || $p instanceof Stmt\While_ || $p instanceof Stmt\For_) { $d .= '[stmts#' . count($p->stmts) . ']'; }
                if ($p instanceof Stmt\Switch_) { $d .= '[cases#' . count($p->cases) . ']'; }
                $desc[] = $d;
            }
            $this->hits[] = ($node instanceof Stmt\Goto_ ? 'GOTO ' : 'LABEL ') . implode(' > ', $desc);
        }
        return null;
    }
    public function leaveNode(Node $node) { array_pop($this->path); return null; }
});
$trav->traverse($ast);
foreach ($hits as $h) { echo $h, "\n"; }
