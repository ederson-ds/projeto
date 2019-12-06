<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 80%">Nome do Operador</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($operadores as $operador) { ?>
                <tr>
                    <td><?php echo $operador->nome ?></td>
                    <td>
                        <?php echo editButton($controllerName, $operador->id); ?>
                        <?php echo deleteButton($operador->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->