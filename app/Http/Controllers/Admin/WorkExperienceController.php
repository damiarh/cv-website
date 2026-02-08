<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $workExperience = WorkExperience::latest()->get();
        return view('admin.work-experience.index', compact('workExperience'));
    }

    public function create()
    {
        return view('admin.work-experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        WorkExperience::create($validated);

        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience created successfully!');
    }

    public function edit(WorkExperience $workExperience)
    {
        return view('admin.work-experience.edit', compact('workExperience'));
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        $workExperience->update($validated);

        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience updated successfully!');
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('admin.work-experience.index')
            ->with('success', 'Work experience deleted successfully!');
    }
}