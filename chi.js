$http.post('btnx.php', JSON.stringify(oxname).then(function(response){
                         $scope.pata = response.data;
                         //$scope.items.push(px);
                         console.log(oxname.pname);
                         console.log(oxname.pc);
                         //console.log(oxname.pname);
                         console.log($scope.pata);
                         //console.log(px);
                         //$scope.gtotal()

                         //ClearMode();
                        }
                        
                    )

    //console.log(e);
    
    