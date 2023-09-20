<?php

require_once __DIR__ . 'Router_impl.php';

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);

?>