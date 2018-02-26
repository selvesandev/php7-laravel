<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $_view = 'Backend.pages.categories.';
    private $_data = [];

    public function index()
    {
        $this->_data['categories'] = Category::all();
        return view($this->_view . 'add', $this->_data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:20|unique:categories,name'
        ], [
//            'name.min'=>'Hello what\'s up'
        ], [
            'name' => 'Category Name'
        ]);
        if (Category::create(['name' => $request->name])) {
            return redirect()->back()->with('success', 'Category was created');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
