angela.controller('paymentsController', function($scope,$http){


	$scope.jump = "FoxNews";
  $scope.paid = [];

	  $scope.payment = {
             dte:'',
             cname:'',
             amount:0,
             rems:''

         },


	$http.get('myreceipts.php').then(function (response) {
                    $scope.px = response.data;
                    console.log($scope.px);
                })


	       


         $scope.addPayment = function(){


          var mx = {
                rec:$scope.px,
                date:$scope.payment.dte,
                cname:$scope.payment.cname,
                amount:$scope.payment.amount,
                rems:$scope.payment.rems
                

            };

          $http.post('paid.php', JSON.stringify(mx)).then(function(response){
                         $scope.paid = response.data;
                         //$scope.sales.push(mx);
                         console.log($scope.paid);
                         //console.log($scope.paid);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )

         }   
})