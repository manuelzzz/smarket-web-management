<?php
require_once(__DIR__ . '/clients_repository.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/utils/date_format.php');
include($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/database/db_connection.php');

class ClientsRepositoryImpl extends ClientsRepository
{
    private $db;
    private $dateFormatter;

    public function __construct()
    {
        $this->db = new DBConnection();
        $this->dateFormatter = new DateFormat();
    }

    public function getClients()
    {
        try {
            $query = "SELECT * FROM `clients`";

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

    public function getClientById(
        $id,
    ) {
        try {
            $query = "SELECT * FROM `clients` WHERE NUM_PED=$id";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            if ($queryRes->rowCount() >= 1) {
                return $queryRes;
            } else {
                return false;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get client on repository class " . $error->getMessage());
        }
    }

    public function insertClient(
        OrderClient $client,
    ) {
        try {
            $date = $this->dateFormatter->format($client->date);

            $query = "INSERT INTO `clients` VALUES(
                $client->orderCod,
                STR_TO_DATE('$date', '%d-%m-%Y'),
                $client->clientCod,
                '$client->client',
                '$client->address',
                '$client->RG',
                $client->generalTotal
                )";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in insert client on repository class " . $error->getMessage());
        }
    }

    public function updateClient(
        OrderClient $oldClient,
        OrderClient $newClient,
    ) {
        try {
            if ($oldClient == $newClient) {
                return true;
            }

            $newDate = $this->dateFormatter->format($newClient->date);

            $query = "UPDATE `clients`
                    SET
                    DATA=STR_TO_DATE('$newDate', '%d-%m-%Y'),
                    COD_CLI=$newClient->clientCod,
                    CLIENTE='$newClient->client',
                    ENDERECO='$newClient->address',
                    RG='$newClient->RG',
                    TOTAL_GERAL=$newClient->generalTotal
                    WHERE
                    NUM_PED=$oldClient->orderCod";

            echo $query;

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in update client on repository class " . $error->getMessage());
        }
    }

    public function removeClientById(
        $id,
    ) {
        try {
            $query = "DELETE FROM `clients` WHERE NUM_PED=$id";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in delete client on repository class " . $error->getMessage());
        }
    }
}
?>