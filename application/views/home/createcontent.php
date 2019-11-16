<style>
.form-control, .select2-selection {
    border-radius: 0px !important;
    border-color: #8e8e8e !important;
}
label {
    margin: 0;
}

.table td, .table th {
    border-color: #8e8e8e !important;
}

</style>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!-- /.card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <form role="form" action="<?php echo base_url() . $controllerName ?>/create<?php echo (isset($id) ? '/'.$id : '') ?>" method="post">