@extends('layouts.admin')
@section('title', 'Alat Berat')

@section('content')
<div class="flex flex-col sm:flex-row justify-between gap-3 mb-4">
    <form action="{{ route('admin.alat.index') }}" method="GET" class="flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama/kategori alat..."
               class="border border-gray-300 rounded-lg px-3 py-2 text-sm w-64">
        <button class="bg-gray-200 hover:bg-gray-300 text-sm font-medium px-4 py-2 rounded-lg">Cari</button>
    </form>
    <a href="{{ route('admin.alat.create') }}" class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-800 text-center">
        + Tambah Alat
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500">
            <tr>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($equipments as $equipment)
                <tr>
                    <td class="px-4 py-3 font-medium">{{ $equipment->name }}</td>
                    <td class="px-4 py-3">{{ $equipment->category }}</td>
                    <td class="px-4 py-3">
                        @if($equipment->is_available)
                            <span class="text-green-700 bg-green-100 px-2 py-1 rounded-full text-xs">Tersedia</span>
                        @else
                            <span class="text-gray-600 bg-gray-100 px-2 py-1 rounded-full text-xs">Tidak Tersedia</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right space-x-3">
                        <a href="{{ route('admin.alat.edit', $equipment) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.alat.destroy', $equipment) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus alat ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada alat berat.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $equipments->links() }}</div>
@endsection
