<?php

namespace App\Providers;

use App\System\Navigation\ItemsFactory;
use App\System\ShoppingCart\Cart;
use App\System\ShoppingCart\CartStorage;
use App\System\ShoppingCart\SessionCartStorage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartStorage::class, SessionCartStorage::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(ItemsFactory $itemsFactory, Cart $cart): void
    {
        View::composer(['components.layout', 'admin*'], function ($view) use ($itemsFactory) {
            Paginator::useBootstrapFour();
            $items = $itemsFactory->create(config('admin_menu'));
            $view->with('navigation', $items);
        });

        View::composer('components.shop.layout', function ($view) use ($itemsFactory, $cart) {
            Paginator::useBootstrapFour();
            $items = $itemsFactory->create(config('admin_menu'));
            $view->with('navigation', $items);
            $view->with('cart', $cart);
        });
    }
}
