<?php

class OrderProduct
{
    public $orderIndex;
    public $productCode;
    public $productDescription;
    public $quantity;
    public $price;
    public $subTotal;
    public $generalTotal;

    public function __construct(
        $orderIndex,
        $productCode,
        $productDescription,
        $quantity,
        $price,
        $subTotal,
        $generalTotal,
    ) {
        $this->orderIndex = $orderIndex;
        $this->productCode = $productCode;
        $this->productDescription = $productDescription;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->subTotal = $subTotal;
        $this->generalTotal = $generalTotal;
    }
}

?>