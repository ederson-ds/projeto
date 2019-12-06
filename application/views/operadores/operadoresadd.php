<input type="hidden" name="id" value="<?php echo $operador->id ?>" />
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome do Operador</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $operador->nome ?>" required/>
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