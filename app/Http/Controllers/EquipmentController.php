<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::where('is_available', true)
            ->latest()
            ->paginate(12);

        return view('equipment.index', [
            'equipments' => $equipments,
            'company' => CompanyProfile::current(),
            'seoTitle' => 'Daftar Alat Berat Sewa - ' . CompanyProfile::current()->company_name,
            'seoDescription' => 'Lihat daftar lengkap alat berat yang tersedia untuk disewa: excavator, crane, bulldozer, dan lainnya.',
        ]);
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show', [
            'equipment' => $equipment,
            'company' => CompanyProfile::current(),
            'seoTitle' => $equipment->name . ' - Sewa Alat Berat',
            'seoDescription' => str($equipment->description)->limit(155),
        ]);
    }
}
