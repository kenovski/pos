angela.controller("userController", function($scope,$http){

 $scope.amadi = 789;

 $scope.names = [];
 
 $scope.list ={

    loginname:'',
    pswd:"********",
    status:"",
    usname:''
 }



 $scope.postdata = function(loginname,pswd,status,usname){
                    

                    var data = {
                        loginname:$scope.plist.loginname,
                        pswd:$scope.plist.pswd,
                        status:$scope.plist.status,
                        usname:$scope.plist.usname
                        

                    };

                    $http.post('userpost.php', JSON.stringify(data)).then(function(response){
                        var px = response.data;
                         //$scope.names.push(data);
                         //console.log(data);
                        }
                        
                    )


                         

                };



                $scope.names = [];

                $scope.AddProducts = function(){
                   
                    //alert($scope.plist.pcode);
                    
                    var prd = {
                        loginname:$scope.plist.loginname,
                        pswd:$scope.plist.pswd,
                        status:$scope.plist.status,
                        usname:$scope.plist.usname
                    };
                    console.log(prd);

                    $scope.total=+$scope.total + ($scope.plist.qty * $scope.plist.rate);
                    $scope.names.push(prd);
                    $scope.postdata(loginname,pswd,status,usname);
                    ClearModel();

                    
                };




                $scope.DeleteData = function (pd) {
                var lent = $scope.names.length;
                console.log(lent);
                

                
                var _index = $scope.names.indexOf(pd);
                $scope.names.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('usernames.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    console.log(rx);
                }

                )  
            };


              function ClearModel() {
                $scope.plist.loginname = '';
                $scope.plist.pswd = '****';
                $scope.plist.status = '';
                $scope.plist.usname = '';
                
            }

 }),

 angela.controller('users', function($scope,$http){

    $scope.mafia = "Ella";

  $http.get("myusers.php").then(function (response) {
      $scope.myData = response.data;

      console.log($scope.myData);
      
      
  });


   $scope.DeleteData = function (pd) {
                var lent = $scope.myData.length;
                console.log(lent);
                

                
                var _index = $scope.myData.indexOf(pd);
                $scope.myData.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('usernames.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    console.log(rx);
                }

                )  
            };

    



}),


 angela.controller('customersCtrl', function($scope,$http){


    $scope.maya = "Bumble Bee";
    $scope.custs = [];
    var px = [];
     $scope.customer = {
        cname:'',
        address:'',
        phoneno:'',
        email:''
    },


    $scope.addCustomers = function(){

     console.log(new Date());
   

        var mata = {
                        cname:$scope.customer.cname,
                        address:$scope.customer.address,
                        phoneno:$scope.customer.phoneno,
                        email:$scope.customer.email
                        

                    };

                    $http.post('mycustomers.php', JSON.stringify(mata)).then(function(response){
                          px = response.data[0];
                         $scope.custs.push(px);
                         console.log(px);
                         console.log($scope.custs);
                         ClearMode();
                        }
                        
                    )

                    //ClearMode();

    },

    function ClearMode() {
                $scope.customer.cname = '';
                $scope.customer.address = '';
                $scope.customer.phoneno = '';
                $scope.customer.email = '';
                
            }
 }),


 angela.controller('prevCustomers', function($scope,$http){

    $scope.mafia = "Ella";

  $http.get("mycusts.php").then(function (response) {
      $scope.myData = response.data;

      console.log($scope.myData);
      
      
  });


   $scope.DeleteData = function (pd) {
                var lent = $scope.myData.length;
                console.log(lent);
                

                
                var _index = $scope.myData.indexOf(pd);
                $scope.myData.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('custnames.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    console.log(rx);
                }

                )  
            };

    



}),


 angela.controller('itemsController', function($scope,$http){

    $scope.maze = '1987';

    $scope.items = [];
    $scope.rx = [];

    $scope.stock = {
        pname:'pxxname',
        dept:'',
        rate:0,
        unitcost:0,
        qty:0,
        expiry: new Date(),
        status:'on',
        cat:'food'

    },


    $scope.addItems = function(){

     var pata = {
                        pname:$scope.stock.pname,
                        dept:$scope.stock.dept,
                        rate:$scope.stock.rate,
                        unitcost:$scope.stock.unitcost,
                        qty:$scope.stock.qty,
                        expiry:$scope.stock.expiry,
                        status:$scope.stock.status,
                        cat:$scope.stock.cat
                        
                        
                        
                        

                    };

                    $http.post('itemsbackend.php', JSON.stringify(pata)).then(function(response){
                         var px = response.data[0];
                         $scope.items.push(px);
                         //console.log(pata);
                         console.log($scope.items);
                         //console.log(px);

                         //ClearMode();
                        }
                        
                    )

    };


    $scope.delProducts = function (pd) {
                var lent = $scope.items.length;
                console.log(lent);
                

                
                  var _index = $scope.items.indexOf(pd);
                //$scope.items.splice(_index, 1);
                //$scope.removedata(pd);
                //total-= total-($scope.plist.qty * $scope.plist.rate);
              $http.post('productnames.php', JSON.stringify(pd)).then(function (response) {
                    var rx = response.data;
                    $scope.items.splice(_index, 1);
                    console.log(rx);
                }

                )  
            };

 }),


 

 angela.controller("salesController", function($scope,$http){

    $scope.baya = "Machiavelli";
    $scope.items = [];
    $scope.vax = 0;
    $scope.kx = [];
     $scope.total = 0;
    

    $scope.pval= {
        searchTerm:0,
        otherTerm:0
    }

     


    $scope.prevSales = function(){


        var vata ={

        searchTerm:$scope.pval.searchTerm
     }

       

        $http.post('prevs.php', JSON.stringify(vata)).then(function(response){
                         $scope.items = response.data;
                         var poke = response.data;
                         $scope.kx.push(poke);

                         //console.log(kx);
                         console.log($scope.items);
                         console.log(vata);
                         //$scope.gtotal();

                         //ClearMode();
                        }
                        
                    ),
           


        $http.post('totals.php', JSON.stringify(vata)).then(function(response){
                         $scope.total = response.data;
                         //var poke = response.data;
                         //$scope.kx.push(poke);

                         console.log(vata);
                         console.log($scope.total);
                         //console.log(bata);

                         //ClearMode();
                        }
                        
                    )






    },

    $scope.gtotal = function(){

        var vata ={

        searchTerm:$scope.pval.searchTerm
     }

        $http.post('totals.php', JSON.stringify(vata)).then(function(response){
                         $scope.total = response.data;
                         var poke = response.data;
                         //$scope.kx.push(poke);

                         //console.log(kx);
                         console.log($scope.total);
                         console.log(vata);

                         //ClearMode();
                        }
                        
                    )


    },


    $scope.Delete = function (pd) {
                var lent = $scope.items.length;
                console.log(lent);
                

                
                var _index = $scope.items.indexOf(pd);
                //$scope.items.splice(_index, 1);
                //$scope.removedata(pd);
                var kata ={
                    details:$scope.items[_index],
                    //pname:$scope.items[_index]
                };
                //total-= total-($scope.plist.qty * $scope.plist.rate);
                console.log(kata.details);
              $http.post('prods.php', JSON.stringify(kata.details)).then(function (response) {
                    $scope.rx = response.data;
                    //$scope.items.splice(_index, 1);
                    console.log($scope.rx);
                    //console.log("pd is" +pd)
                     $scope.items.splice(_index, 1);
                    $scope.gtotal();
                }

                )  
            }
 })


 
 

