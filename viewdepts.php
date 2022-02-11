<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DEPARTMENTS</title>
</head>
<body ng-controller ="listController">
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-4 col-md-offset-3">
			<table class="table table-responsive table-bordered table-striped">

				<thead>
					<tr>
						<th>Departments</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					<tr ng-repeat = 'dt in pdepts track by $index'>
						<td>{{dt.dept}}</td>
						<td ng-click ='deldept(dt)'>delete</td>
					</tr>
				</tbody>

			</table>

		</div>

	</div>

</div>
</body>
</html>