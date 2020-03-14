<div class="card">
    <div class="row" style="margin: 6px 0px 0px 0px;">
        <div class="col-sm-9">
            <div class="input-group input-group-sm" style="width: 100%;">
                <input type="text" style="height: 38px;" name="table_search" ng-model="search" class="form-control float-right" placeholder="Pesquisar">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <a href="{{controllerUrl}}/create">
                <button class="btn btn-primary btn-block">Cadastrar</button>
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 25%">Nome</th>
                    <th style="width: 15%">Cpf</th>
                    <th style="width: 15%">Telefone</th>
                    <th style="width: 15%">Celular</th>
                    <th style="width: 10%">Identidade</th>
                    <th style="width: 20%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(i, candidato) in candidatos | filter:search">
                    <td>{{candidato.nome}}</td>
                    <td>{{candidato.cpf}}</td>
                    <td>{{candidato.telefone}}</td>
                    <td>{{candidato.celular}}</td>
                    <td>{{candidato.identidade}}</td>
                    <td ng-controller="acoesCtrl">
                        <div ng-bind="generateAcoesBtn('{{candidato.id}}', '{{i}}')"></div>
                        <div id="editBtn{{i}}"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Solicitação de exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <form ng-submit="deleteForm()">
                    <input type="submit" href="#" id="deleteBtn" class="btn btn-primary" value="Sim" />
                </form>
            </div>
        </div>
    </div>
</div>