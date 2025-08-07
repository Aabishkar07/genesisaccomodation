<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected ImageService $imageservice

    ) {}
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
            'sort_order' => 'nullable|integer|min:0',
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
        $data['title'] = $request->name;

        $data['slug'] = Str::slug($request->name);

        // Handle image upload
        if ($request->hasFile('image')) {

            $data['image'] = $this->imageservice->fileUpload($request->file('image'), 'featured');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'featured');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'featured');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'featured');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Service $service)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:active,inactive',
        'sort_order' => 'nullable|integer|min:0',
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
            $data['title'] = $request->name;
    $data['slug'] = Str::slug($request->name);

    // Custom image upload using ImageService

    // Main image
    if ($request->hasFile('image')) {
        if ($service->image) {
            $this->imageservice->imageDelete($service->image);
        }
        $data['image'] = $this->imageservice->fileUpload($request->file('image'), 'services');
    }

    // Meta image
    if ($request->hasFile('meta_image')) {
        if ($service->meta_image) {
            $this->imageservice->imageDelete($service->meta_image);
        }
        $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'services/meta');
    }

    // OG image
    if ($request->hasFile('og_image')) {
        if ($service->og_image) {
            $this->imageservice->imageDelete($service->og_image);
        }
        $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'services/og');
    }

    // Twitter image
    if ($request->hasFile('twitter_image')) {
        if ($service->twitter_image) {
            $this->imageservice->imageDelete($service->twitter_image);
        }
        $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'services/twitter');
    }

    $service->update($data);

    return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
 public function destroy(Service $service)
{
    // Delete associated images using ImageService
    if ($service->image) {
        $this->imageservice->imageDelete($service->image);
    }

    if ($service->meta_image) {
        $this->imageservice->imageDelete($service->meta_image);
    }

    if ($service->og_image) {
        $this->imageservice->imageDelete($service->og_image);
    }

    if ($service->twitter_image) {
        $this->imageservice->imageDelete($service->twitter_image);
    }

    $service->delete();

    return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
}

}
