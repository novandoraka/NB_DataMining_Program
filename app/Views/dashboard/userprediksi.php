<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRONAYES | Prediksi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <!-- <img src="AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <span class="brand-text font-weight-light">PRONAYES</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/user2" class="nav-link">Prediksi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Admin</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="/admin" class="dropdown-item">Login</a></li>

                                <!-- Level two dropdown-->

                                <!-- Level three dropdown-->

                                <!-- End Level three -->


                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <!-- <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                </div>

                <!-- Right navbar links -->

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="card card-default">
                <div class="card-header">
                    <h1 class="card-title"><b>Masukkan Kriteria UMKM</b></h1>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group col-md-10">
                                <!-- <label>Multiple</label>
                                <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select> -->
                                <form action="Home/NaiveUser" method="Post" class="form-group">
                                    <div class="form-group">
                                        <label>Pengelolahan Usaha</label>
                                        <select name="kls" class="form-control select2" style="width: 100%;">
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
                                        <select name="jusaha" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" disabled>--Pilih Jenis Bidang Usaha--</option>
                                            <option value="makanan">Makanan</option>
                                            <option value="barang">Barang</option>
                                            <option value="jasa">Jasa</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Tenaga Kerja</label>
                                        <input name="JTK" type="input" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Tenaga Kerja">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Luas Bangunan (m2)</label>
                                        <input name="LB" type="input" class="form-control" id="exampleInputEmail1" placeholder="Luas Bangunan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Omset</label>
                                        <input name="omset" type="input" class="form-control" id="exampleInputEmail1" placeholder="Omset">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tahun Berdiri</label>
                                        <input name="TH" type="input" class="form-control" id="" placeholder="Tahun Berdiri">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <button type="submit" class="btn btn-block btn-info"><i class="fa-sharp fa-solid fa-microchip"></i> Prediksi</button>
                                    </div>
                                    <!-- /.form-group -->
                                </form>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <!-- <label>Disabled Result</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Alabama</option>
                                    <option>Alaska</option>
                                    <option disabled="disabled">California (disabled)</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select> -->
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <img src="AdminLTE/dist/img/vektor.jpg" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- <h5>Custom Color Variants</h5> -->
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <!-- <label>Minimal (.select2-danger)</label>
                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option selected="selected">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select> -->
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <!-- <label>Multiple (.select2-purple)</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div> -->
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                    the plugin.
                </div> -->
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- <div class="float-right d-none d-sm-inline">
                Anything you want
            </div> -->
            <!-- Default to the left -->
            <center> <strong>Copyright &copy; 2023 <a href="#">NovandoRaka</a>.</strong></center>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="AdminLTE/dist/js/demo.js"></script> -->
</body>

</html>