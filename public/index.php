<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Workshop\Request;
use Workshop\Response;

$request = new Request();
$response = new Response();

$name = $request->getByKey('name', 'anonymous');
$content = sprintf('Hello %s', $name);

$response->setContent($content);
$response->send();
