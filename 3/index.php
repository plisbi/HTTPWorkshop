<?php
declare(strict_types=1);

require_once __DIR__.'/Request.php';
require_once __DIR__.'/Response.php';

$request = new Request();
$name = $request->getByKey('name', 'Thomas');

$response = new Response();
$response->setContent('{"name" => "Bathman"}');
$response->setStatusCode(200);
$response->setHeaders('ContentType', 'text/html');
var_dump( $response->send($content));
