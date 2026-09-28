@extends('layouts.app')

@section('content')
<section class="max-w-4xl mx-auto px-4 py-12">
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('portfolio.index') }}" class="hover:underline">Portofolio</a> / {{ $portfolio->title }}
    </nav>

    <x-photo-slider
        :photos="$portfolio->photos"
        :fallback-url="$portfolio->image_url"
        :alt="$portfolio->title"
    />

    <h1 class="text-3xl font-bold mb-2">{{ $portfolio->title }}</h1>
    <p class="text-gray-500 mb-6">
        {{ $portfolio->client_name }} &middot; {{ $portfolio->location }}
        @if($portfolio->project_date)
            &middot; {{ $portfolio->project_date->translatedFormat('F Y') }}
        @endif
    </p>

    <p class="text-gray-700 whitespace-pre-line">{{ $portfolio->description }}</p>
</section>
@endsection