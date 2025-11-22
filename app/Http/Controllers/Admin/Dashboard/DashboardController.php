<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVarient;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->guard('admin')->user();

        $varientList = ProductVarient::all();

        foreach($varientList as $variant) {
            $variant->slug = createProductVariantSlug($variant->title,$variant->varient_code, $variant->product_id);
            $variant->save();
        }

        $product = Product::all();
        foreach($product as $prod) {
            $prod->slug = createProductSlug($prod->title, $prod->category_id);
            $prod->save();
        }

        return view('admin/dashboard/admindashboard', compact('user'));
    }
}
