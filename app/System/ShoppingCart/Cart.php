<?php

namespace App\System\ShoppingCart;

use App\Models\Product;

class Cart
{
    public function __construct(private CartStorage $storage) {}

    /* @return array<Item> */
    public function getItems(): array
    {
        return $this->storage->getCartItems();
    }

    public function addItem(Product $product, int $quantity = 1): void
    {
        $items = $this->getItems();
        if (isset($items[$product->id])) {
            $items[$product->id]->addQuantity($quantity);
        } else {
            $items[$product->id] = new Item($product->id, $product->name, $product->price, $quantity);
        }
        $this->storage->saveCartItems($items);
    }

    public function updateItem(Product $product, int $quantity): void
    {
        $items = $this->getItems();
        if (isset($items[$product->id])) {
            if ($quantity > 0) {
                $items[$product->id]->setQuantity($quantity);
            } else {
                unset($items[$product->id]);
            }
            $this->storage->saveCartItems($items);
        }
    }

    public function removeItem(Product $product): void
    {
        $items = $this->getItems();
        unset($items[$product->id]);
        $this->storage->saveCartItems($items);
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getItems() as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }

    public function getQuantity(): int
    {
        $quantity = 0;
        foreach ($this->getItems() as $item) {
            $quantity += $item->getQuantity();
        }

        return $quantity;
    }

    public function isEmpty(): bool
    {
        return ! $this->getQuantity();
    }

    public function clear(): void
    {
        $this->storage->saveCartItems([]);
    }
}
