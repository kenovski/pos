<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-cobtroller = 'reportsController'>

	<div class="container-fluid">
		<h1>{{ganga}}</h1>
		<div class="row-fluid">
			<div class="col-md-3">
				<label>beginning date</label>
				<input type="date" id="dte" class="form-control" ng-model='dates.dte'>
				<label>end date</label>
				<input type="date" id="dtx" class="form-control" ng-model='dates.dtx'>
				<input type="button" id="btx" class="btn btn-primary btn-md" value="Preview Sales" ng-click='viewSales()'>

			</div>

			<div class="col-md-4">
				<table class="table table-responsive table-bordered">
				<thead>
					<tr>
						<th>itemname</th>
						<th>qty</th>
						<th>total sales</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<tr ng-repeat='sales in dsales'>
						<td>{{sales.item}}</td>
						<td>{{sales.qty}}</td>
						<td>{{sales.total}}</td>
					</tr>

					<tr ng-repeat = 't in tsales'>
						<td>{{t.total}}</td>
					</tr>
				</tbody>


			</div>

		</div>
	</table>

	</div>

</body>
</html>