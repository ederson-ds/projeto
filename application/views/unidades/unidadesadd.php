<input type="hidden" name="id" value="<?php echo $unidade->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Empresa</label>
            <select class="form-control select2" name="empresa" style="width: 100%">
                <?php foreach ($empresas as $empresa) { ?>
                    <option <?php if ($unidade->empresa == $empresa->id) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $empresa->id ?>"><?php echo $empresa->nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome Unidade</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $unidade->nome ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Prefixo da Unidade</label>
            <input type="text" class="form-control" name="prefixo" value="<?php echo $unidade->prefixo ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo $unidade->endereco ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" class="form-control" name="cidade" value="<?php echo $unidade->cidade ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>UF</label>
            <select class="form-control select2" name="uf" style="width: 100%">
                <?php foreach ($estadosUF as $valor => $nome) { ?>
                    <option <?php if ($unidade->uf == $valor) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $valor ?>"><?php echo $nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>CEP</label>
            <input type="text" class="form-control" name="cep" value="<?php echo $unidade->cep ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $unidade->telefone ?>"/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Celular</label>
            <input type="text" class="form-control" name="celular" value="<?php echo $unidade->celular ?>"/>
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