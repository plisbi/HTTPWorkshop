<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Workshop\Request;
use Workshop\Response;

$routes = require __DIR__ . '/../app/routes.php';
$request = new Request();

$path = $request->server->getPathInfo();
if (0 === strpos($path, '/index.php')) {
    $path = substr($path, strlen('/index.php'));
}

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
    $response->send();
}

ob_start();
include $routeMatchFile;

$response->setContent(ob_get_clean());
$response->send();
