@extends('layouts.admin')

@section('title', 'References')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">References</h1>
            <p class="text-gray-600 mt-1">Manage your professional references</p>
        </div>
        <a href="{{ route('admin.references.create') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Reference
        </a>
    </div>
    
    @if($references->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($references as $reference)
        <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition duration-200">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center">
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full p-3 mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $reference->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $reference->position }}</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-2 mb-4">
                <div class="flex items-center text-gray-700">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="text-sm">{{ $reference->company }}</span>
                </div>
                <div class="flex items-center text-gray-700">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-sm">{{ $reference->email }}</span>
                </div>
                <div class="flex items-center text-gray-700">
                    <svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span class="text-sm">{{ $reference->phone }}</span>
                </div>
            </div>
            
            <div class="flex space-x-3 pt-4 border-t">
                <a href="{{ route('admin.references.edit', $reference) }}" class="flex-1 text-center bg-blue-50 text-blue-600 py-2 px-4 rounded-lg hover:bg-blue-100 font-medium transition">
                    Edit
                </a>
                <form action="{{ route('admin.references.destroy', $reference) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this reference?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-50 text-red-600 py-2 px-4 rounded-lg hover:bg-red-100 font-medium transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-xl shadow-lg p-12 text-center">
        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No References Yet</h3>
        <p class="text-gray-500 mb-6">Add professional contacts who can vouch for your work</p>
        <a href="{{ route('admin.references.create') }}" class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-2 px-6 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Your First Reference
        </a>
    </div>
    @endif
</div>
@endsection