
	angela.controller('posController', function($scope, $http){

		//$scope.robots = "Feymennns";

		 $scope.sales = [];
         $scope.minus = [];
         $scope.adder = [];
         $scope.sene = [];
         $scope.dat = new Date();
         $scope.date = new Date();
         $scope.robots = "Feymennns";
             $scope.jim = {
             pname:'',
             cname:'Boxer',
             qty:0,
             discount:0,
             rate:0,
             stype:''

         },

         $scope.mysearch ={
         	search:0
         }

         $http.get('myreceipts.php').then(function (response) {
                    $scope.px = response.data;
                    console.log($scope.px);
                })

         $scope.addSales = function(){
         //$scope.sales = [];
         $scope.ntotal = [];
         $scope.net = 0;
            var mx = {
                rec:$scope.px,
                pname:$scope.jim.pname,
                cname:$scope.jim.cname,
                qty:$scope.jim.qty,
                discount:$scope.jim.discount,
                rate:$scope.jim.rate,
                stype:$scope.jim.stype

            };

            var tara = {
                mearch:$scope.px
            };



            

            $http.post('possales.php', JSON.stringify(mx)).then(function(response){
                         $scope.sales = response.data;
                         //$scope.sales.push(mx);
                         //console.log(pata);
                         console.log($scope.sales);
                         //$scope.jim.pname = '';
                         //$scope.jim.qty = 0;
                         //$scope.jim.discount = 0;
                          
                         
                        }
                        
                    ),


                    $http.post('potals.php', JSON.stringify(tara)).then(function(response){
                         $scope.total = response.data;
                         //var poke = response.data;
                         //$scope.kx.push(poke);

                         console.log(tara);
                         console.log($scope.total);
                         //console.log(vata);

                         //ClearMode();
                        }
                        
                    )




            //console.log(mx);
         },
       
         $scope.gtotal = function(){
          var gara = {
                mearch:$scope.px
            }
        

        $http.post('potals.php', JSON.stringify(gara)).then(function(response){
                         $scope.total = response.data;
                         //$scope.poke = response.data.discount;
                         //$scope.kx.push(poke);

                         //console.log(poke);
                         console.log($scope.total);
                         console.log(gara);

                         //ClearMode();
                        }
                        
                    )


    },





         $scope.Delete = function (pd) {
                var lent = $scope.sales.length;
                console.log(lent);
                

                
                //var _index = $scope.sales.indexOf(pd);
                //$scope.sales.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('prods.php', JSON.stringify(pd)).then(function (response) {
                    $scope.sene = response.data;
                    console.log($scope.sene);
                    var _index = $scope.sales.indexOf(pd);
                    $scope.sales.splice(_index, 1);
                    $scope.gtotal();
                }

                )  
            },




            $scope.price = function(){



                var mx = {
                //rec:$scope.px,
                pname:$scope.jim.pname
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


            $scope.addOne = function(pk){

                var mx = {
                rec:$scope.px,
                pname:$scope.jim.pname,
                cname:$scope.jim.cname,
                qty:$scope.jim.qty,
                discount:$scope.jim.discount,
                rate:$scope.jim.rate

                };

                var _index = $scope.sales.indexOf(pk);
                console.log(_index);
                console.log($scope.sales[_index]);
                 $scope.sales[_index].qty++;

                 $http.post('addone.php', JSON.stringify(mx)).then(function(response){
                         $scope.adder = response.data;
                         //$scope.items.push(px);
                         //console.log(pata);
                         console.log($scope.adder);
                         //console.log(px);
                         $scope.addSales();
                         $scope.gtotal();

                         //ClearMode();
                        }
                        
                    )

            },




            $scope.minusOne = function(pk){

                var mx = {
                rec:$scope.px,
                pname:$scope.jim.pname,
                cname:$scope.jim.cname,
                qty:$scope.jim.qty,
                discount:$scope.jim.discount,
                rate:$scope.jim.rate

                };

                var _index = $scope.sales.indexOf(pk);
                console.log(_index);

                console.log($scope.sales[_index]);
                console.log(mx);
                 $scope.sales[_index].qty--;
                 if($scope.sales[_index].qty <= 0){
                   $scope.sales.splice(_index, 1);
                  }

                 $http.post('minusone.php', JSON.stringify(mx)).then(function(response){
                         $scope.minus = response.data;
                         //$scope.items.push(px);
                         //console.log(pata);
                         console.log($scope.minus);
                         //console.log(mx);
                         //console.log($scope.minus);

                         //$scope.sales[_index].qty--;
                       //if($scope.sales[_index].qty <= 0){
                       //$scope.sales.splice(_index, 1);
                       //}
                         $scope.addSales();
                         $scope.gtotal();

                         //ClearMode();
                        }
                        
                    )

            },


            $scope.print = function(divID){
                console.log(new Date());
                 var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        //$("#kax").fadeOut(100);

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";

        window.print();
        //window.print();




        document.body.innerHTML = oldpage;
        //document.forms["dag"].refresh();
        window.location.reload();

            }


            

         




          
	})
