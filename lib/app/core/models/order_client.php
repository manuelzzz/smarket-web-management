<?php
class OrderClient
{
    public $orderCod;
    public $date;
    public $clientCod;
    public $client;
    public $address;
    public $RG;
    public array $products;
    public $generalTotal;

    public function __construct(
        $orderCod,
        $date,
        $clientCod,
        $client,
        $address,
        $RG,
        // $products,
        $generalTotal,
    ) {
        $this->orderCod = $orderCod;
        $this->date = $date;
        $this->clientCod = $clientCod;
        $this->client = $client;
        $this->address = $address;
        $this->RG = $RG;
        // $this->products = $products;
        $this->generalTotal = $generalTotal;
    }
}
?>