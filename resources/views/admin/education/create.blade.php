@extends('layouts.admin')

@section('title', 'Add Education')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Add Education</h1>
        <p class="text-gray-600 mt-1">Add a new academic qualification</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.education.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Institution -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Institution / University *</label>
                    <input type="text" name="institution" value="{{ old('institution') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                           placeholder="Harvard University"
                           required>
                    @error('institution')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Degree -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Degree *</label>
                    <input type="text" name="degree" value="{{ old('degree') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                           placeholder="Bachelor of Science"
                           required>
                    @error('degree')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field of Study -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Field of Study *</label>
                    <input type="text" name="field_of_study" value="{{ old('field_of_study') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                           placeholder="Computer Science"
                           required>
                    @error('field_of_study')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Start Date *</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                           required>
                    @error('start_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">End Date (Optional)</label>
                    <input type="date" name="end_date" value="{{ old('end_date') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                    <p class="text-gray-500 text-xs mt-1">Leave empty if currently studying</p>
                    @error('end_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Description (Optional)</label>
                    <textarea name="description" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" 
                              placeholder="Key achievements, coursework, GPA, etc.">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <a href="{{ route('admin.education.index') }}" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
                <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Save Education
                </button>
            </div>
        </form>
    </div>
</div>
@endsection