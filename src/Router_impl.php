<?php

require_once __DIR__ . '/Router.php';

class Router extends RouteSwitch
{
    public function run(string $request_uri)
    {
        $route = substr($request_uri, 1);

        if ($route == '') {
            $this->home();
        } else {
            $this->$route();
        }
    }
}

?>