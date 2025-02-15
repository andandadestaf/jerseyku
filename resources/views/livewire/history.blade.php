<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item akive" aria-current="page">History</li>
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

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td class="text-align">Kode Pemesanan</td>
                            <td class="text-align">Pesanan</td>
                            <td>Status</td>
                            <td>Status Pengiriman</td>
                            <td><strong>Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->created_at->format('d-m-y') }}</td>
                            <td class="text-align">{{ $pesanan->id }}</td>
                            <td>
                                <?php $pesanan_details = \App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                    <div class="d-flex align-items-center">
                                    <img src="{{ url('storage/') }}/{{ $pesanan_detail->produk->gambar }}"
                                        class="w-12 h-12 object-cover round" width="50px">
                                    {{ $pesanan_detail->produk->nama }}
                                    <br>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->metode_pembayaran == 'cod')
                                <span class="badge badge-warning">Belum Dibayar</span>
                                @elseif($pesanan->metode_pembayaran == 'transfer')
                                <span class="badge badge-success">Sudah Dibayar</span>
                                @else
                                <span class="badge badge-danger">Dibatalkan</span>
                                @endif
                            </td>
                            <td>
                                @if($pesanan->status == 'new')
                                <span class="badge badge-info">Packing</span>
                                @elseif($pesanan->status == 'proses')
                                <span class="badge badge-warning">Proses</span>
                                @elseif($pesanan->status == 'dikirim')
                                <span class="badge badge-success">Dikirim</span>
                                @elseif($pesanan->status == 'diterima')
                                <span class="badge badge-success">Diterima</span>
                                @elseif($pesanan->status == 'cancel')
                                <span class="badge badge-danger">Dibatalkan</span>
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>