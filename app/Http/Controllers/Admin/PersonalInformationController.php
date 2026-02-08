<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalInformationController extends Controller
{
    public function edit()
    {
        $info = PersonalInformation::first() ?? new PersonalInformation();
        return view('admin.personal-information.edit', compact('info'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'professional_objective' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        $info = PersonalInformation::first();
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($info && $info->photo && file_exists(public_path($info->photo))) {
                unlink(public_path($info->photo));
            }
            
            // Store new photo
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/photos'), $filename);
            $validated['photo'] = 'uploads/photos/' . $filename;
        } else {
            // Keep existing photo if no new upload
            if ($info && $info->photo) {
                $validated['photo'] = $info->photo;
            }
        }
        
        if ($info) {
            $info->update($validated);
        } else {
            PersonalInformation::create($validated);
        }

        return redirect()->route('admin.personal-information.edit')
            ->with('success', 'Personal information updated successfully!');
    }
}