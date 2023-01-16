@extends('template')
 
@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rekap Peta</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Beranda</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <!-- Info boxes -->
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Jenis Peta</span>
                        <span class="info-box-number">
                          {{ $jmljenispeta }}
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
                        <span class="info-box-text">Jumlah Peta</span>
                        <span class="info-box-number">{{ $jmlpeta }}</span>
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
                        <span class="info-box-text">Jumlah Kelurahan</span>
                        <span class="info-box-number">{{ $jmlkel }}</span>
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
                        <span class="info-box-number">{{ $jmluser }}</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Cari Data Peta :</h4>                         
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('penyimpanan.search') }}" method="GET">
                                <div class="card-body">
                                    <div class="form-group">
                                        <strong><label>Jenis Peta:</label></strong>
                                        <select id="idjenispeta" name="idjenispeta" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($jenispeta as $jp)
                                            <option value="{{$jp->id}}"> {{$jp->jenis_peta}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kecamatan:</label></strong>
                                        <select id="idkec" name="idkec" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($kecamatan as $kec)
                                            <option value="{{$kec->idkec}}"> {{$kec->nmkec}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <strong><label>Kelurahan/Desa:</label></strong>
                                        <select id="idkelurahan" name="idkelurahan" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($kelurahan as $kel)
                                            <option value="{{$kel->idkelurahan}}"> {{$kel->nmkelurahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table id="example" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Peta</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>idbs</th>
                                    <th>Aksi</th>
                            </tr>    
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $tr)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $tr->jenis_peta }}</td>
                                    <td>{{ $tr->nmkec }}</td>
                                    <td>{{ $tr->nmkelurahan }}</td>
                                    <td>{{ $tr->idbs }}</td>
                                    <td>
                                        <form action="{{ route('penyimpanan.destroy',$tr->id) }}" method="POST">
                         
                                            <a class="btn btn-info btn-sm" href="{{ route('penyimpanan.show',$tr->id) }}">Show</a>
                                            @if(Auth::user()->role == 1)                         
                                            <a class="btn btn-primary btn-sm" href="{{ route('penyimpanan.edit',$tr->id) }}">Edit</a>
                         
                                            @csrf
                                            @method('DELETE')
                         
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
  } );
</script>
@endpush
