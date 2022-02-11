<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE DEPARTMENTS</title>
	<style>
		#btn{

			background: maroon;
		}
	</style>
</head>
<body ng-controller ='deptsController'>
<div class="container-fluid">

	<div class="row-fluid">
		<div class="col-md-3">
			<label>department name</label>
			<input type="text" id="dept" class="form-control" ng-model ='dept.deptname'>
			<input type="button" id="btn" class="btn btn-default btn-md" value="Update" ng-click='regDepts()'>

		</div>

		<div class="col-md-4">
			<table class="table table-responsive table-bordered">
				<thead>
					<th>Department</th>
				</thead>

				<tbody>
					<tr ng-repeat='dt in depts track by $index'>
						<td>{{dt.dept}}</td>

					</tr>
				</tbody>

			</table>

		</div>

	</div>

</div>
</body>
</html>