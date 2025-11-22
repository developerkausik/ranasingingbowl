<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\Enquiry;
use App\Models\Franchise;
use App\Models\ProductEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EnquiryController extends Controller
{
    public function contactEnquiry()
    {

        $result = ContactRequest::orderBy('id', 'desc')->get();

        return view('admin/enquiry/list', compact('result'));
    }

    public function contactEnquiryDelete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $cms = ContactRequest::where('id', $decryptId)->first();

        if (isset($cms->id) && $cms->id > 0) {
            $cms->delete();
            $response['message'] = 'Enquiry data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'Enquiry data not found.';
            return response()->json($response, 401);
        }
    }

    public function enquiry()
    {

        $result = Enquiry::orderBy('id', 'desc')->get();

        return view('admin/enquiry/enquiry', compact('result'));
    }

    public function enquiryDelete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $cms = Enquiry::where('id', $decryptId)->first();

        if (isset($cms->id) && $cms->id > 0) {
            $cms->delete();
            $response['message'] = 'Enquiry data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'Enquiry data not found.';
            return response()->json($response, 401);
        }
    }

    public function productEnquiry(){
        $result = ProductEnquiry::with(['product','variant'])->orderBy('id', 'desc')->get();
        return view('admin/enquiry/product-enquiry', compact('result'));
    }

    public function productEnquiryDelete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $cms = ProductEnquiry::where('id', $decryptId)->first();

        if (isset($cms->id) && $cms->id > 0) {
            $cms->delete();
            $response['message'] = 'Enquiry data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'Enquiry data not found.';
            return response()->json($response, 401);
        }
    }

    public function franchiseEnquiry()
    {
        $result = Franchise::orderBy('id', 'desc')->get();
        return view('admin/enquiry/franchise-enquiry', compact('result'));
    }

    public function franchiseEnquiryDelete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $cms = Franchise::where('id', $decryptId)->first();

        if (isset($cms->id) && $cms->id > 0) {
            $cms->delete();
            $response['message'] = 'Enquiry data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'Enquiry data not found.';
            return response()->json($response, 401);
        }
    }
}
