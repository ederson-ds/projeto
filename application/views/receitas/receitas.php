<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Nome da Receita</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receitas as $receita) { ?>
                <tr>
                    <td><?php echo $receita->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $receita->id); ?>
                        <?php echo deleteButton($receita->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->