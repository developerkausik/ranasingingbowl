<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Laser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LaserImageController extends Controller
{
    public function index()
    {

        $result = Laser::all();

        return view('admin/laser/list', compact('result'));
    }

    public function create()
    {
        return view('admin/laser/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = Laser::findOrFail($decryptId);

        return view('admin/laser/create', compact('result'));
    }

    public function store(Request $request)
    {

        if (isset($request->id) && $request->id > 0) {
            $laser = Laser::findOrFail($request->id);
        } else {
            $laser = new Laser();
        }

        $laser->title = $request->title;
        $laser->status = $request->status;

        $file = $request->file('image');
        if(isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/laser/', $fileName);
            $laser->image = 'uploads/laser/' . $fileName;
        }

        $laser->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = Laser::where('id', $decryptId)->first();

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
