<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected ImageService $imageservice

    ) {}
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.about-us.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aboutUs = AboutUs::first();
        if ($aboutUs) {
            return redirect()->route('admin.about-us.edit', $aboutUs);
        }
        return view('admin.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'values' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageservice->fileUpload($request->file('image'), 'about');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'about');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'about');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'about');
        }

        AboutUs::create($data);

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return view('admin.about-us.show', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
    $aboutUs=AboutUs::find($id);
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, String $id)
{

    $aboutUs=AboutUs::find($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'mission' => 'nullable|string',
        'vision' => 'nullable|string',
        'values' => 'nullable|string',
        'status' => 'required|in:active,inactive',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'og_title' => 'nullable|string|max:255',
        'og_description' => 'nullable|string',
        'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'twitter_title' => 'nullable|string|max:255',
        'twitter_description' => 'nullable|string',
        'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->except([
        'image', 'meta_image', 'og_image', 'twitter_image'
    ]);

    // Handle main image
    if ($request->hasFile('image')) {
        if ($aboutUs->image) {
            $this->imageservice->imageDelete($aboutUs->image);
        }
        $data['image'] = $this->imageservice->fileUpload($request->file('image'), 'about-us');
    }

    // Handle meta image
    if ($request->hasFile('meta_image')) {
        if ($aboutUs->meta_image) {
            $this->imageservice->imageDelete($aboutUs->meta_image);
        }
        $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'about-us/meta');
    }

    // Handle OG image
    if ($request->hasFile('og_image')) {
        if ($aboutUs->og_image) {
            $this->imageservice->imageDelete($aboutUs->og_image);
        }
        $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'about-us/og');
    }

    // Handle Twitter image
    if ($request->hasFile('twitter_image')) {
        if ($aboutUs->twitter_image) {
            $this->imageservice->imageDelete($aboutUs->twitter_image);
        }
        $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'about-us/twitter');
    }

    $aboutUs->update($data);

    return redirect()->route('admin.about-us.index')->with('success', 'About Us content updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
public function destroy(String $id)
{


    $aboutUs=AboutUs::find($id);
    // Delete associated images using the image service
    if ($aboutUs->image) {
        $this->imageservice->imageDelete($aboutUs->image);
    }

    if ($aboutUs->meta_image) {
        $this->imageservice->imageDelete($aboutUs->meta_image);
    }

    if ($aboutUs->og_image) {
        $this->imageservice->imageDelete($aboutUs->og_image);
    }

    if ($aboutUs->twitter_image) {
        $this->imageservice->imageDelete($aboutUs->twitter_image);
    }

    $aboutUs->delete();

    return redirect()->route('admin.about-us.index')->with('success', 'About Us content deleted successfully!');
}

}
