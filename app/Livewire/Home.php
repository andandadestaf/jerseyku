<?php

namespace App\Livewire;

use App\Models\Liga;
use App\Models\Produk;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home',[
            'produks'=> Produk::latest()->take(4)->get(),
            'ligas' => Liga::all()
        ]);
    }
}
