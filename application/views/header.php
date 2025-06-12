<!DOCTYPE html>
<html>

<head>

  <title>PT. Korsia Boan Perkasa</title>

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link href="<?=base_url('vendor/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('css/sb-admin.css')?>" rel="stylesheet">
  <link href="<?=base_url('css/myStyle.css')?>" rel="stylesheet">

  <link href="<?=base_url('vendor/datepicker/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <script src="<?=base_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>


  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?=base_url('vendor/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?=base_url('vendor/datatables/dataTables.bootstrap4.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('js/sb-admin.js')?>"></script>

  <script src="<?=base_url('vendor/datepicker/js/bootstrap-datetimepicker.js')?>"></script>

  <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

</head>

<body id="page-top">


  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">PT. Korsia Boan Perkasa</a>
   <!-- Navbar Search -->
    <!--
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    -->

    <!-- Navbar -->
    <ul class="navbar-nav d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <!--
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item linkDisabled" href="#">Settings</a>
          <a class="dropdown-item linkDisabled" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('dashboard')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-database "></i>
          <span>Master</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('user')?>">Master User</a>
          <a class="dropdown-item" href="<?=base_url('departemen')?>">Master Departemen</a>
          <a class="dropdown-item" href="<?=base_url('jabatan')?>">Master Jabatan</a>
          <a class="dropdown-item" href="<?=base_url('status')?>">Master Status</a>
          <a class="dropdown-item" href="<?=base_url('karyawan')?>">Master Karyawan</a>
          <a class="dropdown-item" href="<?=base_url('gaji')?>">Master Gaji</a>
          <a class="dropdown-item" href="<?=base_url('tunjangan/jabatan')?>">Master Tunjangan Jabatan</a>
          <!--<a class="dropdown-item" href="<?=base_url('tunjangan/disiplin')?>">Master Tunjangan Disiplin</a>-->
          <a class="dropdown-item" href="<?=base_url('tunjangan/kehadiran')?>">Master Tunjangan Kehadiran</a>
          <a class="dropdown-item" href="<?=base_url('tunjangan/lembur_kerja')?>">Master Tunjangan Lembur Kerja</a>
          <a class="dropdown-item" href="<?=base_url('tunjangan/lembur_libur')?>">Master Tunjangan Lembur Libur</a>
          <a class="dropdown-item" href="<?=base_url('potongan/kesehatan')?>">Master Potongan Kesehatan</a>
          <a class="dropdown-item" href="<?=base_url('potongan/ketenagakerjaan')?>">Master Potongan Ketenagakerjaan</a>
          <a class="dropdown-item" href="<?=base_url('potongan/pensiun')?>">Master Potongan Pensiun</a>

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-exchange-alt "></i>
          <span>Transaction</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?=base_url('absensi')?>">Transaction Absensi</a>
          <a class="dropdown-item" href="<?=base_url('penggajian')?>">Transaction Gaji</a>
        </div>
      </li>

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">