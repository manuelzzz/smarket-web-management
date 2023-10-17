<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/orders/orders_service_impl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/models/order_product.php';

$errorMessage = "";
$successMessage = "";

try {
    $ordersServiceImpl = new OrdersServiceImpl();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $orderIndex = $_GET['pedido'];
        $productCode = $_POST["cod_prod"];
        $description = $_POST["descricao"];
        $quantity = $_POST["quant"];
        $price = $_POST["preco"];
        $total = $_POST["total_geral"];

        $orderAdd = new OrderProduct(
            orderIndex: $orderIndex,
            productCode: $productCode,
            productDescription: $description,
            quantity: $quantity,
            price: $price,
            subTotal: null,
            generalTotal: $total,
        );

        do {
            if (
                empty($productCode) || empty($description) || empty($quantity) || empty($price) || empty($total)
            ) {
                $errorMessage = "Todos os campos são obrigatórios";
                break;
            }

            $response = $ordersServiceImpl->insertProduct($orderAdd);

            if ($response) {
                $successMessage = "Sucesso ao inserir cliente";
                header("location: pedidos/home?pedido=$orderIndex");
                exit;
            }
            $errorMessage = "Erro ao inserir cliente";
        } while (false);
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Inserir produto</h2>
        <form method="post">
            <?php
            if (!empty($errorMessage)) {
                echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            }

            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class= 'offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Numero do pedido</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="num_ped" value=<?php echo $_GET['pedido'] ?>
                        readonly />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Código do produto</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="cod_prod" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descrição</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descricao" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantidade</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="quant" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Preço</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="preco" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total geral</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="total_geral" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Inserir</button>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-outline-primary" href="/pedidos/home?pedido=<?php echo $_GET['pedido'] ?>"
                        role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

?>