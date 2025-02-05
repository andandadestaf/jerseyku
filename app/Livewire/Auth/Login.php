<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function login(){
        // Validasi data
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            return redirect()->route(Auth::user()->role == 'admin' ? 'admin.dashboard' : 'home');
        }

        session()->flash('error', 'Email atau password salah');    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
