<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        /* $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@ranasingingbowlcentre.com';
        $admin->password = bcrypt('123456');
        $admin->save(); */

        return view('admin/auth/login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])) {
            $user = auth()->guard('admin')->user();
            if ($user->id > 0) {
                $response['message'] = 'Successfully Logedin';
                return response()->json($response,200);
            } else {
                $response['message'] = 'Sorry!! email or password does not matched!';
                return response()->json($response,401);
            }
        } else {
            $response['message'] = 'Sorry!! email or password does not matched!';
            return response()->json($response,401);
        }


    }

    public function logOut(){
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin');
    }
}
