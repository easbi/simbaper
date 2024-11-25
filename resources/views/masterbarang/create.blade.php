@extends('template')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Input Peta</h1>
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
                                <h4 class="card-title">Input Data Master Persediaan Barang :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('masterbarang.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf  
                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        <strong><label>Kode barang :</label></strong>
                                        <input type="text" name="kode_barang" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <strong><label>Kode sub Kelompok :</label></strong>
                                        <input type="text" name="kode_sub_kelompok" class="form-control">
                                    </div>                                    
                                    <div class="form-group">
                                        <strong><label>Nama barang :</label></strong>
                                        <input type="text" name="nama_barang" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Satuan :</label></strong>
                                        <input type="text" name="satuan" id="satuan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Foto :</label></strong>
                                        <input type="file" name="featured_image" id="featured_image" class="form-control">
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
