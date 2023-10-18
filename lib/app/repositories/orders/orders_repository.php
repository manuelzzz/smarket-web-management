<?php

abstract class ordersRepository
{
    private $db;

    abstract function getOrders(
        $id
    );

    abstract function insertProduct(
        OrderProduct $product
    );

    abstract function removeProductByProductIndex(
        $id,
        $productIndex
    );
}

?>