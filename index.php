<?php
// filename : index.php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use ModernFramework\Application;

$request = Request::createFromGlobals();

$kernel = new Application();

$response = $kernel->handle($request);
$response->send();