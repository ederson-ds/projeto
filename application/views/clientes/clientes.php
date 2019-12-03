<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20%">Tipo Cliente</th>
                <th style="width: 20%">Nome Fantasia</th>
                <th style="width: 10%">CPF</th>
                <th style="width: 10%">CNPJ</th>
                <th style="width: 10%">Razão Social</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php echo ClientesModel::$tipoCliente[$cliente->tipo] ?></td>
                    <td><?php echo $cliente->nomefantasia ?></td>
                    <td><?php echo $cliente->cpf ?></td>
                    <td><?php echo $cliente->cnpj ?></td>
                    <td><?php echo $cliente->razaosocial ?></td>
                    <td>
                        <?php echo editButton($controllerName, $cliente->id); ?>
                        <?php echo deleteButton($cliente->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->