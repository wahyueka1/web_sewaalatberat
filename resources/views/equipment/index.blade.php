@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-2">Daftar Alat Berat</h1>
    <p class="text-gray-500 mb-8">Pilih alat berat yang Anda butuhkan, lalu hubungi kami via WhatsApp untuk booking.</p>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($equipments as $equipment)
            <a href="{{ route('equipment.show', $equipment) }}" class="block bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition">
                <img src="{{ $equipment->image_url }}" alt="{{ $equipment->name }}" class="w-full h-44 object-cover">
                <div class="p-4">
                    <p class="text-xs text-gray-500 mb-1">{{ $equipment->category }}</p>
                    <h2 class="font-semibold">{{ $equipment->name }}</h2>
                </div>
            </a>
        @empty
            <p class="text-gray-500 col-span-full">Belum ada alat berat yang tersedia.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $equipments->links() }}
    </div>
</section>
@endsection
