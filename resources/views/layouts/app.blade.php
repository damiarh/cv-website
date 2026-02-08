<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My CV Website')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-800">My CV</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                    <a href="{{ route('cv.print') }}" class="text-gray-700 hover:text-blue-600">Print CV</a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="bg-white mt-12 py-6 border-t">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} My CV Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>