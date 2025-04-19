<?php

namespace App\System\Navigation;

class Item
{
    /** @var array<string, Item> */
    private array $items = [];

    public function __construct(
        private readonly string $label,
        private readonly string $route,
        private readonly ?string $icon,
        private readonly mixed $value,
        private readonly bool $active,
        private readonly bool $current
    ) {}

    public function addItem(
        string $name,
        string $label,
        string $route,
        ?string $icon,
        mixed $value,
        bool $active,
        bool $current
    ): self {
        $item = new self($label, $route, $icon, $value, $active, $current);

        return $this->items[$name] = $item;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function getValue(): mixed
    {
        if (is_callable($this->value)) {
            return ($this->value)();
        }

        return $this->value;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isCurrent(): bool
    {
        return $this->current;
    }

    /* @return array<Item> */
    public function getItems(bool $deep = false): array
    {
        $items = array_values($this->items);
        if ($deep) {
            foreach ($this->items as $item) {
                $items = array_merge($items, $item->getItems(true));
            }
        }

        return $items;
    }

    public function isOpen(): bool
    {
        if ($this->isCurrent()) {
            return true;
        }
        foreach ($this->getItems() as $item) {
            if ($item->isCurrent() or $item->isOpen()) {
                return true;
            }
        }

        return false;
    }

    /* @return array<Item> */
    public function getPath(): array
    {
        $items = [];
        foreach ($this->getItems(true) as $item) {
            if ($item->isCurrent() or $item->isOpen()) {
                $items[$item->getRoute()] = $item;
            }
        }
        if ($items) {
            $items = [$this->getRoute() => $this] + $items;
        }

        return $items;
    }

    public function getCurrentItem(): ?self
    {
        if ($this->isCurrent()) {
            return $this;
        }
        foreach ($this->getItems(true) as $item) {
            if ($item->isCurrent()) {
                return $item;
            }
        }

        return null;
    }
}
