<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private $_view = 'Frontend.pages.';

    public function index()
    {
        $data = [
            'name' => 'ram',
            'age' => 20,
            'address' => 'kalanki'
        ];
        return view($this->_view.'home', $data);
    }


    public function contact()
    {
        return view($this->_view.'contact');
    }

    public function about()
    {
        return view($this->_view.'about');
    }


    public function onAny()
    {
        echo 'test';
    }

}
