<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\EquipmentPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $equipments = Equipment::when($request->filled('q'), function ($query) use ($request) {
                $keyword = $request->q;
                $query->where(function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('category', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.equipment.index', compact('equipments'));
    }

    public function create()
    {
        return view('admin.equipment.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $equipment = Equipment::create($data);

        $this->storePhotos($request, $equipment);

        return redirect()->route('admin.alat.index')->with('status', 'Alat berhasil ditambahkan.');
    }

    public function edit(Equipment $alat)
    {
        return view('admin.equipment.edit', ['equipment' => $alat->load('photos')]);
    }

    public function update(Request $request, Equipment $alat)
    {
        $data = $this->validated($request, $alat);

        $alat->update($data);

        $this->storePhotos($request, $alat);

        return redirect()->route('admin.alat.index')->with('status', 'Alat berhasil diperbarui.');
    }

    public function destroy(Equipment $alat)
    {
        foreach ($alat->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }
        if ($alat->image) {
            Storage::disk('public')->delete($alat->image);
        }
        $alat->delete();

        return back()->with('status', 'Alat berhasil dihapus.');
    }

    public function destroyPhoto(Equipment $alat, EquipmentPhoto $foto)
    {
        abort_if($foto->equipment_id !== $alat->id, 404);

        Storage::disk('public')->delete($foto->path);
        $foto->delete();

        return back()->with('status', 'Foto berhasil dihapus.');
    }

    private function storePhotos(Request $request, Equipment $equipment): void
    {
        if (! $request->hasFile('photos')) {
            return;
        }

        $nextOrder = $equipment->photos()->max('sort_order') + 1;

        foreach ($request->file('photos') as $file) {
            $path = $file->store('equipment', 'public');
            EquipmentPhoto::create([
                'equipment_id' => $equipment->id,
                'path' => $path,
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    private function validated(Request $request, ?Equipment $equipment = null): array
    {
        $existingCount = $equipment?->photos()->count() ?? 0;
        $maxNewPhotos = Equipment::MAX_PHOTOS - $existingCount;

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'specifications' => ['nullable', 'string'],
            'photos' => ['nullable', 'array', 'max:' . max($maxNewPhotos, 0)],
            'photos.*' => ['image', 'max:2048'],
            'is_available' => ['sometimes', 'boolean'],
        ], [
            'photos.max' => 'Total foto maksimal ' . Equipment::MAX_PHOTOS . ' per alat. Hapus foto lama dulu kalau ingin menambah yang baru.',
        ]) + ['is_available' => $request->boolean('is_available')];
    }
}
