<?php

namespace App\Http\Controllers;

use App\Models\Vue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VueController extends Controller
{
    public function index()
    {
        return view('vue');
    }

    public function createData(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required',
            'email' => 'required|unique:vue,email',
            'address' => 'required',
            'country' => 'required',
            'hobby' => 'required',
            'gender' => 'required',
        ]);
        $insertData = $request->all();
        $insertData['password'] = Hash::make($request->password);
        $insertData['hobby'] = serialize($request->hobby);

        if (Vue::create($insertData)) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }
}
