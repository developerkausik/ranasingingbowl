<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductSoundController extends Controller
{
    public function index($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = ProductSound::where('product_id', $decryptId)->where('variant_id',NULL)->get();

        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/sound/list', compact('result', 'product'));
    }

    public function update($id, $soundId)
    {
        $decryptId = Crypt::decryptString($id);
        $decryptImageId = Crypt::decryptString($soundId);

        $result = ProductSound::where('product_id', $decryptId)->get();
        $sound = ProductSound::where('id', $decryptImageId)->first();
        $product = Product::where('id', $decryptId)->first();

        return view('admin/products/sound/list', compact('result', 'sound', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'product_id' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $sound = ProductSound::findOrFail($request->id);
        } else {
            $sound = new ProductSound();
        }

        $sound->product_id = $request->product_id;
        $sound->title = $request->title;

        $file = $request->file('sound');
        if (isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/products/sound/', $fileName);
            $sound->sound = 'uploads/products/sound/' . $fileName;
        }

        $sound->save();

        $response['message'] = 'Record data successfully saved.';
        $response['id'] = Crypt::encryptString($sound->product_id);
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = ProductSound::where('id', $decryptId)->first();

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
