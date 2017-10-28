<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Auth;

class BlogController extends Controller
{
    public function add(){
        return view('blog.createblog');
    }

    public function store(Request $request){
        $blog=new Blog;
        $blog->title=$request->title;
        $blog->body=$request->body;
        $blog->category=$request->category;
        $blog->filepath=$request->filepath;
        $blog->user_id=auth()->user()->id;

        $blog->tags()->save($blog,['tag_id'=>1]);
        $blog->tags()->save($blog,['tag_id'=>2]);

        $blog->save();
    }

    public function show($id){
        $blog=Blog::findorfail($id);
        return view('blog.show')->with('blog',$blog);
    }

    public function getAll(){
        $blogs=Blog::all();
        return view('blog.getAll')->with('blogs',$blogs);
    }

    public function ng_getall(){
        $blogs=Blog::all();
        return response()->json(
          ['blogs' => $blogs],
            200
          );
    }
}
