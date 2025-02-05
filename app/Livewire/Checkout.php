<?php

namespace App\Livewire;

use App\Models\Alamat;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $metode_pembayaran, $metode_pengiriman, $status_pembayaran, $status, $matauang;
    public $nohp, $kota, $provinsi, $kode_pos, $alamat;
    public $total_harga;

    public function mount(){
        if(!Auth::user()) {
            return redirect()->route('login');
        }
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

    public function checkout(){
        dd('checkout method called');
        $this->validate([
            'metode_pembayaran',
            'metode_pengiriman',
            'nohp' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'alamat' => 'required',
        ]);

        $validate['status'] = 'proses';
        $validate['status_pembayaran'] = 'dibayar';
        $validate['matauang'] = 'idr';

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 'new')->first();
        if ($pesanan) {
            // Update alamat terkait dengan pesanan
            $alamat = Alamat::where('pesanan_id', $pesanan->id)->first();

            if (!$alamat) {
                // Jika alamat tidak ada untuk pesanan tersebut, buat alamat baru
                $alamat = new Alamat();
                $alamat->pesanan_id = $pesanan->id;
            }
            $alamat->alamat = $this->alamat;
            $alamat->nohp = $this->nohp;
            $alamat->kota = $this->kota;
            $alamat->provinsi = $this->provinsi;
            $alamat->kode_pos = $this->kode_pos;
            $alamat->save();

            $pesanan->metode_pembayaran = $this->metode_pembayaran;
            $pesanan->metode_pengiriman = $this->metode_pengiriman;
            $pesanan->status = $this->status;
            $pesanan->status_pembayaran = $this->status_pembayaran;
            $pesanan->matauang = $this->matauang;
            $pesanan->save();

            // Mengirimkan event untuk menyegarkan keranjang
            $this->dispatch('masukanKeranjang');

            // Menampilkan pesan berhasil dan redirect ke halaman home
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