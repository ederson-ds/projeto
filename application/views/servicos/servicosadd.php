<input type="hidden" name="id" value="<?php echo $servico->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Unidade</label>
            <select class="form-control select2" name="unidade" style="width: 100%">
                <?php foreach ($unidades as $unidade) { ?>
                    <option <?php if ($servico->unidade == $unidade->id) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $unidade->id ?>"><?php echo $unidade->nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome do Serviço</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $servico->nome ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Especialidade</label>
            <select class="form-control select2" name="especialidade" style="width: 100%">
                <?php foreach ($especialidades as $especialidade) { ?>
                    <option <?php if ($servico->especialidade == $especialidade->id) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $especialidade->id ?>"><?php echo $especialidade->nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Valor</label>
            <input type="text" class="form-control inputCurrency" name="valor" value="<?php echo Number::floatToNumber($servico->valor) ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Valor Custo</label>
            <input type="text" class="form-control inputCurrency" name="valorcusto" value="<?php echo Number::floatToNumber($servico->valorcusto) ?>" required/>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {

        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $(".inputCurrency").mask('#.##0,00', {reverse: true});
        $("input[name='telefone']").mask('(00) 0000-00000');
        $("input[name='celular']").mask('(00) 0000-00000');
        $("input[name='cep']").mask('0#');
        $("input[name='cnpj']").mask('00.000.000/0000-00', {reverse: true});
    });

</script>