<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/models/order_client.php');

abstract class ClientsRepository
{
    private $db;

    abstract public function getClients();
    abstract public function insertClient(
        OrderClient $client,
    );
    abstract public function updateClient(
        OrderClient $oldClient,
        OrderClient $newClient,
    );
    abstract public function removeClient(
        OrderClient $client,
    );
}

?>