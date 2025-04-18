<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\Shop\OrderRequest;
use App\System\ShoppingCart\Cart;
use App\System\ShoppingCart\SubmitOrderHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CheckoutController extends Controller
{
	public function index(Cart $cart): View|RedirectResponse
	{
        if ($cart->isEmpty()) {
            return redirect()->route('shop.cart.index')->with('error', 'Your cart is empty.');
        }
        return view('shop.checkout.index', compact('cart'));
	}

    public function process(OrderRequest $request, Cart $cart, SubmitOrderHandler $handler): RedirectResponse
    {
        if ($cart->isEmpty()) {
            return redirect()->route('shop.cart.index')->with('error', 'Your cart is empty.');
        }
        $handler->handle($request->validated(), $cart);
        return redirect()->route('shop.checkout.thankyou');
    }

    public function thankYou(): View
    {
        return view('shop.checkout.thank-you');
    }
}
