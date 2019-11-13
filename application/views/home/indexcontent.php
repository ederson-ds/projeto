<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if (!isset($header)) { ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <!-- Reload button -->
                        <a href="<?php echo base_url() . $controllerName ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>

                        <div class="card-tools" style="margin-top: 5px;">

                            <div class="input-group input-group-sm" style="width: 230px; height: 38px;">
                                <input type="text" id="input-table_search" class="form-control float-right" placeholder="Pesquisar" style="height: 38px;">

                                <div class="input-group-append">
                                    <a href="<?php echo base_url() . $controllerName ?>/index" id="search_button" class="btn btn-default"><i class="fas fa-search" style="margin-top: 7px;"></i></a>
                                    <a href="<?php echo base_url() . $controllerName ?>/create" class="btn btn-primary" style="width: 50px;"><i class="fas fa-plus" style="margin-top: 7px;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php } ?>
                    <style>
                        table td, th {
                            padding: 5px !important;
                        }
                    </style>
                    <script>
                        $(document).ready(function () {
                            // Atualizar pesquisar
                            // #table_search = pertence ao indexcontent.php
                            $('#input-table_search').change(function () {
                                changeButtonHref();
                            });

                            $('#input-table_search').keyup(function (e) {
                                changeButtonHref();
                                if (e.keyCode == 13)
                                {
                                    $("#search_button")[0].click();
                                }
                            });

                            function changeButtonHref() {
                                var _href = $('#search_button').attr("href");
                                _href = _href.replace(/\/index.*/g, '/index');
                                $('#search_button').attr("href", _href + '/' + $('#input-table_search').val());
                            }
                        });
                    </script>