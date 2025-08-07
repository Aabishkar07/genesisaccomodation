<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::orderBy('group', 'asc')->orderBy('key', 'asc')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,select,url,email',
            'group' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value_file' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['key', 'type', 'group', 'description']);

        // Handle file upload for image type
        if ($request->type === 'image' && $request->hasFile('value_file')) {
            $data['value'] = $request->file('value_file')->store('settings', 'public');
        } else {
            $data['value'] = $request->value;
        }

        Setting::create($data);

        return redirect()->route('admin.settings.index')->with('success', 'Setting created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'value' => 'nullable|string',
            // 'type' => 'required|in:text,textarea,image,select,url,email',
            'group' => 'required|string|max:255',
            'description' => 'nullable|string',
            // 'value_file' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only([ 'group', 'description']);

        // Handle file upload for image type
        if ($request->type === 'image' && $request->hasFile('value_file')) {
            // Delete old file if exists
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }
            $data['value'] = $request->file('value_file')->store('settings', 'public');
        } else {
            $data['value'] = $request->value;
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        // Delete associated file if exists
        if ($setting->value && Storage::disk('public')->exists($setting->value)) {
            Storage::disk('public')->delete($setting->value);
        }

        $setting->delete();

        return redirect()->route('admin.settings.index')->with('success', 'Setting deleted successfully!');
    }

    /**
     * Bulk update settings
     */
    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.id' => 'required|exists:settings,id',
            'settings.*.value' => 'nullable|string',
        ]);

        foreach ($request->settings as $settingData) {
            $setting = Setting::find($settingData['id']);
            if ($setting) {
                $setting->update(['value' => $settingData['value'] ?? '']);
            }
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully!');
    }
}
