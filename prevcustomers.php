<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-controller = "prevCustomers">
  <h1>CUSTOMERS PREVIEW</h1>

  <h1>{{mafia}}</h1>
   <div class="container-fluid">
   	<div class="row-fluid">
   		<div class="col-md-6 col-md-offset-3">

   			<table class="table table-responsive table-bordered">
   				<thead>
   					<thead>
   						<tr>

   							<th>customername</th>
   							<th>address</th>
   							<th>phoneno</th>
   							<th>email</th>
   							<th>date</th>

   						</tr>
   					</thead>
   				</thead>
   	<tbody>
   		<tr ng-repeat = 'pd in myData'>
   			<td>{{pd.cname}}</td>
   			<td>{{pd.address}}</td>
   			<td>{{pd.phoneno}}</td>
   			<td>{{pd.email}}</td>
   			<td>{{pd.date}}</td>
   			<th ng-click ="DeleteData(pd)">delete</th>
   		</tr>
   	</tbody>

   </table>

   		</div>

   	</div>

   </div>
</body>
</html>