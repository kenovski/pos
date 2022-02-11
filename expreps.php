<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EXPENSES REPORT</title>
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
      $(function(){

        $("#btp").click(function(){

          var dte = $("#dte").val();
          var dtx = $("#dtx").val();

          $.ajax({

            type:"post",
            url:"exreps.php",
            data:"dte="+dte+"&dtx="+dtx,

            success:function(data){

              $("#mkt").html(data);
            },

            error:function(){

              $("#mkt").html('Not connected');
            }

          })
        })
      })
    </script>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-md-3">
          <label for="">beginning date</label>
          <input type="date" id="dte" class="form-control">
          <label for="">end date</label>
          <input type="date" id="dtx" class="form-control">

          <input type="button" id="btp" value="preview expenses" class="btn btn-primary">

        </div>
        <div class="col-md-5" id="mkt">

        </div>
      </div>

    </div>

            <script>
            $(function(){

                $("#dte").datepicker({

                    dateFormat:"yy-mm-dd"

                });
            });
        </script>

 <script>
            $(function(){

                $("#dtx").datepicker({

                    dateFormat:"yy-mm-dd"

                });
            });
        </script>

  </body>
</html>
