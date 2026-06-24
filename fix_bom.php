<?php
$bom = "\xef\xbb\xbf";
$fixed = 0;
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('resources/views'));
foreach ($it as $file) {
    if (!$file->isFile()) continue;
    if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') continue;
    $content = file_get_contents($file);
    if (substr($content, 0, 3) === $bom) {
        file_put_contents($file, substr($content, 3));
        echo 'Fixed: ' . $file . PHP_EOL;
        $fixed++;
    }
}
echo 'Total fixed: ' . $fixed . PHP_EOL;
