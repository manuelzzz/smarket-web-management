<?php

require_once(__DIR__ . '/orders_repository.php');
include($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/database/db_connection.php');

class OrdersRepositoryImpl extends OrdersRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    function getOrders(
        $id
    ) {
        try {
            $query = "SELECT * FROM `orders` WHERE NUM_PED=$id";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            if ($queryRes->rowCount() >= 1) {
                return $queryRes;
            } else {
                return false;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get orders on repository class" . $error->getMessage());
        }
    }

    function insertProduct(
        OrderProduct $product
    ) {
        try {
            $query = "INSERT INTO 
            `orders` (NUM_PED, COD_PROD, DESCRICAO, QUANT, PRECO, TOTAL_GERAL)
        VALUES 
        (
            $product->orderIndex,
            $product->productCode,
            '$product->productDescription',
            $product->quantity,
            $product->price,
            $product->generalTotal)";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();
            $queryRes->setFetchMode(PDO::FETCH_ASSOC);

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in insert order on repository class" . $error->getMessage());
        }
    }

    function removeProductByProductIndex(
        $id,
        $productIndex
    ) {
        try {
            $query = "DELETE FROM `orders` WHERE NUM_PED=$id AND COD_PROD=$productIndex";

            $queryRes = $this->db->openConnection()->prepare($query);
            $queryRes->execute();

            return true;
        } catch (Exception $error) {
            throw new Exception("Error in delete order on repository class" . $error->getMessage());
        }
    }
}

?>