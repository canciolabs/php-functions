<?php

use Symfony\Component\Finder\Finder;

$finder = (new Finder())
    ->files()
    ->name('/\.(const|func)\.php$/')
    ->in(__DIR__);

if (!$finder->hasResults()) {
    return;
}

foreach ($finder as $file) {
    require_once $file->getRealPath();
}
