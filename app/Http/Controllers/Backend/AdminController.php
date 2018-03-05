<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $_view = 'Backend.pages.admins.';
    private $_data = [];

    public function index()
    {
        $this->_data['admins'] = Admin::paginate(3);
        return view($this->_view . 'view', $this->_data);
    }

    public function add()
    {
        return view($this->_view . 'add');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        if (isset($request->privileges)) {
            $data['privileges'] = $request->privileges;
        }


        if (Admin::create($data)) {
            return redirect()->route('view-admin')->with('success', 'Admin was added.');
        }

        return redirect()->back()->with('fail', 'There was some problem');
    }
}
