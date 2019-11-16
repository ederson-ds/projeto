<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20%">Data</th>
                <th style="width: 20%;text-align: right;padding-right: 5% !important;">Valor</th>
                <th style="width: 30%">Descrição</th>
                <th style="width: 10%">Status</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contasAPagar as $conta) { ?>
                <tr>
                    <td><?php echo Date::isoToDateBR($conta->data) ?></td>
                    <td style="text-align: right;padding-right: 5% !important;"><?php echo Number::floatToNumber($conta->valor) ?></td>
                    <td><?php echo $conta->descricao ?></td>
                    <td><?php echo ContasAPagarModel::$tipostatus[$conta->status] ?></td>
                    <td>
                        <?php echo editButton($controllerName, $conta->id); ?>
                        <?php echo deleteButton($conta->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->