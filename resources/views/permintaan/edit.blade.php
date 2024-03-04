@extends('template')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Verifikasi Persetujuan Usulan Barang Persediaan</h1>
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
                                <h4 class="card-title">Persetujuan Usulan Persediaan Barang :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('permintaan.update', $transaksipermintaan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body"> 
                                    <div class="form-group">
                                        <strong><label>Nama Barang :</label></strong>
                                        <input type="text" disabled name="nama_barang" class="form-control" value="{{$transaksipermintaan->nama_barang}}">
                                    </div>  
                                    <div class="form-group">
                                        <strong><label>Kuantitas :</label></strong>
                                        <br>
                                        <input type="text" disabled name="kuantitas" class="form-control" value="{{$transaksipermintaan->kuantitas}}">
                                    </div>                                
                                    <div class="form-group">
                                        <strong><label>Persetujuan :</label></strong>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="checkbox" class="cbp" name="checkbox" value="1">
                                        <label for="checkbox">Dengan ini saya menyatakan bahwa usulan Persediaan {{ $transaksipermintaan->nama_barang }} setuju untuk diadakan.</label><br>
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