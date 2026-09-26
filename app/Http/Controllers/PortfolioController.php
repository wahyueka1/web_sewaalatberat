<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest('project_date')->paginate(9);

        return view('portfolio.index', [
            'portfolios' => $portfolios,
            'company' => CompanyProfile::current(),
            'seoTitle' => 'Portofolio Proyek - ' . CompanyProfile::current()->company_name,
            'seoDescription' => 'Rekam jejak proyek dan klien yang telah menggunakan jasa sewa alat berat kami.',
        ]);
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', [
            'portfolio' => $portfolio,
            'company' => CompanyProfile::current(),
            'seoTitle' => $portfolio->title,
            'seoDescription' => str($portfolio->description)->limit(155),
        ]);
    }
}
