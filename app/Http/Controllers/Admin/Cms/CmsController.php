<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CmsController extends Controller
{
    public function index()
    {

        $cms = Cms::orderBy('page_name','asc')->get();

        return view('admin/cms/list', compact('cms'));
    }

    public function create()
    {
        return view('admin/cms/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $cms = Cms::findOrFail($decryptId);

        return view('admin/cms/create', compact('cms'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'page_name' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $cms = Cms::findOrFail($request->id);
        } else {
            $cms = new Cms();
        }
        $cms->page_name = $request->page_name;
        $cms->title = $request->title;
        $cms->description = $request->description;
        $cms->page_link = $request->page_link;
        $file = $request->file('image');
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();



            $tmpFilePath = public_path() . '/uploads/cms/';

            $file->move($tmpFilePath, $filename);

            $cms->image = '/uploads/cms/'.$filename;
        }
        $cms->save();

        $response['message'] = 'cms data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $cms = Cms::where('id', $decryptId)->first();

        if (isset($cms->id) && $cms->id > 0) {
            $cms->delete();
            $response['message'] = 'cms data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'cms data not found.';
            return response()->json($response, 401);
        }
    }
}
