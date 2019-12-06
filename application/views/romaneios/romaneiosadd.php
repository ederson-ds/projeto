<input type="hidden" name="id" value="<?php echo $romaneio->id ?>" />
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome do Romaneio</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $romaneio->nome ?>" required />
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Cliente</label>
            <select class="form-control select2" name="clientes_id" style="width: 100%">
                <?php foreach ($clientes as $cliente) { ?>
                    <option <?php if ($romaneio->clientes_id == $cliente->id) { ?> selected="selected" <?php } ?> value="<?php echo $cliente->id ?>"><?php echo $cliente->nomefantasia ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div id="pecas">

    <?php foreach ($itensromaneio as $i => $itemromaneio) { ?>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <?php if ($i == 0) { ?>
                        <label>Nº</label>
                    <?php } ?>
                    <input type="text" class="form-control" name="num_peca[]" value="<?php echo $itemromaneio->num_peca ?>" />
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?php if ($i == 0) { ?>
                        <label>MAQ.</label>
                    <?php } ?>
                    <select class="form-control select2" name="maquinas_id[]" style="width: 100%">
                        <?php foreach ($maquinas as $maquina) { ?>
                            <option <?php if ($itemromaneio->maquinas_id == $maquina->id) { ?> selected="selected" <?php } ?> value="<?php echo $maquina->id ?>"><?php echo $maquina->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?php if ($i == 0) { ?>
                        <label>kg.</label>
                    <?php } ?>
                    <input type="text" class="form-control" name="peso[]" value="<?php echo $itemromaneio->peso ?>" />
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <?php if (!$romaneio->id) { ?>
                    <label>Nº</label>
                <?php } ?>
                <input type="text" class="form-control" name="num_peca[]" />
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <?php if (!$romaneio->id) { ?>
                    <label>MAQ.</label>
                <?php } ?>
                <select class="form-control select2" name="maquinas_id[]" style="width: 100%">
                    <?php foreach ($maquinas as $maquina) { ?>
                        <option value="<?php echo $maquina->id ?>"><?php echo $maquina->nome ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <?php if (!$romaneio->id) { ?>
                    <label>kg.</label>
                <?php } ?>
                <input type="text" class="form-control" name="peso[]" />
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
        $("input[name='peso[]']").mask('00,00');

        addKeyUp();

        function addKeyUp() {
            $("#pecas .row").last().find("input[name='peso[]']").keyup(function() {
                if ($(this).val().length == 5) {
                    $(this).unbind("keyup");
                    $("#pecas").append(`
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="num_peca[]" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control select2" name="maquinas_id[]" style="width: 100%">
                                        <?php foreach ($maquinas as $maquina) { ?>
                                            <option value="<?php echo $maquina->id ?>"><?php echo $maquina->nome ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="peso[]" />
                                </div>
                            </div>
                        </div>
                    `);

                    $('.select2').select2({
                        theme: 'bootstrap4'
                    });
                    $("input[name='peso[]']").mask('00,00');
                    $("#pecas .row").last().find("input[name='num_peca[]']").focus();
                    addKeyUp();
                }
            });
        }


    });
</script>