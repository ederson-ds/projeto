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