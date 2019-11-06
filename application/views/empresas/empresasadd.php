<input type="hidden" name="id" value="<?php echo $empresa->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label>Nome da Empresa</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $empresa->nome ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CNPJ</label>
            <input type="text" class="form-control" name="cnpj" value="<?php echo $empresa->cnpj ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>INSC</label>
            <input type="text" class="form-control" name="insc" value="<?php echo $empresa->insc ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo $empresa->endereco ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" class="form-control" name="cidade" value="<?php echo $empresa->cidade ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>UF</label>
            <select class="form-control select2" name="uf" style="width: 100%">
                <?php foreach ($estadosUF as $valor => $nome) { ?>
                    <option <?php if ($empresa->uf == $valor) { ?>
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
            <input type="text" class="form-control" name="cep" value="<?php echo $empresa->cep ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo $empresa->telefone ?>"/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $empresa->email ?>"/>
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
        $("input[name='cep']").mask('0#');
        $("input[name='cnpj']").mask('00.000.000/0000-00', {reverse: true});
    });

</script>