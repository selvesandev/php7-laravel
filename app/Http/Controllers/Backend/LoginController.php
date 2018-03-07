<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Backend.login');
    }

    public function loginAction(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $rememberMe = isset($request->remember_me);

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $rememberMe)) {
            return redirect()->intended(route('admin-dashboard'));
        }

        return redirect()->back()->with('fail', 'Invalid Email or Password Combination.');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}
