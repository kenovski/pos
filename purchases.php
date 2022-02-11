<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-controller = 'purchController'>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-3">
			<label>date</label>
			<input type="date" id="dte" class="form-control" ng-model='purch.date'>
			<label>suppliername</label>
			<input type="text" id="sup" class="form-control" ng-model='purch.supplier' placeholder="suppliername">
			<label>invoice#</label>
			<input type="text" id="invoice" class="form-control" ng-model='purch.invoice' placeholder="invoice">
            <label>productname</label>
			<input type="text" id="pname" class="form-control" ng-model='purch.pname'>
            <label>qty</label>
			<input type="number" id="qty" class="form-control" ng-model='purch.qty'>
            <label>unitcost</label>
			<input type="number" id="ucost" class="form-control" ng-model='purch.unitcost'>
			<button class="btn btn-primary btn-md" ng-click="addPurchases()">Update</button>


		</div>

		<div class="col-md-6">
			<table class="table table-responsive table-bordered" ng-show ='products.length > 0'>
				<thead>
					<tr>
						<th>supplier</th>
						<th>productname</th>
						<th>qty</th>
						<th>unitcost</th>
						<td>extended</td>
					</tr>
				</thead>

				<tbody>
					<tr ng-repeat = 'product in products track by $index'>
						<td>{{product.supplier}}</td>
						<td>{{product.prod}}</td>
						<td>{{product.qty}}</td>
						<td>{{product.unitcost}}</td>
						<td>{{product.qty * product.unitcost}}</td>
						<td ng-click="Delete(product)">delete</td>
					</tr>
				</tbody>

			</table>
		</div>

	</div>

</div>

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

</body>
</html>