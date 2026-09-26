<header class="bg-white border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900">
            {{ $company->company_name ?? 'Sewa Alat Berat' }}
        </a>
        <nav class="hidden md:flex gap-8 text-sm font-medium text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-gray-900">Beranda</a>
            <a href="{{ route('equipment.index') }}" class="hover:text-gray-900">Alat Berat</a>
            <a href="{{ route('portfolio.index') }}" class="hover:text-gray-900">Portofolio</a>
            <a href="{{ route('about') }}" class="hover:text-gray-900">Tentang Kami</a>
        </nav>
        <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener"
           class="hidden sm:inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-medium px-4 py-2 rounded-lg">
            Hubungi via WA
        </a>
    </div>
    {{-- Nav mobile sederhana --}}
    <nav class="md:hidden flex justify-around border-t border-gray-100 text-xs text-gray-600 py-2">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('equipment.index') }}">Alat</a>
        <a href="{{ route('portfolio.index') }}">Portofolio</a>
        <a href="{{ route('about') }}">Tentang</a>
    </nav>
</header>
