<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/fontawesome-free-621/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link href="<?php echo base_url(''); ?>/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- dropzonejs -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>/AdminLTE/plugins/bs-stepper/css/bs-stepper.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a> -->
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a> -->
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link" role="button">
                        <i class="fa-solid fa-right-from-bracket"></i> <b>Logout</b>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <!-- <img src="AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light ml-3">ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Naive Bayes Classifer</a>
                    </div>
                </div> -->

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-header">MENU SISTEM</li>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <i class="fa-solid fa-gauge-high"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dataset" class="nav-link active">
                                <i class="fa-sharp fa-solid fa-database"></i>
                                <p>Data Training</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/transformasi" class="nav-link">
                                <i class="fa-solid fa-code-compare"></i>
                                <p>Diskritisasi Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/predictions" class="nav-link">
                                <i class="fa-solid fa-user-astronaut"></i>
                                <p>Prediksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/performance" class="nav-link">
                                <i class="fa-solid fa-circle-nodes"></i>
                                <p>Performa</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-laptop-code"></i>
                                <p>
                                    Menu Sistem
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/" class="nav-link">
                                        <i class="fa-solid fa-gauge-high"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/dataset" class="nav-link active">
                                        <i class="fa-sharp fa-solid fa-database"></i>
                                        <p>Data Training</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/transformasi" class="nav-link">
                                        <i class="fa-solid fa-code-compare"></i>
                                        <p>Transformasi Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/performance" class="nav-link">
                                        <i class="fa-solid fa-circle-nodes"></i>
                                        <p>Performance</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/predictions" class="nav-link">
                                        <i class="fa-solid fa-user-astronaut"></i>
                                        <p>Predictions</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dataset</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upload Dataset</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <a href="<?= base_url('template.xlsx') ?>">Example Format Excel</a>
                                <?php
                                echo form_open_multipart('Home/import');
                                ?>
                                <div class="mb-3">
                                    <!-- <label>Upload dataset</label> -->
                                    <input class="form-control" type="file" name="file_excel" accept=".xls,.xlsx">
                                </div>
                                <button type="submit" class="btn btn-block btn-info mb-3 col-sm-5"><i class="fa-sharp fa-solid fa-upload"></i> Import Data</button>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="col">
                            </div>
                            <form action="" class="col-sm-2">
                                <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa-solid fa-square-plus"></i> Tambah Data
                                </button>
                                <!-- <button type="button" class="btn btn-block btn-primary col-sm-12"><i class="fa-solid fa-square-plus"></i> Tambah Data</button> -->
                            </form>
                            <form action="" class="col-sm-2">
                                <button type="button" class="btn btn-danger col-sm-12" data-toggle="modal" data-target="#exampleModal1">
                                    <i class="fa-solid fa-trash-can"></i> Hapus Data
                                </button>
                                <!-- <button type="submit" class="btn btn-block btn-danger col-sm-12"><i class="fa-solid fa-trash-can"></i> Hapus Data</button> -->
                            </form>
                        </div>
                    </div>

                    <!-- <button type="button" class="btn btn-block btn-success col-sm-2 mb-3">Import Excel</button> -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengelolahan Usaha</th>
                                <th>Jenis Usaha</th>
                                <th>Jumlah Tenaga Kerja</th>
                                <th>Luas Bangunan (m2)</th>
                                <th>Omset</th>
                                <th>Tahun Berdiri</th>
                                <th>Keputusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($tampildata as $row) :
                            ?>
                                <tr>
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $row['pengelolahanusaha']; ?></td>
                                    <td><?= $row['jenisusaha']; ?></td>
                                    <td><?= $row['jumlahtenagakerja']; ?></td>
                                    <td><?= $row['luasbangunan']; ?></td>
                                    <td><?= $row['omset']; ?></td>
                                    <td><?= $row['tahunberdiri']; ?></td>
                                    <td><?= $row['keputusan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- <center><button type="submit" class="btn btn-block btn-info col-sm-2 mb-3">Transformasi Data</button></center> -->
                <!-- /.card-body -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">NovandoRaka</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.2.0 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/Home/tambahData" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pengelolahan Usaha</label>
                            <select name="kelas" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>--Pilih Golongan Kelas Pengelolahan Usaha--</option>
                                <option value="kelas 1">Kelas 1</option>
                                <option value="kelas 2">Kelas 2</option>
                                <option value="kelas 3">Kelas 3</option>
                                <option value="kelas 4">Kelas 4</option>
                                <option value="kelas 5">Kelas 5</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Jenis Usaha</label>
                            <select name="jenis" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>--Pilih Jenis Bidang Usaha--</option>
                                <option value="makanan">Makanan</option>
                                <option value="barang">Barang</option>
                                <option value="jasa">Jasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Tenaga Kerja</label>
                            <input name="pegawai" type="input" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Tenaga Kerja">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Luas Bangunan (m2)</label>
                            <input name="luas" type="input" class="form-control" id="exampleInputEmail1" placeholder="Luas Bangunan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Omset</label>
                            <input name="omset" type="input" class="form-control" id="exampleInputEmail1" placeholder="Omset">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tahun Berdiri</label>
                            <input name="berdiri" type="input" class="form-control" id="" placeholder="Tahun Berdiri">
                        </div>
                        <div class="form-group">
                            <label>Jenis Usaha</label>
                            <select name="keputusan" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Keputusan</option>
                                <option value="Layak">Layak</option>
                                <option value="Tidak Layak">Tidak Layak</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Training ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/hapus">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ya, konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="AdminLTE/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url(''); ?>/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>