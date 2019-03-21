<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Workshop\Request;

$request = new Request();

$name = $request->getByKey('name', 'anonymous');
echo sprintf('Hello %s', $name);
