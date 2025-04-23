<?php

namespace App\System\ShoppingCart;

interface CartStorage
{
    /**
     * @return array<Item>
     */
    public function loadCartItems(): array;

    /**
     * @param  array<Item>  $items
     */
    public function saveCartItems(array $items): void;
}
