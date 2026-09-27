<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhoto extends Model
{
    protected $fillable = ['portfolio_id', 'path', 'sort_order'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function getUrlAttribute(): string
    {
        return asset('storage/' . $this->path);
    }
}
