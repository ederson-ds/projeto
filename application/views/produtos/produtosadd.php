<input type="hidden" name="id" value="<?php echo $produto->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label>Código</label>
            <input type="text" class="form-control" name="codigo" value="<?php echo $produto->codigo ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $produto->nome ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>EAN</label>
            <input type="text" class="form-control" name="ean" value="<?php echo $produto->ean ?>" required/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Aquisição</label>
            <select class="form-control select2" name="aquisicao" style="width: 100%">
                <?php foreach ($tipoAquisicao as $valor => $nome) { ?>
                    <option <?php if ($produto->aquisicao == $valor) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $valor ?>"><?php echo $nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Custo Médio</label>
            <input type="text" class="form-control inputCurrency" name="customedio" id="customedio" value="<?php echo Number::floatToNumber($produto->customedio) ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Lucro</label>
            <input type="text" class="form-control inputCurrency" name="lucro" value="<?php echo Number::floatToNumber($produto->lucro) ?>" required/>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        $('.select2').select2({
            theme: 'bootstrap4'
        });

        $(".inputCurrency").mask('#.##0,00', {reverse: true});
    });

</script>