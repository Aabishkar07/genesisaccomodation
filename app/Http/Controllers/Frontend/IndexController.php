<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Accommodation;
use App\Models\Blog;
use App\Models\Contact;
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
        $accomodations = Accommodation::with('roomType')->where('status', 'active')->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->limit(6)->get();
        $blogs = Blog::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->limit(6)->get();
        return view("frontend.home.index", compact('blogs', 'services', 'testimonials', 'accomodations'));
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

        return view("frontend.about.index", compact('aboutus', 'testimonials'));
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

    public function contact()
    {

        $contact = Contact::get();
        return view("frontend.contact.index", compact('contact'));
    }

    public function accommodations()
    {
        $accommodations = Accommodation::with('roomType')
            ->where('status', 'active')
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view("frontend.accommodation.index", compact('accommodations'));
    }

    public function accommodationSingle(Accommodation $accommodation)
    {
        // Get related accommodations (same room type or similar price range)
        $relatedAccommodations = Accommodation::with('roomType')
            ->where('id', '!=', $accommodation->id)
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view("frontend.accommodation.single", compact('accommodation', 'relatedAccommodations'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => "required",
            'email' => "required",
            'subject' => "required",
            'message' => "required",
            'phone' => "required",
        ]);
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone' => $request->phone,
        ]);

        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'phone' => $request->phone,
        ];

        // Mail::to('aaviscar09@gmail.com')->send(new MailContact($mailData));


        return redirect()->back()->with('popsuccess', 'Feedback Submitted Sucessfully');
    }
}
