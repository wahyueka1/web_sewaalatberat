<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->q;

        $portfolios = Portfolio::when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('client_name', 'like', "%{$keyword}%")
                        ->orWhere('location', 'like', "%{$keyword}%");
                });
            })
            ->latest('project_date')
            ->paginate(9)
            ->withQueryString();

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
            'portfolio' => $portfolio->load('photos'),
            'company' => CompanyProfile::current(),
            'seoTitle' => $portfolio->title,
            'seoDescription' => str($portfolio->description)->limit(155),
        ]);
    }
}
