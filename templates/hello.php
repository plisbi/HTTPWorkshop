<?php

$name = $request->getByKey('name', 'anonymous');
echo sprintf('Hello %s', $name);
