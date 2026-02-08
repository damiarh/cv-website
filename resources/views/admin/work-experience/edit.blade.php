@extends('layouts.admin')

@section('title', 'Edit Work Experience')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Work Experience</h1>
        <p class="text-gray-600 mt-1">Update work details</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.work-experience.update', $workExperience) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Job Title *</label>
                    <input type="text" name="job_title" value="{{ old('job_title', $workExperience->job_title) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
                           placeholder="Senior Software Engineer"
                           required>
                    @error('job_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Company *</label>
                    <input type="text" name="company" value="{{ old('company', $workExperience->company) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
                           placeholder="Google Inc."
                           required>
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Location *</label>
                    <input type="text" name="location" value="{{ old('location', $workExperience->location) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
                           placeholder="San Francisco, CA"
                           required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Start Date *</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $workExperience->start_date->format('Y-m-d')) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
                           required>
                    @error('start_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">End Date (Optional)</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $workExperience->end_date?->format('Y-m-d')) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                    <p class="text-gray-500 text-xs mt-1">Leave empty if currently working here</p>
                    @error('end_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Description (Optional)</label>
                    <textarea name="description" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition" 
                              placeholder="Key responsibilities, achievements, projects...">{{ old('description', $workExperience->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <a href="{{ route('admin.work-experience.index') }}" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
                <button type="submit" class="bg-gradient-to-r from-green-600 to-teal-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-green-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Update Experience
                </button>
            </div>
        </form>
    </div>
</div>
@endsection