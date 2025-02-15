<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matauang',
        'status',
        'total_harga',
        'biaya_pengiriman',
        'metode_pengiriman',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail(){
        return $this->hasMany(PesananDetail::class);
    }

    public function alamat(){
        return $this->hasOne(Alamat::class,'pesanan_id');
    }

    // public function produk(){
    //     return $this->belongsTo(Produk::class);
    // }
    // protected static function booted()
    // {
    // static::saving(function ($pesanan) {
    //     $pesanan->total_harga = $pesanan->produk->sum(function ($produk) {
    //         return $produk->harga * $produk->pivot->quantity;
    //     });
    // });
    // }

}
