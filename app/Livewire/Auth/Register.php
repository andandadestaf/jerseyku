<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('register')]
class Register extends Component
{
    public $name, $email, $password, $role = 'customer';

    public function register(){
        // Validasi data
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        // Login user baru
        Auth::login($user);

        return redirect()->intended();
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}
