@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div>
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Welcome Back!</h1>
        <p class="text-gray-600 mt-1">Here's an overview of your CV content</p>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Personal Info Card -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Personal Information</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['personal_info'] }}</p>
                    <p class="text-blue-100 text-xs mt-1">Profile {{ $stats['personal_info'] > 0 ? 'completed' : 'pending' }}</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Education Card -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Education Records</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['education'] }}</p>
                    <p class="text-purple-100 text-xs mt-1">Academic background</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Work Experience Card -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">Work Experience</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['work_experience'] }}</p>
                    <p class="text-green-100 text-xs mt-1">Professional roles</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Awards Card -->
        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium">Awards & Honours</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['awards'] }}</p>
                    <p class="text-yellow-100 text-xs mt-1">Achievements</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Skills Card -->
        <div class="bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-pink-100 text-sm font-medium">Skills</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['skills'] }}</p>
                    <p class="text-pink-100 text-xs mt-1">Technical & soft skills</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- References Card -->
        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-indigo-100 text-sm font-medium">References</p>
                    <p class="text-4xl font-bold mt-2">{{ $stats['references'] }}</p>
                    <p class="text-indigo-100 text-xs mt-1">Professional contacts</p>
                </div>
                <div class="bg-white bg-opacity-20 rounded-full p-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Quick Actions
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.personal-information.edit') }}" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition group">
                <div class="bg-blue-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Edit Profile</p>
                    <p class="text-xs text-gray-600">Update personal info</p>
                </div>
            </a>

            <a href="{{ route('admin.education.create') }}" class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition group">
                <div class="bg-purple-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Add Education</p>
                    <p class="text-xs text-gray-600">New academic record</p>
                </div>
            </a>

            <a href="{{ route('admin.work-experience.create') }}" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition group">
                <div class="bg-green-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Add Experience</p>
                    <p class="text-xs text-gray-600">New work record</p>
                </div>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition group">
                <div class="bg-indigo-600 rounded-lg p-3 mr-4 group-hover:scale-110 transition">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">View Public CV</p>
                    <p class="text-xs text-gray-600">See live website</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection