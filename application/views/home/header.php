
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
                <a href="<?php echo base_url(); ?>home" class="brand-link">
                    <img src="<?php echo base_url(); ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">AlignSim</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->

                            <?php 
                            
                            foreach ($this->telasModel->get_arvores() as $arvore) {?>
                                <li class="nav-item has-treeview <?php echo Arvore::getArvoreActive($controllerName, $arvore, $this->telasModel, 'menu-open') ?>">
                                    <a href="#" class="nav-link <?php echo Arvore::getArvoreActive($controllerName, $arvore, $this->telasModel, 'active') ?>">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            <?php echo $arvore->nome ?>
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                    <?php foreach ($this->telasModel->get_folhas($arvore->id) as $folha) { ?>
                                        <li class="nav-item">
                                            <a href="<?php foreach ($files as $i => $file) { ?>
                                                <?php if ($folha->tela == $i) { ?>
                                                    <?php echo base_url() . removeAliasPHP($file['name']) ?>
                                                <?php } ?>
                                            <?php } ?>" class="nav-link <?php echo Arvore::getFolhaActive($controllerName, $folha, $this->telasModel, 'active') ?>">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?php echo $folha->nome ?></p>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </li>
                                </ul>
                                <?php } ?>
                                
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