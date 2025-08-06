<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function __construct(
        protected ImageService $imageservice

    ) {}


    public function index()
    {
        $blogs = Blog::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'sort_order' => 'nullable|integer',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        $data['slug'] = Str::slug($request->title);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
        $data['featured_image'] = $this->imageservice->fileUpload($request->file('featured_image'), 'featured');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
        $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
        $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'og');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
        $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'twitter');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Blog $blog)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'excerpt' => 'nullable|string',
        'status' => 'required|in:published,draft',
        'sort_order' => 'nullable|integer',
        'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        'featured_image', 'meta_image', 'og_image', 'twitter_image'
    ]);

    $data['slug'] = Str::slug($request->title);

    // Handle featured image
    if ($request->hasFile('featured_image')) {
        if ($blog->featured_image) {
            $this->imageservice->imageDelete($blog->featured_image);
        }
        $data['featured_image'] = $this->imageservice->fileUpload($request->file('featured_image'), 'featured');
    }

    // Handle meta image
    if ($request->hasFile('meta_image')) {
        if ($blog->meta_image) {
            $this->imageservice->imageDelete($blog->meta_image);
        }
        $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
    }

    // Handle OG image
    if ($request->hasFile('og_image')) {
        if ($blog->og_image) {
            $this->imageservice->imageDelete($blog->og_image);
        }
        $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'og');
    }

    // Handle Twitter image
    if ($request->hasFile('twitter_image')) {
        if ($blog->twitter_image) {
            $this->imageservice->imageDelete($blog->twitter_image);
        }
        $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'twitter');
    }

    $blog->update($data);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
  public function destroy(Blog $blog)
{
    // Delete associated images using the image service
    if ($blog->featured_image) {
        $this->imageservice->imageDelete($blog->featured_image);
    }

    if ($blog->meta_image) {
        $this->imageservice->imageDelete($blog->meta_image);
    }

    if ($blog->og_image) {
        $this->imageservice->imageDelete($blog->og_image);
    }

    if ($blog->twitter_image) {
        $this->imageservice->imageDelete($blog->twitter_image);
    }

    $blog->delete();

    return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
}

}
