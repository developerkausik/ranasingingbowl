<?php

namespace App\Http\Controllers\Web\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ContactRequest;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class ContactusController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page_name', 'Contact Us Page')->first();
        return view('front.enquiry.contactus', compact('banner'));
    }

    public function store(Request $request)
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
        ];

        $contactRequest = new ContactRequest();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->message = $data['message'];
        $contactRequest->country = $data['country'];
        $contactRequest->contacted_at = now();
        $contactRequest->save();

        // Send email
        try {
            Mail::send('email.contact', ['data' => $data], function ($message) use ($data) {
                $message->to('info@ranasingingbowlcentre.com')
                    ->cc('ranasingingbowlcentre@yahoo.com')
                    ->replyTo($data['email'])
                    ->subject('Contact request from Rana Singing Bowl');
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

    public function enquirySubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'message' => $request->message,
        ];

        $contactRequest = new Enquiry();
        $contactRequest->name = $data['name'];
        $contactRequest->email = $data['email'];
        $contactRequest->phone = $data['phone'];
        $contactRequest->message = $data['message'];
        $contactRequest->contacted_at = now();
        $contactRequest->save();

        // Send email
        try {
            Mail::send('email.enquiry', ['data' => $data], function ($message) use ($data) {
                $message->to('info@ranasingingbowlcentre.com')
                    ->cc('ranasingingbowlcentre@yahoo.com')
                    ->replyTo($data['email'])
                    ->subject('Enquiry request from Rana Singing Bowl');
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
