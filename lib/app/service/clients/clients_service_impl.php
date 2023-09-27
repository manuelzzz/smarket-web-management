<?php

require_once(__DIR__ . '/clients_service.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/repositories/clients/clients_repository_impl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/models/order_client.php');

class ClientsServiceImpl extends ClientsService
{
    private $clientsRepositoryImpl;

    public function __construct()
    {
        $this->clientsRepositoryImpl = new ClientsRepositoryImpl();
    }

    public function get()
    {
        try {
            $stmt = $this->clientsRepositoryImpl->getClients();
            $clients = array();

            if ($stmt != false) {
                while ($row = $stmt->fetch()) {
                    $atualClient = new OrderClient(
                        orderCod: $row["NUM_PED"],
                        date: $row["DATA"],
                        clientCod: $row["COD_CLI"],
                        client: $row["CLIENTE"],
                        address: $row["ENDERECO"],
                        RG: $row["RG"],
                        generalTotal: $row["TOTAL_GERAL"],
                    );

                    array_push($clients, $atualClient);
                }

                return $clients;
            } else {
                return null;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get clients on service class " . $error->getMessage());
        }
    }
    public function insert(
        OrderClient $client,
    ) {
    }
    public function update(
        OrderClient $oldClient,
        OrderClient $newClient,
    ) {
    }
    public function remove(
        OrderClient $client,
    ) {
        $stmt = $this->clientsRepositoryImpl->removeClient($client);

        return $stmt == true ? true : false;
    }
}

?>