<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
       public function index()
    {
        $services = Service::latest()->limit(3)->get();
        $testimonials = Testimonial::get();
        $blogs = Blog::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->limit(6)->get();
        return view("frontend.home.index", compact('blogs','services','testimonials'));
    }

        public function single(Request $request, Blog $blog)
    {

        $allblogs = Blog::where('id', '!=', $blog->id)->get();
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
                $testimonials = Testimonial::orderBy('sort_order')->paginate(10);

        return view("frontend.about.index", compact('aboutus','testimonials'));
    }

          public function services()
    {

        $services = Service::get();
        return view("frontend.service.index", compact('services'));
    }

            public function blogs()
    {

        $blogs = Blog::get();
        return view("frontend.blog.allblogs", compact('blogs'));
    }
}
