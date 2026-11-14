<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'nama_layanan',
        'deskripsi',
        'harga',
        'gambar',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}