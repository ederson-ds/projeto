app.controller("telasCtrl", function ($scope, $http, $location, $routeParams, BASE_URL, CONTROLLER_NAME) {

    $scope.telas = [
        {
            id: "1",
            nome: "Painel Principal",
            controller: null,
            arvore: null,
            datacadastro: "2019-12-05 17:56:08",
            icone: "fas fa-tachometer-alt",
            tela: [{
                id: "2",
                nome: "Home",
                controller: "home",
                arvore: "1",
                datacadastro: "2019-12-05 17:56:08",
                icone: ""
            },
            {
                id: "3",
                nome: "Produtos",
                controller: "produtos",
                arvore: "1",
                datacadastro: "2019-12-05 17:56:08",
                icone: ""
            }]
        },

    ];

    $http.get(BASE_URL + "telas")
        .then(function (response) {
            var telas = [];
            angular.forEach(response.data, function (value, key) {
                if (!value.arvore) {
                    value.tela = [];
                    angular.forEach(response.data, function (value2, key) {
                        if (value.id == value2.arvore && value2.arvore != null) {
                            value.tela.push(value2);
                        }
                    });
                    telas.push(value);
                }
            });
            //$scope.telas = telas;
        });

    $scope.baseUrl = BASE_URL;

    $scope.getTelaName = function () {

        var currentRoute = $location.path().substring(1) || 'home';
        currentRoute = currentRoute.split('/')[0];

        angular.forEach($scope.telas, function (value, key) {
            angular.forEach(value.tela, function (value2, key) {
                if (value2.controller == currentRoute) {
                    CONTROLLER_NAME = value2.nome;
                }
            });
        });

        return CONTROLLER_NAME;
    }

    $scope.changePanels = function () {
        if (typeof $(".nav-item .active").parent().parent().parent()[1] === 'undefined') {
            $(".nav-item .active").parent().parent().parent().find('.painel').addClass("active");
            if ($(".nav-item .active").parent().parent().find('.has-treeview').length == 1) {
                $(".nav-item .active").parent().parent().find('.has-treeview').addClass("menu-open");
            }
        } else if (!$(".nav-item .active").parent().parent().parent()[1]) {
            $(".nav-item .active").parent().parent().parent()[1].find('.painel').addClass("active");
        }
    }

    $scope.changeMenu = function (page) {
        var currentRoute = $location.path().substring(1) || 'home';
        currentRoute = currentRoute.split('/')[0];
        //Add Parent class
        $scope.changePanels();
        return page === currentRoute ? 'active' : '';
    }

    $(document).ready(function () {
        setTimeout(function () { $scope.changePanels(); }, 100);
    });

});