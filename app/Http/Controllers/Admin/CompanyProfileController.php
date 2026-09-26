<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        return view('admin.company-profile.edit', [
            'company' => CompanyProfile::current(),
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'instagram_url' => ['nullable', 'url'],
            'facebook_url' => ['nullable', 'url'],
            'tiktok_url' => ['nullable', 'url'],
            'youtube_url' => ['nullable', 'url'],
            'google_maps_url' => ['nullable', 'url'],
        ]);

        CompanyProfile::current()->update($data);

        return back()->with('status', 'Profil usaha berhasil diperbarui.');
    }
}
