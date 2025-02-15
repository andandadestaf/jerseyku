<?php

namespace App\Livewire;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{

    public $pesanans;
    public function render()
    {
        if(Auth::user())
        {
            $this->pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 'new')->get();
        }
        return view('livewire.history');
    }
}
