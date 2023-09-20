<?php

abstract class RouteSwitch
{
    protected function home()
    {
        require __DIR__ . '/pages/home.php';
    }
    protected function edit()
    {
        require __DIR__ . '/pages/edit.php';
    }
    public function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/pages/not_found.html';
    }
}

?>