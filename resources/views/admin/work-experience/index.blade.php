@extends('layouts.admin')

@section('title', 'Work Experience')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Work Experience</h1>
            <p class="text-gray-600 mt-1">Manage your professional history</p>
        </div>
        <a href="{{ route('admin.work-experience.create') }}" class="bg-gradient-to-r from-green-600 to-teal-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-green-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Experience
        </a>
    </div>
    
    @if($workExperience->count() > 0)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-green-50 to-teal-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Job Title</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Company</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Period</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($workExperience as $work)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-900">{{ $work->job_title }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">{{ $work->company }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $work->location }}</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">
                                {{ $work->start_date->format('M Y') }} - 
                                {{ $work->end_date ? $work->end_date->format('M Y') : 'Present' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.work-experience.edit', $work) }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.work-experience.destroy', $work) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this work experience?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="bg-white rounded-xl shadow-lg p-12 text-center">
        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Work Experience Yet</h3>
        <p class="text-gray-500 mb-6">Build your professional profile by adding your work history</p>
        <a href="{{ route('admin.work-experience.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-600 to-teal-600 text-white py-2 px-6 rounded-lg font-semibold hover:from-green-700 hover:to-teal-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Your First Job
        </a>
    </div>
    @endif
</div>
@endsection