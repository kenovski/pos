<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-controller ="itemsController">


<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-3">
			<label>Product Name</label>
			<input type="text" id="pname" class="form-control"  ng-model='stock.pname'>
			<label>Department</label>
			<input type="text" id="dept" class="form-control" placeholder="department" ng-model ='stock.dept'>
			<label>Rate(selling price)</label>
			<input type="number" id="rate" class="form-control" placeholder="rate" ng-model='stock.rate'>
			<label>Unitcost</label>
			<input type="number" id="unitcost" class="form-control" placeholder="productname" ng-model='stock.unitcost'>
			<label>Quantity</label>
			<input type="number" id="qty" class="form-control" placeholder="opening stock" ng-model='stock.qty'>
			<label>Category</label>
			<input type="text" id="cat" class="form-control" placeholder="category" ng-model='stock.cat'>
			<label>Status</label>
			<input type="text" id="status" class="form-control" placeholder="status" ng-model='stock.status'>
			<input type="button" id="btn" class="btn btn-primary btn-md" value="Update" ng-click="addItems()">






		</div>

		<div class="col-md-6">
			<table class="table table-responsive table-bordered">
				<thead ng-show = 'items.length > 0'>
					<tr>
						<th>product</th>
						<th>dept</th>
						<th>rate</th>
						<th>unitcost</th>
						<th>opstock</th>
						<th>stock</th>
						<th>category</th>
						<th>remove</th>

					</tr>
				</thead>

				<tbody>
					<tr ng-repeat = 'item in items'>

						<td>{{item.pname}}</td>
						<td>{{item.dept}}</td>
						<td>{{item.rate}}</td>
						<td>{{item.unitcost}}</td>
						<td>{{item.opstock}}</td>
						<td>{{item.stock}}</td>
						<td>{{item.category}}</td>
						<th ng-click ="delProducts(item)">delete</th>


					</tr>
				</tbody>

			</table>

		</div>

	</div>

</div>

      <script type="text/javascript">
$("input#dept").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "deptnames.php",
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