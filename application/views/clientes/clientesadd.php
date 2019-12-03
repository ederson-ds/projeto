<input type="hidden" name="id" value="<?php echo $cliente->id ?>" />
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Tipo de cliente</label>
            <select class="form-control select2" name="tipo" style="width: 100%">
                <?php foreach ($tipoCliente as $i => $tipo) { ?>
                    <option <?php if ($cliente->tipo == $i) { ?> selected="selected" <?php } ?> value="<?php echo $i ?>"><?php echo $tipo ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome Fantasia</label>
            <input type="text" class="form-control" name="nomefantasia" value="<?php echo $cliente->nomefantasia ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $cliente->email ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Razão Social</label>
            <input type="razaosocial" class="form-control" name="razaosocial" value="<?php echo $cliente->razaosocial ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CPF</label>
            <input type="text" class="form-control" name="cpf" value="<?php echo $cliente->cpf ?>" />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>CNPJ</label>
            <input type="text" class="form-control" name="cnpj" value="<?php echo $cliente->cnpj ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Inscrição Estadual</label>
            <input type="inscricao_estadual" class="form-control" name="inscricao_estadual" value="<?php echo $cliente->inscricao_estadual ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <!-- checkbox -->
        <div class="form-group clearfix" style="padding-top: 20px;">
            <div class="icheck-primary d-inline">
                <input type="checkbox" name="status" id="checkbox" <?php echo ($cliente->status) ? 'checked' : '' ?>>
                <label for="checkbox">Status</label>
            </div>
        </div>
    </div>
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
    });
</script>