<?php

namespace App\Http\Controllers\Web\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cms;
use App\Models\GalleryPicture;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page_name', 'Gallery Page')->first();
        $cms = Cms::where('page_name', 'Gallery Page')->get();
        $images = GalleryPicture::where('status', 1)->get();
        return view('front.gallery.pictures', compact('banner', 'images', 'cms'));
    }

    public function videoGallery()
    {
        $banner = Banner::where('page_name', 'Video Page')->first();
        $cms = Cms::where('page_name', 'Video Page')->get();
        $videos = GalleryVideo::where('status', 1)->get();
        return view('front.gallery.videos', compact('banner', 'videos', 'cms'));
    }
}
