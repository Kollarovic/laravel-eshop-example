<?php

namespace App\System\ShoppingCart;

class Item
{
    public function __construct(
        private int $id,
        private string $name,
        private float $price,
        private int $quantity
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function addQuantity(int $quantity): self
    {
        $this->quantity += $quantity;
        return $this;
    }

    public function getTotal(): float
    {
        return $this->getPrice() * $this->quantity;
    }
}
