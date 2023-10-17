<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/clients/clients_service_impl.php';

$errorMessage = "";

try {
    $clientsServiceImpl = new ClientsServiceImpl();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["pedido"])) {
            header("location: /home");
            exit;
        }

        $id = $_GET["pedido"];
        $status = $clientsServiceImpl->removeById($id);

        if ($status) {
            header("location: /home");
            exit;
        }
    }
} catch (Exception $e) {
    if (str_contains($e, 'SQLSTATE[23000]')) {
        $errorMessage = "Você deve deletar todos os produtos do pedido " . $_GET["pedido"] . " para poder deletar o cliente";
    } else {
        $errorMessage = "Erro ao deletar cliente";
    }
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
        <h2>Erro ao deletar cliente</h2>
        <a class="btn btn-primary btn-sm" role="button" href="/home" title="voltar"><i
                class="bi bi-arrow-return-left"></i></a>
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