var controller = app.controller('mainPageController', function($scope, $templateCache, $http) {


 
 // var source = [ { value: "https://Subway.com",
 //                 label: "Subway"
 //               },
 //               { value: "https://potbelly.com",
 //                 label: "potbelly"
 //               },
 //               { value: "https://MashawiGrill.com",
 //                 label: "MashawiGrill"
 //               },
 //               { value: "http://www.mcdonalds.com/us/en/home.html",
 //                 label: "McDonalds"
 //               },
 //               { value: "https://Cravings.com",
 //                 label: "cravings.com"
 //               },
 //      ];

$http.get("getChainRestaurants.php")
    .success(function (response) {$scope.restaurants = response;
        
        console.log($scope.restaurants);
        var url = "index.php#/menu/";
        for( var i=0; i< $scope.restaurants.length; i++){

            $scope.restaurants[i].label =  $scope.restaurants[i].name; 
            $scope.restaurants[i].value = url.concat($scope.restaurants[i].name); 
            delete $scope.restaurants[i].name;
          
        }
        // console.log(obj);
        source = $scope.restaurants;

        $("input#autocomplete").autocomplete({
        source: source,
        select: function( event, ui ) { 
            window.location.href = ui.item.value;
        }

      });



  });

     $http.get("getDishes.php")
    .success(function (response) {$scope.names = response;});
  
});


app.controller('menuController', ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
       
        $http.get("getChainRestaurants.php")
        .success(function (response) {

          $scope.restaurants = response;
          
        });

         $http.get("getDishes.php")
        .success(function (response) {$scope.dishes = response;});

        $scope.restaurantName = $routeParams.restaurantName;


        $scope.imdbID = $routeParams.imdbID;

        $scope.range = new Array(5); // MAX_STARS should be the most stars you will ever need in a single ng-repeat

        $scope.stars = 4;
}]);