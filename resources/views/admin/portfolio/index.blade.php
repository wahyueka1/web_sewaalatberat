@extends('layouts.admin')
@section('title', 'Portofolio')

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.portofolio.create') }}" class="bg-gray-900 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-800">
        + Tambah Portofolio
    </a>
</div>

<div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-left text-gray-500">
            <tr>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Klien</th>
                <th class="px-4 py-3">Lokasi</th>
                <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($portfolios as $portfolio)
                <tr>
                    <td class="px-4 py-3 font-medium">{{ $portfolio->title }}</td>
                    <td class="px-4 py-3">{{ $portfolio->client_name }}</td>
                    <td class="px-4 py-3">{{ $portfolio->location }}</td>
                    <td class="px-4 py-3 text-right space-x-3">
                        <a href="{{ route('admin.portofolio.edit', $portfolio) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.portofolio.destroy', $portfolio) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus portofolio ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-6 text-center text-gray-500">Belum ada portofolio.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $portfolios->links() }}</div>
@endsection
