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
    public function index(Cart $cart): View
    {
        return view('shop.cart.index', compact('cart'));
    }

    public function add(Product $product, Cart $cart): RedirectResponse
    {
        $cart->addItem($product, 1);

        return redirect()->route('shop.cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function remove(Product $product, Cart $cart): RedirectResponse
    {
        $cart->removeItem($product);

        return redirect()->route('shop.cart.index')->with('success', 'Product removed from cart successfully!');
    }

    public function update(CartRequest $request, Product $product, Cart $cart): RedirectResponse
    {
        $validated = $request->validated();
        $cart->updateItem($product, $validated['quantity']);

        return redirect()->route('shop.cart.index')->with('success', 'Cart updated successfully!');
    }

    public function clear(Cart $cart): RedirectResponse
    {
        $cart->clear();

        return redirect()->route('shop.cart.index')->with('success', 'Cart cleared.');
    }
}
