@php($portfolio = $portfolio ?? null)

<div>
    <label class="block text-sm font-medium mb-1">Judul Proyek</label>
    <input type="text" name="title" value="{{ old('title', $portfolio->title ?? '') }}" required
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Nama Klien</label>
    <input type="text" name="client_name" value="{{ old('client_name', $portfolio->client_name ?? '') }}"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Lokasi</label>
    <input type="text" name="location" value="{{ old('location', $portfolio->location ?? '') }}"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Tanggal Proyek</label>
    <input type="date" name="project_date"
           value="{{ old('project_date', optional($portfolio->project_date ?? null)->format('Y-m-d')) }}"
           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Deskripsi</label>
    <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm">{{ old('description', $portfolio->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Tambah Foto Baru</label>
    <input type="file" name="photos[]" accept="image/*" multiple class="text-sm">
    <p class="text-xs text-gray-500 mt-1">Bisa pilih beberapa foto sekaligus (total maksimal 5 foto per proyek).</p>
</div>