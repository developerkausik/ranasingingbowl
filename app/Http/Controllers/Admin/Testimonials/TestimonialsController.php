<?php

namespace App\Http\Controllers\Admin\Testimonials;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TestimonialsController extends Controller
{
    public function index()
    {

        $result = Testimonial::all();

        return view('admin/testimonials/list', compact('result'));
    }

    public function create()
    {
        return view('admin/testimonials/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = Testimonial::findOrFail($decryptId);

        return view('admin/testimonials/create', compact('result'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $testimonials = Testimonial::findOrFail($request->id);
        } else {
            $testimonials = new Testimonial();
        }

        $testimonials->title = $request->title;
        $testimonials->description = $request->description;
        $testimonials->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = Testimonial::where('id', $decryptId)->first();

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
