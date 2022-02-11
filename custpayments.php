<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #dike{
                position:  absolute;
                left: 550px;
                top:210px;
                width: 500px;
                height: 400px;

            }

            input[type = "button"]
            {
                width: 120px;
                height: 50px;
                font-size: 11pt;
                font-weight:  bold;

            }

            label{
                font-size: 12pt;
                font-weight: bold;
                color:  #000099;
            }

            body{
                background: orange;
            }
        </style>
                       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

‪<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    </head>
    <body>
        <script>
            $(document).ready(function(){
                 $("#save").click(function()
                 {
                var date = $("#dte").val();
                var supname = $("#supname").val();
                var pmt = $("#pmt").val();
                var mode = $("#mode").val();

                $.ajax({

                    type:"post",
                    url:"pipo.php",
                    data:"date="+date+"&supplier="+supname+"&payment="+pmt+"&mode="+mode,

                    success:function(data)
                    {
                        $("#kala").html(data);
                    },

                    error:function(data)
                    {
                        alert('no network');
                        $("#nene").html(data);
                    }

                });

                 });


            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte" class="form-control">
            <label>Customername</label>
            <input type="text" name="supname" id="supname" size="45" class="form-control">
            <label>Mode Of Payment</label>
            <select id="mode" class="form-control">
                <option value="cash">cash</option>
                <option value="pos">pos</option>
                <option value="transfer">transfer</option>

            </select>
            <label>Payment</label>
            <input type="number" name="pmt" id="pmt" class="form-control">
            <input type="button" value="Save & Preview" id="save" class="btn bg-primary btn-lg">
            <input type="button" value="Print Ledger" id="save" class="btn bg-primary btn-lg"onclick="printDiv('nene')" >

        </div>
        </div>
                <div id="kala" class="col-md-4"></div>
        </div>
        </div>
                                   		                           <script type="text/javascript">
$("input#supname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "custcroop.php",
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




        <div id="nene">

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

        <?php
// put your code here
?>
    </body>
</html>
