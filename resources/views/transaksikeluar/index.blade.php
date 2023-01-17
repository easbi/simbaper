@extends('template')
 
@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Master Barang</h1>
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
                        <span class="info-box-text">Master Barang</span>
                        <span class="info-box-number">
                          Master Barang
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
                        <span class="info-box-number">11</span>
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
                        <span class="info-box-number">11</span>
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
                        <span class="info-box-number">11</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="card">
                    <div class="card-body">
                        <table id="example" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Kode Sub Kelompok</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                            </tr>    
                            </thead>
                            <tbody>
                                @foreach ($barang as $br)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $br->kode_barang }}</td>
                                    <td>{{ $br->kode_sub_kelompok }}</td>
                                    <td>{{ $br->nama_barang }}</td>
                                    <td>{{ $br->satuan }}</td>
                                    <td>
                                        <form action="{{ route('masterbarang.destroy',$br->kode_barang) }}" method="POST">
                         
                                            <a class="btn btn-info btn-sm" href="{{ route('masterbarang.show',$br->kode_barang) }}">Show</a>
                                                                     
                                            <a class="btn btn-primary btn-sm" href="{{ route('masterbarang.edit',$br->kode_barang) }}">Edit</a>
                         
                                            @csrf
                                            @method('DELETE')
                         
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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
