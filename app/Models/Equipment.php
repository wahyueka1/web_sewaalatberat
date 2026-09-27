<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Equipment extends Model
{
    use HasFactory;

    // "equipment" adalah uncountable noun dalam bahasa Inggris, jadi Laravel
    // tidak otomatis menebaknya sebagai "equipments". Harus ditulis eksplisit.
    protected $table = 'equipments';

    // Batas maksimal jumlah foto per alat (dipakai saat validasi upload di admin)
    public const MAX_PHOTOS = 5;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'specifications',
        'image',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Equipment $equipment) {
            if (empty($equipment->slug)) {
                $equipment->slug = Str::slug($equipment->name) . '-' . Str::random(5);
            }
        });
    }

    public function photos()
    {
        return $this->hasMany(EquipmentPhoto::class)->orderBy('sort_order');
    }

    /**
     * Foto sampul: foto galeri pertama kalau ada, atau kolom "image" lama
     * (untuk kompatibilitas data yang sudah ada sebelum fitur galeri ini),
     * atau gambar placeholder kalau belum ada foto sama sekali.
     */
    public function getImageUrlAttribute(): string
    {
        if ($cover = $this->photos->first()) {
            return $cover->url;
        }

        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/placeholder-equipment.jpg');
    }
}
