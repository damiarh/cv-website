<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - Print Version</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { print-color-adjust: exact; -webkit-print-color-adjust: exact; }
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-white p-8">
    <div class="max-w-4xl mx-auto">
        <div class="no-print mb-4">
            <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Print CV</button>
            <a href="{{ route('home') }}" class="ml-4 text-blue-600 hover:underline">Back to CV</a>
        </div>

        @if($personalInfo)
        <div class="mb-6">
            <!-- Photo and Name Section -->
            <div class="flex items-center mb-4">
                @if($personalInfo->photo)
                <img src="{{ asset($personalInfo->photo) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover border-4 border-gray-200 mr-6">
                @endif
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $personalInfo->full_name }}</h1>
                    <p class="text-gray-600 mt-1">{{ $personalInfo->email }} | {{ $personalInfo->phone }}</p>
                    <p class="text-gray-600">{{ $personalInfo->address }}</p>
                </div>
            </div>
            
            <div class="mt-4">
                <h2 class="text-lg font-bold text-gray-800">Professional Objective</h2>
                <p class="text-gray-700">{{ $personalInfo->professional_objective }}</p>
            </div>
        </div>
        @endif

        @if($education->count() > 0)
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 mb-3">Education</h2>
            @foreach($education as $edu)
            <div class="mb-3">
                <h3 class="font-bold">{{ $edu->degree }} in {{ $edu->field_of_study }}</h3>
                <p>{{ $edu->institution }}</p>
                <p class="text-sm text-gray-600">{{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}</p>
                @if($edu->description)
                <p class="mt-1 text-sm text-gray-700">{{ $edu->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        @if($workExperience->count() > 0)
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 mb-3">Work Experience</h2>
            @foreach($workExperience as $work)
            <div class="mb-3">
                <h3 class="font-bold">{{ $work->job_title }}</h3>
                <p>{{ $work->company }} - {{ $work->location }}</p>
                <p class="text-sm text-gray-600">{{ $work->start_date->format('M Y') }} - {{ $work->end_date ? $work->end_date->format('M Y') : 'Present' }}</p>
                @if($work->description)
                <p class="mt-1 text-sm text-gray-700">{{ $work->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        @if($awards->count() > 0)
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 mb-3">Awards & Honours</h2>
            @foreach($awards as $award)
            <div class="mb-2">
                <h3 class="font-bold">{{ $award->title }}</h3>
                <p class="text-sm">{{ $award->issuer }} - {{ $award->date_received->format('Y') }}</p>
                @if($award->description)
                <p class="mt-1 text-sm text-gray-700">{{ $award->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

        @if($skills->count() > 0)
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 mb-3">Skills</h2>
            <div class="grid grid-cols-2 gap-2">
                @foreach($skills as $skill)
                <div class="text-sm">
                    <span class="font-semibold">{{ $skill->name }}</span>
                    @if($skill->category)
                    <span class="text-gray-500">({{ $skill->category }})</span>
                    @endif
                    - {{ $skill->proficiency_level }}/10
                </div>
                @endforeach
            </div>
        </div>
        @endif

        @if($references->count() > 0)
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-900 border-b-2 border-gray-300 pb-2 mb-3">References</h2>
            <div class="grid grid-cols-2 gap-4">
                @foreach($references as $reference)
                <div class="text-sm">
                    <p class="font-bold">{{ $reference->name }}</p>
                    <p>{{ $reference->position }}, {{ $reference->company }}</p>
                    <p>{{ $reference->email }} | {{ $reference->phone }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</body>
</html>