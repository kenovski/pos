<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		th{

			background: cyan;
		}
		.mia{

			color: darkred;
			text-align: center;
		}

		td{

			border: 3px black solid;
			font-family: monospace;
		}
	</style>
</head>
<body ng-controller ="users">
<h1 class="mia">USERS</h1>


</body>


   <div class="container-fluid">
   	<div class="row-fluid">
   		<div class="col-md-10 col-md-offset-2">

   			<table class="table table-responsive table-bordered">
   				<thead>
   					<thead>
   						<tr>

   							<th>username</th>
   							<th>password</th>
   							<th>status</th>
   							<th>username</th>
   							<th>date</th>
   							<th>action</th>

   						</tr>
   					</thead>
   				</thead>
   	<tbody>
   		<tr ng-repeat = 'pd in myData'>
   			<td>{{pd.loginname}}</td>
   			<td>{{pd.password}}</td>
   			<td>{{pd.status}}</td>
   			<td>{{pd.username}}</td>
   			<td>{{pd.date}}</td>
   			<td ng-click ="DeleteData(pd)">delete</td>
   		</tr>
   	</tbody>

   </table>

   		</div>

   	</div>

   </div>

</html>