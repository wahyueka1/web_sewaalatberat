@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="grid sm:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <p class="text-sm text-gray-500 mb-1">Total Alat Berat</p>
        <p class="text-3xl font-bold">{{ $totalEquipment }}</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <p class="text-sm text-gray-500 mb-1">Alat Tersedia</p>
        <p class="text-3xl font-bold">{{ $availableEquipment }}</p>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <p class="text-sm text-gray-500 mb-1">Total Portofolio</p>
        <p class="text-3xl font-bold">{{ $totalPortfolio }}</p>
    </div>
</div>
@endsection
