@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section class="relative bg-ink text-paper overflow-hidden">
    @php $heroEquipment = $featuredEquipment->first() ?? null; @endphp
    @if($heroEquipment)
        <img src="{{ $heroEquipment->image_url }}" alt=""
             class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/70 to-ink/30"></div>
    @endif

    <div class="relative max-w-6xl mx-auto px-4 pt-20 pb-16">
        <h1 class="font-display font-extrabold leading-[0.95] text-5xl sm:text-6xl md:text-7xl max-w-3xl mb-6">
            {{ $company->tagline ?? $company->company_name }}
        </h1>
        <p class="text-steel max-w-lg mb-10">{{ $company->description }}</p>

        <div class="flex flex-wrap gap-4 mb-8">
    <a href="{{ route('equipment.index') }}"
       class="bg-accent text-ink font-semibold px-6 py-3 rounded hover:brightness-95">
        Lihat Alat Berat
    </a>
    <a href="{{ $company->whatsapp_link }}" target="_blank" rel="noopener"
       class="border border-line text-paper font-semibold px-6 py-3 rounded hover:border-steel">
        Chat WhatsApp
    </a>
</div>

        <div class="flex flex-wrap gap-x-12 gap-y-4 border-t border-line pt-6">
            <div>
                <p class="font-display text-3xl font-bold text-accent">{{ $featuredEquipment->count() }}+</p>
                <p class="text-sm text-steel">Alat berat tersedia</p>
            </div>
            <div>
                <p class="font-display text-3xl font-bold text-accent">{{ $latestPortfolio->count() }}+</p>
                <p class="text-sm text-steel">Proyek selesai</p>
            </div>
        </div>
    </div>
</section>

{{-- SPOTLIGHT LOGO --}}
<section class="bg-ink py-10 sm:py-14">
    <div class="max-w-4xl mx-auto px-4 flex flex-col items-center text-center">
        <img src="{{ asset('images/logo-spotlight-cropped.png') }}" alt="{{ $company->company_name }}"
             class="h-16 sm:h-20 md:h-22 w-auto mb-4">
        <p class="text-steel max-w-md">
            Sejak berdiri, {{ $company->company_name }} berkomitmen menghadirkan alat berat siap pakai dengan standar keamanan dan performa terbaik untuk setiap proyek Anda.
        </p>
    </div>
</section>


{{-- ALAT UNGGULAN --}}
<section class="bg-paper">
    <div class="max-w-6xl mx-auto px-4 py-20">
        <div class="flex items-end justify-between mb-10">
            <h2 class="font-display text-3xl sm:text-4xl font-bold">Alat Berat Tersedia</h2>
            <a href="{{ route('equipment.index') }}" class="text-sm font-medium text-ink border-b border-ink hover:border-accent hover:text-accent">
                Lihat semua
            </a>
        </div>

        @if($featuredEquipment->isEmpty())
            <p class="text-steel">Belum ada data alat berat.</p>
        @else
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($featuredEquipment->take(8) as $equipment)
                    <a href="{{ route('equipment.show', $equipment) }}" class="group block">
                        <div class="overflow-hidden bg-ink mb-3">
                            <img src="{{ $equipment->image_url }}" alt="{{ $equipment->name }}"
                                 class="w-full h-36 sm:h-40 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <p class="text-xs text-steel mb-1">{{ $equipment->category }}</p>
                        <p class="font-display font-bold text-base leading-tight">{{ $equipment->name }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- PORTOFOLIO --}}
<section class="bg-ink text-paper">
    <div class="max-w-6xl mx-auto px-4 py-20">
        <div class="flex items-end justify-between mb-10">
            <h2 class="font-display text-3xl sm:text-4xl font-bold">Sudah Dipercaya Untuk Proyek</h2>
            <a href="{{ route('portfolio.index') }}" class="text-sm font-medium text-paper border-b border-paper hover:border-accent hover:text-accent">
                Lihat semua
            </a>
        </div>

        @if($latestPortfolio->isEmpty())
            <p class="text-steel">Belum ada data portofolio.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latestPortfolio as $portfolio)
                    <a href="{{ route('portfolio.show', $portfolio) }}" class="group block">
                        <div class="overflow-hidden mb-3">
                            <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="font-display font-bold text-lg">{{ $portfolio->title }}</h3>
                        <p class="text-sm text-steel">{{ $portfolio->client_name }} &middot; {{ $portfolio->location }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection