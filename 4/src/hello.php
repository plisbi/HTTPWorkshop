<?php
$name = $request->getByKey('name', 'Thomas');
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));
