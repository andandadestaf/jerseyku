<?php

namespace App\Livewire;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Produkdetail extends Component
{
    public $produk,$nama,$quantity,$pesanan;

    public function mount($id){
        $produkDetail = Produk::find($id);

        if($produkDetail){
            $this->produk = $produkDetail;
        }
    }

    public function masukkanKeranjang(){
        $this->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $pesanan = Pesanan::where('user_id', Auth::id())
                          ->where('status', 'new')
                          ->first();

        if (!$pesanan) {
            $pesanan = Pesanan::create([
                'user_id' => Auth::user()->id,
                'status' => 'new',
                'total_harga' => 0, // Set awal 0, nanti diperbarui
            ]);
        }

        // Simpan detail pesanan
        PesananDetail::create([
            'pesanan_id' => $pesanan->id,
            'produk_id' => $this->produk->id,
            'quantity' => $this->quantity,
            'unit_amount' => $this->produk->harga,
            'total_amount' => $this->quantity * $this->produk->harga,
        ]);

        // Update total harga pesanan
        $pesanan->update([
            'total_harga' => $pesanan->total_harga + ($this->quantity * $this->produk->harga),
        ]);

        // Emit event agar navbar diperbarui
        $this->dispatch('updateKeranjang');

        session()->flash('message', 'Pesanan sukses masuk keranjang');
        return redirect()->back();
    }    
    public function render()
    {
        return view('livewire.produkdetail');
    }
}