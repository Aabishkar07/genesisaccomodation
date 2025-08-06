<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            $data['image'] = $request->file('image')->store('about-us', 'public');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $request->file('meta_image')->store('about-us/meta', 'public');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $request->file('og_image')->store('about-us/og', 'public');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            $data['twitter_image'] = $request->file('twitter_image')->store('about-us/twitter', 'public');
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
    public function edit(AboutUs $aboutUs)
    {
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $aboutUs)
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
            if ($aboutUs->image) {
                Storage::disk('public')->delete($aboutUs->image);
            }
            $data['image'] = $request->file('image')->store('about-us', 'public');
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            if ($aboutUs->meta_image) {
                Storage::disk('public')->delete($aboutUs->meta_image);
            }
            $data['meta_image'] = $request->file('meta_image')->store('about-us/meta', 'public');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            if ($aboutUs->og_image) {
                Storage::disk('public')->delete($aboutUs->og_image);
            }
            $data['og_image'] = $request->file('og_image')->store('about-us/og', 'public');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            if ($aboutUs->twitter_image) {
                Storage::disk('public')->delete($aboutUs->twitter_image);
            }
            $data['twitter_image'] = $request->file('twitter_image')->store('about-us/twitter', 'public');
        }

        $aboutUs->update($data);

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        // Delete associated images
        if ($aboutUs->image) {
            Storage::disk('public')->delete($aboutUs->image);
        }
        if ($aboutUs->meta_image) {
            Storage::disk('public')->delete($aboutUs->meta_image);
        }
        if ($aboutUs->og_image) {
            Storage::disk('public')->delete($aboutUs->og_image);
        }
        if ($aboutUs->twitter_image) {
            Storage::disk('public')->delete($aboutUs->twitter_image);
        }

        $aboutUs->delete();

        return redirect()->route('admin.about-us.index')->with('success', 'About Us content deleted successfully!');
    }
}
