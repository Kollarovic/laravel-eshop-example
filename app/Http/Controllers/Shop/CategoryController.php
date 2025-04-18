<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        $products = $category->products()->paginate();
        return view('shop.category.show', compact('category', 'products'));
    }
}
