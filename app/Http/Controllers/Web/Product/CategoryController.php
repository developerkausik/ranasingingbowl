<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = ProductCategory::with(['product' => function ($query) {
            $query->orderBy('sort_order', 'asc')
                ->where('status', 1);
        }])->where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        return view('front.product.category', compact('category'));
    }
}
