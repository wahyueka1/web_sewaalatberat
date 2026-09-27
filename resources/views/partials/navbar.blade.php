<header class="bg-ink text-paper sticky top-0 z-40 border-b border-line">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-display text-2xl font-bold tracking-tight shrink-0">
            @if($company->logo_url ?? null)
                <img src="{{ $company->logo_url }}" alt="{{ $company->company_name }}" class="w-9 h-9 object-contain rounded">
            @endif
            {{ $company->company_name ?? 'Sewa Alat Berat' }}
        </a>

        <form action="{{ route('search') }}" method="GET" class="hidden sm:block flex-1 max-w-sm">
            <div class="relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari alat berat / portofolio..."
                       class="w-full bg-ink border border-line rounded-lg pl-9 pr-3 py-2 text-sm text-paper placeholder:text-steel focus:outline-none focus:ring-2 focus:ring-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-steel" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                </svg>
            </div>
        </form>

        <nav class="hidden md:flex gap-8 text-sm font-medium text-steel shrink-0">
            <a href="{{ route('home') }}" class="hover:text-paper">Beranda</a>
            <a href="{{ route('equipment.index') }}" class="hover:text-paper">Alat Berat</a>
            <a href="{{ route('portfolio.index') }}" class="hover:text-paper">Portofolio</a>
            <a href="{{ route('about') }}" class="hover:text-paper">Tentang Kami</a>
        </nav>
        <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener"
           class="hidden sm:inline-block bg-accent hover:brightness-95 text-ink text-sm font-semibold px-4 py-2 rounded shrink-0">
            Hubungi via WA
        </a>
    </div>

    <div class="sm:hidden px-4 pb-3">
        <form action="{{ route('search') }}" method="GET">
            <div class="relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari alat berat / portofolio..."
                       class="w-full bg-ink border border-line rounded-lg pl-9 pr-3 py-2 text-sm text-paper placeholder:text-steel focus:outline-none focus:ring-2 focus:ring-accent">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-steel" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.65a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                </svg>
            </div>
        </form>
    </div>

    <nav class="md:hidden flex justify-around border-t border-line text-xs text-steel py-2">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('equipment.index') }}">Alat</a>
        <a href="{{ route('portfolio.index') }}">Portofolio</a>
        <a href="{{ route('about') }}">Tentang</a>
    </nav>
</header>