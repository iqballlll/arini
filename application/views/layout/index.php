<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />


    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- jQuery -->
    <script src="<?= base_url('assets/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/adminlte/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/'); ?>js/toastr.min.js"></script>

    <link href="<?php echo base_url('assets/'); ?>css/toastr.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        Arini Robotic <i class="far fa-user"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">
                            <h6>Login Sebagai : Arini Robotik</h6>
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i>Profil
                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer bg-danger">LOGOUT</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?= base_url('assets/adminlte/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ARINI ROBOTIC</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu bg-primary">
                            <a href="<?= base_url('monitoring'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Monitoring</p>
                            </a>
                        </li>
                        <li class="nav-item menu bg-danger">
                            <a href="<?= base_url('pasien'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Pasien</p>
                            </a>
                        </li>
                        <li class="nav-item menu bg-warning">
                            <a href="<?= base_url('perawat'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-md"></i>
                                <p>Perawat</p>
                            </a>
                        </li>
                        <li class="nav-item menu bg-info">
                            <a href="<?= base_url('ruangan'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-hospital"></i>
                                <p>Ruangan</p>
                            </a>
                        </li>
                        <li class="nav-item menu bg-light">
                            <a href="<?= base_url('jadwal'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <?php $this->load->view($view) ?>

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <?php if (isset($_SESSION['ntf_toastr'])) { ?>
                <script type="text/javascript">
                    toastr.options.closeButton = true;
                    toastr.<?= $_SESSION['clr_toastr'] ?>('<?= $_SESSION['ctn_toastr'] ?>', '<?= $_SESSION['hed_toastr'] ?>')
                </script>
            <?php  } ?>
            <!-- /.content -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0-rc
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- overlayScrollbars -->
    <script src="<?= base_url('assets/adminlte/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.js"></script>

</body>

</html>