<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BannerController extends Controller
{
    public function index()
    {

        $banner = Banner::orderBy('page_name','asc')->get();

        return view('admin/banner/list', compact('banner'));
    }

    public function create()
    {
        return view('admin/banner/create');
    }

    public function update($id)
    {

        $decryptId = Crypt::decryptString($id);

        $banner = Banner::findOrFail($decryptId);
        return view('admin/banner/create', compact('banner'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $banner = Banner::findOrFail($request->id);
        } else {
            $banner = new banner();
        }

        $banner->page_name = $request->page_name;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $file = $request->file('image');
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();



            $tmpFilePath = public_path() . '/uploads/banner/';

            $file->move($tmpFilePath, $filename);

            $banner->image = '/uploads/banner/'.$filename;
        }
        $banner->save();

        $response['message'] = 'banner data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $banner = Banner::where('id', $decryptId)->first();

        if (isset($banner->id) && $banner->id > 0) {
            $banner->delete();
            $response['message'] = 'banner data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'banner data not found.';
            return response()->json($response, 401);
        }
    }
}
