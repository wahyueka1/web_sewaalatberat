@extends('layouts.admin')
@section('title', 'Edit Alat Berat')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4 max-w-2xl">
    @include('admin.equipment.photo-gallery', ['equipment' => $equipment])

    <form action="{{ route('admin.alat.update', $equipment) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        @include('admin.equipment.form')
        <button class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-800">Simpan Perubahan</button>
    </form>
</div>
@endsection