<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest('project_date')->paginate(15);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('admin.portofolio.index')->with('status', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portofolio)
    {
        return view('admin.portfolio.edit', ['portfolio' => $portofolio]);
    }

    public function update(Request $request, Portfolio $portofolio)
    {
        $data = $this->validated($request);

        if ($request->hasFile('image')) {
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
            }
            $data['image'] = $request->file('image')->store('portfolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('admin.portofolio.index')->with('status', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portofolio)
    {
        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }
        $portofolio->delete();

        return back()->with('status', 'Portofolio berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'project_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
