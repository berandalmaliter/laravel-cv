<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Simple Tailwind CDN (boleh dihapus kalau pakai Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
    <nav class="bg-white shadow-md">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('profiles.index') }}" class="text-xl font-bold text-slate-800">
                CV<span class="text-indigo-600">Builder</span>
            </a>
            <a href="{{ route('profiles.create') }}"
               class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700 transition">
                + New CV
            </a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-6">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-xs text-slate-500 pb-4">
        &copy; {{ date('Y') }} CV Builder. All rights reserved.
    </footer>
</body>
</html>
