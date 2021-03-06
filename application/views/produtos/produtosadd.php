<div class="card">
    <!-- /.card-header -->
    <form ng-submit="submitForm(produto)">
        <div class="card-body">
            <input type="hidden" name="id" ng-model="produto.id" />
            <div class="row">
                <div class="col-sm-4">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" class="form-control" name="codigo" ng-model="produto.codigo" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" ng-model="produto.nome" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>EAN</label>
                        <input type="text" class="form-control" name="ean" ng-model="produto.ean" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Aquisição</label>
                        <select class="form-control select2" ng-model="produto.aquisicao" ng-options="aquisicao.id as aquisicao.nome for aquisicao in aquisicoes" style="width: 100%"></select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Custo Médio</label>
                        <input type="text" class="form-control" name="customedio" ng-model="produto.customedio" money-mask required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Lucro</label>
                        <input type="text" class="form-control" name="lucro" ng-model="produto.lucro" money-mask required />
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{controllerUrl}}" class="btn btn-outline-secondary btn-lg">Voltar</a>
            <input type="submit" class="btn btn-outline-success btn-lg" style="width: 170px;" value="Enviar">
        </div>
    </form>
</div>
<!-- /.card -->

<script>
    $(document).ready(function() {

        $('.select2').select2({
            theme: 'bootstrap4'
        });
    });
</script>