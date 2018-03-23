<?php

namespace App\Http\Controllers;

use App\Models\Vue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function getData($id = 0)
    {
        if (!empty($id)) {
            $id = (int)$id;
            $data = Vue::findOrFail($id);
        } else {

            $data = Vue::all();
        }

        return response()->json(['status' => true, 'vue' => $data]);
    }

    public function deleteData($id)
    {
        $data = Vue::findOrFail($id);
        $data->delete();
        return response()->json(['status' => true]);
    }

    public function editData(Request $request, $id)
    {
        $id = (int)$id;
        $this->validate($request, [
            'uname' => 'required',
            'email' => [
                'required',
                Rule::unique('vue', 'email')->ignore($id)
            ],
            'address' => 'required',
            'country' => 'required',
            'hobby' => 'required',
            'gender' => 'required',
        ]);

        $insertData = $request->all();
        $insertData['hobby'] = serialize($request->hobby);


        if (Vue::where(['id' => $id])->update($insertData)) {
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }
}
