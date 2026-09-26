<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-3 gap-8 text-sm">
        <div>
            <h3 class="text-white font-semibold mb-2">{{ $company->company_name }}</h3>
            <p>{{ $company->description }}</p>
        </div>
        <div>
            <h3 class="text-white font-semibold mb-2">Kontak</h3>
            <p>{{ $company->address }}</p>
            <p>Telp/WA: {{ $company->phone }}</p>
            <p>Email: {{ $company->email }}</p>
        </div>
        <div>
            <h3 class="text-white font-semibold mb-2">Sosial Media</h3>
            <div class="flex gap-4">
                @if($company->instagram_url)
                    <a href="{{ $company->instagram_url }}" target="_blank" rel="noopener" class="hover:text-white">Instagram</a>
                @endif
                @if($company->facebook_url)
                    <a href="{{ $company->facebook_url }}" target="_blank" rel="noopener" class="hover:text-white">Facebook</a>
                @endif
                @if($company->tiktok_url)
                    <a href="{{ $company->tiktok_url }}" target="_blank" rel="noopener" class="hover:text-white">TikTok</a>
                @endif
                @if($company->youtube_url)
                    <a href="{{ $company->youtube_url }}" target="_blank" rel="noopener" class="hover:text-white">YouTube</a>
                @endif
            </div>
        </div>
    </div>
    <div class="border-t border-gray-800 text-center text-xs py-4 text-gray-500">
        &copy; {{ date('Y') }} {{ $company->company_name }}. Semua hak dilindungi.
    </div>
</footer>
