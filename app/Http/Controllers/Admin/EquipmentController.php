<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::latest()->paginate(15);
        return view('admin.equipment.index', compact('equipments'));
    }

    public function create()
    {
        return view('admin.equipment.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        Equipment::create($data);

        return redirect()->route('admin.alat.index')->with('status', 'Alat berhasil ditambahkan.');
    }

    public function edit(Equipment $alat)
    {
        return view('admin.equipment.edit', ['equipment' => $alat]);
    }

    public function update(Request $request, Equipment $alat)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($alat->image) {
                Storage::disk('public')->delete($alat->image);
            }
            $data['image'] = $request->file('image')->store('equipment', 'public');
        }

        $alat->update($data);

        return redirect()->route('admin.alat.index')->with('status', 'Alat berhasil diperbarui.');
    }

    public function destroy(Equipment $alat)
    {
        if ($alat->image) {
            Storage::disk('public')->delete($alat->image);
        }
        $alat->delete();

        return back()->with('status', 'Alat berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'specifications' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'is_available' => ['sometimes', 'boolean'],
        ]) + ['is_available' => $request->boolean('is_available')];
    }
}
