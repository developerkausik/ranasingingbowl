<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cms;
use App\Models\Laser;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function laser()
    {
        $banner = Banner::where('page_name', 'Laser Page')->first();
        $cms = Cms::where('page_name', 'Laser Page')->get();
        $laser = Laser::where('status', 1)->get();

        return view('front.pages.laser', compact('banner', 'cms', 'laser'));
    }

    public function aboutUs()
    {
        $banner = Banner::where('page_name', 'About Us Page')->first();
        $cms = Cms::where('page_name', 'About Us Page')->get();

        return view('front.pages.aboutus', compact('banner', 'cms'));
    }

    public function infrastructure()
    {
        $banner = Banner::where('page_name', 'Infrastructure Page')->first();
        $cms = Cms::where('page_name', 'Infrastructure Page')->get();

        return view('front.pages.infrastructure', compact('banner', 'cms'));
    }
}
