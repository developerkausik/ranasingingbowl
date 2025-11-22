<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cms;
use App\Models\Laser;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banner = Banner::where('page_name', 'Home Page')->get();
        $cms = Cms::where('page_name', 'Home Page')->get();
        $testimonials = Testimonial::all();
        $laserImages = Laser::where('status', 1)->get();
        $category = DB::table('product_categories')
            ->leftJoin(DB::raw('(SELECT * FROM products WHERE id IN (
        SELECT MIN(id) FROM products GROUP BY category_id
    )) as first_products'), 'product_categories.id', '=', 'first_products.category_id')
            ->select('product_categories.id', 'product_categories.title', 'product_categories.slug', 'first_products.image as product_image')
            ->where('product_categories.status', 1)
            ->get();
        return view('front.home.index', compact('banner', 'cms', 'testimonials', 'laserImages', 'category'));
    }
}
