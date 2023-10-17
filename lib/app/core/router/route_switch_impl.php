<?php

require_once 'route_switch.php';

class RouteSwitchImpl extends RouteSwitch
{
    public function run(string $request_uri)
    {
        $route = substr($request_uri, 1);

        if ($route == '' || $route == '/') {
            $this->home();
        } else if (str_contains($route, "pedidos/home")) {
            $this->orderHome();
        } else if (str_contains($route, "pedidos/insert")) {
            $this->orderInsert();
        } else if (str_contains($route, "edit")) {
            $this->edit();
        } else if (str_contains($route, "delete")) {
            $this->delete();
        } else {
            $this->$route();
        }
    }

    public function home()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/clients/home/home.php';
    }

    public function edit()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/clients/edit/edit.php';
    }
    public function insert()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/clients/insert/insert.php';
    }
    public function delete()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/clients/delete/delete.php';
    }

    public function orderHome()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/orders/home/home.php';
    }
    public function orderInsert()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/modules/orders/insert/insert.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require $_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/exceptions/404.php';
    }
}

?>