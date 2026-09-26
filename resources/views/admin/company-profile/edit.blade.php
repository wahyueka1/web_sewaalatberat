@extends('layouts.admin')
@section('title', 'Profil Usaha')

@section('content')
<form action="{{ route('admin.company-profile.update') }}" method="POST" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium mb-1">Nama Usaha</label>
        <input type="text" name="company_name" value="{{ old('company_name', $company->company_name) }}" required
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tagline</label>
        <input type="text" name="tagline" value="{{ old('tagline', $company->tagline) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">{{ old('description', $company->description) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Alamat</label>
        <input type="text" name="address" value="{{ old('address', $company->address) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $company->phone) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Nomor WhatsApp</label>
            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $company->whatsapp_number) }}"
                   placeholder="628xxxxxxxxxx (format internasional, tanpa +)"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $company->email) }}"
               class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
    </div>

    <hr class="my-4">
    <p class="text-sm font-medium text-gray-500">Tautan Sosial Media</p>

    @foreach(['instagram_url' => 'Instagram', 'facebook_url' => 'Facebook', 'tiktok_url' => 'TikTok', 'youtube_url' => 'YouTube', 'google_maps_url' => 'Google Maps'] as $field => $label)
        <div>
            <label class="block text-sm font-medium mb-1">{{ $label }}</label>
            <input type="url" name="{{ $field }}" value="{{ old($field, $company->$field) }}"
                   placeholder="https://..."
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
        </div>
    @endforeach

    <button class="bg-gray-900 text-white text-sm font-medium px-5 py-2 rounded-lg hover:bg-gray-800">Simpan Perubahan</button>
</form>
@endsection
