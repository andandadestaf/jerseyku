<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nohp',
        'alamat',
        'kota',
        'provinsi',
        'kode_pos',
        'pesanan_id',
    ];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class,'pesanan_id');
    }
}