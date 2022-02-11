<?php
ob_start();
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>point of sales</title>

	<style>
		td{

			font-family: Arial;
			font-size: 1.2em;
            font-weight: bolder;
            background: white;
		}



		th{
			font-family:tahoma;
			font-size: 1.2;
			text-align: center;
            font-weight: bolder;
            background: white;
		}

        .total{

            font-size: 1.4em;

        }

        .blk{

            background: darkblue;
            color: white;
            font-weight: bolder;
        }

        #bjx{

            background:darkblue;
            width: 150px;
            height: 35px;
            color: white;
            font-weight:normal;
            font-family: cursive;
            font-size: 0.89em;
        }

        #moko{

            background: black;
            font-family: cursive;
        }

        h1{

            color: crimson;
        }

        #muka{

            background:crimson;
            color: white;
            font-family: cursive;
            font-weight: bolder;
        }




        #kala{

            text-align: center;
            font-family: Arial Black;
        }

        #jiji{

            text-align: center;
        }

        td,th{

            margin-right: 10px;
        }

      @-moz-document url-prefix() {
               td,th {
              color:black;
              padding-right: 10px;
              font-weight: bolder;


               }



               td{

                color: crimson;
                border: 2px solid black;
               }



           }

@media print {

    #kax,#jax,#zake{
    visibility: hidden;

  }

  td{

    font-weight: bolder;
    font-size: 1.2em;
    font-family: Arial;
  }

  #koke{

    text-align: center;
  }

  #bjx{
    font-size: 1.2em;
    font-family: tahoma;
    width: 120px;
  }


}

#slash{

    text-align: center;
}


#moon{

    font-size: 1.6em;
}

	</style>
</head>


<body ng-controller='newposController'>



    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="col-md-6">
                <label>Receipt#</label>

                <span class="form-control">{{px}}</span>
    			<label>cashier</label>
    			<input type="text" id="cashier"  value="<?php echo $_SESSION['username']; ?>" class="form-control" disabled>
    			<label>waiter</label>
    			<input type="text" id="cashier" class="form-control" ng-model='trans.waiter'>

    			<span ng-repeat = 'waiter in waiters track by $index'>
    				<td><input type="button" id="btx" class="btn btn-success btn-md" value={{waiter.wname}} ng-model='trans.waiter' ng-click ='wtx(waiter)'></td>
    			</span>
                  <br>
    			<span ng-repeat = 'dept in depts track by $index' role="presentation">
    				<td><input type="button" id="btx" class="btn btn-primary btn-md" value={{dept.pname}} ng-model='trans.pname' ng-click='myfx(dept)'></td>
    			</span>
                 <br>
                 <span ng-repeat='pt in pata track by $index'>
    				  <td><input type="button" id="bjx" class="btn btn-default btn-md" value={{pt.pname}} ng-model ='trans.pname' ng-click='jyfx(pt)'> </td>

    			</span><br>

                <button type="button" class="btn btn-danger btn-md" id="mokox" ng-click ="checkout()" >Check Out</button>
                  <button type="button" class="btn btn-default btn-md" id="moko" ng-click ="print('maya')">Print Receipt</button>
                  <div id="maya">
                  <table class="" cellspacing="4" cellpadding="1" ng-show = check.length id="kbn" >

                    <thead id="gkp">
                    <tr>
                        <th id="kokx" colspan="5">THE GARDEN</th>

                    </tr>
                    <tr>
                        <th id="koko" colspan="5">WUSE 2, ABUJA</th>
                    </tr>
                    <tr>
                        <th id="gkx" colspan="5">08060722177</th>
                    </tr>

                       <tr>
                        <th id="lope" colspan="5">Date......{{getDate()}}| Rec#:{{px}}</th>
                    </tr>

                      <tr id="trix">
                        <th colspan="3">Cashier:{{cashier}}</th>
                        <th colspan="3">Waiter:{{trans.waiter}}</th>

                    </tr>

                   </thead>
                    <thead>
                        <tr>
                            <th>description</th>
                            <th>qty</th>
                            <th>rate</th>
                            <th>extended</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr ng-repeat = 'vx in check track by $index' >
                            <td id="ytx">{{vx.pname}}</td>
                            <td>{{vx.qty}}</td>
                            <td>{{vx.rate|currency:"N":0}}</td>
                            <td>{{vx.rate * vx.qty|currency:"N":0}}</td>


                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" id="koke">Total For Receipt:{{extended|currency:"N":0}}</td><br>

                        </tr>

                        <tr>
                            <td colspan="4" id="slash">Inclusive of vat and service charge</td>
                        </tr>
                    </tfoot>

                  </table>
              </div>



    		</div>





              <div class="col-md-5 col-md-offset-1">

                <div class="panel panel-default" id="muka">
                 <div class="row">
                            <div id = "josh" class="col-md-3"><span id = "plum" class="panel-title">Cashier:<?php echo $_SESSION['username'] ?></span></div>
                            <div class="col-md-3"><span>Today is: {{getDate()}}</span></div>

                            <div class="col-md-3 col-md-push-2"><span>Receipt:{{px}}</span></div>
                        </div>
                    </div>


                <div class="panel-body" style="max-height:1020px; overflow:auto;" ng-hide ='gata.length > 0'>
                        <div class="text-warning" ng-hide="order.length" id = "mookie">
                            <h1 style = "text-align:center;"><span class = "glyphicon glyphicon-cutlery"></span>Next Sale<span class = "glyphicon glyphicon-cutlery"></span>

                            </h1>


                         </div>
                     </div>

                     <div>

              <div  id="kala">
            <table class="table table-responsive table-bordered " cellspacing="0" cellpadding="5" ng-show = gata.length >

                   <thead id="gkp">
            		<tr>
            			<th id="kokx" colspan="5">THE GARDEN</th>

            		</tr>
            		<tr>
            			<th id="koko" colspan="5">WUSE 2, ABUJA</th>
            		</tr>
            		<tr>
            			<th id="gkx" colspan="5">08060722177</th>
            		</tr>

                       <tr>
                        <th id="lope" colspan="5">Date......{{getDate()}}| Rec#:{{px}}</th>
                    </tr>

            		  <tr id="trix">
            			<th colspan="3">Cashier:{{cashier}}</th>
            			<th colspan="3">Waiter:{{trans.waiter}}</th>

            		</tr>

                   </thead>






                 		<tr>
                 		<th colspan="1">description</th>
                 		<th colspan="1">qty</th>
                 		<th colspan="1">rate</th>
                 		<th colspan="1">extended</th>
                 	</tr>



                 		<tr   ng-repeat='gt in gata track by $index'>
                 			<th colspan="1">{{gt.pname}}</th>
                 			<th  colspan="1">{{gt.qty}}</th>
                 			<th colspan="">{{gt.rate|currency:"N":0}}</th>
                 			<th colspan="">{{gt.qty * gt.rate|currency:"N":0}}</th>


                            <div class="jaja">
                            <td class="ksx glyphicon glyphicon-trash" ng-click="Delete(gt)" id ="jax"></td>
    						<td  class="ktx glyphicon glyphicon-plus"  ng-click="addUno(gt)" id="kax"></td>
    						<td class=" kkx glyphicon glyphicon-minus" ng-click="minusUno(gt)" id='zake' class="moko btn btn-success"></td>
                        </div>
                 		</tr>
                 		<tr ng-repeat = 'tx in total'>

                        	<th class="total" colspan="4" id="moon">Total For Receipt:{{tx.total|currency:"N":0 }}</th>



                        </tr>



                 </table>
             </div>
             </div>




         </div>



    	</div>



    </div>

                                      <script>
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        $("#kax").fadeOut(100);

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";

        window.print();
        //window.print();




        document.body.innerHTML = oldpage;
        //document.forms["dag"].refresh();
        window.location.reload();

    }
    </script>



</body>
</html>