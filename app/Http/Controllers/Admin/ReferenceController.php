<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::latest()->get();
        return view('admin.references.index', compact('references'));
    }

    public function create()
    {
        return view('admin.references.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        Reference::create($validated);

        return redirect()->route('admin.references.index')
            ->with('success', 'Reference created successfully!');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', compact('reference'));
    }

    public function update(Request $request, Reference $reference)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $reference->update($validated);

        return redirect()->route('admin.references.index')
            ->with('success', 'Reference updated successfully!');
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('admin.references.index')
            ->with('success', 'Reference deleted successfully!');
    }
}