angela.controller('productsController', function($scope,$http){
     $scope.items = [];
	$scope.myproduct = 'PRODUCTS LIST';
    $scope.products = [];
	$http.get('myproducts.php').then(function (response) {
                    $scope.products = response.data;
                    console.log($scope.products);
                }),


     $scope.delMenu = function (pd) {
                var lent = $scope.products.length;
                console.log(lent);
                

                
                  var _index = $scope.products.indexOf(pd);
                  $scope.products.splice(_index, 1);
                //$scope.items.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('productnames.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    //$scope.items.splice(_index, 1);
                    console.log(rx);
                }

                )  
            };

 //})

	
})