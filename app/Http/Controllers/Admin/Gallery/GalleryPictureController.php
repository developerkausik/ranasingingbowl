<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\GalleryPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GalleryPictureController extends Controller
{
    public function index()
    {

        $result = GalleryPicture::all();

        return view('admin/gallery/picture/list', compact('result'));
    }

    public function create()
    {
        return view('admin/gallery/picture/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = GalleryPicture::findOrFail($decryptId);

        return view('admin/gallery/picture/create', compact('result'));
    }

    public function store(Request $request)
    {

        if (isset($request->id) && $request->id > 0) {
            $gallery = GalleryPicture::findOrFail($request->id);
        } else {
            $gallery = new GalleryPicture();
        }

        $gallery->title = $request->title;
        $gallery->status = $request->status;

        $file = $request->file('image');
        if(isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/gallery/', $fileName);
            $gallery->image = 'uploads/gallery/' . $fileName;
        }

        $gallery->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = GalleryPicture::where('id', $decryptId)->first();

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
