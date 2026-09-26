@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-2">Portofolio Proyek</h1>
    <p class="text-gray-500 mb-8">Rekam jejak proyek yang telah menggunakan alat berat dari kami.</p>

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
            <p class="text-gray-500 col-span-full">Belum ada data portofolio.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $portfolios->links() }}
    </div>
</section>
@endsection
