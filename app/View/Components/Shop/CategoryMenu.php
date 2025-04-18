<?php

namespace App\View\Components\Shop;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryMenu extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.shop.category-menu');
    }
}
