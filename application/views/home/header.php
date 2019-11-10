<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Sistema Web</title>

        <!-- Font Awesome Icons -->
        <?php echo link_tag('./plugins/fontawesome-free/css/all.min.css'); ?>

        <!-- overlayScrollbars -->
        <?php echo link_tag('./plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>

        <!-- Theme style -->
        <?php echo link_tag('./dist/css/adminlte.min.css'); ?>

        <!-- Google Font: Source Sans Pro -->
        <?php echo link_tag('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700'); ?>

        <!-- Select2 -->
        <?php echo link_tag('./plugins/select2/css/select2.min.css'); ?>
        <?php echo link_tag('./plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>
        
        <!-- iCheck for checkboxes and radio inputs -->
        <?php echo link_tag('./plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js" ></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <!-- overlayScrollbars -->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js" ></script>
        <!-- AdminLTE App -->
        <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/adminlte.js" ></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mousewheel/jquery.mousewheel.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/raphael/raphael.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mapael/jquery.mapael.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mapael/maps/usa_states.min.js" ></script>
        <!-- ChartJS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js" ></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
        <!-- Jquery Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Painel Principal
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($files as $file) { ?>
                                        <?php if ($file['name'] != 'index.html' && $file['name'] != 'Home.php' && $file['name'] != 'Welcome.php') { ?>
                                            <li class="nav-item">
                                                
                                                <?php if($controllerName == removeAliasPHP($file['name'])) { ?>
                                                    <?php echo anchor(removeAliasPHP($file['name']), '<i class="far fa-circle nav-icon"></i><p>' . str_replace(".php", "", $file['name']) . '</p>', 'class="nav-link active"'); ?>
                                                <?php } else { ?>
                                                    <?php echo anchor(removeAliasPHP($file['name']), '<i class="far fa-circle nav-icon"></i><p>' . str_replace(".php", "", $file['name']) . '</p>', 'class="nav-link"'); ?>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </li>
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
                            <div class="col-sm-12">
                                <h1 class="m-0 text-dark"><?php echo ucfirst($controllerName) ?></h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->