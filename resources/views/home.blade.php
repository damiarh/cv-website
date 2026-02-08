@extends('layouts.app')

@section('title', 'My CV')

@section('content')
<div class="max-w-5xl mx-auto px-4">
    @if($personalInfo)
    <!-- Personal Info Section -->
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <div class="flex items-center space-x-6">
            @if($personalInfo->photo)
<img src="{{ asset($personalInfo->photo) }}" alt="Photo" class="w-32 h-32 rounded-full object-cover">
@endif
            <div>
                <h1 class="text-4xl font-bold text-gray-900">{{ $personalInfo->full_name }}</h1>
                <p class="text-gray-600 mt-2">{{ $personalInfo->email }} | {{ $personalInfo->phone }}</p>
                <p class="text-gray-600">{{ $personalInfo->address }}</p>
            </div>
        </div>
        
        <div class="mt-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Professional Objective</h2>
            <p class="text-gray-700">{{ $personalInfo->professional_objective }}</p>
        </div>
    </div>
    @else
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6">
        <p>No personal information found. Please <a href="{{ route('admin.login') }}" class="underline">login to admin panel</a> to add your information.</p>
    </div>
    @endif

    <!-- Education Section -->
    @if($education->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Education</h2>
        @foreach($education as $edu)
        <div class="mb-4 pb-4 border-b last:border-b-0">
            <h3 class="text-lg font-bold">{{ $edu->degree }} in {{ $edu->field_of_study }}</h3>
            <p class="text-gray-700">{{ $edu->institution }}</p>
            <p class="text-gray-600 text-sm">{{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}</p>
            @if($edu->description)
            <p class="text-gray-700 mt-2">{{ $edu->description }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    <!-- Work Experience Section -->
    @if($workExperience->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Work Experience</h2>
        @foreach($workExperience as $work)
        <div class="mb-4 pb-4 border-b last:border-b-0">
            <h3 class="text-lg font-bold">{{ $work->job_title }}</h3>
            <p class="text-gray-700">{{ $work->company }} - {{ $work->location }}</p>
            <p class="text-gray-600 text-sm">{{ $work->start_date->format('M Y') }} - {{ $work->end_date ? $work->end_date->format('M Y') : 'Present' }}</p>
            @if($work->description)
            <p class="text-gray-700 mt-2">{{ $work->description }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    <!-- Awards Section -->
    @if($awards->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Awards & Honours</h2>
        @foreach($awards as $award)
        <div class="mb-4 pb-4 border-b last:border-b-0">
            <h3 class="text-lg font-bold">{{ $award->title }}</h3>
            <p class="text-gray-700">{{ $award->issuer }} - {{ $award->date_received->format('Y') }}</p>
            @if($award->description)
            <p class="text-gray-700 mt-2">{{ $award->description }}</p>
            @endif
        </div>
        @endforeach
    </div>
    @endif

    <!-- Skills Section -->
    @if($skills->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Skills</h2>
        <div class="grid grid-cols-2 gap-4">
            @foreach($skills as $skill)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="font-semibold">{{ $skill->name }}</span>
                    <span class="text-sm text-gray-600">{{ $skill->proficiency_level }}/10</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $skill->proficiency_level * 10 }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- References Section -->
    @if($references->count() > 0)
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">References</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($references as $reference)
            <div>
                <h3 class="text-lg font-bold">{{ $reference->name }}</h3>
                <p class="text-gray-700">{{ $reference->position }}</p>
                <p class="text-gray-700">{{ $reference->company }}</p>
                <p class="text-gray-600 text-sm mt-2">{{ $reference->email }}</p>
                <p class="text-gray-600 text-sm">{{ $reference->phone }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection