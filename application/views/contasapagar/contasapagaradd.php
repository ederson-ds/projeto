<input type="hidden" name="id" value="<?php echo $contasAPagar->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Descrição</label>
            <input type="text" class="form-control" name="descricao" value="<?php echo $contasAPagar->descricao ?>" required/>
        </div>
    </div>  
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Data</label>
            <input type="date" class="form-control" name="data" value="<?php echo $contasAPagar->data ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Valor</label>
            <input type="text" class="form-control inputCurrency" name="valor" value="<?php echo Number::floatToNumber($contasAPagar->valor) ?>" required/>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Status</label>
            <select class="form-control select2" name="status" style="width: 100%">
                <?php foreach ($statusContasAPagar as $i => $status) { ?>
                    <option <?php if ($contasAPagar->status == $i) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $i ?>"><?php echo $status ?></option>
                    <?php } ?>
            </select>
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