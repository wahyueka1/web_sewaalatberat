<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Equipment;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $company = CompanyProfile::current();
        $featuredEquipment = Equipment::where('is_available', true)->latest()->take(6)->get();
        $latestPortfolio = Portfolio::latest('project_date')->take(3)->get();

        return view('home', [
            'company' => $company,
            'featuredEquipment' => $featuredEquipment,
            'latestPortfolio' => $latestPortfolio,
            'seoTitle' => $company->company_name . ' - Sewa Alat Berat Terpercaya',
            'seoDescription' => $company->tagline ?? $company->description,
        ]);
    }

    public function about()
    {
        $company = CompanyProfile::current();

        return view('about', [
            'company' => $company,
            'seoTitle' => 'Tentang Kami - ' . $company->company_name,
            'seoDescription' => $company->description,
        ]);
    }
}
