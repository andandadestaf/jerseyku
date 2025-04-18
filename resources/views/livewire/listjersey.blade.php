<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <h2>{{$title}}</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <input wire:model="search" type="text" class="form-control" placeholder="Search . ." aria-label="Search"
                    aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="produks mb-5">
        <div class="row mt-4">
            @foreach($produks as $produk)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('storage/') }}/{{ $produk->gambar }}" class="img-fluid img-top">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>{{ $produk->nama }}</strong> </h5>
                                <h5>Rp. {{ number_format($produk->harga) }}</h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{route('produkdetail',$produk->id)}}"class="btn btn-dark btn-block">Beli</a>
                                {{-- <a href="{{ route('produks.detail', $produk->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center">
                {{ $produks->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        </div>
        </section>
</div>