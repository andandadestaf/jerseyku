<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = ['nama','negara','gambar','is_active'];

    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
