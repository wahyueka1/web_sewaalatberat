<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->q;
        $category = $request->category;

        $equipments = Equipment::where('is_available', true)
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('category', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            })
            ->when($category, fn ($query) => $query->where('category', $category))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        // Daftar kategori unik untuk dropdown filter
        $categories = Equipment::where('is_available', true)
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('equipment.index', [
            'equipments' => $equipments,
            'categories' => $categories,
            'company' => CompanyProfile::current(),
            'seoTitle' => 'Daftar Alat Berat Sewa - ' . CompanyProfile::current()->company_name,
            'seoDescription' => 'Lihat daftar lengkap alat berat yang tersedia untuk disewa: excavator, crane, bulldozer, dan lainnya.',
        ]);
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show', [
            'equipment' => $equipment->load('photos'),
            'company' => CompanyProfile::current(),
            'seoTitle' => $equipment->name . ' - Sewa Alat Berat',
            'seoDescription' => str($equipment->description)->limit(155),
        ]);
    }
}
