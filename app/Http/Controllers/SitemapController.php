<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml secara dinamis supaya semua halaman alat
     * dan portofolio otomatis terdaftar untuk Google (SEO).
     */
    public function index()
    {
        $urls = collect([
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('about'), 'priority' => '0.6'],
            ['loc' => route('equipment.index'), 'priority' => '0.9'],
            ['loc' => route('portfolio.index'), 'priority' => '0.7'],
        ]);

        Equipment::where('is_available', true)->get()->each(function ($equipment) use (&$urls) {
            $urls->push([
                'loc' => route('equipment.show', $equipment),
                'priority' => '0.8',
                'lastmod' => $equipment->updated_at->toAtomString(),
            ]);
        });

        Portfolio::all()->each(function ($portfolio) use (&$urls) {
            $urls->push([
                'loc' => route('portfolio.show', $portfolio),
                'priority' => '0.6',
                'lastmod' => $portfolio->updated_at->toAtomString(),
            ]);
        });

        $xml = view('sitemap', ['urls' => $urls])->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
