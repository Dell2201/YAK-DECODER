<?php
// usage: php -n cmp_tfc.php <obf.php> <dec.php>
[, $obfFile, $decFile] = $argv;

$code1 = file_get_contents($obfFile);
$code2 = file_get_contents($decFile);
$strip = function ($c) { return preg_replace('/^\s*<\?php\s*/', '', $c); };
$code1 = $strip($code1);
// rename class in the second copy to load both
$code2 = $strip($code2);
$code2 = str_replace('SocialLoginTemplateFormatCleaner', 'SocialLoginTemplateFormatCleanerDec', $code2);
eval($code1);
eval($code2);

$cases = [
    '/var/www/site/image/catalog/foo.jpg',
    'image/catalog',
    '.',
    './x/../y',
    "a\0b",
    '/a/b/../../c',
    '/tmp/x',
    'x',
    '..',
    'sub/dir/file.png',
    'C:\\www\\site\\image',
    "dir/\0hidden",
];
$call = function ($class, $path) {
    $rc = new ReflectionClass($class);
    $m = $rc->getMethod('isSafePath');
    $m->setAccessible(true);
    $obj = $rc->newInstanceWithoutConstructor();
    return $m->invoke($obj, $path);
};
$bad = 0;
foreach ($cases as $c) {
    $a = $call('SocialLoginTemplateFormatCleaner', $c);
    $b = $call('SocialLoginTemplateFormatCleanerDec', $c);
    $ok = ($a === $b) ? 'OK ' : 'DIFF';
    if ($a !== $b) { $bad++; }
    printf("%s %-30s obf=%s dec=%s\n", $ok, var_export($c, true), var_export($a, true), var_export($b, true));
}
// walk-up loop: long relative path exercises the dirname/==='.' loop many iterations
$deep = implode('/', array_fill(0, 40, 'seg')) . '/file.tpl';
$a = $call('SocialLoginTemplateFormatCleaner', $deep);
$b = $call('SocialLoginTemplateFormatCleanerDec', $deep);
printf("%s %-30s obf=%s dec=%s\n", ($a === $b ? 'OK ' : 'DIFF'), 'deep-40-segments', var_export($a, true), var_export($b, true));
if ($a !== $b) { $bad++; }
// also the clean() entry point on a fake tree is not exercised: needs filesystem
echo $bad === 0 ? "ALL MATCH\n" : "MISMATCHES: $bad\n";
exit($bad === 0 ? 0 : 1);
