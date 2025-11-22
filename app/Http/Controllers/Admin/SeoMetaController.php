<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SeoMetaController extends Controller
{
    public function index()
    {

        $seo = SeoMeta::orderBy('id','asc')->get();

        return view('admin/seo/list', compact('seo'));
    }

    public function create()
    {

        return view('admin/seo/create');
    }

    public function update($id)
    {

        $decryptId = Crypt::decryptString($id);

        $seo = SeoMeta::findOrFail($decryptId);

        return view('admin/seo/create', compact('seo'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'current_url' => 'required',
            'title' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $seo = SeoMeta::findOrFail($request->id);
        } else {
            $seo = new SeoMeta();
        }
        $seo->current_url = $request->current_url;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keyword = $request->keyword;
        $seo->save();

        $response['message'] = 'seo data successfully saved.';
        return response()->json($response, 200);
    }

    /* public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $seo = SeoMeta::where('id', $decryptId)->first();

        if (isset($seo->id) && $seo->id > 0) {
            $seo->delete();
            $response['message'] = 'seo data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'seo data not found.';
            return response()->json($response, 401);
        }
    } */
}
