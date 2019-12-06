<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Tipo de Fio</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fios as $fio) { ?>
                <tr>
                    <td><?php echo $fio->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $fio->id); ?>
                        <?php echo deleteButton($fio->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->