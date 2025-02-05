<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'liga_id',
        'nama',
        'harga',
        'is_ready',
        'is_featured',
        'on_sale',
        'gambar',
    ];

    protected $casts = [
        'gambar' => 'array',
    ];

    public function liga(){
        return $this->belongsTo(Liga::class);
    }

    public function pesanandetail(){
        return $this->hasMany(PesananDetail::class);
    }
}
