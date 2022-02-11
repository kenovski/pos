<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title></title>
        <style>
            #fex{


                border: 0px #c09853 solid;

            }

            #arama{

                font-size: 2.5em;


            }
            input[type = "button"]{
                width: 100px;
                height: 50px;
                border: 1px #fef1ec solid;
                background:  #7699d1;
                font-size: 12pt;
            }

            h3{
                position: absolute;
                left: 390px;
                top:200px;
                color:  #c43c35;
            }

            label{
                font-size: 14pt;
                color: darkred;
                font-weight:  bold;
            }

            #mid{
                position: relative;
                left: 100px;
                top:40px;
            }

            body{
                background:white;
            }

            #tuliop{
                position: absolute;
                left: 400px;
                top:250px;
                color: red;
                font-size: 35pt;
            }


            input[type = "text"]
            {
                font-size: 11pt;
                color:darkblue;
            }

            /* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 }
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom {
  from{ bottom:-100px; opacity:0 }
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
        </style>



                                      <link rel="stylesheet" href="css/bootstrap.min.css">
‪
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">

          <script src="js/jquery-1.11.2.min.js"></script>

        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">

        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
        <script src = "js/angular.min.js"></script>
          <script src = "js/angular-route.min.js"></script>
          <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body onload="myFunction()" style="margin:0;" >

    <div id="loader"></div>



        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {

                //alert(new Date());
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var shift = $("#shift").val();

               //var qty = $("#qty").val();

              //var recno = $("#recno").val();


                $.ajax({
                    type:"POST",
                    url:"newjogger.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,

                    success:function(data)
                    {
                       $("#info").html(data);
                       $("#tulio").html(data);

                       $("#fex").fadeOut(100);
                       $("#mac").fadeOut(100);


                    },

                    error:function()
                    {
                        $("#info").html('Not Connected');


                    }


                });
            }

                    );

    });
        </script>
        <div class="animate-button container-fluid" id="myDiv" style="display:none;">
        <div class="row" id="moro">
                <div class="col-md-4 col-md-offset-4">
                    <br>
                    <br>
                    <br>
                    <br>
                    <img src="images/pizza.jpg" width="200" height="300" class="img img-responsive img-rounded" id="mac">

                </div>

            </div>
        <div id="fex" class="row">

            <div id="midd" class="form-group col-md-4 col-md-offset-3" >

                <label class="form-control" style=" text-align:  center; color:white; font-size: 1.1em; background:black;">THE GARDEN</label>
                <label class="form-control" style=" background:black; color:white">Username</label>
                <input type="text" name="usname" id="usname" class="form-control">
                <label class="form-control" style=" background:black;color:white">Password</label>
                <input type="password" name="pswd" id="pswd" class="form-control">

                <input type="button" value="login" id="save" class="form-control" style=" background:black;color:white">
            <div id="info"></div>
            </div>

        </div>
        </div>
        <div id="tulio">
        </div>



        <script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>


    </body>
</html>
