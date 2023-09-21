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

    public function home()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/home/home.php';
    }

    public function edit()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/edit/edit.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require $_SERVER['DOCUMENT_ROOT'] . 'lib/app/core/exceptions/404.php';
    }
}

?>