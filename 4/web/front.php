<?php

require_once __DIR__.'/../Request.php';
require_once __DIR__.'/../Response.php';

$request = new Request();
$response = new Response();

//here is taken the decision on which source we need to serve
if (strpos($_SERVER['REQUEST_URI'], "hello")) {
  require __DIR__.'/../src/hello.php';
} elseif(strpos($_SERVER['REQUEST_URI'], "bye")) {
  require __DIR__.'/../src/bye.php';
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();
