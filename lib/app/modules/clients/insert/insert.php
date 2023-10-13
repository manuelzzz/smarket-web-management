<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/clients/clients_service_impl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/core/models/order_client.php';

$errorMessage = "";
$successMessage = "";

try {
    $clientsServiceImpl = new ClientsServiceImpl();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $num_ped = $_POST["num_ped"];
        $data = $_POST["data"];
        $endereco = $_POST["endereco"];
        $RG = $_POST["rg"];
        $total = $_POST["total"];

        $clientAdd = new OrderClient(
            orderCod: $num_ped,
            date: $data,
            clientCod: $id,
            client: $nome,
            address: $endereco,
            RG: $RG,
            generalTotal: $total,
        );

        do {
            if (
                empty($id) || empty($nome) || empty($num_ped) || empty($data) || empty($endereco) || empty($RG) || empty($total)
            ) {
                $errorMessage = "Todos os campos são obrigatórios";
                break;
            }

            $response = $clientsServiceImpl->insert($clientAdd);

            if ($response) {
                $successMessage = "Sucesso ao inserir cliente";
                header("location: /home");
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
        <h2>Inserir cliente</h2>
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
                    <input type="number" class="form-control" name="num_ped" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="id" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Data</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="data" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Endereço</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="endereco" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">RG</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rg" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total</label>
                <div class="col-sm-6">
                    <input type="number" step=0.1 class="form-control" name="total" value="" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary">Inserir</button>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-outline-primary" href="/" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>