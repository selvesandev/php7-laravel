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
        Auth::guard('admins')->attempt(['email' => 'p']);

        return $request->all();
    }


    public function logout()
    {

    }
}
