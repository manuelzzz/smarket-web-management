<?php


class ClientsRepositoryImpl extends ClientsRepository
{
    private $db;

    public function __construct()
    {
        require_once('/clients_repository.php');
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
                return FALSE;
            }
        } catch (Exception $error) {
            die("Error in get clients " . $error->getMessage());
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
    }
}

?>