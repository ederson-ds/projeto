<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo ucfirst($controllerName) ?></h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <form role="form" action="<?php echo base_url() . $controllerName ?>/create<?php echo (isset($id) ? '/'.$id : '') ?>" method="post">