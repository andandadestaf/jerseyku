<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <br>
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <form wire::submit.prevent="checkout">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                            <strong>Metode Pengiriman
                        </h3>
                        <br>
                        <div class="form-group">
                            <label for="">No. HP</label>
                            <input wire:model="nohp" type="text" class="form-control @error('nohp') border-red-500 @enderror"
                            value="{{ old('nohp') }}" autocomplete="name" autofocus>
          
                            @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
          
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea wire:model="alamat" class="form-control @error('alamat') border-red-500 @enderror"
                            value="{{ old('alamat') }}" autocomplete="name" autofocus></textarea>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Kota</label>
                            <input wire:model="kota" type="text" class="form-control @error('kota') border-red-500 @enderror"
                            value="{{ old('kota') }}" autocomplete="name" autofocus>
          
                            @error('kota')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
          
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input wire:model="provinsi" type="text" class="form-control @error('provinsi') border-red-500 @enderror"
                            value="{{ old('provinsi') }}" autocomplete="name" autofocus>
          
                            @error('provinsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input wire:model="kode_pos" type="text" class="form-control @error('kode_pos') border-red-500 @enderror"
                            value="{{ old('kode_pos') }}" autocomplete="name" autofocus>
          
                            @error('kode_pos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div>
                            <label for="metode_pembayaran">Metode Pembayaran :</label><br>
                
                            <input type="radio" wire:model="metode_pembayaran" id="transfer" value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'checked' : '' }} required checked>
                            <label for="transfer">Transfer</label><br>
                
                            <input type="radio" wire:model="metode_pembayaran" id="cod" value="cod" {{ old('metode_pembayaran') == 'cod' ? 'checked' : '' }} required>
                            <label for="cod">COD</label><br>
                
                            @error('metode_pembayaran')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="metode_pengiriman">Jasa Pengiriman :</label><br>
                
                            <input type="radio" wire:model="metode_pengiriman" id="jne" value="jne" {{ old('metode_pengiriman') == 'jne' ? 'checked' : '' }} required checked>
                            <label for="jne">JNE</label><br>
                
                            <input type="radio" wire:model="metode_pengiriman" id="sicepat" value="sicepat" {{ old('metode_pengiriman') == 'sicepat' ? 'checked' : '' }} required>
                            <label for="sicepat">SiCepat</label><br>
                
                            @error('metode_pengiriman')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Grand Total
                        </span>
                        <span>
                            Rp. {{number_format($total_harga)}}
                        </span>
                    </div>
                    </hr>
                </div>
                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
                </div>
            </div>
        </div>
    </div>
</div>