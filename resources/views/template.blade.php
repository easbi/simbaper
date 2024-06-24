<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simbaper</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/penyimpanan')}}" class="brand-link">
      <img src="{{ asset('adminlte/dist/img/morin-logo.png') }}" alt="moRin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Simbaper</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/woman.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if (Auth::check())
            <a href="#" class="d-block">{{ Auth::user()->fullname }}</a>
          @else
            <a href="#" class="d-block">Guest</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open"> -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-header">Alur Barang Persediaan</li> 
          @if(Auth::user()->id == 1 OR Auth::user()->id == 14)   
          <li class="nav-item">
            <a href="{{ url('/transaksimasuk')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaksi Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/transaksimasuk/create')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Catat Transaksi Masuk
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('/transaksikeluar/')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaksi Pemakaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/permintaan/')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaksi Usul Persediaan
              </p>
            </a>
          </li>

                   
          <li class="nav-header">Stock Persediaan</li>
          <li class="nav-item">
            <a href="{{ url('masterbarang')}}" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Stock Barang
              </p>
            </a>
          </li>

          @if(Auth::user()->id == 1 OR Auth::user()->id == 14)
          <li class="nav-item">
            <a href="{{ url('masterbarang/create')}}" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                 Tambah Master Barang
              </p>
            </a>
          </li>
          @endif

          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="#" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Tentang Simbaper</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://wa.me/6285265513571" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Bantuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy;2022 <a href="https://padangpanjangkota.bps.go.id">BPS Kota Padang Panjang</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
 
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>




<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminlte/dist/js/pages/dashboard3.js')}}"></script>

@stack('scripts')
</body>
</html>