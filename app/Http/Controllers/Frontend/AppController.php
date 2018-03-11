<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppController extends Controller
{
    private $_view = 'Frontend.pages.';

    public function __construct()
    {
//        $this->middleware(['checkAge'])->except(['about']);
    }

    public function index()
    {
        $data['news'] = News::where(['status' => 1])->get();
//        $data['categories'] = Category::where(['status' => 1])->get();

        return view($this->_view . 'home', $data);
    }


    public function contact()
    {
        return view($this->_view . 'contact');
    }

    public function about()
    {
        return view($this->_view . 'about');
    }


    public function onAny()
    {
        echo 'test';
    }

    public function newsByCategory($id)
    {
        $id = (int)$id;
//        $data['categories'] = Category::where(['status' => 1])->get();
        $category = Category::where(['id' => $id])->first();

        if (!$category) {
            throw new NotFoundHttpException();
        }
        $data['selected_cat'] = $category;

        return view($this->_view . 'category-news', $data);
    }

    public function getSingle($slug)
    {
        $news = News::where(['status' => 1, 'slug' => $slug])->first();

        if (!$news) {
            throw new NotFoundHttpException();
        }

        $data['news'] = $news;
        return view($this->_view . 'news-single', $data);
    }

}
