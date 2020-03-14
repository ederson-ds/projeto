<div class="card">
    <!-- /.card-header -->
    <form ng-submit="submitForm(candidato)">
        <div class="card-body">
            <input type="hidden" name="id" ng-model="candidato.id" />
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" ng-model="candidato.nome" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" class="form-control" name="cep" ng-model="candidato.cep" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpf" ng-model="candidato.cpf" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" ng-model="candidato.logradouro" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>N° de Identidade</label>
                        <input type="text" class="form-control" name="identidade" ng-model="candidato.identidade" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>N°</label>
                        <input type="text" class="form-control" name="num" ng-model="candidato.num" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Orgão Expedidor</label>
                        <select class="form-control select2" ng-model="candidato.orgaoexpedidor" ng-options="orgaoexpedidor.id as orgaoexpedidor.nome for orgaoexpedidor in orgaoExpedidorList" style="width: 100%"></select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control select2" ng-model="candidato.estado" ng-options="estado.id as estado.nome for estado in estadoList" style="width: 100%"></select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Data de Expedição</label>
                        <input type="text" class="form-control" name="dataexpedicao" ng-model="candidato.dataexpedicao" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name="cidade" ng-model="candidato.cidade" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nome da Mãe</label>
                        <input type="text" class="form-control" name="nomemae" ng-model="candidato.nomemae" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="bairro" ng-model="candidato.bairro" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Sexo</label>
                        <select class="form-control select2" ng-model="candidato.sexo" ng-options="sexo.id as sexo.nome for sexo in sexoList" style="width: 100%"></select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Complemento</label>
                        <input type="text" class="form-control" name="complemento" ng-model="candidato.complemento" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="text" class="form-control" name="datanasc" ng-model="candidato.datanasc" required />
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