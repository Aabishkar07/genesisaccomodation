<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Accommodation;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\RoomType;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function index()
    {
        $services = Service::latest()->limit(3)->get();
        $banners = Banner::first();
$roomTypes=RoomType::get();
        $testimonials = Testimonial::get();
        $accomodations = Accommodation::with('roomType')->where('status', 'active')->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->limit(6)->get();
        $blogs = Blog::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->limit(6)->get();
        return view("frontend.home.index", compact('blogs', 'services', 'testimonials', 'accomodations','banners','roomTypes'));
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

    public function accommodations(Request $request)
    {
        $roomTypes = RoomType::where('status', 'available')->get();
        $query = Accommodation::with('roomType')
            ->where('status', 'active');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereAny([
                'name',
                'description',
                'address',
                'city',
                'state'
            ], 'like', "%{$search}%");
        }


        // Room type filter
        if ($request->filled('room_type')) {
            $query->whereHas('roomType', function ($q) use ($request) {
                $q->where('id', $request->room_type);
            });
        }

        // Price range filter
        if ($request->filled('price_range')) {
            $priceRange = $request->price_range;
            switch ($priceRange) {
                case '0-100':
                    $query->where('price', '<=', 100);
                    break;
                case '100-200':
                    $query->where('price', '>', 100)->where('price', '<=', 200);
                    break;
                case '200+':
                    $query->where('price', '>', 200);
                    break;
            }
        }

        // Sorting
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
                break;
        }

        $accommodations = $query->paginate(12);



        return view("frontend.accommodation.index", compact('accommodations', 'roomTypes'));
    }

    public function accommodationSingle(Accommodation $accommodation)
    {
        $user = Auth::guard("customer")->user() ?? "";
        // Get related accommodations (same room type or similar price range)
        $relatedAccommodations = Accommodation::with('roomType')
            ->where('id', '!=', $accommodation->id)
            ->where('status', 'active')
            ->limit(3)
            ->get();

        return view("frontend.accommodation.single", compact('accommodation', 'relatedAccommodations', "user"));
    }


     public function filteraccommodations(Request $request)
    {
        $query = Accommodation::with('roomType');

        // Filter by Room Type
        if ($request->filled('room_type')) {
            $query->where('room_type_id', $request->room_type);
        }

        // Filter by Price Range
        if ($request->filled('price_range')) {
            [$min, $max] = explode('-', $request->price_range . '-');
            if ($max) {
                $query->whereBetween('price', [(int)$min, (int)$max]);
            } else {
                $query->where('price', '>=', (int)$min);
            }
        }

        // Filter by Guests
        if ($request->filled('guests')) {
            $query->where('max_guest', '>=', $request->guests);
        }

        $accommodations = $query->paginate(10);

        // Get all room types for the dropdown
        $roomTypes = RoomType::all();

        return view('frontend.accommodation.filter', compact('accommodations', 'roomTypes'));
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
