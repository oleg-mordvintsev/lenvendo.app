<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp;

// Проверка версии PHP
$version = explode(".", PHP_VERSION);
$version = array_map('intval', $version);
if ($version[0] < 7 || ($version[0] === 7 && $version[1] < 4)) {
    echo "Need PHP version 7.4 and higher. Your version {$version[0]}.{$version[1]}.\n";
    exit;
}

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Controller.php';
new Controller();
