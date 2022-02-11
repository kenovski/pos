angela.controller('priceController', function($scope,$http){


	
      $scope.sales = [];
      $scope.price = [];
      $scope.jim = {
             pname:'hello',
             rate:0
             

         },


	$scope.check = "Meet the cure";

	$scope.price = function(){



                var mx = {
                //rec:$scope.px,
                pname:$scope.jim.pname,
                rate:$scope.jim.rate
                //cname:$scope.jim.cname,
                //qty:$scope.jim.qty,
                //discount:$scope.jim.discount,
                //rate:$scope.jim.rate

            };

            

            $http.post('checksales.php', JSON.stringify(mx)).then(function(response){
                         $scope.sales = response.data;
                         //$scope.items.push(px);
                         console.log(mx.pname);
                         console.log($scope.sales);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )




            },

            $scope.updatePrice = function(){
             
               var pcx = {
                //rec:$scope.px,
                pname:$scope.jim.pname,
                rate:$scope.jim.rate
                

            };

            $http.post('checkprice.php', JSON.stringify(pcx)).then(function(response){
                         $scope.price = response.kata;
                         //$scope.items.push(px);
                         console.log($scope.price);
                         //console.log(pname,rate);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )

            }

})