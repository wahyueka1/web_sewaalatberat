<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'company_name',
        'tagline',
        'description',
        'address',
        'phone',
        'whatsapp_number',
        'email',
        'instagram_url',
        'facebook_url',
        'tiktok_url',
        'youtube_url',
        'google_maps_url',
    ];

    /**
     * Ambil profil usaha (hanya ada 1 baris/singleton).
     * Kalau belum ada, buat default supaya view tidak error.
     */
    public static function current(): self
    {
        return static::first() ?? static::create([
            'company_name' => 'Nama Usaha Sewa Alat Berat',
            'phone' => '628000000000',
            'whatsapp_number' => '628000000000',
        ]);
    }

    public function getWhatsappLinkAttribute(): string
    {
        $number = preg_replace('/\D/', '', $this->whatsapp_number);
        return "https://wa.me/{$number}";
    }
}
