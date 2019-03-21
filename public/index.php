<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$name = $_GET['name'] ?? null;
if ($name) {
    printf('Hello %s', $name);
}

$server = $_SERVER;
dump($server);
