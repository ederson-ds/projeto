<input type="hidden" name="id" value="<?php echo $tela->id ?>"/>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Nome da Tela (Sidebar)</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $tela->nome ?>" required/>
        </div>
    </div>
    <div class="col-sm-2">
        <!-- checkbox -->
        <div class="form-group clearfix" style="padding-top: 38px;">
            <div class="icheck-primary d-inline">
                <input type="checkbox" name="arvorecheckbox" id="checkbox" <?php echo (!$tela->arvore) ? 'checked' : '' ?>>
                <label for="checkbox">Árvore</label>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label>Icone</label>
            <input type="text" class="form-control" name="icone" value="<?php echo $tela->icone ?>" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4" id='paineis'>
        <div class="form-group">
            <label>Árvores</label>
            <select class="form-control select2" name="arvore" style="width: 100%">
                <?php foreach ($arvores as $arvore) { ?>
                    <option <?php if ($tela->id == $arvore->id) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo $arvore->id ?>"><?php echo $arvore->nome ?></option>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-4" id='files'>
        <div class="form-group">
            <label>Controller</label>
            <select class="form-control select2" name="controller" style="width: 100%">
                <?php foreach ($files as $i => $file) { ?>
                    <option <?php if ($tela->controller == $i) { ?>
                            selected="selected"
                        <?php } ?> value="<?php echo removeAliasPHP($file['name']) ?>"><?php echo ucfirst(removeAliasPHP($file['name'])) ?></option>
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

        if($("input[name='arvorecheckbox']").attr('checked')) {
            $('#files, #paineis').hide();
        }
        $("input[name='arvorecheckbox']").change(function (e) {
            if($('#files').is(":visible")) {
                $('#files, #paineis').hide();
            } else {
                $('#files, #paineis').show();
            }
        });
    });

</script>