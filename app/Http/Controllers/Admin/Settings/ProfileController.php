<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();

        $settings = Settings::where('id','1')->first();

        return view('admin/settings/profile', compact('settings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'companename' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'ph_no' => 'required'
        ]);
        $settings = Settings::findOrFail($request->id);

        $settings->companename = $request->companename;
        $settings->address = $request->address;
        $settings->email = $request->email;
        $settings->ph_no = $request->ph_no;
        $settings->fax = $request->fax;
        $settings->head_address = $request->head_address;
        $settings->alt_email = $request->alt_email;
        $settings->alt_ph_no = $request->alt_ph_no;
        $settings->alt_fax = $request->alt_fax;
        $settings->insta_link = $request->insta_link;
        $settings->fb_link = $request->fb_link;
        $settings->linkedin_link = $request->linkedin_link;
        $settings->twitter_link = $request->twitter_link;
        $settings->youtube_link = $request->youtube_link;
        $settings->whatsapp = $request->whatsapp;
        $file = $request->file('sound');
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/sound', $filename);
            $settings->sound = 'uploads/sound/' . $filename;
        }
        $settings->save();

        $response['message'] = 'Settings data successfully updated.';
        return response()->json($response, 200);
    }

    public function profilePassword()
    {
        $user = Auth::guard('admin')->user();

        $users = Admin::findOrFail($user->id);

        return view('admin/settings/changepassword', compact('users'));
    }

    public function profilePasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value,  Auth::guard('admin')->user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = Auth::guard('admin')->user();

        $profile = Admin::findOrFail($user->id);
        $profile->password = Hash::make($request->password);

        $profile->save();

        $response['message'] = 'Login password successfully updated.';
        return response()->json($response, 200);
    }
}
