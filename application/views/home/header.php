<!DOCTYPE html>
<html ng-app="myApp">

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
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script type="text/javascript" src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/raphael/raphael.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- Jquery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-messages/1.7.9/angular-messages.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/i18n/angular-locale_pt-br.js"></script>

    <script src="dist/js/app.js?v=<?php echo time() ?>"></script>
    <script src="dist/js/config/routeConfig.js?v=<?php echo time() ?>"></script>

    <script src="dist/js/controllers/telasCtrl.js?v=<?php echo time() ?>"></script>
    <script src="dist/js/controllers/produtosCtrl.js?v=<?php echo time() ?>"></script>
    <script src="dist/js/controllers/candidatosCtrl.js?v=<?php echo time() ?>"></script>
    <script src="dist/js/controllers/acoesCtrl.js?v=<?php echo time() ?>"></script>

    <style>
        .required:after {
            content: " *";
            color: red;
        }
        .table td, .table th {
            padding: 0;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper" ng-controller="telasCtrl">
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
            <a href="<?php echo base_url(); ?>#home" class="brand-link">
                <img src="<?php echo base_url(); ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AlignSim</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                        <div ng-repeat="painel in telas">

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link painel">
                                    <i class="nav-icon {{painel.icone}}" style="margin-right: 7px;width: 14px;text-align: center;"></i>
                                    <p>
                                        {{painel.nome}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul ng-repeat="tela in painel.tela" class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#{{tela.controller}}" class="nav-link" ng-class="changeMenu('{{tela.controller}}')">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{tela.nome}}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>              
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{getTelaName()}}</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            
                <div ng-view></div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            Versão 1.0
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>