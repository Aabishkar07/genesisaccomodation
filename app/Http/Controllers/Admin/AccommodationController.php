<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AccommodationController extends Controller
{
    public function __construct(
        protected ImageService $imageservice

    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accommodations = Accommodation::with('roomType')->orderBy('sort_order')->paginate(10);
        return view('admin.accommodations.index', compact('accommodations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = \App\Models\RoomType::where('status', 'available')->orderBy('name')->get();
        return view('admin.accommodations.create', compact('roomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            // 'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            // 'phone' => 'nullable|string|max:255',
            // 'email' => 'nullable|email|max:255',
            'room_type_id' => 'nullable|exists:room_types,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'nullable|array',
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
        $data['slug'] = Str::slug($request->name);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->imageservice->fileUpload($request->file('featured_image'), 'featured');
        }

        // Handle gallery upload
        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $galleryimg = $this->imageservice->fileUpload($file, 'gallery');
                // $gallery[] = $file->store('accommodations/gallery', 'public');
                $gallery[] = $galleryimg;
            }
            $data['gallery'] = json_encode($gallery);
        }

        // Handle amenities as array
        $amenities = [];
        if ($request->has('amenities') && is_array($request->amenities)) {
            $amenities = array_merge($amenities, $request->amenities);
        }

        // Handle custom amenities
        if ($request->has('custom_amenities') && !empty($request->custom_amenities)) {
            $customAmenities = array_filter(array_map('trim', explode("\n", $request->custom_amenities)));
            $amenities = array_merge($amenities, $customAmenities);
        }

        if (!empty($amenities)) {
            $data['amenities'] = json_encode($amenities);
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
            // $data['meta_image'] = $request->file('meta_image')->store('accommodations/meta', 'public');
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'featured');

        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            $data['twitter_image'] = $request->file('twitter_image')->store('accommodations/twitter', 'public');
        }

        Accommodation::create($data);

        return redirect()->route('admin.accommodations.index')->with('success', 'Accommodation created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accommodation $accommodation)
    {
        return view('admin.accommodations.show', compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accommodation $accommodation)
    {
        $roomTypes = \App\Models\RoomType::where('status', 'available')->orderBy('name')->get();
        return view('admin.accommodations.edit', compact('accommodation', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            // 'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',

            'room_type_id' => 'nullable|exists:room_types,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'amenities' => 'nullable|array',
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
        $data['slug'] = Str::slug($request->name);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            if ($accommodation->featured_image) {
                $this->imageservice->imageDelete($accommodation->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('accommodations', 'public');
        }

        // Handle gallery upload and deletion
        if (is_array($accommodation->gallery)) {
            $oldGallery = $accommodation->gallery;
        } elseif (!empty($accommodation->gallery) && is_string($accommodation->gallery)) {
            $oldGallery = json_decode($accommodation->gallery, true);
        } else {
            $oldGallery = [];
        }
        $deletedGalleryImages = json_decode($request->input('deleted_gallery_images', '[]'), true);
        if (!is_array($deletedGalleryImages)) {
            $deletedGalleryImages = [];
        }
        // Remove only images marked for deletion
        $gallery = array_diff($oldGallery, $deletedGalleryImages);

        // Delete files marked for deletion
        foreach ($deletedGalleryImages as $image) {
            $this->imageservice->imageDelete($image);
        }

        // Handle new uploads and append
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryimg = $this->imageservice->fileUpload($file, 'gallery');
                $gallery[] = $galleryimg;
            }
        }
        $data['gallery'] = json_encode(array_values($gallery));

        // Handle amenities as array
        $amenities = [];
        if ($request->has('amenities') && is_array($request->amenities)) {
            $amenities = array_merge($amenities, $request->amenities);
        }

        // Handle custom amenities
        if ($request->has('custom_amenities') && !empty($request->custom_amenities)) {
            $customAmenities = array_filter(array_map('trim', explode("\n", $request->custom_amenities)));
            $amenities = array_merge($amenities, $customAmenities);
        }

        if (!empty($amenities)) {
            $data['amenities'] = json_encode($amenities);
        }

        // Handle meta image upload
        if ($request->hasFile('meta_image')) {
            if ($accommodation->meta_image) {
                $this->imageservice->imageDelete($accommodation->meta_image);
            }
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
        }


        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            if ($accommodation->og_image) {
                $this->imageservice->imageDelete($accommodation->og_image);
            }
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'og');
        }

        // Handle Twitter image upload
        if ($request->hasFile('twitter_image')) {
            if ($accommodation->twitter_image) {
                $this->imageservice->imageDelete($accommodation->twitter_image);
            }
            $data['twitter_image'] = $this->imageservice->fileUpload($request->file('twitter_image'), 'twitter');
        }

        $accommodation->update($data);

        return redirect()->route('admin.accommodations.index')->with('success', 'Accommodation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accommodation $accommodation)
    {
        // Delete associated images
        if ($accommodation->featured_image) {
            $this->imageservice->imageDelete($accommodation->featured_image);

        }

        if ($accommodation->gallery) {
            $gallery = json_decode($accommodation->gallery, true);
            foreach ($gallery as $image) {
                $this->imageservice->imageDelete($image);

            }
        }

        if ($accommodation->meta_image) {
            $this->imageservice->imageDelete($accommodation->meta_image);

        }
        if ($accommodation->og_image) {
            $this->imageservice->imageDelete($accommodation->og_image);
        }


        $accommodation->delete();

        return redirect()->route('admin.accommodations.index')->with('success', 'Accommodation deleted successfully!');
    }
}
