<?php ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                                          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
    <body>
      <?php
require 'login.php';
$user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
$tas = mysqli_query($don, $wela);
$message = "Access Denied";
while ($vid = mysqli_fetch_assoc($tas)) {
	$perm = $vid['page'];
}

//if($perm!='pharmacy')
if ($perm != 'admin') {
	print '<div id = "jim">';
	print '<h1>' . $message . '</h1>';
	print '</div>';

	exit();
}

?>


<script>

$(function(){

    $("#mookie").click(function(){

        var man = $("#man").val();
        var dept = $("#dept").val();


        $.ajax({

            type:'post',
            url:'skxx.php',
            data:"man="+man+"&dept="+dept,

            success:function(data){

                $("#yala").html(data);
            },


            error:function(){

                //$("#yala").html('Not Connected To Server');
                alert('not connected');
            }
        })
    });

    $("#zookie").click(function(){

        var cat = $("#cat").val();
        //var dept = $("#dept").val();


        $.ajax({

            type:'post',
            url:'skyx.php',
            data:"cat="+cat,

            success:function(data){

                $("#yala").html(data);
            },


            error:function(){

                //$("#yala").html('Not Connected To Server');
                alert('not connected');
            }
        })
    })


})
</script>
      <div class="container-fluid">
      <div class="row-fluid">
      <div class="col-md-3">
      <label>Manufacturer</label>
      <input type="text" id="man" class="form-control">
      <label>Department</label>
      <input type="text" id="dept" class="form-control">
      <label>Category</label>
      <select class="form-control" id="cat">
      <option value="Light and Lighting">Lightings</option>
      <option value="variety">Varieties</option>
      <option value="thermocool">Thermocoool</option>
      </select>
      <button id="mookie" class="btn btn-primary btn-md">Preview Stock</button>
      <button id="zookie" class="btn btn-danger btn-md">Preview Stock By Category</button>

      </div>
          <div id="yala" class="col-md-5"></div>
      </div>
      </div>


                            		                           <script type="text/javascript">
$("input#man").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "brandosh.php",
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



                            		                           <script type="text/javascript">
$("input#dept").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "deptpropo.php",
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