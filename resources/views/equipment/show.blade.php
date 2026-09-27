@extends('layouts.app')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('equipment.index') }}" class="hover:underline">Alat Berat</a> / {{ $equipment->name }}
    </nav>

    <x-photo-slider
        :photos="$equipment->photos"
        :fallback-url="$equipment->image_url"
        :alt="$equipment->name"
    />

    <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">{{ $equipment->category }}</p>
    <h1 class="text-3xl font-bold mb-4">{{ $equipment->name }}</h1>

    <p class="text-gray-700 whitespace-pre-line mb-6">{{ $equipment->description }}</p>

    @if($equipment->specifications)
        <div class="bg-white border border-gray-200 rounded-xl p-6 mb-8">
            <h2 class="font-semibold mb-2">Spesifikasi</h2>
            <p class="text-sm text-gray-600 whitespace-pre-line">{{ $equipment->specifications }}</p>
        </div>
    @endif

    <a href="{{ $company->whatsapp_link }}?text={{ urlencode('Halo, saya ingin menyewa ' . $equipment->name) }}"
       target="_blank" rel="noopener"
       class="inline-block bg-green-500 hover:bg-green-600 text-white font-medium px-6 py-3 rounded-lg">
        Booking via WhatsApp
    </a>
</section>
@endsection