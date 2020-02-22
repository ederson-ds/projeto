<input type="hidden" name="id" value="<?php echo $candidato->id ?>" />
<div class="row">
    <?php echo addInput(4, 'Nome', 'nome', $candidato->nome, 'required'); ?>
    <?php echo addInput(4, 'CEP', 'cep', $candidato->cep, 'required'); ?>
    <?php echo addInput(4, 'CPF', 'cpf', $candidato->cpf, 'required'); ?>
</div>
<div class="row">
    <?php echo addInput(4, 'Logradouro', 'logradouro', $candidato->logradouro, 'required'); ?>
    <?php echo addInput(4, 'N° de Identidade', 'identidade', $candidato->identidade, 'required'); ?>
    <?php echo addInput(4, 'N°', 'num', $candidato->num, 'required'); ?>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Orgão Expedidor</label>
            <select class="form-control select2" name="orgaoexpedidor" style="width: 100%">
                <?php foreach ($orgaoExpedidorList as $valor => $nome) { ?>
                    <option <?php if ($candidato->orgaoexpedidor == $valor) { ?> selected="selected" <?php } ?> value="<?php echo $valor ?>"><?php echo $nome ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Estado</label>
            <select class="form-control select2" name="estado" style="width: 100%">
                <?php foreach ($EstadosList as $valor => $nome) { ?>
                    <option <?php if ($candidato->estado == $valor) { ?> selected="selected" <?php } ?> value="<?php echo $valor ?>"><?php echo $nome ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <?php echo addInput(4, 'Data de Expedição', 'dataexpedicao', Date::isoToDateBR($candidato->dataexpedicao), 'required'); ?>
</div>
<div class="row">
    <?php echo addInput(4, 'Cidade', 'cidade', $candidato->cidade, 'required'); ?>
    <?php echo addInput(4, 'Nome da Mãe', 'nomemae', $candidato->nomemae, 'required'); ?>
    <?php echo addInput(4, 'Bairro', 'bairro', $candidato->bairro, 'required'); ?>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Sexo</label>
            <select class="form-control select2" name="sexo" style="width: 100%">
                <?php foreach ($sexoList as $valor => $nome) { ?>
                    <option <?php if ($candidato->sexo == $valor) { ?> selected="selected" <?php } ?> value="<?php echo $valor ?>"><?php echo $nome ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <?php echo addInput(4, 'Complemento', 'complemento', $candidato->complemento, 'required'); ?>
    <?php echo addInput(4, 'Data de Nascimento', 'datanasc', $candidato->datanasc, 'required'); ?>
</div>
<script>
    $(document).ready(function() {

        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $(".inputCurrency").mask('#.##0,00', {
            reverse: true
        });
        $("input[name='telefone']").mask('(00) 0000-00000');
        $("input[name='celular']").mask('(00) 0000-00000');
        $("input[name='cep']").mask('0#');
        $("input[name='cpf']").mask('000.000.000-00');
        $("input[name='cnpj']").mask('00.000.000/0000-00');
        $("input[name='peso[]']").mask('00,00');
        $("input[name='dataexpedicao']").mask('00/00/0000');
        $("input[name='datanasc']").mask('00/00/0000');

    });
</script>