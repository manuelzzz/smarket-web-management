<?php

require_once(__DIR__ . '/clients_repository.php');
include($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/database/db_connection.php');

class ClientsRepositoryImpl extends ClientsRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function getClients()
    {
        try {
            $query = "SELECT * FROM clients";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            if ($queryRes->rowCount() >= 1) {
                return $queryRes;
            } else {
                return false;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get clients on repository class " . $error->getMessage());
        }
    }

    public function insertClient(
        OrderClient $client,
    ) {
    }

    public function updateClient(
        OrderClient $oldClient,
        OrderClient $newClient,
    ) {
    }

    public function removeClient(
        OrderClient $client,
    ) {
        try {
            $query = "DELETE FROM clients WHERE RG=$client->RG";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in delete client on repository class " . $error->getMessage());
        }
    }
}

?>