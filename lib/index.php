<?php

require_once __DIR__ . '/app/core/router/Router_impl.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);

?>