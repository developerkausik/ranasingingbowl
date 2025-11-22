<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GalleryVideoController extends Controller
{
    public function index()
    {

        $result = GalleryVideo::all();

        return view('admin/gallery/video/list', compact('result'));
    }

    public function create()
    {
        return view('admin/gallery/video/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = GalleryVideo::findOrFail($decryptId);

        return view('admin/gallery/video/create', compact('result'));
    }

    public function store(Request $request)
    {

        if (isset($request->id) && $request->id > 0) {
            $gallery = GalleryVideo::findOrFail($request->id);
        } else {
            $gallery = new GalleryVideo();
        }

        $gallery->title = $request->title;
        $gallery->video = $request->video;
        $gallery->status = $request->status;

        $gallery->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = GalleryVideo::where('id', $decryptId)->first();

        if (isset($result->id) && $result->id > 0) {
            $result->delete();
            $response['message'] = 'result data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'result data not found.';
            return response()->json($response, 401);
        }
    }
}
