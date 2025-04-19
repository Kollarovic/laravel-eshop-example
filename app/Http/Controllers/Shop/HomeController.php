<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::active()->inRandomOrder()->take(6)->get();

        return view('shop.home.index', compact('products'));
    }
}
