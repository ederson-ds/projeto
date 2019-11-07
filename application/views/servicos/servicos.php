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
                <th style="width: 10%">Serviço</th>
                <th style="width: 10%">Especialidade</th>
                <th style="width: 20%">Valor</th>
                <th style="width: 20%">Valor Custo</th>
                <th style="width: 20%">Unidade</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico) { ?>
                <tr>
                    <td><?php echo $servico->nome ?></td>
                    <td>
                        <?php 
                            foreach($especialidades as $especialidade) {
                                if($servico->especialidade == $especialidade->id) {
                                    echo $especialidade->nome;
                                }
                            }
                        ?>
                    </td>
                    <td><?php echo Number::floatToNumber($servico->valor) ?></td>
                    <td><?php echo Number::floatToNumber($servico->valorcusto) ?></td>
                    <td>
                        <?php 
                            foreach($unidades as $unidade) {
                                if($servico->unidade == $unidade->id) {
                                    echo $unidade->nome;
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url() . $controllerName ?>/create/<?php echo $servico->id ?>" class="btn bg-secondary" style="width: 42px;"><i class="fas fa-edit"></i></a>
                        <button type="button" class="btn btn-default btn-excluir" id="<?php echo $servico->id ?>" data-toggle="modal" data-target="#modal-default"><i class="fas fa-trash-alt"></i></button>
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