<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $_view = 'Backend.pages.news.';

    public function index()
    {
        return 'test';
    }

    public function add()
    {
        return view($this->_view . 'add');
    }

    public function addAction(Request $request)
    {
        return $request->all();
    }

    public function update($id)
    {

        return 'update ' . $id;
    }

    public function delete($id)
    {
        return 'delete ' . $id;
    }


}
