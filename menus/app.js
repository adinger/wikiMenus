var app = angular.module('menuApp', ['ngRoute']);


app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/menu/:restaurantName', {
        templateUrl: 'partials/menuView.html',
        controller: 'menuController'
      }).
      otherwise({
        redirectTo: '/menu/:restaurantName'
      });
  }]);
