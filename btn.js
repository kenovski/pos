angela.controller('btnController', function($scope,$http){
    $scope.products = [];
    $scope.sales = [];
    $scope.pc = [];
    $scope.pata = [];

    


    $scope.items ={

        pname:'',
        pc:$scope.pc
    },

    


    $scope.taya = new Date();


    $http.get('myreceipts.php').then(function (response) {
                    $scope.pc = response.data;
                    console.log($scope.pc);
    }),
	$http.post('btn.php').then(function(response){
                        $scope.products = response.data;
                         //$scope.names.push(data);
                         console.log($scope.products);
                        }
                        
                    ),


    



$scope.myfx = function(e) {

    var oxname ={
        pname:e,
        pc:$scope.pc
    };
    


  $http.post('btnx.php', JSON.stringify({pname:oxname.pname.pname,pc:oxname.pc})).then(function(response){
                         $scope.pata = response.data;
                         //$scope.items.push(px);
                         console.log(oxname.pname);
                         console.log(oxname.pc);
                         console.log(oxname);
                         console.log($scope.pata);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )

   

 }
	

})