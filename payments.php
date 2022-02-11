<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body ng-controller='paymentsController'>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-3">
			<div class="card">
				<label>Receipt#</label><br>
    			<h3 class="form-control">{{px}}</h3>
				<label>date</label>
				<input type="date" id="dte" class="form-control" ng-model='payment.dte'>

                <label>customer name</label>
				<input type="text" id="cname" class="form-control" ng-model='payment.cname'>



				<label>Amount Paid</label>
				<input type="number" id="amt" class="form-control" ng-model='payment.amount'>

				<label>remarks</label>
				<input type="text" id="rems" class="form-control" ng-model='payment.rems'>
				<button class="btn btn-success" ng-click="addPayment()">Update Payment</button>
			</div>

			<div class="col-md-4">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>customername</th>
							<th>payment</th>
							<th>remarks</th>
						</tr>

					</thead>

					<tbody>
						<tr ng-repeat = 'pd in paid track by $index'>
							<td>{{pd.cname}}</td>
							<td>{{pd.payment}}</td>
							<td></td>
						</tr>
					</tbody>

				</table>

				<div>
					<h1>{{paid.cname}}</h1>
				</div>

			</div>

		</div>

	</div>

</div>

<script type="text/javascript">
$("input#cname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "polox.php",
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