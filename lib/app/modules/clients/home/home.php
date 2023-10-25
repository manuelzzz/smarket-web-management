<?php
$errorMessage = "";
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
        <h2>Clientes</h2>
        <a class="btn btn-primary btn-sm" role="button" href="/insert" title='Novo cliente'>Novo cliente</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Numero do pedido</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Endereço</th>
                    <th>RG</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/clients/clients_service_impl.php';

                try {
                    $clientsServiceImpl = new ClientsServiceImpl();
                    $clientes = $clientsServiceImpl->getClients();

                    if ($clientes == null) {
                        $errorMessage = "Não há clientes cadastrados";
                        throw new Exception("Não há clientes cadastrados");
                    }

                    for ($i = 0; $i < count($clientes); $i++) {
                        $cliente = $clientes[$i];

                        echo "<tr>
                        <td> $cliente->orderCod </td>
                        <td> $cliente->clientCod </td>
                        <td> $cliente->client </td>
                        <td> $cliente->date </td>
                        <td> $cliente->address </td>
                        <td> $cliente->RG </td>
                        <td>R$ $cliente->generalTotal </td>
                        <td>
                            <a class='btn btn-primary btn-sm' role='button' href='/pedidos/home?pedido=$cliente->orderCod' title='Produtos comprados'><i class='bi bi-list-ul'></i></a>
                            <a class='btn btn-primary btn-sm' role='button' href='/edit?pedido=$cliente->orderCod' title='Editar'><i class='bi bi-pen'></i></a>
                            <a class='btn btn-danger btn-sm' role='button' href='/delete?pedido=$cliente->orderCod' title='Deletar'><i class='bi bi-trash3'></i></a>
                        </td>
                    </tr>";
                    }
                } catch (Exception $e) {
                    $errorMessage = $e->getMessage();
                }
                ?>
            </tbody>
        </table>
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