@extends('layouts.admin')

@section('title', 'Skills')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Skills</h1>
            <p class="text-gray-600 mt-1">Manage your technical and soft skills</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="bg-gradient-to-r from-pink-600 to-rose-600 text-white py-3 px-6 rounded-lg font-semibold hover:from-pink-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Skill
        </a>
    </div>
    
    @if($skills->count() > 0)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-pink-50 to-rose-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Skill Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Proficiency</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($skills as $skill)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $skill->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($skill->category)
                                <span class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-medium">{{ $skill->category }}</span>
                            @else
                                <span class="text-gray-400 text-sm">No category</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                    <div class="bg-gradient-to-r from-pink-500 to-rose-500 h-2 rounded-full" style="width: {{ $skill->proficiency_level * 10 }}%"></div>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">{{ $skill->proficiency_level }}/10</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex space-x-3">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this skill?')">
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
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
        </svg>
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Skills Yet</h3>
        <p class="text-gray-500 mb-6">Showcase your abilities and expertise</p>
        <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center bg-gradient-to-r from-pink-600 to-rose-600 text-white py-2 px-6 rounded-lg font-semibold hover:from-pink-700 hover:to-rose-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Your First Skill
        </a>
    </div>
    @endif
</div>
@endsection