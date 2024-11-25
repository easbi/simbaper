{{-- {{ dd($bulan) }} --}}
@extends('template')

@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Riwayat Permintaan Barang</h1>
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

                {{-- <!-- Info boxes -->
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <h5>Pilih Periode Waktu </h5>
                            </div>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <strong><label>Bulan</label></strong>
                                        <select class="form-control" id="bulan" name="bulan">
                                            <option value="" selected>Pilih Bulan</option>
                                            {{ $i = 1 }}
                                            @foreach ($bulan as $m)
                                                <option value= "{{$i}}" > {{$m->month}} </option>
                                                {{ $i++; }}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><label>Tahun</label></strong>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option value="" selected>Pilih Tahun</option>
                                            @foreach ($tahun as $y)
                                                <option value= "{{$y->year}}" > {{$y->year}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> Generate </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                </div> --}}

                <div class="card">
                    <div class="card-body">
                        <table id="example" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pengguna</th>
                                    {{-- <th>Barang</th> --}}
                                    <th>Rincian</th>
                                    {{-- <th>Satuan</th> --}}
                                    <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($kwitansi as $kw)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $kw->tgl_keluar }}</td>
                                    <td>{{ $kw->nama_pemakai  }}</td>
                                    {{-- <td>
                                        @foreach (explode(',', $kw->details) as $barang)
                                            {{ trim($barang) }}<br>
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        @foreach (explode(',', $kw->full_details) as $details)
                                            {{ trim($details) }}<br>
                                        @endforeach
                                    </td>
                                    {{-- <td>
                                        @foreach (explode(',', $kw->satuan) as $satuan)
                                            {{ trim($satuan) }}<br>
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('generateKwitansi', ['id' => $kw->kode_pemakai, 'tgl' => $kw->tgl_keluar]) }}"> Kwitansi </a>
                                        {{-- <form action="{{ route('masterbarang.destroy',$br->kode_barang) }}" method="POST">


                                            @if(Auth::user()->id == 1)
                                            <a class="btn btn-primary btn-sm" href="{{ route('masterbarang.edit',$br->kode_barang) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                            @endif
                                        </form> --}}
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
        $('.select2').select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "scrollX": true,
         responsive: true
      });
    } );
  </script>
@endpush
