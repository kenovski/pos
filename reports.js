angela.controller('reportsController', function($scope,$http){


	$scope.ganga = "Sales Report";

	$scope.dsales = [];
	$scope.total = 0;


	$scope.dates ={

		dte: '',
		dtx:''
	},


	$scope.viewSales = function(){

       var tema = {

       	  dte:$scope.dates.dte,
       	  //$dte:$filter('dte')(new Date(),'dd/MM/yy'),
       	  dtx:$scope.dates.dtx
       	  //dtx:$filter('dtx')(new Date(),'dd/MM/yy')
       };

       $http.post('dsales.php', JSON.stringify(tema)).then(function(response){
                         $scope.dsales = response.data;
                         //$scope.total = $scope.dsales.gtotal
                         //$scope.sales.push(mx);
                         console.log(tema);
                         console.log($scope.dsales);
                         console.log($scope.dsales.cashier);
                         
                          
                         
                        }
                        
                    ),


               $http.post('tsales.php', JSON.stringify(tema)).then(function(response){
                         $scope.tsales = response.data;
                         //$scope.total = $scope.dsales.gtotal
                         //$scope.sales.push(mx);
                         //console.log(tema);
                         console.log($scope.tsales);
                         //console.log($scope.total);
                         
                          
                         
                        }
                        
                    )




	}
})