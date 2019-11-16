<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 10%">Serviço</th>
                <th style="width: 10%">Especialidade</th>
                <th style="width: 20%;text-align: right;">Valor</th>
                <th style="width: 20%;text-align: right;">Valor Custo</th>
                <th style="width: 20%">Unidade</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico) { ?>
                <tr>
                    <td><?php echo $servico->nome ?></td>
                    <td>
                        <?php 
                            foreach($especialidades as $especialidade) {
                                if($servico->especialidade == $especialidade->id) {
                                    echo $especialidade->nome;
                                }
                            }
                        ?>
                    </td>
                    <td style="text-align: right;"><?php echo Number::floatToNumber($servico->valor) ?></td>
                    <td style="text-align: right;"><?php echo Number::floatToNumber($servico->valorcusto) ?></td>
                    <td>
                        <?php 
                            foreach($unidades as $unidade) {
                                if($servico->unidade == $unidade->id) {
                                    echo $unidade->nome;
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php echo editButton($controllerName, $servico->id); ?>
                        <?php echo deleteButton($servico->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->