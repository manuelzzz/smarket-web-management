<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/app/core/router/route_switch_impl.php";

try {
    $requestUri = $_SERVER['REQUEST_URI'];

    $router = new RouteSwitchImpl();
    $router->run($requestUri);
} catch (Error $e) {
    echo "Error: " . $e->getMEssage();
    die("Error in index" . $e);
}

?>