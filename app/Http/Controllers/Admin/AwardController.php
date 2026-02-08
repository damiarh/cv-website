<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->get();
        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'date_received' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Award::create($validated);

        return redirect()->route('admin.awards.index')
            ->with('success', 'Award created successfully!');
    }

    public function edit(Award $award)
    {
        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'date_received' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $award->update($validated);

        return redirect()->route('admin.awards.index')
            ->with('success', 'Award updated successfully!');
    }

    public function destroy(Award $award)
    {
        $award->delete();
        return redirect()->route('admin.awards.index')
            ->with('success', 'Award deleted successfully!');
    }
}