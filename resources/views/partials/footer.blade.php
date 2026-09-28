<footer class="bg-paper text-ink border-t border-line">
    <div class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-3 gap-10 text-sm">
        <div>
            <h3 class="font-display text-xl font-bold mb-2">{{ $company->company_name }}</h3>
            <p class="text-steel">{{ $company->description }}</p>
        </div>
        <div>
            <h3 class="font-semibold mb-2">Kontak</h3>
            <p class="text-steel">{{ $company->address }}</p>
            <p class="text-steel">Telp/WA: {{ $company->phone }}</p>
            <p class="text-steel">Email: {{ $company->email }}</p>
        </div>
        <div>
            <h3 class="font-semibold mb-2">Sosial Media</h3>
            <div class="flex flex-col gap-1">
                @if($company->instagram_url)
                    <a href="{{ $company->instagram_url }}" target="_blank" rel="noopener" class="text-steel hover:text-ink">Instagram</a>
                @endif
                @if($company->facebook_url)
                    <a href="{{ $company->facebook_url }}" target="_blank" rel="noopener" class="text-steel hover:text-ink">Facebook</a>
                @endif
                @if($company->tiktok_url)
                    <a href="{{ $company->tiktok_url }}" target="_blank" rel="noopener" class="text-steel hover:text-ink">TikTok</a>
                @endif
                @if($company->youtube_url)
                    <a href="{{ $company->youtube_url }}" target="_blank" rel="noopener" class="text-steel hover:text-ink">YouTube</a>
                @endif
            </div>
        </div>
    </div>
    <div class="border-t border-line text-center text-xs py-4 text-steel">
        &copy; {{ date('Y') }} {{ $company->company_name }}. Semua hak dilindungi.
    </div>
</footer>