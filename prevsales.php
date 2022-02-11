<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PREVIEW SALES</title>
</head>
<body ng-controller="salesController">
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-3">
		<label>Receipt#</label>
		<input type="number" id="recno" class="form-control" ng-model='pval.searchTerm'>
		<input type="button" id="btn" class="btn btn-primary btn-md" value="Preview" ng-click="prevSales()">

	</div>
       <div class="col-md-4">
       	<table class="table table-responsive table-bordered">
       	<thead>
       		<tr>

       			<th>product</th>
       			<th>rate</th>
       			<th>qty</th>
       			<th>discount</th>
       			<th>extended</th>
       			<th>action</th>
       		</tr>
       	</thead>

       	<tbody>
       		<tr ng-repeat='item in items'>

       			<td>{{item.item}}</td>
       			<td>{{item.rate}}</td>
       			<td>{{item.qty}}</td>
       			<td>{{item.discount}}</td>
       			<td>{{item.rate * item.qty}} </td>
       			<td  ng-click ="Delete(item)">delete</td>
       		</tr>
       	</tbody>
       	<tbody>
       		<tr>
       			<td colspan="3">Total Sales:{{total.total}}</td>
       		</tr>
       	</tbody>
       </table>

       </div>

</div>
</body>
</html>