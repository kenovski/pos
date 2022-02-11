<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">

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



                 		<tr   ng-repeat='gt in gata check by $index'>
                 			<th colspan="1">{{gt.pname}}</th>
                 			<th  colspan="1">{{gt.qty}}</th>
                 			<th colspan="">{{gt.rate|currency:"N":0}}</th>
                 			<th colspan="">{{gt.qty * gt.rate|currency:"N":0}}</th>



                 		</tr>
                 		<tr ng-repeat = 'tx in total'>

                        	<th class="total" colspan="4" id="moon">Total For Receipt:{{tx.total|currency:"N":0 }}</th>



                        </tr>



                 </table>
             </div>

	</div>

</div>
</body>
</html>