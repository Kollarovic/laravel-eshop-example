<?php

namespace App\System\Navigation;

use Illuminate\Http\Request;

class ItemsFactory
{
    private const DEFAULT = [
        'label' => 'None',
        'route' => 'none',
        'active' => true,
        'icon' => 'fas fa-file-alt',
        'value' => null,
        'items' => [],
    ];

    public function __construct(private readonly Request $request) {}

    public function create(array $data): Item
    {
        $data = $this->normalizeData($data);
        $rootItem = new Item(
            $data['label'],
            $data['route'],
            $data['icon'],
            $data['value'],
            $data['active'],
            $data['current']
        );
        $this->addItems($rootItem, $data['items']);

        return $rootItem;
    }

    private function addItems(Item $rootItem, array $items): void
    {
        foreach ($items as $name => $data) {
            $data = $this->normalizeData($data);
            $item = $rootItem->addItem(
                $name,
                $data['label'],
                $data['route'],
                $data['icon'],
                $data['value'],
                $data['active'],
                $data['current']
            );
            $this->addItems($item, $data['items']);
        }
    }

    private function normalizeData(array $data): array
    {
        $data += self::DEFAULT;
        $data['current'] = $this->request->routeIs($data['route']);

        return $data;
    }
}
