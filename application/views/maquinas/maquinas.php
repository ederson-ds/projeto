<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Nome da Máquina</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($maquinas as $maquina) { ?>
                <tr>
                    <td><?php echo $maquina->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $maquina->id); ?>
                        <?php echo deleteButton($maquina->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->