<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-controller = 'customersCtrl'>
<h1>CUSTOMERS</h1>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-3">
			<label>Customer Name</label>
			<input type="text" id="cname" class="form-control" placeholder="customername" ng-model='customer.cname'>
			<label>Address</label>
			<input type="text" id="address" class="form-control" placeholder="address" ng-model='customer.address'>
			<label>Phone#</label>
			<input type="text" id="phoneno" class="form-control" placeholder="phoneno" ng-model='customer.phoneno'>
			<label>Email</label>
			<input type="email" id="email" class="form-control" placeholder="email" ng-model='customer.email'>
			<input type="button" id="btn" class="btn btn-primary btn-md" value="update" ng-click="addCustomers()">

		</div>

		<div class="col-md-4">
			<table class="table table-responsive table-bordered">
				<thead ng-show = "custs.length > 0">
					<tr>
						<th>customername</th>
						<th>address</th>
						<th>phoneno</th>
					</tr>
				</thead>

				<tbody>
					<tr ng-repeat = "cust in custs">
						<td>{{cust.cname}}</td>
						<td>{{cust.address}}</td>
						<td>{{cust.phoneno}}</td>

					</tr>
				</tbody>

			</table>

		</div>

	</div>

</div>
<h1>{{maya}}</h1>
</body>

</html>