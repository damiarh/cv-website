@extends('layouts.admin')

@section('title', 'Edit Award')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Award</h1>
        <p class="text-gray-600 mt-1">Update award details</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.awards.update', $award) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Award Title *</label>
                    <input type="text" name="title" value="{{ old('title', $award->title) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" 
                           placeholder="Best Employee of the Year"
                           required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Issuer -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Issued By *</label>
                    <input type="text" name="issuer" value="{{ old('issuer', $award->issuer) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" 
                           placeholder="Company Name / Organization"
                           required>
                    @error('issuer')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Received -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Date Received *</label>
                    <input type="date" name="date_received" value="{{ old('date_received', $award->date_received->format('Y-m-d')) }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" 
                           required>
                    @error('date_received')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Description (Optional)</label>
                    <textarea name="description" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition" 
                              placeholder="Details about the award, why you received it, etc.">{{ old('description', $award->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <a href="{{ route('admin.awards.index') }}" class="text-gray-600 hover:text-gray-800 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
                <button type="submit" class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white py-3 px-8 rounded-lg font-semibold hover:from-yellow-600 hover:to-orange-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Update Award
                </button>
            </div>
        </form>
    </div>
</div>
@endsection