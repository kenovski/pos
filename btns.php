<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		#btx{

			width: 100px;
		}
	</style>
</head>
<body ng-controller = 'btnController'>
  <h1>{{taya}}</h1>

  <div class="container-fluid">
  	<div class="row-fluid">
  		<div class="col-md-6">


  					<span ng-repeat = 'pd in products track by $index'>
  						<td><input type="button" id="btx"  class="btn btn-primary btn-md" value={{pd.pname}} ng-click='myfx(pd)' ng-model='items.pname'></td>








  		</span>

  	</div>
       <div class="col-md-4">
       	<table class="table table-responsive table-bordered">
       		<thead>
       			<tr>
       				<th>item</th>
       				<th>rate</th>
       				<th>qty</th>
       				<th>extended</th>
       			</tr>

       		</thead>

       		<tbody>
       			<tr ng-repeat='sx in pata track by $index'>
       				 <td>{{sx.pname}}</td>
       				 <td>{{sx.rate}}</td>
       				 <td>{{sx.qty}}</td>
       				 <td>{{sx.rate * sx.qty}}</td>

       			</tr>
       		</tbody>

       	</table>

       </div>
  </div>

</body>
</html>