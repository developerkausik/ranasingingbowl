<?php

namespace App\Http\Controllers\Admin\Exhibition;

use App\Http\Controllers\Controller;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ExhibitionController extends Controller
{
    public function index()
    {

        $result = Exhibition::all();

        return view('admin/exhibitions/list', compact('result'));
    }

    public function create()
    {
        return view('admin/exhibitions/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = Exhibition::findOrFail($decryptId);

        return view('admin/exhibitions/create', compact('result'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $exhibition = Exhibition::findOrFail($request->id);
        } else {
            $exhibition = new Exhibition();
        }

        $exhibition->title = $request->title;
        $exhibition->description = $request->description;
        $exhibition->exhibition_date = $request->exhibition_date;
        $exhibition->status = $request->status ?? '0';
        $exhibition->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = Exhibition::where('id', $decryptId)->first();

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
