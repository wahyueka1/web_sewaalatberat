@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold mb-2">Hasil Pencarian</h1>

    <form action="{{ route('search') }}" method="GET" class="mb-8">
        <input type="text" name="q" value="{{ $keyword }}" placeholder="Cari alat berat atau portofolio..."
               class="w-full sm:w-96 border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
    </form>

    @if($keyword === '')
        <p class="text-gray-500">Masukkan kata kunci untuk mulai mencari.</p>
    @else
        <p class="text-gray-500 mb-8">Menampilkan hasil untuk "<span class="font-medium text-gray-700">{{ $keyword }}</span>"</p>

        {{-- ALAT BERAT --}}
        <div class="mb-10">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Alat Berat</h2>
                <a href="{{ route('equipment.index', ['q' => $keyword]) }}" class="text-sm text-green-600 hover:underline">Lihat semua &rarr;</a>
            </div>

            @if($equipments->isEmpty())
                <p class="text-sm text-gray-400">Tidak ada alat berat yang cocok.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($equipments as $equipment)
                        <a href="{{ route('equipment.show', $equipment) }}" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition">
                            <img src="{{ $equipment->image_url }}" alt="{{ $equipment->name }}" class="w-full h-32 object-cover">
                            <div class="p-3">
                                <p class="text-xs text-gray-400 uppercase">{{ $equipment->category }}</p>
                                <p class="font-medium text-sm">{{ $equipment->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- PORTOFOLIO --}}
        <div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold">Portofolio</h2>
                <a href="{{ route('portfolio.index', ['q' => $keyword]) }}" class="text-sm text-green-600 hover:underline">Lihat semua &rarr;</a>
            </div>

            @if($portfolios->isEmpty())
                <p class="text-sm text-gray-400">Tidak ada portofolio yang cocok.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($portfolios as $portfolio)
                        <a href="{{ route('portfolio.show', $portfolio) }}" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-32 object-cover">
                            <div class="p-3">
                                <p class="font-medium text-sm">{{ $portfolio->title }}</p>
                                <p class="text-xs text-gray-500">{{ $portfolio->client_name }} &middot; {{ $portfolio->location }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</section>
@endsection