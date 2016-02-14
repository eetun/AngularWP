var app = angular.module("angularWP", ["ngRoute", "ngSanitize"]);

app.config(function($routeProvider, $locationProvider) {
    
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
    
    $routeProvider.when("/", {
        templateUrl: localized.view + "main.html",
        controller: "MainCtrl"
    })
    .when("/:id", {
        templateUrl: localized.view + "content.html",
        controller: "ContentCtrl"
    });
    
});

app.controller("MainCtrl", function($scope, $http, $routeParams) {
    $http.get("wp-json/wp/v2/posts/").success(function(res){
        $scope.posts = res;
    });
});

app.controller("ContentCtrl", function($scope, $http, $routeParams) {
    $http.get("wp-json/wp/v2/posts/" + $routeParams.id).success(function(res){
        $scope.post = res;
    });
});

