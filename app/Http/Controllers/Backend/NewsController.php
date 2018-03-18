<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use DB;

class NewsController extends Controller
{
    private $_view = 'Backend.pages.news.';
    private $_data = [];

    public function index()
    {
        $this->_data['news'] = News::all();
        $priorityHighCount = News::where(['priority' => 'high'])->count();

        $this->_data['hasHigh'] = true;
        if ($priorityHighCount <= 0) {
            $this->_data['hasHigh'] = false;
        }

        return view($this->_view . 'view', $this->_data);
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

        $loggedAdminId = Auth::guard('admin')->user()->id;

        $insertData['title'] = strip_tags($request->title);
        $insertData['slug'] = str_slug($request->title);
        $insertData['news_date'] = $request->news_date;
        $insertData['status'] = (int)$request->status;
        $insertData['meta_keywords'] = $request->meta_keywords;
        $insertData['summary'] = $request->summary;
        $insertData['details'] = htmlspecialchars($request->details);
        $insertData['admin_id'] = $loggedAdminId;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->extension());

            $newName = time() . '_.' . $extension;
            Image::make($file)->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(200, 200)->save(public_path('Uploads/News/' . $newName));

            $insertData['image'] = $newName;
        }


        $catNum = 0;
        $categories = $request->categories;
        if ($news = News::create($insertData)) {
            $newsId = $news->id;

            foreach ($categories as $category) {
                $newsCatData['news_id'] = $newsId;
                $newsCatData['category_id'] = $category;
                DB::table('news_categories')->insert($newsCatData);
                $catNum++;
            }
        }
        return redirect()->route('admin-news')->with('success', 'News was added successfully with ' . $catNum . ' categories');
    }

    public function update($id)
    {

        return 'update ' . $id;
    }

    public function delete($id)
    {
        $id = (int)$id;
        $news = News::findOrFail($id);


        if (News::where(['id' => $id])->delete()) {
            $newImage = $news->image;
            if (file_exists(public_path('Uploads/News/' . $newImage))) {
                unlink(public_path('Uploads/News/' . $newImage));
            }
            DB::table('news_categories')->where(['news_id' => $id])->delete();
        }

        return redirect()->back()->with('success', 'News was deleted #' . $id);
    }


    public function updatePriority(Request $request, $id)
    {
        $id = (int)$id;

        if (isset($request->degrade)) {
            $msg = 'Degraded';
            News::where(['id' => $id])->update(['priority' => 'low']);
        } else {
            News::where(['priority' => 'high'])->update(['priority' => 'low']);
            News::where(['id' => $id])->update(['priority' => 'high']);
            $msg = 'Upgraded';
        }
        return redirect()->back()->with('success', 'Priority ' . $msg);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        //

        return response()->json(['ajax' => 'was successfull']);
    }

}
