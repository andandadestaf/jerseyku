<?php

namespace App\Livewire;

use App\Models\Liga;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;
    protected $listeners =[
        'updateKeranjang' => 'loadKeranjang',
    ];
    public function loadKeranjang(){
        $this->jumlah = PesananDetail::whereHas('pesanan', function($query) {
            $query->where('user_id', Auth::id())->where('status', 'new');
        })->count();
    }
    public function mount(){
        if(Auth::user()){
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status','new')->first();
        if($pesanan){
            $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }
    public function render()
    {
        return view('livewire.navbar',[
            'ligas' => Liga::all(),
            'quantity' => $this->jumlah
        ]);
    }

    
}
