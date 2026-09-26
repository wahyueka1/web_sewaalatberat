<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Models\Portfolio;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalEquipment' => Equipment::count(),
            'availableEquipment' => Equipment::where('is_available', true)->count(),
            'totalPortfolio' => Portfolio::count(),
        ]);
    }
}
