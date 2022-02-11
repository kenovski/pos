angela.controller('deptsController', function($scope,$http){

    $scope.depts = [];
    $scope.pdepts = [];
    $scope.rx = [];
	$scope.evolve = "Face your fears,okay";
	$scope.dept = {
		deptname:''
	};

     $http.get('deptlist.php').then(function (response) {
                    $scope.pdepts = response.data;
                    console.log($scope.pdepts);
                }),


     $scope.deldept = function (pd) {
                var lent = $scope.pdepts.length;
                console.log(lent);
                

                
                  var _index = $scope.pdepts.indexOf(pd);
                  console.log($scope.pdepts[_index]);
                  //$scope.pdepts.splice(_index, 1);
                  //$scope.pdepts.splice(_index, 1);
                //$scope.items.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('deptsnew.php', JSON.stringify(pd)).then(function (response) {
                    $scope.rx = response.data;
                    $scope.pdepts.splice(_index, 1);
                    //$scope.items.splice(_index, 1);
                    console.log($scope.rx);
                    console.log(pd);
                }

                )  
            },


		



	$scope.regDepts = function(){

		var todepts ={

			deptname:$scope.dept.deptname
		};

       $http.post('mydepts.php', JSON.stringify(todepts)).then(function(response){
                         $scope.depts = response.data;
                         //$scope.sales.push(mx);
                         console.log($scope.depts);
                         //console.log($scope.paid);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )


	}


    
	


	


})