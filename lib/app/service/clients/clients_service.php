<?php

abstract class ClientsService
{
    private $clientsRepositoryImpl;

    abstract function get();
    abstract function insert(
        OrderClient $client,
    );
    abstract function update(
        OrderClient $oldClient,
        OrderClient $newClient,
    );
    abstract function remove(
        OrderClient $client,
    );
}

?>