<?php

require_once 'route_switch.php';

class RouteSwitchImpl extends RouteSwitch
{
    public function run(string $request_uri)
    {
        $route = substr($request_uri, 1);

        if ($route == '' || $route == '/') {
            $this->home();
        } else {
            $this->$route();
        }
    }

    public function home()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/home/home.php';
    }

    public function edit()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/edit/edit.php';
    }
    public function insert()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/insert/insert.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/exceptions/404.php';
    }
}

?>