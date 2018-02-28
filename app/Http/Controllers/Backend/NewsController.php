<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $_view = 'Backend.pages.news.';
    private $_data = [];

    public function index()
    {
        return 'test';
    }

    public function add()
    {
        $this->_data['categories'] = Category::where(['status' => 1])->get();
        return view($this->_view . 'add', $this->_data);
    }

    public function addAction(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|unique:news,title',
            'image' => 'required',
            'status' => 'required',
            'news_date' => 'required',
            'categories' => 'required',
            'meta_keywords' => 'required',
            'summary' => 'required',
            'details' => 'required'
        ]);

        $insertData['title'] = strip_tags($request->title);
        $insertData['slug'] = str_slug($request->title);
        $insertData['news_date'] = $request->news_date;
        $insertData['status'] = (int)$request->status;
        $insertData['meta_keywords'] = $request->meta_keywords;
        $insertData['summary'] = $request->summary;
        $insertData['details'] = htmlspecialchars($request->details);


        //data collection
        //image process
        //data add image name
        //insert
        //last inserted id and selected category goes into news_categories
        //redirect back
        //redirect to


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
