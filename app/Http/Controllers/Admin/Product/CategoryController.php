<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {

        $result = ProductCategory::orderBy('id', 'desc')->get();

        return view('admin/products/category/list', compact('result'));
    }

    public function create()
    {
        return view('admin/products/category/create');
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ProductCategory::findOrFail($decryptId);

        return view('admin/products/category/create', compact('result'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'sort_order' => 'required|integer',
            'description' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $category = ProductCategory::findOrFail($request->id);
        } else {
            $category = new ProductCategory();
        }

        $category->title = $request->title;
        $category->manufactured = $request->manufactured;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keyword = $request->meta_keyword;
        $category->sort_order = $request->sort_order;
        $category->status = $request->status;
        $category->slug = createSlug($request->title);

        $file = $request->file('image');
        if(isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/products/category/', $fileName);
            $category->image = 'uploads/products/category/' . $fileName;
        }

        $category->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = ProductCategory::where('id', $decryptId)->first();

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
