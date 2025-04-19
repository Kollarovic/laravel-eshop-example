<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $products = $category->products()->active()->paginate();
        return view('shop.categories.show', compact('category', 'products'));
    }
}
