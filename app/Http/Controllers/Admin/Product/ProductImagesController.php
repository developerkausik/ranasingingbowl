<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductImagesController extends Controller
{
    public function index($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ProductImage::where('product_id', $decryptId)->get();

        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/image/list', compact('result', 'product'));
    }

    public function update($id, $imageId)
    {
        $decryptId = Crypt::decryptString($id);
        $decryptImageId = Crypt::decryptString($imageId);

        $result = ProductImage::where('product_id', $decryptId)->get();
        $image = ProductImage::where('id', $decryptImageId)->first();
        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/image/list', compact('result', 'image', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'title' => 'required',
            'product_id' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $image = ProductImage::findOrFail($request->id);
        } else {
            $image = new ProductImage();
        }

        $image->product_id = $request->product_id;
        $image->title = $request->title;
        $image->product_code = $request->product_code;

        $file = $request->file('image');
        if (isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/products/image/', $fileName);
            $image->image = 'uploads/products/image/' . $fileName;
        }

        $image->save();

        $response['message'] = 'Record data successfully saved.';
        $response['id'] = Crypt::encryptString($image->product_id);
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = ProductImage::where('id', $decryptId)->first();

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
