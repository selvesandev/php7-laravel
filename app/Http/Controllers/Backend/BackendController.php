<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    private $_view = 'Backend.pages.';

    public function index()
    {
        return view($this->_view . 'dashboard');
    }


}
