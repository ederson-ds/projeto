<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 15%">Data do Lançamento</th>
                <th style="width: 20%">Classificação</th>
                <th style="width: 20%">Valor</th>
                <th style="width: 20%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $CI = &get_instance();
            $CI->load->model('receitas_model');
            $CI->load->model('despesas_model');
            foreach ($lancamentos as $lancamento) { ?>
                <tr>
                    <td><?php echo Date::isoToDateBR($lancamento->data) ?></td>
                    <td>
                        <?php
                            if ($lancamento->tipo == Lancamentos_model::TIPO_RECEITA) { ?>
                            <span class="badge bg-success"><?php echo $CI->receitas_model->get($lancamento->receitas_despesas_id)->nome; ?></span>
                        <?php } else if ($lancamento->tipo == Lancamentos_model::TIPO_DESPESA) { ?>
                            <span class="badge bg-danger"><?php echo $CI->despesas_model->get($lancamento->receitas_despesas_id)->nome; ?></span>
                        <?php } ?>
                    </td>
                    <td><?php echo Number::floatToNumber($lancamento->valor); ?></td>
                    <td>
                        <?php echo editButton($controllerName, $lancamento->id); ?>
                        <?php echo deleteButton($lancamento->id); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!-- /.card-body -->