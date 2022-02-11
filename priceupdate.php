<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body >
          <script>
              $(function(){

                $("#btx").click(function(){

                    var pname = $("#pname").val();
                    var rate = $("#rate").val();

                    $.ajax({

                        type:"post",
                        url:"checkprice.php",
                        data:"pname="+pname+"&rate="+rate,

                        success:function(data){

                            $("#poy").html(data);
                        },


                        error:function(){

                            $("#poy").html('Not Connected');
                        }
                    })


                }),


                $("#btp").click(function(){

                    var pname = $("#pname").val();

                    $.ajax({

                        type:"post",
                        url:"pricecheck.php",
                        data:"pname="+pname,

                        success:function(data){

                            $("#poy").html(data);
                        },

                        error:function(){

                            $("#poy").html("Not Connected");
                        }

                    })
                })




              })
          </script>

    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="col-md-3">
    		<label>product name</label>
    		<input type="text" id="pname" class="form-control">
    		<label>new price</label>
    		<input type="number" id="rate" class="form-control">
    		<button class="btn btn-success btn-md" id="btp">Check Current Selling Price</button>
    		<button class="btn btn-danger btn-md" id="btx">Update Selling Price</button>

    	</div>

        <div id="poy" class="col-md-4"></div>
    </div>

    </div>

      <script type="text/javascript">
$("input#pname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "drivox.php",
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