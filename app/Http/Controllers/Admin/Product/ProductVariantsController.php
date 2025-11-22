<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVarient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductVariantsController extends Controller
{
    public function index($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ProductVarient::where('product_id', $decryptId)->get();

        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/variant/list', compact('result', 'product'));
    }

    public function create($id)
    {
        $decryptId = Crypt::decryptString($id);

        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/variant/create', compact('product'));
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ProductVarient::where('id', $decryptId)->first();
        $product = Product::where('id', $result->product_id)->first();

        return view('admin/products/variant/create', compact('result', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'varient_code' => 'required',
            'title' => 'required',
            'product_id' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $variant = ProductVarient::findOrFail($request->id);
        } else {
            $variant = new ProductVarient();
        }

        $variant->product_id = $request->product_id;
        $variant->title = $request->title;
        $variant->varient_code = $request->varient_code;
        $variant->description = $request->description;
        $variant->status = $request->status;
        $variant->slug = createProductVariantSlug($variant->title,$variant->varient_code, $variant->product_id);

        $file = $request->file('image');
        if (isset($file) && $file != '') {
            $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/products/varient/', $fileName);
            $variant->image = 'uploads/products/varient/' . $fileName;
        }

        for($i = 1; $i <= 4; $i++) {
            if (isset($request->{"image$i"}) && $request->{"image$i"} != '') {
                $file = $request->file("image$i");
                $fileName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/uploads/products/varient/', $fileName);
                $variant->{"image$i"} = 'uploads/products/varient/' . $fileName;
            }
        }

        $variant->save();

        $response['message'] = 'Record data successfully saved.';
        $response['id'] = Crypt::encryptString($variant->product_id);
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = ProductVarient::where('id', $decryptId)->first();

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
