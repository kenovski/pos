<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>point of sales</title>

	<style type="text/css">
		td{

			font-family: calibri;
			font-size: 1em;
		}

		th{
			font-family: arial narrow;
			font-size: 1em;
			text-align: center;
		}
	</style>
</head>
<body ng-controller='newposController'>

    <div class="container">
    	<div class="row">
    		<div class="col-md-4">
                <label>Receipt#</label>
    			<h3 class="form-control">{{px}}</h3>
    			<label>cashier</label>
    			<input type="text" id="cashier" class="form-control" ng-model='trans.cashier'>

    			<span ng-repeat = 'dept in depts track by $index'>
    				<td><input type="button" id="btx" class="btn btn-primary btn-md" value={{dept.pname}} ng-model='trans.pname' ng-click='myfx(dept)'></td>
    			</span>



    		</div>
              <div class="col-md-5 col-md-offset-2">
            <table class="table table-responsive table-bordered" ng-show ='gata.length > 0'>
            	<thead>
            		<tr>
            			<th colspan="2">SUPERTASTE BURGER</th>
            		</tr>
            		<tr>
            			<th colspan="2">WUSE 2, ABUJA</th>
            		</tr>
            		<tr>
            			<th colspan="2">090987654900</th>
            		</tr>
            	</thead>
                 	<thead>
                 		<tr>
                 		<th colspan="">item</th>
                 		<th colspan="0">qty</th>
                 		<th colspan="0">rate</th>
                 		<th>extended</th>
                 	</tr>
                 	</thead>

                 	<tbody>
                 		<tr ng-repeat='gt in gata track by $index'>
                 			<td>{{gt.pname}}</td>
                 			<td>{{gt.qty}}</td>
                 			<td>{{gt.rate}}</td>
                 			<td>{{gt.rate * gt.qty}}</td>
                            <td ng-click="Delete(gt)" class ="moko btn btn-success">delete</td>
    						<td ng-click="addOne(gt)" class="moko btn btn-success">+</td>
    						<td ng-click="minusOne(gt)" class="moko btn btn-success">-</td>
                 		</tr>
                 		<tr ng-repeat = 'tx in total'>

                        	<td colspan="3">Total For Receipt:{{tx.total}}</td>



                        </tr>
                 	</tbody>

                 </table>
             </div>

    	</div>



    </div>
     <div class="container-fluid">
    <div class="row-fluid">
    		<div class="col-md-4">
    			<span ng-repeat='pt in pata track by $index'>
    				  <td><input type="button" id="bjx" class="btn btn-success btn-md" value={{pt.pname}} ng-model ='trans.pname' ng-click='jyfx(pt)'> </td>
    			</span><br>
    		</div>

    	</div>
    </div>
</body>
</html>