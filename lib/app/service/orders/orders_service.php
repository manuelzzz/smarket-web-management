<?php

abstract class OrdersService
{
    private $ordersRepositoryImpl;

    abstract function getOrders(
        $id
    );

    abstract function insertProduct(
        OrderProduct $product
    );

    abstract function removeProduct(
        $id,
        $productIndex
    );
}

?>