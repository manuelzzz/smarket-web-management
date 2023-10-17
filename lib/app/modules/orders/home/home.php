<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Produtos do
            <?php echo $_GET["pedido"] ?>° pedido
        </h2>
        <a class="btn btn-primary btn-sm" role="button" href="/home" title="voltar"><i
                class="bi bi-arrow-return-left"></i></a>
        <a class="btn btn-primary btn-sm" role="button" href="/pedidos/insert?pedido=<?php echo $_GET["pedido"] ?>"
            title="Novo produto">Novo
            produto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Código do produto</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço uni.</th>
                    <th>Preço tot.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/orders/orders_service_impl.php';

                try {
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (!isset($_GET["pedido"])) {
                            header("location: /home");
                            exit;
                        }

                        $id = $_GET["pedido"];

                        $ordersServiceImpl = new OrdersServiceImpl();
                        $products = $ordersServiceImpl->getOrders($id);

                        if ($products === null) {
                            echo "<tr>
                            <td></td>
                            <td></td>
                            <td>Esta compra não foi cadastrada</td>
                            <td></td>
                            <td></td>
                            </tr>";
                        }
                        if ($products === false) {
                            echo "<tr>
                            <td></td>
                            <td></td>
                            <td>Não há produtos nesta compra</td>
                            <td></td>
                            <td></td>
                            </tr>";
                        }

                        if (gettype($products) === 'array') {
                            for ($i = 0; $i < count($products); $i++) {
                                $product = $products[$i];

                                echo "<tr>
                                <td> $product->productCode </td>
                                <td> $product->productDescription </td>
                                <td> $product->quantity </td>
                                <td> R$ $product->price </td>
                                <td> R$ $product->subTotal </td>
                                <td>
                                <a class='btn btn-danger btn-sm' role='button' href='/delete?pedido=$product->orderIndex' title='Deletar produto'><i class='bi bi-trash3'></i></a>
                                </td>
                                </tr>";
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo "erro";
                }
                ?>
            </tbody>
        </table>
        <h5>
            <?php
            echo gettype($products) === 'array' ? "Total da compra: R$ " . $products[0]->generalTotal : "";
            ?>
        </h5>
    </div>
</body>

</html>