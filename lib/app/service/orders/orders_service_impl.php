<?php
require_once(__DIR__ . '/orders_service.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/repositories/orders/orders_repository_impl.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/models/order_product.php');

class OrdersServiceImpl extends OrdersService
{
    private OrdersRepositoryImpl $ordersRepositoryImpl;

    public function __construct()
    {
        $this->ordersRepositoryImpl = new OrdersRepositoryImpl();
    }

    public function getOrders(
        $id
    ) {
        try {
            $stmt = $this->ordersRepositoryImpl->getOrders($id);
            $products = array();

            if ($stmt != false) {
                while ($row = $stmt->fetch()) {
                    $atualProduct = new OrderProduct(
                        orderIndex: $row["NUM_PED"],
                        productCode: $row["COD_PROD"],
                        productDescription: $row["DESCRICAO"],
                        quantity: $row["QUANT"],
                        price: $row["PRECO"],
                        subTotal: $row["TOTAL"],
                        generalTotal: $row["TOTAL_GERAL"],
                    );

                    array_push($products, $atualProduct);
                }
                return $products;
            } else {
                return false;
            }
        } catch (Exception $error) {
            throw new Exception("Error in get orders on service class " . $error->getMessage());
        }
    }

    public function insertProduct(
        OrderProduct $product
    ) {
        try {
            $stmt = $this->ordersRepositoryImpl->insertProduct($product);

            return ($stmt == true) ? true : false;
        } catch (Exception $error) {
            throw new Exception("Error in insert product on service class " . $error->getMessage());
        }
    }

    public function removeProduct(
        $id,
        $productIndex
    ) {
        try {
            $stmt = $this->ordersRepositoryImpl->removeProductByProductIndex(
                id: $id,
                productIndex: $productIndex,
            );

            return ($stmt == true) ? true : false;
        } catch (Exception $error) {
            throw new Exception("Error in delete product on service class " . $error->getMessage());
        }
    }
}
?>