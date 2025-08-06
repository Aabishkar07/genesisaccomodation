<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected ImageService $imageservice

    ) {
    }

    public function index()
    {
        $roomTypes = RoomType::orderBy('sort_order')->paginate(10);
        return view('admin.room-types.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.room-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:room_types,name|string|max:255',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,unavailable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->imageservice->fileUpload($request->file('featured_image'), 'featured');
        }
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
        }
        if ($request->hasFile('og_image')) {
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'og');
        }

        RoomType::create($data);

        return redirect()->route('admin.room_types.index')
            ->with('success', 'Room type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomType $roomType)
    {
        return view('admin.room-types.show', compact('roomType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        return view('admin.room-types.edit', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:room_types,name,' . $roomType->id,
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,unavailable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->hasFile('featured_image')) {
            if ($roomType->featured_image) {
                $this->imageservice->imageDelete($roomType->featured_image);
            }
            $data['featured_image'] = $this->imageservice->fileUpload($request->file('featured_image'), 'featured');
        }
        if ($request->hasFile('meta_image')) {
            if ($roomType->meta_image) {
                $this->imageservice->imageDelete($roomType->meta_image);
            }
            $data['meta_image'] = $this->imageservice->fileUpload($request->file('meta_image'), 'meta');
        }
        if ($request->hasFile('og_image')) {
            if ($roomType->og_image) {
                $this->imageservice->imageDelete($roomType->og_image);
            }
            $data['og_image'] = $this->imageservice->fileUpload($request->file('og_image'), 'og');
        }

        $roomType->update($data);

        return redirect()->route('admin.room_types.index')
            ->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($room_types)
    {


        $roomType = RoomType::findOrFail($room_types);
        // Delete associated images
        if ($roomType->featured_image) {
            $this->imageservice->imageDelete($roomType->featured_image);
        }



        if ($roomType->meta_image) {
            $this->imageservice->imageDelete($roomType->meta_image);

        }
        if ($roomType->og_image) {
            $this->imageservice->imageDelete($roomType->og_image);
        }

        $roomType->delete();

        return redirect()->route('admin.room_types.index')->with('success', 'Room Type deleted successfully!');
    }
}
