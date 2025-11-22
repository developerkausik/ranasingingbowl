<?php

namespace App\Http\Controllers\Admin\Exhibition;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use App\Models\ExhibitionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExhibitionImageController extends Controller
{
    public function index($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ExhibitionImage::where('exhibition_id', $decryptId)->get();

        $exhibition = Exhibition::with('images')->where('id', $decryptId)->first();

        return view('admin/exhibitions/images', compact('result', 'exhibition'));
    }

    public function update($id, $imageId)
    {
        $decryptId = Crypt::decryptString($id);
        $decryptImageId = Crypt::decryptString($imageId);

        $result = ExhibitionImage::where('exhibition_id', $decryptId)->get();
        $image = ExhibitionImage::where('id', $decryptImageId)->first();
        $exhibition = Exhibition::with('images')->where('id', $decryptId)->first();

        return view('admin/exhibitions/images', compact('result', 'image', 'exhibition'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'exhibition_id' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $image = ExhibitionImage::findOrFail($request->id);
        } else {
            $image = new ExhibitionImage();
        }

        $image->exhibition_id = $request->exhibition_id;
        $image->title = $request->title;

        $file = $request->file('image');
        if (isset($file) && $file != '') {
            //if folder not found then create
            if (!file_exists(public_path() . '/uploads/exhibition/image/')) {
                mkdir(public_path() . '/uploads/exhibition/image/', 0777, true);
            }

            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/exhibition/image/', $fileName);
            $image->image = 'uploads/exhibition/image/' . $fileName;
        }

        $image->save();

        $response['message'] = 'Record data successfully saved.';
        $response['id'] = Crypt::encryptString($image->exhibition_id);
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = ExhibitionImage::where('id', $decryptId)->first();

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
