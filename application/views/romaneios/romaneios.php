<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20%">Nome do Operador</th>
                <th style="width: 20%">Cliente</th>
                <th style="width: 20%">Nº de Peças</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($romaneios as $romaneio) { ?>
                <tr>
                    <td><?php echo $romaneio->nome ?></td>
                    <td>
                        <?php foreach ($clientes as $cliente) {
                                if ($cliente->id == $romaneio->clientes_id) {
                                    echo $cliente->nomefantasia;
                                }
                            } ?>
                    </td>
                    <td>
                        <?php
                            $this->load->model('Romaneios_model');
                            echo $this->Romaneios_model->get_itemromaneio_num_pecas($romaneio->id)[0]->cont;
                            ?>
                    </td>
                    <td>
                        <?php echo editButton($controllerName, $romaneio->id); ?>
                        <?php echo deleteButton($romaneio->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->