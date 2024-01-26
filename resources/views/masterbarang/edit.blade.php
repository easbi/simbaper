@extends('template')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Master Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
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
                                <h4 class="card-title">Edit Master Barang :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('masterbarang.update',$barang->kode_barang) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <strong><label>Kode Barang:</label></strong>
                                        <input type="text" name="kode_barang" class="form-control" placeholder="001B" value="{{$barang->kode_barang}}">
                                    </div>                                    
                                    <div class="form-group">
                                        <strong><label>Kode Sub Kelompok:</label></strong>
                                        <input type="text" name="kode_sub_kelompok" class="form-control" placeholder="001B" value="{{$barang->kode_sub_kelompok}}">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Nama Barang :</label></strong>
                                        <input type="text" name="nama_barang" class="form-control" placeholder="001" value="{{$barang->nama_barang}}">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Satuan Barang :</label></strong>
                                        <input type="text" name="satuan" class="form-control" placeholder="001" value="{{$barang->satuan}}">
                                    </div>                                    
                                    <div class="form-group">
                                        <strong><label>Foto :</label></strong>
                                         <img src="{{ asset('storage/' . $barang->featured_image) }}" alt="{{ $barang->nama_barang }}">
                                        <input type="file" name="featured_image" id="featured_image" class="form-control">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection