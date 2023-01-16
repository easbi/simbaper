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
                                <h4 class="card-title">Edit Data Peta :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('penyimpanan.update',$peta->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <strong><label>Jenis Peta:</label></strong>
                                        <select id="idjenispeta" name="idjenispeta" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($jenispeta as $jp)
                                            <option value="{{$jp->id}}" @if($peta->idjenispeta==$jp->id) selected @endif> {{$jp->jenis_peta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Provinsi:</label></strong>
                                        <select id="idprov" name="idprov" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($prov as $pr)
                                            <option value="{{$pr->idprov}}" @if($peta->idprov==$pr->idprov) selected @endif> {{$pr->nmprov}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kabupaten/Kota:</label></strong>
                                        <select id="idkabkot" name="idkabkot" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($kabkot as $kk)
                                            <option value="{{$kk->idkabkot}}" @if($peta->idkabkot==$kk->idkabkot) selected @endif> {{$kk->nmkabkot}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kecamatan:</label></strong>
                                        <select id="idkec" name="idkec" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($kecamatan as $kec)
                                            <option value="{{$kec->idkec}}" @if($peta->idkec==$kec->idkec) selected @endif> {{$kec->nmkec}}</option>
                                            @endforeach                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kelurahan/Desa:</label></strong>
                                        <select id="idkelurahan" name="idkelurahan" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($kelurahan as $kel)
                                            <option value="{{$kel->idkelurahan}}" @if($peta->idkelurahan==$kel->idkelurahan) selected @endif> {{$kel->nmkelurahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>ID BS :</label></strong>
                                        <input type="text" name="idbs" class="form-control" placeholder="001B" value="{{$peta->idbs}}">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>ID SBS :</label></strong>
                                        <input type="text" name="idsbs" class="form-control" placeholder="001" value="{{$peta->idsbs}}">
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Berkas Sebelumnya:</label></strong>
                                        <a href="{{ URL::to('/') }}/peta/{{ $peta->berkas }}" class="btn btn-info" target="_blank">Berkas</a>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Ganti Berkas :</label></strong>
                                        <input type="file" name="berkas" id="berkas" class="form-control">
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