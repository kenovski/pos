<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<script>
		$(function(){





         	$.ajax({

         		type:"post",
         		url:'dpso.php',
         		//data:"dte="+dte+"&dtx="+dtx,

         		success:function(data){
         			$("#china").html(data);
         		},

         		error:function(){

         			$("#china").html('Not Connected To Server');
         		}
         	})

		})
	</script>
  <div class="container-fluid">
  	<div class="row-fluid">


  		<div class="col-md-6 col-md-offset-3" id="china"></div>
         <span><button class="btn btn-danger btn-md" onclick="printDiv('china')">Print Sales Report</button></span>
  	</div>

  </div>


        </div>
                                    <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";

        window.print();




        document.body.innerHTML = oldpage;
        //document.forms["dag"].refresh();
        window.location.reload();

    }
    </script>

</body>
</html>