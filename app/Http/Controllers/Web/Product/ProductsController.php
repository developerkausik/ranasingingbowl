<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductEnquiry;
use App\Models\ProductVarient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index($requestCategory, $requestProduct)
    {
        $slug = $requestCategory . '/' . $requestProduct;
        $category = ProductCategory::where('slug', $requestCategory)->first();
        //        $product = Product::with(['varients', 'sounds', 'images'])->where('slug', $slug)->first();
        $product = Product::with([
            'varients' => function ($query) {
                $query->where('status', 1);
            },
            'sounds',
            'images'
        ])->where('slug', $slug)->first();
        if (!$product) {
            abort(404);
        }
        return view('front.product.products', compact('category', 'product'));
    }

    public function variantList($requestCategory, $requestProduct)
    {
        $slug = $requestCategory . '/' . $requestProduct;
        $category = ProductCategory::where('slug', $requestCategory)->first();
        $product = Product::with([
            'varients' => function ($query) {
                $query->where('status', 1);
            },
            'sounds',
            'images'
        ])->where('slug', $slug)->first();
        if (!$product) {
            abort(404);
        }
        return view('front.product.allvariants', compact('category', 'product'));
    }

    public function variantDetails($requestCategory, $requestProduct, $variantSlug, $code)
    {
        $slug = $requestCategory . '/' . $requestProduct;
        $category = ProductCategory::where('slug', $requestCategory)->first();
        $product = Product::with(['varients' => function ($query) {
                $query->where('status', 1);
            }, 'sounds'])->where('slug', $slug)->first();
        $createdVariantSlug = $requestCategory . '/' . $requestProduct . '/' . $variantSlug . '/' . $code;
        $variant = ProductVarient::with('productSound')->where('slug', $createdVariantSlug)->first();
        return view('front.product.variants', compact('category', 'product', 'variant'));
    }

    public function search(Request $request)
    {
        $search = $request->input('keyword');
        $query = Product::with('varients', 'category')
            ->where('title', 'LIKE', '%' . $search . '%')
            ->orWhereHas('varients', function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('category', function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%');
            });

        $products = $query->get();
        return view('front.product.search', compact('products', 'search'));
    }


    public function enquirySubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        // Verify Google reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $recaptchaResponse,
            'remoteip' => $request->ip(),
        ]);

        $verification = $verify->json();

        if (!isset($verification['success']) || $verification['success'] !== true || $verification['score'] < 0.5) {
            return response()->json([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed. Please try again.'
            ]);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' => $request->message,
            'product_id' => $request->product_id,
            'variant_id' => $request->variant_id,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'no_pices' => $request->no_pices,
        ];

        $enquiry = new ProductEnquiry();
        $enquiry->name = $data['name'];
        $enquiry->email = $data['email'];
        $enquiry->phone = $data['phone'];
        $enquiry->message = $data['message'];
        $enquiry->product_id = $data['product_id'];
        $enquiry->variant_id = $data['variant_id'];
        $enquiry->size = $data['size'];
        $enquiry->quantity = $data['quantity'];
        $enquiry->no_pices = $data['no_pices'];
        $enquiry->contacted_at = now();
        $enquiry->save();

        if (isset($data['product_id']) && $data['product_id'] != null) {
            $product = Product::find($data['product_id']);
            $data['product'] = ($product->title != '') ? $product->title : '';
        } else {
            $data['product'] = '';
        }

        if (isset($data['variant_id']) && $data['variant_id'] != null) {
            $variant = ProductVarient::find($data['variant_id']);
            $data['variant'] = ($variant->title != '') ? $variant->title : '';
        } else {
            $data['variant'] = '';
        }

        // Send email
        try {
            Mail::send('email.productenquiry', ['data' => $data], function ($message) use ($data) {
                $message->to('info@ranasingingbowlcentre.com')
                    ->cc('ranasingingbowlcentre@yahoo.com')
                    ->replyTo($data['email'])
                    ->subject('Product Enquiry request from Rana Singing Bowl');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for your enquiry. We will get back to you soon.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error sending your enquiry. Please try again later.',
                'data' => $data,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
