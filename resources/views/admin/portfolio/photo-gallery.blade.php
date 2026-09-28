@if($portfolio->photos->isNotEmpty())
    <div class="mb-4">
        <p class="block text-sm font-medium mb-1">Foto Saat Ini</p>
        <div class="flex flex-wrap gap-3">
            @foreach($portfolio->photos as $photo)
                <div class="relative">
                    <img src="{{ $photo->url }}" class="w-24 h-20 object-cover rounded-lg border border-gray-200">
                    <form action="{{ route('admin.portofolio.foto.destroy', [$portfolio, $photo]) }}" method="POST"
                          class="absolute -top-2 -right-2" onsubmit="return confirm('Hapus foto ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white text-xs w-5 h-5 rounded-full leading-none">&times;</button>
                    </form>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-gray-500 mt-2">{{ $portfolio->photos->count() }}/5 foto terpakai.</p>
    </div>
@endif