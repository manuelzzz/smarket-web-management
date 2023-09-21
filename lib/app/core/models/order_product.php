<?php

class OrderProduct
{
    protected $orderIndex;
    protected $productCode;
    protected $productDescription;
    protected $quantity;
    protected $price;
    protected $subTotal;

    public function __construct(
        $orderIndex,
        $productCode,
        $productDescription,
        $quantity,
        $price,
        $subTotal,
    ) {
        $this->orderIndex = $orderIndex;
        $this->productCode = $productCode;
        $this->productDescription = $productDescription;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->subTotal = $subTotal;
    }
}

?>