<?php

namespace App\System\ShoppingCart;

interface CartStorage
{
    /**
     * @return array<Item>
     */
    public function getCartItems(): array;
    public function saveCartItems(array $items): void;
}
