<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;

return [
    'label' => 'Dashboard',
    'route' => 'admin.dashboard.index',
    'icon' => 'fas fa-tachometer-alt',
    'items' => [
        'dashboard' => [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard.index',
            'icon' => 'fas fa-tachometer-alt',
        ],
        'orders' => [
            'label' => 'Orders',
            'route' => 'admin.orders.index',
            'icon' => 'fas fa-shopping-cart',
            'value' => [Order::class, 'count'],
            'items' => [
                'show' => [
                    'label' => 'Show order',
                    'route' => 'admin.orders.show',
                    'icon' => 'fas fa-eye',
                    'active' => false,
                ],
            ],

        ],
        'categories' => [
            'label' => 'Categories',
            'route' => 'admin.categories.index',
            'icon' => 'fas fa-tags',
            'value' => [Category::class, 'count'],
            'items' => [
                'create' => [
                    'label' => 'Create category',
                    'route' => 'admin.categories.create',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
                'update' => [
                    'label' => 'Edit category',
                    'route' => 'admin.categories.edit',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
            ],
        ],
        'products' => [
            'label' => 'Products',
            'route' => 'admin.products.index',
            'icon' => 'fas fa-box',
            'value' => [Product::class, 'count'],
            'items' => [
                'create' => ['label' => 'Create page',
                    'route' => 'admin.products.create',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
                'update' => [
                    'label' => 'Edit page',
                    'route' => 'admin.products.edit',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
            ],
        ],
        'pages' => [
            'label' => 'Pages',
            'route' => 'admin.pages.index',
            'icon' => 'fas fa-file-alt',
            'value' => [Page::class, 'count'],
            'items' => [
                'create' => ['label' => 'Create page',
                    'route' => 'admin.pages.create',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
                'update' => [
                    'label' => 'Edit page',
                    'route' => 'admin.pages.edit',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
            ],
        ],
        'users' => [
            'label' => 'Users',
            'route' => 'admin.users.index',
            'icon' => 'fas fa-users',
            'value' => [User::class, 'count'],
            'items' => [
                'create' => ['label' => 'Create user',
                    'route' => 'admin.users.create',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
                'update' => [
                    'label' => 'Edit user',
                    'route' => 'admin.users.edit',
                    'icon' => 'fas fa-pencil-alt',
                    'active' => false,
                ],
            ],
        ],
        'profile' => [
            'label' => 'Profile',
            'route' => 'admin.profile.edit',
            'icon' => 'fas fa-user',
            'active' => false,
        ],
    ],
];
