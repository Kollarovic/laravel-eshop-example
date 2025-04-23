<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\CartRequest;
use App\Models\Product;
use App\System\ShoppingCart\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(private readonly Cart $cart) {}

    public function index(): View
    {
        return view('shop.cart.index', ['cart' => $this->cart]);
    }

    public function add(Product $product): RedirectResponse
    {
        $this->cart->addItem($product, 1);

        return redirect()->route('shop.cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product): RedirectResponse
    {
        $this->cart->removeItem($product);

        return redirect()->route('shop.cart.index')->with('success', 'Product removed from cart successfully!');
    }

    public function update(CartRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        $this->cart->updateItem($product, $validated['quantity']);

        return redirect()->route('shop.cart.index')->with('success', 'Cart updated successfully!');
    }

    public function clear(): RedirectResponse
    {
        $this->cart->clear();

        return redirect()->route('shop.cart.index')->with('success', 'Cart cleared.');
    }
}
