<input type="hidden" name="id" value="<?php echo $lancamento->id ?>" />
<div class="row">
    <?php echo addInput(4, 'Data do Lançamento', 'data', Date::isoToDateBR($lancamento->data), 'required'); ?>
    <?php echo addInput(3, 'Valor', 'valor', Number::floatToNumber($lancamento->valor), 'required'); ?>
</div>
<div class="row">
    <div class="col-sm-3">
        <!-- radio -->
        <div class="form-group clearfix">
            <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary1" name="tipo" value="1" <?php echo ($lancamento->tipo == Lancamentos_model::TIPO_RECEITA || !$lancamento->id ? 'checked' : '') ?>>
                <label for="radioPrimary1"> Receita</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="radioPrimary2" name="tipo" value="2" <?php echo ($lancamento->tipo == Lancamentos_model::TIPO_DESPESA ? 'checked' : '') ?>>
                <label for="radioPrimary2"> Despesa</label>
            </div>
        </div>
    </div>
    <div class="col-sm-4" id="receitas">
        <div class="form-group">
            <label>Receitas</label>
            <select class="form-control select2" name="receitas_id" style="width: 100%">
                <?php foreach ($receitas as $receita) { ?>
                    <option <?php if ($lancamento->receitas_despesas_id == $receita->id) { ?> selected="selected" <?php } ?> value="<?php echo $receita->id ?>"><?php echo $receita->nome ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4" id="despesas" style="display: none;">
        <div class="form-group">
            <label>Despesas</label>
            <select class="form-control select2" name="despesas_id" style="width: 100%">
                <?php foreach ($despesas as $despesa) { ?>
                    <option <?php if ($lancamento->receitas_despesas_id == $despesa->id) { ?> selected="selected" <?php } ?> value="<?php echo $despesa->id ?>"><?php echo $despesa->nome ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $("input[name='valor']").mask('#.##0,00', {
            reverse: true
        });
        $("input[name='telefone']").mask('(00) 0000-00000');
        $("input[name='celular']").mask('(00) 0000-00000');
        $("input[name='cep']").mask('0#');
        $("input[name='cpf']").mask('000.000.000-00');
        $("input[name='cnpj']").mask('00.000.000/0000-00');
        $("input[name='data']").mask('00/00/0000');

        if ($("input[name='tipo']").attr('checked')) {
            $('#despesas').hide();
            $('#receitas').show();
        } else {
            $('#despesas').show();
            $('#receitas').hide();
        }

        $("input[name='tipo']").change(function(e) {
            if ($(this).val() == 1) {
                $('#despesas').hide();
                $('#receitas').show();
            } else {
                $('#despesas').show();
                $('#receitas').hide();
            }
        });
    });
</script>