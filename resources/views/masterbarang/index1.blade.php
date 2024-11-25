@extends('template1')

@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Produk Showcase</title> --}}

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
</head>
<div class="content-wrapper">
   {{-- <div class="content-header">
    </div> --}}

    <div class="content">
        <div class="container-fluid">
           
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

              <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Pemakaian</span>
                      <span class="info-box-number">
                        {{$jumlah_pakai}}
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Barang</span>
                      <span class="info-box-number">{{$jumlah_barang}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Kelompok Barang</span>
                      <span class="info-box-number">{{$jumlah_kelompok}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Akun Pengguna</span>
                      <span class="info-box-number">{{ $jumlah_akun }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            <!-- List Produk -->
            <div class='produk-showcase'>
                <div class='produk-header'>List Barang</div><br>
                 <form method="GET" action="{{ route('masterbarang') }}" class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari Barang..." value="{{ request()->get('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
                <br>
              
                <div class='produk-box'>
                    @foreach ($barang as $br)
                    <div class='produk'>
                      <div class='gambar-produk'>
                        <img src="{{ asset('foto_barang/' . ($br->featured_image ?? 'default_image.jpg')) }}" >
                        </div>
                        <br><br><br><br>
                        <div class='desk-produk'>
                            <span>{{ $br->nama_barang }}</span>
                            <div class='harga-produk'>
                                Tersedia : {{ $br->quantity }}
                            </div>
                            <a class='link-produk' href="{{ route('transaksikeluar.edit',$br->kode_barang) }}" target='_blank' title='Pakai'>
                                PAKAI
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
      "scrollX": true,
      responsive: true
    });
  });

  document.getElementById('search-barang').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let produkList = document.querySelectorAll('.produk');

    produkList.forEach(function(produk) {
        let namaBarang = produk.querySelector('.desk-produk span').textContent.toLowerCase();
        if (namaBarang.includes(filter)) {
            produk.style.display = ""; 
        } else {
            produk.style.display = "none"; 
        }
    });
});

</script>

@endpush
