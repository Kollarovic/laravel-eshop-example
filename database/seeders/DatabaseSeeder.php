<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(30)
            ->create();

        Page::factory(30)
            ->create();

        Category::factory(8)
            ->create();

        Product::factory(100)
            ->create();

        $products = Product::all();
        Order::factory()
            ->count(10)
            ->create()
            ->each(function ($order) use ($products) {
                foreach ($products->random(rand(2, 4)) as $product) {
                    $order->items()->create([
                        'product_id' => $product->id,
                        'name'       => $product->name,
                        'price'      => $product->price,
                        'quantity'   => rand(1, 3),
                    ]);
                }
            });

    }
}
