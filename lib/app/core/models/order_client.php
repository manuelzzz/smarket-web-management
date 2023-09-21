<?php

class OrderClient
{
    public $orderIndex;
    public $date;
    public $clientIndex;
    public $address;
    public $RG;
    public array $products;
    public $generalTotal;

    public function __construct(
        $orderIndex,
        $date,
        $clientIndex,
        $address,
        $RG,
        $products,
        $generalTotal,
    ) {
        $this->orderIndex = $orderIndex;
        $this->date = $date;
        $this->clientIndex = $clientIndex;
        $this->address = $address;
        $this->RG = $RG;
        $this->products = $products;
        $this->generalTotal = $generalTotal;
    }
}

?>