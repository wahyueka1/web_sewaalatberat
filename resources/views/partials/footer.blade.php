<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-sm">
        <div class="flex items-center gap-3">
            @if($company->logo_url ?? null)
                <img src="{{ $company->logo_url }}" alt="{{ $company->company_name }}" class="w-12 h-12 object-contain rounded bg-white p-1">
            @endif
            <h3 class="text-white font-semibold text-lg">{{ $company->company_name }}</h3>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-2">Kontak</h3>
            <p>{{ $company->address }}</p>
            <p>Telp/WA: {{ $company->phone }}</p>
            <p>Email: {{ $company->email }}</p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-2">Sosial Media</h3>
            <div class="flex gap-3">
                @if($company->instagram_url)
                    <a href="{{ $company->instagram_url }}" target="_blank" rel="noopener"
                       aria-label="Instagram" title="Instagram"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                        </svg>
                    </a>
                @endif
                @if($company->facebook_url)
                    <a href="{{ $company->facebook_url }}" target="_blank" rel="noopener"
                       aria-label="Facebook" title="Facebook"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path d="M22 12.06C22 6.505 17.523 2 12 2S2 6.505 2 12.06c0 5.02 3.657 9.184 8.438 9.94v-7.03H7.898v-2.91h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.563v1.877h2.773l-.443 2.91h-2.33V22c4.78-.756 8.437-4.92 8.437-9.94z"/>
                        </svg>
                    </a>
                @endif
                @if($company->tiktok_url)
                    <a href="{{ $company->tiktok_url }}" target="_blank" rel="noopener"
                       aria-label="TikTok" title="TikTok"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0 1 15.54 3h-3.09v12.4a2.592 2.592 0 1 1-1.83-2.477v-3.07a5.712 5.712 0 0 0-1.03-.096A5.712 5.712 0 1 0 15.4 15.47V9.33a7.26 7.26 0 0 0 4.2 1.33v-3.1s-1.9.09-2.99-1.73z"/>
                        </svg>
                    </a>
                @endif
                @if($company->youtube_url)
                    <a href="{{ $company->youtube_url }}" target="_blank" rel="noopener"
                       aria-label="YouTube" title="YouTube"
                       class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.546 15.568V8.432L15.818 12l-6.272 3.568z"/>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 text-center text-xs py-4 text-gray-500">
        &copy; {{ date('Y') }} {{ $company->company_name }}. Semua hak dilindungi.
    </div>
</footer>
