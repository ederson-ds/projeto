app.controller("acoesCtrl", function ($scope, $location, $compile, BASE_URL) {

    var controllerName = $location.path().substring(1) || 'home';

    $scope.changeHref = function (btn) {
        var objName = controllerName;
        objName = objName.substring(0, objName.length - 1);
        $('#deleteBtn').attr("deleteId", btn.$parent[objName].id);
    }

    $scope.generateAcoesBtn = function (id, i) {
        $('#editBtn' + i).empty();
        $('#editBtn' + i).append('<a href="' + BASE_URL + '#' + controllerName + '/create/' + id + '" id="editBtn" class="btn btn-default" style="width: 42px;padding: 0px;"><i class="fas fa-edit"></i></a>');
        $('#editBtn' + i).append($compile('<button ng-click="changeHref(this)" data-toggle="modal" data-target="#exampleModal" class="btn btn-default" style="width: 42px;padding: 0px;"><i class="fas fa-trash"></i></button>')($scope));
    }

});