<?php

namespace App\Http\Controllers\Web\Franchise;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FranchiseController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page_name', 'Contact Us Page')->first();
        return view('front.enquiry.franchise', compact('banner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'expected_start_date' => 'required|date'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'business_name' => $request->business_name,
            'experience' => $request->experience,
            'location' => $request->location,
            'investment' => $request->investment,
            'reason' => $request->reason,
            'capital' => $request->capital,
            'source_of_funds' => $request->source_of_funds,
            'hear_about_us' => $request->hear_about_us,
            'expected_start_date' => $request->expected_start_date,
            'comments' => $request->comments
        ];

        $contactRequest = new Franchise();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->dob = $data['dob'];
        $contactRequest->address = $data['address'];
        $contactRequest->occupation = $data['occupation'];
        $contactRequest->business_name = $data['business_name'];
        $contactRequest->experience = $data['experience'];
        $contactRequest->location = $data['location'];
        $contactRequest->investment = $data['investment'];
        $contactRequest->reason = $data['reason'];
        $contactRequest->capital = $data['capital'];
        $contactRequest->source_of_funds = $data['source_of_funds'];
        $contactRequest->hear_about_us = $data['hear_about_us'];
        $contactRequest->expected_start_date = $data['expected_start_date'];
        $contactRequest->comments = $data['comments'];
        $contactRequest->save();

        // Send email
        try {
            Mail::send('email.franchise', ['data' => $data], function ($message) use ($data) {
                $message->to('info@ranasingingbowlcentre.com')
                    ->cc('ranasingingbowlcentre@yahoo.com')
                    ->replyTo($data['email'])
                    ->subject('Franchise request from Rana Singing Bowl');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Thank you for your enquiry. We will get back to you soon.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error sending your message. Please try again later.',
            ], 500);
        }
    }
}
