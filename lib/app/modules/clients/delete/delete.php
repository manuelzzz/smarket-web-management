<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/app/service/clients/clients_service_impl.php';

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
    echo $e->getMessage();
}

?>