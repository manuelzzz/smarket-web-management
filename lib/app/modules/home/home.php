<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>Lista de clientes</h2>
        <a class="btn btn-primary btn-sm" role="button" href="/insert">Novo cliente</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Numero do pedido</th>
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
                    $clients_service_impl = new ClientsServiceImpl();
                    $clientes = $clients_service_impl->get();

                    for ($i = 0; $i < count($clientes); $i++) {
                        $cliente = $clientes[$i];

                        echo "<tr>
                        <td> $cliente->clientCod </td>
                        <td> $cliente->client </td>
                        <td> $cliente->orderCod </td>
                        <td> $cliente->date </td>
                        <td> $cliente->address </td>
                        <td> $cliente->RG </td>
                        <td>R$ $cliente->generalTotal </td>
                        <td>
                            <a class='btn btn-primary btn-sm' role='button' href='/edit'>Editar</a>
                            <a class='btn btn-danger btn-sm' role='button' href='/delete'>Deletar</a>
                        </td>
                    </tr>";
                    }
                } catch (Exception $e) {
                    echo "erro";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>