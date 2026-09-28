@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-2">Portofolio Proyek</h1>
    <p class="text-gray-500 mb-6">Rekam jejak proyek yang telah menggunakan alat berat dari kami.</p>

    <form action="{{ route('portfolio.index') }}" method="GET" class="flex gap-3 mb-8">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul proyek, klien, atau lokasi..."
               class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-sm">
        <button class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-800">Cari</button>
        @if(request('q'))
            <a href="{{ route('portfolio.index') }}" class="text-sm text-gray-500 self-center hover:underline">Reset</a>
        @endif
    </form>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($portfolios as $portfolio)
            <a href="{{ route('portfolio.show', $portfolio) }}" class="block bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition">
                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h2 class="font-semibold">{{ $portfolio->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $portfolio->client_name }} &middot; {{ $portfolio->location }}</p>
                </div>
            </a>
        @empty
            <p class="text-gray-500 col-span-full">Tidak ada portofolio yang cocok dengan pencarian Anda.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $portfolios->links() }}
    </div>
</section>
@endsection
