<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Mentora</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <div class="w-48 min-h-screen bg-[#6383FA] flex flex-col p-6 fixed">
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
        <nav class="flex flex-col gap-4 flex-1">
            <a href="/dashboard" class="text-white px-4 py-2 rounded-lg bg-[#6383FA]:bg-[#8BA3FB]">Home</a>
            <a href="#" class="text-white px-4 py-2 rounded-lg bg-[#6383FA]:bg-[#8BA3FB]">Mentors</a>
            <a href="#" class="text-white px-4 py-2 rounded-lg bg-[#6383FA]:bg-[#8BA3FB]">My Mentor</a>
            <a href="/profile/edit" class="bg-[#8BA3FB] text-white px-4 py-2 rounded-lg font-semibold">Profile</a>
        </nav>
        <form method="POST" action="/logout" class="mt-auto">
            @csrf
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded-lg bg-[#6383FA]:bg-red-600 font-semibold">
                Log out
            </button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="ml-48 flex-1 p-8 flex items-start justify-center">
        <div class="bg-white rounded-2xl shadow p-10 w-full max-w-2xl mt-8">

            {{-- Profile Header --}}
            <div class="flex items-center gap-6 mb-8">
                <div class="w-24 h-24 rounded-full bg-gray-300 overflow-hidden flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->username }}</h2>
                    <p class="text-gray-500">Update your personal information below.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-600 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="/profile/update">
                @csrf
                @method('PUT')

                {{-- Username & Email --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-600 mb-1 text-sm">Username</label>
                        <input type="text" name="username" value="{{ Auth::user()->username }}"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1 text-sm">Email Address</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">
                    </div>
                </div>

                {{-- Phone --}}
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1 text-sm">Phone Number</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">
                </div>

                {{-- Bio --}}
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1 text-sm">Bio</label>
                    <textarea name="bio" rows="4"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">{{ Auth::user()->bio }}</textarea>
                </div>

                {{-- Password --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-600 mb-1 text-sm">Password Baru <span class="text-gray-400">(opsional)</span></label>
                        <input type="password" name="password"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-1 text-sm">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#6383FA] bg-gray-50">
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex gap-4">
                    <button type="submit"
                        class="flex-1 bg-[#6383FA] text-white py-3 rounded-xl bg-[#6383FA]:bg-[#5270E8] font-semibold text-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

            {{-- Hapus Akun --}}
            <div class="mt-4">
                <form method="POST" action="/profile/delete"
                    onsubmit="return confirm('Apakah kamu yakin ingin menghapus akun?')">
                    @csrf
                    <button type="submit"
                        class="w-full bg-red-500 text-white py-3 rounded-xl bg-[#6383FA]:bg-red-600 font-semibold text-lg">
                        Hapus Akun
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>
</html>