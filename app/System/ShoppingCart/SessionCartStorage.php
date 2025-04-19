<?php

namespace App\System\ShoppingCart;

use Illuminate\Session\Store;

class SessionCartStorage implements CartStorage
{
    private const KEY = 'cart';

    public function __construct(protected Store $session) {}

    public function getCartItems(): array
    {
        return $this->session->get(self::KEY, []);
    }

    public function saveCartItems(array $items): void
    {
        $this->session->put(self::KEY, $items);
    }
}
