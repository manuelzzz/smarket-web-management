<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/orders/orders_service_impl.php';

$errorMessage = "";

try {
    $ordersServiceImpl = new OrdersServiceImpl();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["pedido"])) {
            header("location: /home");
            exit;
        }

        $id = $_GET["pedido"];
        $produto = $_GET["produto"];
        $status = $ordersServiceImpl->removeProduct(
            id: $id,
            productIndex: $produto
        );

        if ($status) {
            header("location: /pedidos/home?pedido=$id");
            exit;
        }
    }
} catch (Exception $e) {
    $errorMessage = "Erro inesperaedo ao deletar produto";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Erro ao deletar produto</h2>
        <?php
        $id = $_GET["pedido"];
        echo "<a class='btn btn-primary btn-sm' role='button' href='/pedidos/home?pedido=$id title='voltar'>
        <i class'bi bi-arrow-return-left'></i>
        </a>";
        ?>
        <div class="container my-5"></div>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
    </div>
</body>

</html>