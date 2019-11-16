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
            <?php foreach ($especialidades as $especialidade) { ?>
                <tr>
                    <td><?php echo $especialidade->id ?></td>
                    <td><?php echo $especialidade->nome ?></td>
                    <td><?php echo Date::isoToDateBR($especialidade->datacadastro) ?></td>
                    <td>
                        <?php echo editButton($controllerName, $especialidade->id); ?>
                        <?php echo deleteButton($especialidade->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->