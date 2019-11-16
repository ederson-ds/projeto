<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20%">Nome</th>
                <th style="width: 10%">CNPJ</th>
                <th style="width: 10%">INSC</th>
                <th style="width: 20%">Endereço</th>
                <th style="width: 10%">Tefefone</th>
                <th style="width: 10%">UF</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empresas as $empresa) { ?>
                <tr>
                    <td><?php echo $empresa->nome ?></td>
                    <td><?php echo $empresa->cnpj ?></td>
                    <td><?php echo $empresa->insc ?></td>
                    <td><?php echo $empresa->endereco ?></td>
                    <td><?php echo $empresa->telefone ?></td>
                    <td><?php echo EmpresasModel::$estadosUF[$empresa->uf] ?></td>
                    <td>
                        <?php echo editButton($controllerName, $empresa->id); ?>
                        <?php echo deleteButton($empresa->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->