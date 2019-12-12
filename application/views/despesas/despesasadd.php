<input type="hidden" name="id" value="<?php echo $despesa->id ?>" />
<div class="row">
    <?php echo addInput(4, 'Nome da Despesa', 'nome', $despesa->nome, 'required'); ?>
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
    });
</script>