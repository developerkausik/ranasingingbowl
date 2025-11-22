<?php

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SeoMeta;
use App\Models\Settings;

if (!function_exists('siteSettings')) {
    function siteSettings()
    {
        $settings = Settings::where('id', '1')->first();
        return $settings;
    }
}

if (!function_exists('menuCategory')) {
    function menuCategory()
    {
        $categories = ProductCategory::with('product')->where('status', '1')->orderBy('id', 'asc')->get();
        return $categories;
    }
}

if (!function_exists('headerMenuCategory')) {
    function headerMenuCategory()
    {
        $categories = ProductCategory::where('status', '1')->orderBy('id', 'asc')->get();
        if($categories->isNotEmpty()){
            foreach($categories as $category){
                $category->product = Product::where('status', '1')->where('category_id', $category->id)->inRandomOrder()->take(5)->get();
            }
        }

        return $categories;
    }
}

if (!function_exists('metaTag')) {
    function metaTag()
    {
        $url = url()->current();
        $seo = SeoMeta::where('current_url', $url)->first();
        $meta = new \stdClass();
        if (isset($seo->id) && $seo->id > 0) {
            $meta->title = $seo->title ?? 'Singing Bowl Exporters | Online Handmade Instrument Manufacturers';
            $meta->description = $seo->description ?? 'We are one of the leading suppliers, dealers & wholesalers for singing bowls in India. We supply Bengali, Nepal, Tibetan handmade accessories online.';
            $meta->keyword = $seo->keyword ?? '';
        } else {
            $meta->title = 'Singing Bowl Exporters | Online Handmade Instrument Manufacturers';
            $meta->description = 'We are one of the leading suppliers, dealers & wholesalers for singing bowls in India. We supply Bengali, Nepal, Tibetan handmade accessories online.';
            $meta->keyword = '';
        }
        return $meta;
    }
}

/* if (!function_exists('seoTagData')) {
    function seoTagData($url)
    {
        $seo = SeoMeta::where('current_url', $url)->first();
        return $seo;
    }
} */

/* admin helper */

if (!function_exists('currentUser')) {
    function currentUser()
    {
        $user = auth()->guard('admin')->user();
        return $user;
    }
}

if (!function_exists('createSlug')) {
    function createSlug($title)
    {
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = preg_replace('/-$/', '', $slug);
        $slug = preg_replace('/^-/', '', $slug);
        return  preg_replace('/--/', '-', $slug);
    }
}

if (!function_exists('createProductSlug')) {
    function createProductSlug($title, $categoryId)
    {
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = preg_replace('/-$/', '', $slug);
        $slug = preg_replace('/^-/', '', $slug);

        $category = ProductCategory::find($categoryId)->title;
        $category = str_replace(' ', '-', strtolower($category));
        $category = preg_replace('/[^A-Za-z0-9\-]/', '', $category);
        $category = preg_replace('/-+/', '-', $category);
        $category = preg_replace('/-$/', '', $category);
        $category = preg_replace('/^-/', '', $category);
        $category = preg_replace('/--/', '-', $category);

        return  $category . '/' . preg_replace('/--/', '-', $slug);
    }
}

if (!function_exists('createProductVariantSlug')) {
    function createProductVariantSlug($title, $code, $productId)
    {
        $slug = str_replace(' ', '-', strtolower($title));
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = preg_replace('/-$/', '', $slug);
        $slug = preg_replace('/^-/', '', $slug);

        $product = Product::with('category')->find($productId);
        $category = $product->category->title;
        $category = str_replace(' ', '-', strtolower($category));
        $category = preg_replace('/[^A-Za-z0-9\-]/', '', $category);
        $category = preg_replace('/-+/', '-', $category);
        $category = preg_replace('/-$/', '', $category);
        $category = preg_replace('/^-/', '', $category);
        $category = preg_replace('/--/', '-', $category);

        $productName = $product->title;
        $productName = str_replace(' ', '-', strtolower($productName));
        $productName = preg_replace('/[^A-Za-z0-9\-]/', '', $productName);
        $productName = preg_replace('/-+/', '-', $productName);
        $productName = preg_replace('/-$/', '', $productName);
        $productName = preg_replace('/^-/', '', $productName);
        $productName = preg_replace('/--/', '-', $productName);

        $code = str_replace(' ', '-', strtolower($code));
        $code = preg_replace('/[^A-Za-z0-9\-]/', '', $code);
        $code = preg_replace('/-+/', '-', $code);
        $code = preg_replace('/-$/', '', $code);
        $code = preg_replace('/^-/', '', $code);



        return  $category . '/' . $productName . '/' . preg_replace('/--/', '-', $slug) . '/' . $code;
    }
}
