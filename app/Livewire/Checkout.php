<?php

namespace App\Livewire;

use App\Models\Alamat;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $metode_pembayaran, $metode_pengiriman, $status_pembayaran, $status, $matauang;
    public $nohp, $kota, $provinsi, $kode_pos, $alamat, $nama;
    public $total_harga;

    public function mount(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
        $this->nama = Auth::user()->nama;
        $this->nohp = Auth::user()->nohp;
        $this->kota = Auth::user()->kota;
        $this->provinsi = Auth::user()->provinsi;
        $this->kode_pos = Auth::user()->kode_pos;
        $this->alamat = Auth::user()->alamat;
        $this->metode_pembayaran = Auth::user()->metode_pembayaran;
        $this->metode_pengiriman = Auth::user()->metode_pengiriman;
        $this->status = Auth::user()->status;
        $this->status_pembayaran = Auth::user()->status_pembayaran;
        $this->matauang = Auth::user()->matauang;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'new')->first();

        if(!empty($pesanan)){
            $this->total_harga = $pesanan->total_harga;
        }else{
            session()->flash('message', 'Belum ada pesanan yang dipilih');
            return redirect()->route('keranjang');
        }
    }


    public function checkout()
{
    $this->validate([
        'nama' => 'required',
        'metode_pembayaran' => 'required',
        'metode_pengiriman' => 'required',
        'nohp' => 'required',
        'kota' => 'required',
        'provinsi' => 'required',
        'kode_pos' => 'required',
        'alamat' => 'required',
    ]);

    $pesanan = Pesanan::where('user_id', Auth::id())->where('status', 'new')->first();
    
    if ($pesanan) {
        // Update atau buat alamat
        $alamat = Alamat::firstOrNew(['pesanan_id' => $pesanan->id]);
        $alamat->fill([
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
            'kota' => $this->kota,
            'provinsi' => $this->provinsi,
            'kode_pos' => $this->kode_pos,
        ])->save();

        // Update status pesanan ke 'proses' (bukan dari $this->status)
        $pesanan->update([
            'metode_pembayaran' => $this->metode_pembayaran,
            'metode_pengiriman' => $this->metode_pengiriman,
            'status' => 'proses',  // Hardcode nilai 'proses'
            'status_pembayaran' => 'dibayar',
            'matauang' => 'idr',
        ]);

        $this->dispatch('masukanKeranjang');
        session()->flash('message', 'Checkout berhasil');
        return redirect()->route('home');
    }

    session()->flash('message', 'Pesanan tidak ditemukan');
    return redirect()->route('keranjang');
}

    public function render()
    {
        return view('livewire.checkout');
    }
}