angela.controller('purchController', function($scope,$http){


	$scope.products = [];

	$scope.purch ={
        date:'',
		pname:'',
		supplier:'',
		invoice:'',
		qty:0,
		unitcost:0
   }

		$scope.addPurchases = function(){

			var trans ={

				pname:$scope.purch.pname,
				supplier:$scope.purch.supplier,
				invoice:$scope.purch.invoice,
				qty:$scope.purch.qty,
				unitcost:$scope.purch.unitcost,
				date:$scope.purch.date
			};

			 $http.post('purch.php', JSON.stringify(trans)).then(function(response){
                        $scope.products = response.data;
                         //$scope.names.push(data);
                         console.log($scope.products);
                        }
                        
                    )


			//console.log(trans);
		},


		$scope.Delete = function (pd) {
			    console.log(new Date());
                var lent = $scope.products.length;
                console.log(lent);
                

                
                var _index = $scope.products.indexOf(pd);
                $scope.products.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('prods.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    console.log(rx);
                    //$scope.gtotal();
                }

                )  
            }
	}
)