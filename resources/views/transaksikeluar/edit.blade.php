@extends('template')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pemakaian Barang Persediaan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Input Data</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Input Data Transaksi Pemakaian Persediaan Barang :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('transaksikeluar.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body"> 
                                    <div class="form-group">
                                        <strong><label>Nama Barang :</label></strong>
                                        <input type="text" disabled name="kuantitas" class="form-control" value="{{$stock_barang->nama_barang}}">
                                    </div>  
                                    <div class="form-group">
                                        <strong><label>Gambar/Ilustrasi Barang :</label></strong>
                                        <br>
                                        <img width='300' height='300' src="{{ asset('storage/' . $stock_barang->featured_image) }}" alt="{{ $stock_barang->nama_barang }}">
                                    </div>                                
                                    <div class="form-group">
                                        <strong><label>Kuantitas :</label></strong>
                                        <div class="row">

                                        <div class="col-7">
                                            <input type="text" name="kuantitas" class="form-control">
                                        </div>
                                        <div class="col-5">
                                            <input type="text" disabled name="kuantitas" class="form-control" value=" Stok tersedia {{$stock_barang->quantity}} {{$stock_barang->satuan}}">
                                        </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Tgl Pengambilan :</label></strong>
                                        <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection