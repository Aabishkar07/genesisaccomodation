<?php

namespace App\Http\Controllers\Admin;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:1',
            'status' => 'required|in:available,unavailable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        RoomType::create($data);

        return redirect()->route('admin.room-types.index')
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_night' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:1',
            'status' => 'required|in:available,unavailable',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $roomType->update($data);

        return redirect()->route('admin.room-types.index')
            ->with('success', 'Room type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomType $roomType)
    {
        // Delete associated images
        if ($roomType->featured_image) {
            Storage::disk('public')->delete($roomType->featured_image);
        }

        if ($roomType->gallery) {
            $gallery = json_decode($roomType->gallery, true);
            foreach ($gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        if ($roomType->meta_image) {
            Storage::disk('public')->delete($roomType->meta_image);
        }
        if ($roomType->og_image) {
            Storage::disk('public')->delete($roomType->og_image);
        }
        if ($roomType->twitter_image) {
            Storage::disk('public')->delete($roomType->twitter_image);
        }

        $roomType->delete();

        return redirect()->route('admin.room-types.index')->with('success', 'Room Type deleted successfully!');
    }
}
