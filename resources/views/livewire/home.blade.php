{{--banners--}}
<div class="container">
   <div class="banner">
      <img src="{{ url('assets/slider/slider1.png') }}" alt="">
   </div>


   {{-- PILIH LIGA  --}}
   <section class="pilih-liga mt-4">
      <h3><strong>Pilih Liga</strong></h3>
      <div class="container">
         <div class="row mt-5">
            @foreach($ligas as $liga)
               <div class="col-md-3">
                  <a href="{{ route('produkliga',$liga->id) }}">
                  <div class="card">
                     <div class="card-body text-center">
                        <img src="{{ url('storage/') }}/{{ $liga->gambar }}" class="img-fluid img-top">
                        {{-- <h5><strong>{{ $liga->nama }}</strong></h5> --}}
                     </div>
                  </div>
                  </a>
               </div>
            @endforeach
         </div>
      </div>
   </section>

      {{-- PRODUK UTAMA  --}}
   <section class="produks mt-5 mb-5">
         <div class="d-flex justify-content-between align-items-center">
            <h3><strong>Best Produk</strong></h3>
               <a href="listjersey" class="btn btn-dark">
                  Lihat Semua
               </a>
         </div>
      <div class="container" >
          <div class="row mt-4">
              @foreach($produks as $produk)
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-body text-center">
                              <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid img-top">
                              <h5><strong>{{ $produk->nama }}</strong></h5>
                              <p>Rp. {{ number_format($produk->harga) }}</p>
                              <a href="{{route('produkdetail',$produk->id)}}"class="btn btn-dark btn-block">Beli</a>
                              {{-- <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-dark btn-block">Detail</a> --}}
                           </div>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
   </section>      