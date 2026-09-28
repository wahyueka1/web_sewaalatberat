<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portfolios = Portfolio::when($request->filled('q'), function ($query) use ($request) {
                $keyword = $request->q;
                $query->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('client_name', 'like', "%{$keyword}%")
                        ->orWhere('location', 'like', "%{$keyword}%");
                });
            })
            ->latest('project_date')
            ->paginate(15)
            ->withQueryString();

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $portfolio = Portfolio::create($data);

        $this->storePhotos($request, $portfolio);

        return redirect()->route('admin.portofolio.index')->with('status', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portofolio)
    {
        return view('admin.portfolio.edit', ['portfolio' => $portofolio->load('photos')]);
    }

    public function update(Request $request, Portfolio $portofolio)
    {
        $data = $this->validated($request, $portofolio);

        $portofolio->update($data);

        $this->storePhotos($request, $portofolio);

        return redirect()->route('admin.portofolio.index')->with('status', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portofolio)
    {
        foreach ($portofolio->photos as $photo) {
            Storage::disk('public')->delete($photo->path);
        }
        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }
        $portofolio->delete();

        return back()->with('status', 'Portofolio berhasil dihapus.');
    }

    public function destroyPhoto(Portfolio $portofolio, PortfolioPhoto $foto)
    {
        abort_if($foto->portfolio_id !== $portofolio->id, 404);

        Storage::disk('public')->delete($foto->path);
        $foto->delete();

        return back()->with('status', 'Foto berhasil dihapus.');
    }

    private function storePhotos(Request $request, Portfolio $portfolio): void
    {
        if (! $request->hasFile('photos')) {
            return;
        }

        $nextOrder = $portfolio->photos()->max('sort_order') + 1;

        foreach ($request->file('photos') as $file) {
            $path = $file->store('portfolio', 'public');
            PortfolioPhoto::create([
                'portfolio_id' => $portfolio->id,
                'path' => $path,
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    private function validated(Request $request, ?Portfolio $portfolio = null): array
    {
        $existingCount = $portfolio?->photos()->count() ?? 0;
        $maxNewPhotos = Portfolio::MAX_PHOTOS - $existingCount;

        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'project_date' => ['nullable', 'date'],
            'photos' => ['nullable', 'array', 'max:' . max($maxNewPhotos, 0)],
            'photos.*' => ['image', 'max:2048'],
        ], [
            'photos.max' => 'Total foto maksimal ' . Portfolio::MAX_PHOTOS . ' per proyek. Hapus foto lama dulu kalau ingin menambah yang baru.',
        ]);
    }
}
