<?php

abstract class RouteSwitch
{
    abstract public function run(string $request_uri);
    abstract protected function home();
    abstract protected function edit();
    abstract protected function insert();
    abstract public function __call($name, $arguments);
}

?>