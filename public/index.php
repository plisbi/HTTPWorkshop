<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Workshop\Request;
use Workshop\Response;

$routes = require __DIR__ . '/../app/routes.php';
$request = new Request();

$path = rtrim($request->server->getPathInfo(), '/');

$routeMatchFile = null;
foreach ($routes as $route) {
    if ($path === $route['path']) {
        $routeMatchFile = $route['file'];
    }
}

$response = new Response();

if (!$routeMatchFile) {
    $response->setStatusCode(404);
    $response->setContent('Not found');
} else {
    ob_start();
    include $routeMatchFile;
    $response->setContent(ob_get_clean());
}

$response->send();
