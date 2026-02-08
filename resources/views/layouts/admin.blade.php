<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-indigo-950 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" target="_blank" class="hover:text-blue-200">View CV</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-blue-200">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <aside class="w-64 bg-white h-screen shadow-lg">
            <nav class="mt-5 px-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.personal-information.edit') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.personal-information.*') ? 'bg-blue-100' : '' }}">
                    Personal Info
                </a>
                <a href="{{ route('admin.education.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.education.*') ? 'bg-blue-100' : '' }}">
                    Education
                </a>
                <a href="{{ route('admin.work-experience.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.work-experience.*') ? 'bg-blue-100' : '' }}">
                    Work Experience
                </a>
                <a href="{{ route('admin.awards.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.awards.*') ? 'bg-blue-100' : '' }}">
                    Awards
                </a>
                <a href="{{ route('admin.skills.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.skills.*') ? 'bg-blue-100' : '' }}">
                    Skills
                </a>
                <a href="{{ route('admin.references.index') }}" class="block py-2 px-4 text-gray-700 hover:bg-blue-50 rounded {{ request()->routeIs('admin.references.*') ? 'bg-blue-100' : '' }}">
                    References
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>