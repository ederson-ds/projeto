<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Nome da Despesa</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($despesas as $despesa) { ?>
                <tr>
                    <td><?php echo $despesa->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $despesa->id); ?>
                        <?php echo deleteButton($despesa->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->