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
    <label class="block text-sm font-medium mb-1">Tambah Foto Baru</label>
    <input type="file" name="photos[]" accept="image/*" multiple class="text-sm">
    <p class="text-xs text-gray-500 mt-1">Bisa pilih beberapa foto sekaligus (total maksimal 5 foto per alat).</p>
</div>

<label class="flex items-center gap-2 text-sm">
    <input type="checkbox" name="is_available" value="1"
           {{ old('is_available', $equipment->is_available ?? true) ? 'checked' : '' }}>
    Tersedia untuk disewa
</label>
