app.controller("candidatosCtrl", function ($scope, $http, $routeParams, $location, BASE_URL) {

    var currentRoute = $location.path().substring(1) || 'home';
    currentRoute = currentRoute.split('/')[0];

    $scope.controllerUrl = BASE_URL + '#/' + currentRoute;

    BASE_URL += 'api/candidatos';

    $scope.index = function () {
        $http.get(BASE_URL)
            .then(function (response) {
                $scope.candidatos = response.data;
            });
    }

    if ($routeParams.id) {
        // Update
        $http.put(BASE_URL + "/create/" + $routeParams.id)
            .then(function (response) {
                var candidato = response.data;
                $scope.candidato = candidato;
            });
    } else {
        if (('/' + currentRoute + '/create') == $location.path()) {
            // Create
            $http.get(BASE_URL + "/create/" + 0)
                .then(function (response) {
                    var candidato = response.data;
                    $scope.candidato = candidato;
                    $scope.candidato.aquisicao = '0';
                });
        } else {
            // Index
            $scope.index();
        }

    }

    $scope.orgaoExpedidorList = [
        {
            id: '0',
            nome: 'SSP/UF'
        },
        {
            id: '1',
            nome: 'Cartório Civil'
        },
        {
            id: '2',
            nome: 'Polícia Federal'
        },
        {
            id: '3',
            nome: 'DETRAN'
        }
    ];

    $scope.estadoList = [
        {
            id: '0',
            nome: 'Acre'
        },
        {
            id: '1',
            nome: 'Alagoas'
        },
        {
            id: '2',
            nome: 'Amapá'
        },
        {
            id: '3',
            nome: 'Amazonas'
        },
        {
            id: '4',
            nome: 'Bahia'
        },
        {
            id: '5',
            nome: 'Ceará'
        },
        {
            id: '6',
            nome: 'Distrito Federal'
        },
        {
            id: '7',
            nome: 'Espírito Santo'
        },
        {
            id: '8',
            nome: 'Goiás'
        },
        {
            id: '9',
            nome: 'Maranhão'
        },
        {
            id: '10',
            nome: 'Mato Grosso'
        },
        {
            id: '11',
            nome: 'Mato Grosso do Sul'
        },
        {
            id: '12',
            nome: 'Minas Gerais'
        },
        {
            id: '13',
            nome: 'Pará'
        },
        {
            id: '14',
            nome: 'Paraíba'
        },
        {
            id: '15',
            nome: 'Paraná'
        },
        {
            id: '16',
            nome: 'Pernambuco'
        },
        {
            id: '17',
            nome: 'Piauí'
        },
        {
            id: '18',
            nome: 'Rio de Janeiro'
        },
        {
            id: '19',
            nome: 'Rio Grande do Norte'
        },
        {
            id: '20',
            nome: 'Rio Grande do Sul'
        },
        {
            id: '21',
            nome: 'Rondônia'
        },
        {
            id: '22',
            nome: 'Roraima'
        },
        {
            id: '23',
            nome: 'Santa Catarina'
        },
        {
            id: '24',
            nome: 'São Paulo'
        },
        {
            id: '25',
            nome: 'Sergipe'
        },
        {
            id: '26',
            nome: 'Tocantins'
        }
    ];

    $scope.sexoList = [
        {
            id: '0',
            nome: 'Masculino'
        },
        {
            id: '1',
            nome: 'Feminino'
        }
    ]

    $scope.submitForm = function (candidato) {
        var id = $routeParams.id;
        if (!id) {
            id = 0;
        }
        $http.post(BASE_URL + "/create/" + id, candidato).then(function (data) {
            $location.path("/" + currentRoute);
        });
    }

    $scope.deleteForm = function () {
        var deleteId = $('#deleteBtn').attr("deleteId");

        // Delete
        $http.delete(BASE_URL + "/delete/" + deleteId)
            .then(function (response) {
                $('#exampleModal').modal('hide');
                $scope.index();
            });
    }

});