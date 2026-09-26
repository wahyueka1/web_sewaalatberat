@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-4">Tentang {{ $company->company_name }}</h1>
    <p class="text-gray-600 mb-8 whitespace-pre-line">{{ $company->description }}</p>

    <div class="bg-white border border-gray-200 rounded-xl p-6 space-y-2 text-sm">
        <p><span class="font-medium">Alamat:</span> {{ $company->address }}</p>
        <p><span class="font-medium">Telepon/WA:</span> {{ $company->phone }}</p>
        <p><span class="font-medium">Email:</span> {{ $company->email }}</p>
        @if($company->google_maps_url)
            <p><a href="{{ $company->google_maps_url }}" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Lihat lokasi di Google Maps &rarr;</a></p>
        @endif
    </div>
</section>
@endsection
