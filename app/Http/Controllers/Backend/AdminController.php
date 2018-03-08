<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\OldPasswordCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    public function updateProfile()
    {
        $loggedUser = Auth::guard('admin')->user();
        $loggedUserId = (int)$loggedUser->id;

        $this->_data['admin'] = Admin::findOrFail($loggedUserId);

        return view($this->_view . 'profile', $this->_data);
    }

    public function updateProfileAction(Request $request)
    {
        $loggedUser = Auth::guard('admin')->user();
        $loggedUserId = (int)$loggedUser->id;

        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('admins')->ignore($loggedUserId),
            ],
            'name' => 'required'
        ]);

//        ($loggedUserId != $eamil && updatesuccessfull)
//        {
//            logout;
//        }

        Admin::where(['id' => $loggedUserId])->update(['name' => $request->name, 'email' => $request->email]);

        return redirect()->back()->with('success', 'User Info updated');
    }

    public function updatePasswordAction(Request $request)
    {
        $loggedUser = Auth::guard('admin')->user();
        $loggedUserId = (int)$loggedUser->id;
        $oldPassword = $loggedUser->password;

        $this->validate($request, [
            'old_password' => ['required', new OldPasswordCheck($oldPassword)],
            'password' => 'required|confirmed'
        ]);

        $admin = Admin::find($loggedUserId);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return redirect()->back()->with('success', 'password updated successfully');
    }
}
