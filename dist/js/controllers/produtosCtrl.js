app.controller("produtosCtrl", function ($scope, $http, $routeParams, $location, BASE_URL) {

    var currentRoute = $location.path().substring(1) || 'home';
    currentRoute = currentRoute.split('/')[0];

    $scope.controllerUrl = BASE_URL + '#/' + currentRoute;

    BASE_URL += 'api/produtos';

    $scope.index = function () {
        $http.get(BASE_URL)
            .then(function (response) {
                $scope.produtos = response.data;
            });
    }

    if ($routeParams.id) {
        // Update
        $http.get(BASE_URL + "/create/" + $routeParams.id)
            .then(function (response) {
                var produto = response.data;
                $scope.produto = produto;
            });
    } else {
        if (('/' + currentRoute + '/create') == $location.path()) {
            // Create
            $http.get(BASE_URL + "/create/" + 0)
                .then(function (response) {
                    var produto = response.data;
                    $scope.produto = produto;
                    $scope.produto.aquisicao = '0';
                });
        } else {
            // Index
            $scope.index();
        }

    }

    $scope.aquisicoes = [
        {
            nome: 'Nacional',
            id: '0'
        },
        {
            nome: 'Internacional',
            id: '1'
        }
    ];

    $scope.submitForm = function (produto) {
        var id = $routeParams.id;
        if (!id) {
            id = 0;
        }
        $http.post(BASE_URL + "/create/" + id, produto).then(function (data) {
            $location.path("/" + currentRoute);
        });
    }

    $scope.deleteForm = function () {
        var deleteId = $('#deleteBtn').attr("deleteId");

        // Delete
        $http.post(BASE_URL + "/delete/" + deleteId)
            .then(function (response) {
                $('#exampleModal').modal('hide');
                $scope.index();
            });
    }

});