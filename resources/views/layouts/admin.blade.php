<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') - Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="flex min-h-screen">
    <aside class="w-56 bg-gray-900 text-gray-200 flex flex-col">
        <div class="px-5 py-5 text-lg font-bold text-white border-b border-gray-800">Panel Admin</div>
        <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">Dashboard</a>
            <a href="{{ route('admin.alat.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.alat.*') ? 'bg-gray-800' : '' }}">Alat Berat</a>
            <a href="{{ route('admin.portofolio.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.portofolio.*') ? 'bg-gray-800' : '' }}">Portofolio</a>
            <a href="{{ route('admin.company-profile.edit') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.company-profile.*') ? 'bg-gray-800' : '' }}">Profil Usaha</a>
        </nav>
        <form method="POST" action="{{ route('admin.logout') }}" class="p-3 border-t border-gray-800">
            @csrf
            <button class="w-full text-left px-3 py-2 rounded-lg hover:bg-gray-800 text-sm">Keluar</button>
        </form>
    </aside>

    <main class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6">@yield('title')</h1>

        @if (session('status'))
            <div class="bg-green-100 text-green-800 text-sm rounded-lg px-4 py-2 mb-6">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 text-sm rounded-lg px-4 py-2 mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</div>
</body>
</html>
