@extends('template')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Peta</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Show Detail</li>
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
                                <h4 class="card-title">Edit Data Peta :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <strong><label>Jenis Peta:</label></strong>
                                        <select id="idjenispeta" name="idjenispeta" class="form-control">
                                            <option value=""> {{$peta[0]->jenis_peta }}</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <strong><label>Provinsi:</label></strong>
                                        <select id="idprov" name="idprov" class="form-control">
                                            <option value="" selected disabled>{{ $peta[0]->nmprov }} ({{$peta[0]->idprov}})</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kabupaten/Kota:</label></strong>
                                        <select id="idkabkot" name="idkabkot" class="form-control">
                                            <option value="{{ $peta[0]->idkabkot }}" selected disabled>{{ $peta[0]->nmkabkot }} ( {{$peta[0]->idkabkot}} )</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kecamatan:</label></strong>
                                        <select id="idkec" name="idkec" class="form-control">
                                            <option value="{{ $peta[0]->idkec }}" selected disabled>{{ $peta[0]->nmkec }} ({{$peta[0]->idkec}})</option>                    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kelurahan/Desa:</label></strong>
                                        <select id="idkelurahan" name="idkelurahan" class="form-control">
                                            <option value="{{ $peta[0]->idkelurahan }}" selected disabled>{{ $peta[0]->nmkelurahan }} ({{$peta[0]->idkelurahan}})</option>                    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>ID BS :</label></strong>
                                        <input type="text" name="idbs" class="form-control" value="{{ $peta[0]->idbs }}" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>ID SBS :</label></strong>
                                        <input type="text" name="idsbs" class="form-control" value="{{ $peta[0]->idsbs }}" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Berkas :</label></strong>
                                        <a href="{{ URL::to('/') }}/peta/{{ $peta[0]->jenis_peta }}/{{ $peta[0]->berkas }}" class="btn btn-info" target="_blank">Berkas</a>
                                        <img src="{{ URL::to('/') }}/peta/{{ $peta[0]->jenis_peta }}/{{ $peta[0]->berkas }}" class="img-fluid" alt="Responsive image">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection