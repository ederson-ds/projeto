<style>
    table td {
        padding: 5px !important;
    }
</style>

<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20%">Nome</th>
                <th style="width: 10%">CNPJ</th>
                <th style="width: 10%">INSC</th>
                <th style="width: 20%">Endereço</th>
                <th style="width: 10%">Tefefone</th>
                <th style="width: 10%">UF</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa) { ?>
                <tr>
                    <td><?php echo $empresa->nome ?></td>
                    <td><?php echo $empresa->cnpj ?></td>
                    <td><?php echo $empresa->insc ?></td>
                    <td><?php echo $empresa->endereco ?></td>
                    <td><?php echo $empresa->telefone ?></td>
                    <td><?php echo EmpresasModel::$estadosUF[$empresa->uf] ?></td>
                    <td>
                        <a href="<?php echo base_url() . $controllerName ?>/create/<?php echo $empresa->id ?>" class="btn bg-secondary" style="width: 42px;"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-default btn-excluir" id="<?php echo $empresa->id ?>" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Solicitação de exclusão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                <a href="#" id="modal-delete-yes" class="btn btn-primary">Sim</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>

    $(document).ready(function () {
        $('.btn-excluir').click(function () {
            var controllerName = '<?php echo $controllerName; ?>';
            var baseUrl = '<?php echo base_url(); ?>';
            $('#modal-delete-yes').attr("href", baseUrl + controllerName + "/delete/" + $(this).attr('id'));
        });
    });

</script>