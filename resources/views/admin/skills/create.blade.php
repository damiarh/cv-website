@extends('layouts.admin')

@section('title', 'Add Skill')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Add Skill</h1>
        <p class="text-gray-600 mt-1">Add a new skill to your profile</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Skill Name -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Skill Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition" 
                           placeholder="JavaScript, Project Management, Communication, etc."
                           required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Category (Optional)</label>
                    <input type="text" name="category" value="{{ old('category') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition" 
                           placeholder="Technical, Soft Skills, Languages, etc.">
                    <p class="text-gray-500 text-xs mt-1">Group similar skills together</p>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proficiency Level -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Proficiency Level (1-10) *</label>
                    <input type="number" name="proficiency_level" value="{{ old('proficiency_level', 5) }}" 
                           min="1" max="10"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition" 
                           required>
                    <p class="text-gray-500 text-xs mt-1">1 = Beginner, 10 = Expert</p>
                    @error('proficiency_level')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <a href="{{ route('admin.skills.index') }}" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
                <button type="submit" class="bg-gradient-to-r from-pink-600 to-rose-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-pink-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Save Skill
                </button>
            </div>
        </form>
    </div>
</div>
@endsection