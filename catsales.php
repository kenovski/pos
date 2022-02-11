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

         $("#btx").click(function(){

         	var dte = $("#dte").val();
         	var dtx = $("#dtx").val();
          var cat = $("#cat").val();

         	$.ajax({

         		type:"post",
         		url:'dpzoid.php',
         		data:"dte="+dte+"&dtx="+dtx+"&cat="+cat,

         		success:function(data){
         			$("#china").html(data);
         		},

         		error:function(){

         			$("#china").html('Not Connected To Server');
         		}
         	})
         })
		})
	</script>
  <div class="container-fluid">
  	<div class="row-fluid">
  		<div class="col-md-3">

  			<label>start date</label>
  			<input type="date" id="dte" class="form-control">
  			<label>end date</label>
  			<input type="date" id="dtx" class="form-control">
        <label>Category</label>
        <select id="cat" class="form-control">
          <option value="food">food</option>
          <option value="drinks">drinks</option>

        </select>

  			<button class="btn btn-danger btn-md" id="btx">Preview Categories Sales</button>
  			<button class="btn btn-primary btn-md" id="btp" onclick="printDiv('china')">Print</button>

  		</div>

  		<div class="col-md-4" id="china"></div>

  	</div>

  </div>

                                    <script>
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();

           //document.getElementById("ytx").style.fontSize = "1.5em";
                 //document.getElementByTagName("td").style.fontSize = "1.5em";
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        $("#kax").fadeOut(100);

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";

        window.print();
        //window.print();




        document.body.innerHTML = oldpage;
        //document.forms["dag"].refresh();
        window.location.reload();

    }
    </script>
</body>
</html>