<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Tipo de Tecido</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tecidos as $tecido) { ?>
                <tr>
                    <td><?php echo $tecido->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $tecido->id); ?>
                        <?php echo deleteButton($tecido->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->