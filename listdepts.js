angela.controller('listController', function($scope,$http){

   $scope.deptlist = [];

   $http.get('deptlist.php').then(function (response) {
                    $scope.deptlist = response.data;
                    console.log($scope.deptlist);
                })

})