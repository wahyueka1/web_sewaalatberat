@extends('layouts.app')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-2">Daftar Alat Berat</h1>
    <p class="text-gray-500 mb-6">Pilih alat berat yang Anda butuhkan, lalu hubungi kami via WhatsApp untuk booking.</p>

    <form action="{{ route('equipment.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3 mb-8">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau kata kunci alat..."
               class="flex-1 border border-gray-300 rounded-lg px-4 py-2 text-sm">
        <select name="category" class="border border-gray-300 rounded-lg px-4 py-2 text-sm">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        <button class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-800">Cari</button>
        @if(request('q') || request('category'))
            <a href="{{ route('equipment.index') }}" class="text-sm text-gray-500 self-center hover:underline">Reset</a>
        @endif
    </form>

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
            <p class="text-gray-500 col-span-full">Tidak ada alat berat yang cocok dengan pencarian Anda.</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $equipments->links() }}
    </div>
</section>
@endsection
