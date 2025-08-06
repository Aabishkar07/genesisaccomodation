<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
       public function index()
    {

        $blogs = Blog::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view("frontend.home.index", compact('blogs'));
    }

        public function single(Request $request, Blog $blog)
    {

        $allblogs = Blog::where('id', '!=', $blog->id)->paginate(4);
        // $blog->views++;
        // $blog->save();
        $slug = $blog->slug;
        $ip = $request->ip();

        $mailData = [

            'blog' => $blog,
            'status' => "view",
        ];

        return view("frontend.blog.singlepage", compact('blog', 'slug', 'allblogs'));
    }


         public function aboutus()
    {

        $aboutus = AboutUs::first();
        return view("frontend.about.index", compact('aboutus'));
    }
}
