<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'iSchool') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="/" class="flex items-center py-4 px-2">
                            <span class="font-semibold text-gray-500 text-lg">iSchool Admin</span>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="{{ route('schools.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Schools</a>
                        <a href="{{ route('teachers.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Teachers</a>
                        <a href="{{ route('students.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Students</a>
                        <a href="{{ route('classes.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Classes</a>
                        <a href="{{ route('contents.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Content</a>
                        <a href="{{ route('grades.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Grades</a>
                        <a href="{{ route('assignments.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Assignments</a>
                        <a href="{{ route('exams.index') }}" class="py-4 px-2 text-gray-500 hover:text-blue-500 transition duration-300">Exams</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
