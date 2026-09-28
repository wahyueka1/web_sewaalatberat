<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Equipment;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim((string) $request->q);

        $equipments = collect();
        $portfolios = collect();

        if ($keyword !== '') {
            $equipments = Equipment::where('is_available', true)
                ->where(function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('category', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->latest()
                ->limit(8)
                ->get();

            $portfolios = Portfolio::where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('client_name', 'like', "%{$keyword}%")
                        ->orWhere('location', 'like', "%{$keyword}%");
                })
                ->latest('project_date')
                ->limit(8)
                ->get();
        }

        return view('search.index', [
            'keyword' => $keyword,
            'equipments' => $equipments,
            'portfolios' => $portfolios,
            'company' => CompanyProfile::current(),
            'seoTitle' => 'Hasil Pencarian' . ($keyword !== '' ? ': ' . $keyword : ''),
            'seoDescription' => 'Hasil pencarian alat berat dan portofolio.',
        ]);
    }
}