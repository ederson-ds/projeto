angular.module('myApp').config(function ($routeProvider, $locationProvider) {
    $locationProvider.hashPrefix('');
    $routeProvider.when("/home", {
        templateUrl: "templates/home/home.html"
    });
    //Produtos
    $routeProvider.when("/produtos", {
        templateUrl: "templates/produtos/produtos.html",
        controller: "produtosCtrl"
    });
    $routeProvider.when("/produtos/create", {
        templateUrl: "templates/produtos/produtosadd.html",
        controller: "produtosCtrl"
    });
    $routeProvider.when("/produtos/create/:id", {
        templateUrl: "templates/produtos/produtosadd.html",
        controller: "produtosCtrl"
    });
    $routeProvider.otherwise({
        redirectTo: "/home"
    });
})