@extends('layouts.admin')

@section('title', 'Add Reference')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Add Reference</h1>
        <p class="text-gray-600 mt-1">Add a professional reference</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.references.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                           placeholder="John Doe"
                           required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Position -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Position / Title *</label>
                    <input type="text" name="position" value="{{ old('position') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                           placeholder="Senior Manager"
                           required>
                    @error('position')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Company / Organization *</label>
                    <input type="text" name="company" value="{{ old('company') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                           placeholder="Company Inc."
                           required>
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                           placeholder="john@example.com"
                           required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Phone Number *</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" 
                           placeholder="+1 (555) 123-4567"
                           required>
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <a href="{{ route('admin.references.index') }}" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
                <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Save Reference
                </button>
            </div>
        </form>
    </div>
</div>
@endsection