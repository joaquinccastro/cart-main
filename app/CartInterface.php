<?php

interface CartInterface
{
    public function add($product, $quantity);
    public function remove($product, $quantity);
    public function clear();
    public function getAllItems();
    public function checkout();
}