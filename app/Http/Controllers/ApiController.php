<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{

    public function getBlogs()
    {
        $blogs = DB::table('blogs')->get();
        return response()->json(['status' => true, 'blogs' => $blogs]);
    }


    public function getSingleBlog(Request $request)
    {
        $id = (int)$request->id;
        $blog = Blog::find($id);


        return response()->json(['status' => true, 'blog' => $blog]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function insertBlog(Request $request)
    {
        $data['title'] = $request->title;
        $data['summary'] = $request->summary;
        $data['details'] = $request->details;

        if ($blog = Blog::insert($data)) {
            return response()->json(['status' => true, 'msg' => 'blog was inserted', 'blog' => $blog]);
        }
        return response()->json(['status' => false, 'msg' => 'there was some problem'], 402);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBlog(Request $request)
    {
        $id = $request->blog_id;

        $blog = Blog::findOrFail($id);

        $blog->title = $request->title;
        $blog->summary = $request->summary;
        $blog->details = $request->details;

        if ($blog->save()) {
            return response()->json(['status' => true, 'msg' => 'blog was updated']);
        }
        return response()->json(['status' => false, 'msg' => 'there was some problem'], 402);

        /*
        $data['title'] = $request->title;
        $data['summary'] = $request->summary;
        $data['details'] = $request->details;

        if (Blog::where(['id' => $id])->update($data)) {
            return response()->json(['status' => true, 'msg' => 'blog was updated']);
        }
        return response()->json(['status' => false, 'msg' => 'there was some problem'], 402);
        */
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBlog(Request $request)
    {
        $id = (int)$request->id;

        $blog = Blog::findOrFail($id);
        if ($blog->delete()) {
            return response()->json(['status' => true, 'msg' => 'blog was deleted']);
        }
        return response()->json(['status' => false, 'msg' => 'there was some problem'], 402);

//        if (Blog::where(['id' => $id])->delete()) {
//            return response()->json(['status' => true, 'msg' => 'blog was deleted']);
//        }
//        return response()->json(['status' => false, 'msg' => 'there was some problem'], 402);

    }

}
