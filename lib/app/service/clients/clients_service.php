<?php

abstract class ClientsService
{
    private $clientsRepositoryImpl;

    abstract function getClients();
    abstract function getClientById(
        $id,
    );
    abstract function insert(
        OrderClient $client,
    );
    abstract function update(
        OrderClient $oldClient,
        OrderClient $newClient,
    );
    abstract function removeById(
        $id,
    );
}

?>