<?php
ob_start();
session_start();
?>
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
















            #tulio{
                position:  absolute;
                right: 300px;
                top:50px;
                width: 80px;
                border: 1px #dbc59e solid;

            }

            th{
               font-size: 12pt;
               color:  #000099;
            }


            body{
                background: activecaption;
            }


            #cname,#xaz{

                display: none;
            }


            #pname{
                font-size: 0.85em;
                font-weight: bold;
            }


            body{
                background: #eee;
            }
           #diagau{
           font-size:12pt;
           }

           th{

               width: 600px;
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
        <?php
require 'login.php';

$cash = $_SESSION['username'];
//echo $cash;

$zew = "insert into receipts(tdate,cashier)values(CURDATE(),'na')";
if (mysqli_query($don, $zew)) {
	//echo 'Inserted';
} else {
	echo 'Not inserted';
}

?>

        <?php
$sew = "select MAX(recno) As Recno from receipts";
$rew = mysqli_query($don, $sew);
while ($row = mysqli_fetch_assoc($rew)) {
	$max = $row['Recno'];
}
?>

        <?php
$trek = "select CURDATE() As date";
$era = mysqli_query($don, $trek);
$rad = mysqli_fetch_assoc($era);
$tad = $rad['date'];

//echo $tad;
?>


        <?php
$over = "select SUM(qtysold * unitprice) As Totalsales from dailies where ddate = CURDATE()";
$tsales = mysqli_query($don, $over);
$mysales = mysqli_fetch_assoc($tsales);
?>




     <script>
            $(document).ready(function(){
            $("#save").click(function()
            {

               var tdate = $("#dte").val();
               var cname = $("#cname").val();
               var code = $("#pname").val();
               var adj = $("#adj").val();

               var qty = $("#qty").val();

              var recno = $("#rec").val();
              var cashier = $("#cashier").val();
              var disc = $("#disc").val();
              var naira = $("#naira").val();
              var stype = $("#stype").val();
              var vat = $("#vat").val();
              var stm = $("#stm").val();
              var pmt = $("#pmt").val();




                $.ajax({
                    type:"POST",
                    url:"pharm.php",
                   data:"tdate="+tdate+"&code="+code+"&qty="+qty+"&recno="+recno+"&cashier="+cashier+"&disc="+disc+"&naira="+naira+"&stype="+stype+"&cname="+cname+"&vat="+vat+"&adj="+adj+"&stm="+stm+"&pmt="+pmt,


                    success:function(data)
                    {
                       //$("#info").html(data);
                       $("#myrec").html(data);
                       $("#pname").val('');
                       $("#qty").val('');
                       $("#disc").val(0);
                       $("#naira").val(0);
                       $("#vat").val(0);
                       $("#adj").val('0');


                    },

                    error:function()
                    {
                        //$("#info").html(data);
                        alert(new Date());
                    }


                });


                $.ajax({

                    type:"post",
                    url:"dtranx.php",
                    data:"date="+tdate,


                    success:function(data)
                    {
                        $("#gm").html(data);
                    },


                    error:function()
                    {
                        $("#gm").html('Not Connected');
                    }

                });
            }



                    );


            $("#pname").click(function(){

                        var kode = $("#pname").val();

                        $.ajax({
                            type:"post",
                            url:"daba.php",
                            data:"pname="+kode,

                            success:function(fada)
                            {
                                $("#sir").html(fada);
                            },

                            error:function()
                            {
                                alert('No Network');
                            }
                        });

                    });


                    $("#").click(function(){

                        var code = $("#pname").val();


                        $.ajax({

                            type:"post",
                            url:"zada.php",
                            data:"pname="+code,

                            success:function(data)
                            {
                                $("#zulio").html(data);
                            },

                            error:function()
                            {
                                alert("Bros No Show");
                            }

                        });

                    });


                    $("#pd").click(function(){

                        var cname = $("#cname").val();
                        var od = $("#od").val();
                        var date = $("#dte").val();
                        var cashier = $("#cashier").val();


                        $.ajax({

                            type:"post",
                            url:"cat.php",
                            data:"cname="+cname+"&od="+od+"&date="+date+"&cashier="+cashier,

                            success:function(data)
                            {
                                $("#tulio").html(data);
                            },

                            error:function()
                            {
                                alert('No Network');
                            }
                        });


                    });


                    $("#btp").click(function(){

                        var sp = $("#sp").val();
                        var pname = $("#pname").val();


                        $.ajax({

                            type:"post",
                            url:"upprice.php",
                            data:"sp="+sp+"&pname="+pname,


                            success:function(data)
                            {
                                $("#sir").html(data);
                            },



                            error:function()
                            {
                                $("#sir").html('Cant Connect');
                            }

                        });

                    });


                    $("#chx").click(function(){

                        var sp = $("#sp").val();
                        var pname = $("#pname").val();


                        $.ajax({

                            type:"post",
                            url:"upcost.php",
                            data:"sp="+sp+"&pname="+pname,


                            success:function(data)
                            {
                                $("#sir").html(data);
                            },



                            error:function()
                            {
                                $("#sir").html('Cant Connect');
                            }

                        });

                    });




                    $("#cname").click(function(){


                       var cname = $("#cname").val();


                       $.ajax({

                           type:"post",
                           url:"ctledger.php",
                           data:"cname="+cname,

                           success:function(data)
                           {
                               $("#gm").html(data);
                           },


                           error:function()
                           {
                               $("#gm").html('Not Connected');
                           }

                       });

                    });

    });
        </script>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group form-horizontal">
                        <label>Date</label>
                        <input type="date" id="dte" value="<?php echo $tad; ?>" class="form-control">
                        <label>Receipt#</label>
                        <input type="number" id="rec" class="form-control" value="<?php echo $max; ?>">
                        <label>Stock Movement</label>
                        <select id="stm" class="form-control">
                          <option value ="normal">normal sales</option>
                          <option value ="to-emab">To Emab</option>
                        </select>

                        <label>Sales Type</label>
                        <select id="stype" class="form-control">
                            <option value="cash">cash</option>
                            <option value="credit">credit</option>
                            <option value="pos">pos</option>

                        </select>


                        <label>Cashier</label>
                        <input type="text" id="cashier" class="form-control" value="<?php echo $cash; ?>">

                        <label id="xaz">Customer Name</label>
                        <input type="text" id="cname" class="form-control" placeholder="select customer name">




                        <label>Product Code</label>
                        <input type="text" id="pname" class="form-control" placeholder="productcode or name">
                        <label>Quantity</label>
                        <input type="number" id="qty" class="form-control" value="0" placeholder="quantity">

                        <label>Adjust Price</label>
                        <input type="number" id="adj" class="form-control" value="0" placeholder="quantity">

                        <label>Selling Price</label>
                        <input type="number" id="sp" class="form-control">
                        <label>Payment</label>
                        <input type="number" id="pmt" class="form-control">
                        <input type="button" id="save" class="btn btn-default btn-lg" value="Update" style=" background: lightseagreen; border: 0px #0074cc solid;">
                        <input type="button" id="btn" class="btn btn-default btn-lg" onclick="printDiv('myrec')" value="Print Receipt" style=" background:  #dbc59e; border: 0px #dbc59e solid;">
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="Change Price">

                         <input type="button" id="chx" class="btn btn-danger btn-lg" value="Change Cost Price">

                        <div id="sir"></div>

                    </div>

                </div>

                <div id="myrec" class="col-md-3"></div>
                <div id="gm" class="col-md-3 col-md-offset-3"></div>
            </div>

        </div>

        <script>

            $("#stype").click(function(){

                if($("#stype").val()=== 'credit')
                {

                    $("#cname").show(5000);
                    $("#xaz").show(5000);
                }

            });
        </script>




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


                            		                           <script type="text/javascript">
$("input#pname").autocomplete ({
source : function (request, callback)
{
var data = { term : request.term };
$.ajax ({
url : "stockcroop.php",
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
$("input#cname").autocomplete ({
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


  <script type="text/javascript">
	$("#dialoga").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",

			    position:"left top"


			}

			);
	</script>

        <script type="text/javascript">
	$("#mona").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",
			    position:"left bottom"


			}

			);
	</script>

    </body>
</html>
