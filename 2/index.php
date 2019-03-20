<?php
declare(strict_types=1);

require_once __DIR__.'/Request.php';

$request = new Request();
//return Thomas if there is no 'name' key
$name = $request->getByKey('name', 'Thomas');
printf('Hello %s', $name);
