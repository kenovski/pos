<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

   <style>
      table{
        filter:drop-shadow(0px 0px 20px yellow);
        border: 4px;
        padding: 0;
        background:white;
    }

    td{

      font-family:cursive;
      font-size: 1em;
      color: darkblue;
      border: 3px black solid;
    }

    th{

      background-color: yellow;
    }

    #mookie{

         filter:"drop-shadow(0px 0px 15px #666)";
         border:3px silver white;
         background:'white';

         border-radius:20px;
     }
   </style>
</head>
<body ng-controller ='ledgerController'>
   <h1>{{test}}</h1>


   <div class="container-fluid">
   	<div class="row-fluid">
   		<div class="col-md-3" id="mookie">
   			<label>customer name</label>
   			<input type="text" id="cname" class="form-control" ng-model='recs.cname'>
   			<button ng-click="viewLedger()" class="btn btn-success btn-md">Preview Ledger</button>

   		</div>

   		<table class="table table-responsive table-bordered" ng-show='records.length > 0'>
   			<thead>
   				<th>product</th>
   				<th>qty</th>
   				<th>rate</th>
   				<th>discount</th>
               <th>payment</th>
               <th>action</th>
   			</thead>

   			<tbody>
   				<tr ng-repeat = 'rx in records track by $index'>
   					<td>{{rx.prod}}</td>
   					<td>{{rx.qty}}</td>
   					<td>{{rx.unitprice}}</td>
   					<td>{{rx.discount}}</td>
                  <td>{{rx.payment}}</td>
                  <td class="btn btn-success">delete</td>
   				</tr>
   			</tbody>


   			<tbody>
   				<tr>
   					<td>Grand Total:{{total.gtotal}}</td>

   				</tr>
               <tr>
                  <td>Total Payment:{{total.payment}}</td>
               </tr>

               <tr>
                  <td>
                     Total Discount:{{total.discount}}
                  </td>
               </tr>

               <td>Balance:{{total.gtotal-total.payment}}</td>
   			</tbody>

   		</table>



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