@php($equipment = $equipment ?? null)

<div>
    <label class="block text-sm font-medium mb-1">Nama Alat</label>
    <input type="text" name="name" value="{{ old('name', $equipment->name ?? '') }}" required
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Kategori</label>
    <input type="text" name="category" value="{{ old('category', $equipment->category ?? '') }}" placeholder="Excavator, Crane, Bulldozer, dll."
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Deskripsi</label>
    <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">{{ old('description', $equipment->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Spesifikasi</label>
    <textarea name="specifications" rows="4" placeholder="1 baris per spesifikasi"
              class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">{{ old('specifications', $equipment->specifications ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Foto Alat</label>
    <input type="file" name="image" accept="image/*" class="text-sm">
    @if(($equipment->image ?? null))
        <img src="{{ $equipment->image_url }}" class="w-32 h-20 object-cover rounded-lg mt-2">
    @endif
</div>

<label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="is_available" value="1"
           {{ old('is_available', $equipment->is_available ?? true) ? 'checked' : '' }}>
    Tersedia untuk disewa
</label>
