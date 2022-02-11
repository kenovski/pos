<?php

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
            #show{


                margin: auto;
                border: 2px;
                background:blueviolet;
                width: 400px;
                height: 350px;
                border-radius:20px;
                filter: drop-shadow(5px 5px 20px cyan );
                color: white;
            }
            #btn{
               position:  relative;
               top: 100px;
               left: 100px;
               width: 200px;
               height: 100px;
               background:  #d59392;
            }
            a{
                text-decoration-style: none;
                position:  absolute;
                top: 200px;
                left: 50px;
                font-size: 20pt;
                font-weight:  bold;
            }
        </style>
    </head>
    <body id="pinki">




        <div id="show">

            <a href="mains.php">
              WELCOME <?php echo $_SESSION['username']; ?> <br>
             CLICK TO CONTINUE</a>

        </div>

        <script>

        $(document).ready(function(){

            setTimeout(()=>{
             $.ajax({

                type:"post",
                url:"mainza.php",

                success:function(data){

                    $("#pinki").html(data);
                },

                error:function(){

                    $("#pinki").html('Not Connected To Server');
                }
             })
            },1000)
        })
        </script>

    </body>
</html>
