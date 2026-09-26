<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Equipment extends Model
{
    use HasFactory;

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

    public function getImageUrlAttribute(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/placeholder-equipment.jpg');
    }
}
