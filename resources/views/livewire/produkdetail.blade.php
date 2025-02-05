<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('listjersey') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jersey Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-produk">
                <div class="card-body">
                    <img src="{{ url('storage/') }}/{{ $produk->gambar }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $produk->nama }}</strong>
            </h2>
            <h4>
                @if($produk->is_ready == 1)
                <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stok</span>
                @else
                <span class="badge badge-danger"> <i class="fas fa-times"></i> Stok Habis</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang"> 
                    <table class="table" style="border-top : hidden">
                        <tr>
                            <td>Liga</td>
                            <td>:</td>
                            <td>
                                <img src="{{ url('storage/') }}/{{ $produk->liga->gambar }}" class="img-fluid"
                                    width="50">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($produk->harga) }}</td>
                        <tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>
                                <input id="quantity" type="number"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    wire:model="quantity" value="{{ old('quantity') }}" required
                                    autocomplete="name" autofocus>

                                @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" @if($produk->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>