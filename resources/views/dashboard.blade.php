<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Mentora</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <div class="w-48 min-h-screen bg-[#6383FA] flex flex-col p-6 fixed">
        {{-- Logo --}}
        <div class="mb-10">
            <div class="bg-white rounded-xl p-3 w-16 h-16 flex items-center justify-center">
                <svg viewBox="0 0 40 40" class="w-10 h-10" fill="none">
                    <rect x="5" y="5" width="12" height="12" rx="2" fill="#6383FA"/>
                    <rect x="23" y="5" width="12" height="12" rx="2" fill="#6383FA"/>
                    <rect x="5" y="23" width="12" height="12" rx="2" fill="#6383FA"/>
                    <rect x="23" y="23" width="12" height="12" rx="2" fill="#6383FA"/>
                </svg>
            </div>
        </div>

        {{-- Nav Links --}}
        <nav class="flex flex-col gap-4 flex-1">
            <a href="/dashboard" class="bg-bg-[#8BA3FB] text-white px-4 py-2 rounded-lg font-semibold">Home</a>
            <a href="#" class="text-white px-4 py-2 rounded-lg bg-indigo-600:bg-blue-600">Mentors</a>
            <a href="#" class="text-white px-4 py-2 rounded-lg hover:bg-[#8BA3FB]:bg-blue-600">My Mentors</a>
            <a href="/profile/edit" class="text-white px-4 py-2 rounded-lg hover:bg-[#8BA3FB]:bg-indigo-400:bg-blue-600">Profile</a>
        </nav>

        {{-- Logout --}}
        <form method="POST" action="/logout" class="mt-auto">
            @csrf
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-[#8BA3FB]:bg-[#8BA3FB] font-semibold">
                Log out
            </button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="ml-48 flex-1 p-8">

        {{-- Top Bar --}}
        <div class="flex justify-end items-center mb-8">
            <div class="flex items-center gap-3">
                <span class="text-gray-700 font-semibold">Hi, {{ Auth::user()->username }}</span>
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </div>
            </div>
        </div>

        {{-- Hero Banner --}}
        <div class="bg-blue-700 rounded-2xl p-10 text-white text-center mb-10">
            <h1 class="text-4xl font-bold">Launch Your Global Education Journey</h1>
        </div>

        {{-- Popular Mentors Section --}}
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Our Popular Mentor</h2>
        </div>

        {{-- Category Buttons --}}
        <div class="flex gap-3 justify-center mb-8">
            <button class="bg-blue-600 text-white px-5 py-2 rounded-full font-semibold">Digital Marketing</button>
            <button class="bg-white text-gray-700 px-5 py-2 rounded-full border hover:bg-[#8BA3FB]:bg-gray-50">UI/UX Design</button>
            <button class="bg-white text-gray-700 px-5 py-2 rounded-full border hover:bg-[#8BA3FB]:bg-gray-50">Design Design</button>
            <button class="bg-white text-gray-700 px-5 py-2 rounded-full border hover:bg-[#8BA3FB]:bg-gray-50">Web Development</button>
        </div>

        {{-- Course Cards --}}
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-4">
                <div class="bg-gray-200 rounded-lg h-40 flex items-center justify-center mb-4">
                    <span class="text-gray-500 text-lg font-semibold">Course Image</span>
                </div>
                <div class="flex items-center gap-1 mb-1">
                    <span class="text-yellow-400">★★★★</span>
                    <span class="text-gray-500 text-sm">(4.7)</span>
                </div>
                <p class="font-semibold text-gray-800 mb-2">Education Software and PHP and JS System Script</p>
                <div class="flex justify-between items-center">
                    <span class="text-gray-500 text-sm">Max Alexis</span>
                    <span class="text-green-600 font-bold">FREE</span>
                </div>
            </div>
        </div>

    </div>
</body>
</html>