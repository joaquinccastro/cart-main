<?php

require_once("CartInterface.php");

class ShoppingCart implements CartInterface
{
    private $items;
    private $owner;

    public function __construct($customer)
    {
        $this->items = [];
        $this->owner = $customer;
    }

    public function add($product, $quantity)
    {
        array_push($this->items, [
            'product' => $product,
            'quantity' => $quantity,
            'price' => $product->getPrice(),
            'subtotal' => $product->computeSubtotal($quantity)
        ]);
    }

    public function remove($product, $quantity)
    {
        $temporary_list = [];
        foreach ($this->items as $item)
        {
            if ($product->getId() == $item['product']->getId()) {
                continue;
            }
            array_push($temporary_list, $item);
        }
        $this->items = $temporary_list;
    }

    public function clear()
    {
        $this->items = [];
    }

    public function getAllItems()
    {
        return $this->items;
    }

    public function checkout()
    {
        // Save order to file
        $data = "";
        $number = 0;
        FileUtility::writeToFile('ORDER-' . $number, $data);
        // Clear the cart
        $this->clear();
    }

    public function getItemsTotal()
    {
        $total = 0;
        foreach ($this->items as $item)
        {
            $total += $item['subtotal'];
        }
        return $total;
    }
}