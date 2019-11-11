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
                <th style="width: 20%">Cod</th>
                <th style="width: 30%">Unidade</th>
                <th style="width: 30%">Data Cadastro</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($unidades as $unidade) { ?>
                <tr>
                    <td><?php echo $unidade->id ?></td>
                    <td><?php echo $unidade->nome ?></td>
                    <td><?php echo Date::isoToDateBR($unidade->datacadastro) ?></td>
                    <td>
                        <?php echo editButton($controllerName, $unidade->id); ?>
                        <?php echo deleteButton($unidade->id); ?>
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