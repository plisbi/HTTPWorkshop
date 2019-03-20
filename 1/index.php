<?php
declare(strict_types=1);

$name = $_GET['name'];
printf('Hello %s', $name);
$thing = $_SERVER;
var_dump($thing);




// -- 3

require_once __DIR__.'/Request.php';
require_once __DIR__.'/Response.php';

$request = new Request();
$name = $request->getByKey('name', 'Thomas');

$response = new Response();
$response->setContent('{"name" => "Bathman"}');
$response->setStatusCode(200);
$response->setHeaders('ContentType', 'text/html');
var_dump( $response->send($content));
