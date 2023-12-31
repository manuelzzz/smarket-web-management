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

    public function getClients()
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
    public function getClientById(
        $id,
    ) {
        try {
            $stmt = $this->clientsRepositoryImpl->getClientById($id);

            if ($stmt != false) {
                $data = $stmt->fetch();
                $fetchClient = new OrderClient(
                    orderCod: $data["NUM_PED"],
                    date: $data["DATA"],
                    clientCod: $data["COD_CLI"],
                    client: $data["CLIENTE"],
                    address: $data["ENDERECO"],
                    RG: $data["RG"],
                    generalTotal: $data["TOTAL_GERAL"],
                );

                return $fetchClient;
            } else {
                return null;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get client on service class " . $error->getMessage());
        }
    }
    public function insert(
        OrderClient $client,
    ) {
        try {
            $stmt = $this->clientsRepositoryImpl->insertClient($client);

            return ($stmt == true) ? true : false;
        } catch (Exception $error) {
            throw new Exception("Error in insert on service class " . $error->getMessage());
        }
    }
    public function update(
        OrderClient $oldClient,
        OrderClient $newClient,
    ) {
        try {
            $stmt = $this->clientsRepositoryImpl->updateClient(
                oldClient: $oldClient,
                newClient: $newClient,
            );

            return ($stmt == true) ? true : false;
        } catch (Exception $error) {
            throw new Exception("Error in update on service class " . $error->getMessage());
        }
    }
    public function removeById(
        $id,
    ) {
        $stmt = $this->clientsRepositoryImpl->removeClientById($id);

        return $stmt == true ? true : false;
    }
}

?>