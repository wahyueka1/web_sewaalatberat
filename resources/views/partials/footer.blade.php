<footer class="bg-white text-gray-900 mt-16 border-t border-gray-100" style="font-family: 'Montserrat', sans-serif;">
    <div class="max-w-3xl mx-auto px-4 py-12 text-center">

        {{-- Ikon sosial media (pakai file logo dari public/images/logo_sosmed) --}}
        <div class="flex items-center justify-center gap-10" style="margin-bottom:40px;">
            @if($company->instagram_url)
                <a href="{{ $company->instagram_url }}" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram"
                   class="hover:opacity-70 transition">
                    <img src="{{ asset('images/logo_sosmed/logo-instagram.png') }}" alt="Instagram" style="width:20px;height:20px;object-fit:contain;">
                </a>
            @endif
            @if($company->tiktok_url)
                <a href="{{ $company->tiktok_url }}" target="_blank" rel="noopener" aria-label="TikTok" title="TikTok"
                   class="hover:opacity-70 transition">
                    <img src="{{ asset('images/logo_sosmed/logo-tiktok.png') }}" alt="TikTok" style="width:20px;height:20px;object-fit:contain;">
                </a>
            @endif
            @if($company->facebook_url)
                <a href="{{ $company->facebook_url }}" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook"
                   class="hover:opacity-70 transition">
                    <img src="{{ asset('images/logo_sosmed/logo-facebook.png') }}" alt="Facebook" style="width:20px;height:20px;object-fit:contain;">
                </a>
            @endif
            @if($company->email)
                <a href="mailto:{{ $company->email }}" aria-label="Email" title="Email"
                   class="hover:opacity-70 transition">
                    <img src="{{ asset('images/logo_sosmed/logo-gmail.png') }}" alt="Email" style="width:20px;height:20px;object-fit:contain;">
                </a>
            @endif
            @if($company->whatsapp_number)
                <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener" aria-label="WhatsApp" title="WhatsApp"
                   class="hover:opacity-70 transition">
                    <img src="{{ asset('images/logo_sosmed/logo-wa.png') }}" alt="WhatsApp" style="width:20px;height:20px;object-fit:contain;">
                </a>
            @endif
        </div>

        {{-- Nama usaha & tagline --}}
        <h2 class="uppercase" style="font-family: 'BBH Bogle', sans-serif; font-weight:400; font-size:28px; letter-spacing:-0.02em;">
            {{ $company->company_name }}
        </h2>
        @if($company->tagline)
            <p class="text-gray-500 text-sm mt-1">{{ $company->tagline }}</p>
        @endif

        {{-- Navigasi, dibingkai garis atas-bawah, jarak 140px sesuai Figma --}}
        <nav class="flex flex-wrap items-center justify-center text-sm font-medium text-gray-700"
             style="gap:140px; border-top:1px solid #e5e7eb; border-bottom:1px solid #e5e7eb; padding:16px 0; margin-top:32px;">
            <a href="{{ route('home') }}" class="hover:text-gray-900">Beranda</a>
            <a href="{{ route('equipment.index') }}" class="hover:text-gray-900">Alat Berat</a>
            <a href="{{ route('portfolio.index') }}" class="hover:text-gray-900">Portofolio</a>
            <a href="{{ route('about') }}" class="hover:text-gray-900">Tentang Kami</a>
        </nav>

        @if($company->logo_url)
            <img src="{{ asset('images/logo-noname.png') }}" alt="{{ $company->company_name }}"
                 style="display:block; width:240px; height:240px; object-fit:contain; margin:24px auto 0;">
        @endif

        <p class="text-xs text-gray-400 mt-6">&copy; {{ date('Y') }} {{ $company->company_name }}. Semua hak dilindungi.</p>
    </div>
</footer>