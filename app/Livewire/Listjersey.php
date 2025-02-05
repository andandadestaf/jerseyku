<?php

namespace App\Livewire;

use App\Models\Liga;
use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class Listjersey extends Component
{
    public $search;
    protected $updateQueryString = ['search'];
    public function updatingSearch(){
        $this->resetPage();
    }
    use WithPagination;
    public function render()
    {
        if ($this->search == null){
            $produks = Produk::where('nama','like', '%'.$this->search.'%')->paginate(8);
        }else{
            $produks = Produk::paginate(8);
        }
        return view('livewire.listjersey',[
            'produks' => $produks,
            'title' => 'List Jersey '
        ]);
    }
}
