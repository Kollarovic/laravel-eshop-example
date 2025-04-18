<?php

namespace App\System\ShoppingCart;

use App\Models\Order;

class SubmitOrderHandler
{
    public function handle(array $data, Cart $cart): Order
    {
        $order = Order::create($data);

        foreach ($cart->getItems() as $item) {
            $order->items()->create([
                'product_id' => $item->getId(),
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'quantity' => $item->getQuantity(),
            ]);
        }
        $cart->clear();
        return $order;
    }
}
