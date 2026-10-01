<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- ===== SEO META TAGS ===== --}}
    <title>{{ $seoTitle ?? $company->company_name }}</title>
    <meta name="description" content="{{ $seoDescription ?? $company->description }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BBH+Bogle&family=Montserrat:wght@400&display=swap" rel="stylesheet">
    {{-- Open Graph / social share --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $seoTitle ?? $company->company_name }}">
    <meta property="og:description" content="{{ $seoDescription ?? $company->description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="id_ID">

    {{-- Schema.org LocalBusiness: membantu Google memahami bisnis ini --}}
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "LocalBusiness",
        "name": "{{ $company->company_name }}",
        "description": "{{ $company->description }}",
        "address": "{{ $company->address }}",
        "telephone": "{{ $company->phone }}"
    }
    </script>

    <!-- <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles') -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@600;800&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-paper text-ink flex flex-col min-h-screen font-sans">

    @include('partials.navbar')

    <main class="flex-1">
        @if (session('status'))
            <div class="max-w-5xl mx-auto mt-4 px-4">
                <div class="bg-green-100 text-green-800 text-sm rounded-lg px-4 py-2">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Tombol WA melayang, selalu terlihat di semua halaman --}}
    <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener"
       class="fixed bottom-5 right-5 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg px-5 py-3 flex items-center gap-2 text-sm font-medium z-50">
        💬 Chat WhatsApp
    </a>

    @stack('scripts')
</body>
</html>
