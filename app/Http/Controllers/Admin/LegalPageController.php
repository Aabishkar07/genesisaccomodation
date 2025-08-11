<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\Request;

class LegalPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalPages = LegalPage::orderBy('type')->orderBy('created_at', 'desc')->get();
        return view('admin.legal-pages.index', compact('legalPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.legal-pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:privacy_policy,terms_conditions',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['last_updated'] = now();

        // If this page is being set as active, deactivate others of the same type
        if ($data['is_active']) {
            LegalPage::where('type', $data['type'])
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
        }

        LegalPage::create($data);

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LegalPage $legalPage)
    {
        return view('admin.legal-pages.show', compact('legalPage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LegalPage $legalPage)
    {
        return view('admin.legal-pages.edit', compact('legalPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LegalPage $legalPage)
    {
        $request->validate([
            'type' => 'required|in:privacy_policy,terms_conditions',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['last_updated'] = now();

        // If this page is being set as active, deactivate others of the same type
        if ($data['is_active']) {
            LegalPage::where('type', $data['type'])
                    ->where('id', '!=', $legalPage->id)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
        }

        $legalPage->update($data);

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LegalPage $legalPage)
    {
        $legalPage->delete();

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page deleted successfully.');
    }

    /**
     * Toggle the active status of a legal page
     */
    public function toggleStatus(LegalPage $legalPage)
    {
        if ($legalPage->is_active) {
            $legalPage->update(['is_active' => false]);
            $message = 'Legal page deactivated successfully.';
        } else {
            // Deactivate other pages of the same type
            LegalPage::where('type', $legalPage->type)
                    ->where('id', '!=', $legalPage->id)
                    ->update(['is_active' => false]);

            $legalPage->update(['is_active' => true]);
            $message = 'Legal page activated successfully.';
        }

        return redirect()->route('admin.legal-pages.index')
            ->with('success', $message);
    }
}
