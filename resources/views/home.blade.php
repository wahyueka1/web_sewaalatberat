@extends('layouts.app')

@section('content')
{{-- HERO --}}
<section class="bg-gradient-to-b from-gray-900 to-gray-700 text-white">
    <div class="max-w-6xl mx-auto px-4 py-20 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">{{ $company->tagline ?? $company->company_name }}</h1>
        <p class="text-gray-300 max-w-2xl mx-auto mb-8">{{ $company->description }}</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('equipment.index') }}" class="bg-white text-gray-900 font-medium px-6 py-3 rounded-lg hover:bg-gray-100">
                Lihat Alat Berat
            </a>
            <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener"
               class="bg-green-500 hover:bg-green-600 font-medium px-6 py-3 rounded-lg">
                Chat WhatsApp
            </a>
        </div>
    </div>
</section>

{{-- ALAT UNGGULAN --}}
<section class="max-w-6xl mx-auto px-4 py-16">
    <h2 class="text-2xl font-bold mb-8">Alat Berat Tersedia</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($featuredEquipment as $equipment)
            <a href="{{ route('equipment.show', $equipment) }}" class="block bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition">
                <img src="{{ $equipment->image_url }}" alt="{{ $equipment->name }}" class="w-full h-44 object-cover">
                <div class="p-4">
                    <p class="text-xs text-gray-500 mb-1">{{ $equipment->category }}</p>
                    <h3 class="font-semibold">{{ $equipment->name }}</h3>
                </div>
            </a>
        @empty
            <p class="text-gray-500">Belum ada data alat berat.</p>
        @endforelse
    </div>
    <div class="text-center mt-8">
        <a href="{{ route('equipment.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">
            Lihat semua alat &rarr;
        </a>
    </div>
</section>

{{-- PORTOFOLIO / TESTIMONI SINGKAT --}}
<section class="bg-white border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <h2 class="text-2xl font-bold mb-8">Sudah Dipercaya Untuk Proyek</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($latestPortfolio as $portfolio)
                <a href="{{ route('portfolio.show', $portfolio) }}" class="block bg-gray-50 rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition">
                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold">{{ $portfolio->title }}</h3>
                        <p class="text-sm text-gray-500">{{ $portfolio->client_name }} &middot; {{ $portfolio->location }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Belum ada data portofolio.</p>
            @endforelse
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('portfolio.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">
                Lihat semua portofolio &rarr;
            </a>
        </div>
    </div>
</section>
@endsection
