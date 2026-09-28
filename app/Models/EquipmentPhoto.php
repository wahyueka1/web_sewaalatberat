<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentPhoto extends Model
{
    protected $fillable = ['equipment_id', 'path', 'sort_order'];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
