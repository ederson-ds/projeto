<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 10%">Código</th>
                <th style="width: 20%">Nome</th>
                <th style="width: 20%">EAN</th>
                <th style="width: 10%">Aquisição</th>
                <th style="width: 10%;text-align: right;">Custo Médio</th>
                <th style="width: 10%;text-align: right;">Lucro</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?php echo $produto->codigo ?></td>
                    <td><?php echo $produto->nome ?></td>
                    <td><?php echo $produto->ean ?></td>
                    <td><?php echo ProdutosModel::$tipoAquisicao[$produto->aquisicao]; ?></td>
                    <td style="text-align: right;"><?php echo Number::floatToNumber($produto->customedio); ?></td>
                    <td style="text-align: right;"><?php echo Number::floatToNumber($produto->lucro); ?></td>
                    <td>
                        <?php echo editButton($controllerName, $produto->id); ?>
                        <?php echo deleteButton($produto->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->