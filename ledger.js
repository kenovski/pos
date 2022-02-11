angela.controller('ledgerController', function($scope,$http){

	$scope.test = "Customer`s Ledger";
	$scope.records = [];
    $scope.rata = [];
    $scope.total = [];

	$scope.recs ={

		cname:'rondo'
	}

	$scope.viewLedger = function(){

    var fx = {

    	cname:$scope.recs.cname
    };
    
    var tara = {
                xname:$scope.recs.cname
            };

    $http.post('myledger.php', JSON.stringify(fx)).then(function(response){
                        $scope.records = response.data;
                        //$scope.rata = response.credit;

                         //$scope.names.push(data);
                         console.log($scope.records);
                         console.log(fx);
                        }
                        
                    ),


                   $http.post('potledger.php', JSON.stringify(tara)).then(function(response){
                         $scope.total = response.data;
                         //var poke = response.data;
                         //$scope.kx.push(poke);

                         console.log(tara);
                         console.log($scope.total);
                         //console.log(vata);

                         //ClearMode();
                        }
                        
                    )

}


})