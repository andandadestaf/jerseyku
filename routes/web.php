<?php

use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\Checkout;
use App\Livewire\History;
use App\Livewire\Home;
use App\Livewire\Keranjang;
use App\Livewire\Listjersey;
use App\Livewire\Produkdetail;
use App\Livewire\Produkliga;
use Filament\Pages\Auth\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::livewire('/','home')->name('home');

Route::get('/',Home::class)->name('home');
Route::get('/listjersey',Listjersey::class)->name('listjersey');
Route::get('/history',History::class)->name('history');
Route::get('/keranjang',Keranjang::class)->name('keranjang');
Route::get('/produkdetail/{id}',Produkdetail::class)->name('produkdetail');
Route::get('/produkliga/{ligaId}',Produkliga::class)->name('produkliga');
Route::get('/checkout',Checkout::class)->name('checkout');

Route::get('/register',Register::class)->name('register');
Route::post('/register/action', Register::class)->name('actionRegister');

Route::get('/login',AuthLogin::class)->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});