<?php

namespace App\Http\Controllers\Web\Exhibition;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cms;
use App\Models\Exhibition;
use App\Models\Laser;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page_name', 'Laser Page')->first();

        $exhibitions = Exhibition::with('images')->where('status', 1)->orderBy('exhibition_date','desc')->get();

        return view('front.exhibition.index', compact('banner', 'exhibitions'));
    }

}
