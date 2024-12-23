@extends('template')
 
@section('content')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Transaksi Masuk Barang Persediaan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="treadcrumb float-sm-right">
                            <li class="treadcrumb-item"><a href="#">Home</a></li>
                            <li class="treadcrumb-item active">Transaksi Masuk</li>
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
                                    <th>No Bon</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Aksi</th>
                            </tr>    
                            </thead>
                            <tbody>
                                @foreach ($transaksimasuk as $tr)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $tr->no_bon }}</td>
                                    <td>{{ $tr->nama_barang }}</td>
                                    <td>{{ $tr->harga }}</td>
                                    <td>{{ $tr->kuantitas }}</td>
                                    <td>
                                        <form action="{{ route('transaksimasuk.destroy',$tr->id) }}" method="POST">
                         
                                            <a class="btn btn-info btn-sm" href="{{ route('transaksimasuk.show',$tr->id) }}">Show</a>
                                                                     
                                            <a class="btn btn-primary btn-sm" href="{{ route('transaksimasuk.edit',$tr->id) }}">Edit</a>
                         
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
