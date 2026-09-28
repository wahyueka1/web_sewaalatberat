<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    // Batas maksimal jumlah foto per proyek (dipakai saat validasi upload di admin)
    public const MAX_PHOTOS = 5;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'location',
        'description',
        'image',
        'project_date',
    ];

    protected $casts = [
        'project_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::saving(function (Portfolio $portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title) . '-' . Str::random(5);
            }
        });
    }

    public function photos()
    {
        return $this->hasMany(PortfolioPhoto::class)->orderBy('sort_order');
    }

    public function getImageUrlAttribute(): string
    {
        if ($cover = $this->photos->first()) {
            return $cover->url;
        }

        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/placeholder-portfolio.jpg');
    }
}
