<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		label{

			font-family: tahoma;
			font-size: 1em;
		}

		.kil{

			text-align: center;
		}

		.moko{
			background: cadetblue;
			color: white;
		}
	</style>
</head>
<body ng-controller='posController'>


    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="col-md-3">
    			<label>Receipt#</label><br>
    			<h3 class="form-control">{{px}}</h3>
    			<label>Sales Type</label>
    			<select class="form-control" id="type" ng-model='jim.stype'>
    				<option value="normal">normal</option>
    				<option value="promo">promo</option>

    			</select>
    			<label>Customer Name</label>
    			<input type="text" id="cname" class="form-control" ng-model='jim.cname'>
    			<label>Productname </label>
    			<input type="text" id="pname" class="form-control" ng-model='jim.pname'>
    			<label>Qty </label>
    			<input type="text" id="qty" class="form-control" ng-model='jim.qty'>
    			<label>Discount </label>
    			<input type="text" id="pname" class="form-control" ng-model='jim.discount'>
    			<button class="btn btn-primary btn-md" ng-click ="addSales()">Update</button>
    			<button class="btn btn-primary btn-md" ng-click ="price()">Check Price</button>
    			<button class="btn btn-primary btn-md" onclick ="printDiv('kala')">Print Receipt</button>
    			<button class="btn btn-success btn-md">Invoice Without Discount</button>
    			<label>Selling price:{{sales.price}}</label>


    		</div>

    		<div class="col-md-4" id="kala">
    			<table class="table table-responsive table-bordered" ng-show = 'sales.length > 0 || sales.price > 0'>

    				<thead>
    					<tr>
    						<th colspan="4" class="kil">XYZEEE NIGERIA LIMITED</th>
    					</tr>

    					<tr>
    						<th colspan="4">Customer:{{jim.cname}}</th>
    					</tr>
                          <tr>
    						<th colspan="4">Receipt#:{{px}}</th>
    					</tr>

    					<tr>
    						<th colspan="4">Date:{{date}}</th>
    					</tr>

    				</thead>
    				<thead>
    					<tr>

    						<th>productname</th>
    						<th>qty</th>
    						<th>rate</th>
    						<th>discount</th>
    						<th>extended</th>
    					</tr>
    				</thead>

    				<tbody>
    					<tr ng-repeat = 'sale in sales track by $index'>

    						<td>{{sale.productname}}</td>
    						<td>{{sale.qty}}</td>
    						<td>{{sale.rate}}</td>
    						<td>{{sale.discount}}</td>
    						<td>{{sale.qty * sale.rate}}</td>
    						<td ng-click="Delete(sale)" class ="moko">delete</td>
    						<td ng-click="addOne(sale)" class="moko">+</td>
    						<td ng-click="minusOne(sale)" class="moko">-</td>
    					</tr>

                        <tr ng-repeat = 'tt in total'>
                        	<td colspan="3">Total For Receipt:{{tt.total}}</td>
                        	<td colspan="3">Total Discount For Receipt:{{tt.discount}}</td><br>


                        </tr>
                        <tr ng-repeat = 'tx in total'>
                        	<td>Grand Total:{{tx.total - tx.discount}}</td>

                        </tr>
    				</tbody>

    			</table>

    		</div>

    	</div>

    </div>

                                     <script>
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";

        window.print();
        //window.print();




        document.body.innerHTML = oldpage;
        //document.forms["dag"].refresh();
        window.location.reload();

    }
    </script>


  <script type="text/javascript">
$("input#pname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "drivox.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>


 <script type="text/javascript">
$("input#cname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "polox.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>

</body>
</html>