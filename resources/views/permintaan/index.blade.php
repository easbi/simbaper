@extends('template')
 
@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transaksi Usulan Barang Persediaan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="treadcrumb float-sm-right">
                            <li class="treadcrumb-item"><a href="#">Home</a></li>
                            <li class="treadcrumb-item active">Transaksi Usul</li>
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

                <div class="card">
                    <div class="card-body">
                        <table id="example" class="display responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kuantitas</th>
                                    <th>Keterangan</th>
                                    <th>Pengusul</th>
                                    <th>Waktu Permintaan</th>
                                    <th>Penyelesaian</th>
                                    <th>Aksi</th>
                            </tr>    
                            </thead>
                            <tbody>
                                @foreach ($transaksipermintaan as $tr)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $tr->nama_barang }}</td>
                                    <td>{{ $tr->kuantitas }}</td>
                                    <td>{{ $tr->keterangan }}</td>                                    
                                    <td>{{ $tr->fullname }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tr->created_at)->format('d F Y') }}</td>
                                    <td>
                                        @if($tr->penyelesaian == 1) 
                                            Ditindaklanjuti pada {{ \Carbon\Carbon::parse($tr->updated_at)->format('d F Y') }}
                                        @elseif($tr->penyelesaian == NULL)
                                            Menunggu Persetujuan
                                        @endif
                                    </td>
                                    @if(Auth::user()->id == 1 OR Auth::user()->id == 14 OR Auth::user()->id == 17)
                                    <td>
                                        <form action="{{ route('permintaan.destroy',$tr->id) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" href="{{ route('permintaan.edit',$tr->id) }}">Edit</a>
                                        </form>
                                    </td>
                                    @endif
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
