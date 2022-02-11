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
            th{
                background: orange;
                color:black;
                font-size:1.2em;
            }

            td{
                font-size: 1.1em;
                font-weight:normal;
                color:black;
                font-family:Tahoma;
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
        function showEdit(editableObj) {
            $(editableObj).css("background","#FFF");

        }

        function saveToDatabase(editableObj,column,id) {
            $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");

            $.ajax({
                url: "saveedx.php",
                type: "POST",
                data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
                success: function(){
                    $(editableObj).css("background","#FDFDFD");
                }
           });
        }
        </script>


      <?php
include 'conn.php';
require_once 'dbcontroller.php';
$dbhandle = new DBController();
$xd = new DBController();
// mysql_connect('localhost','dejek_newuser','kovachenko123') or die('cant connect');
//mysql_selectdb(dejek_lugbe) or die('cant open database');

$cat = $_POST['cat'];
//$dept = $_POST['dept'];
//echo $pname;

$sw = "select itemid,productname,brandname,deptname, category, balance  from stockbal where category like '%$cat%' ";
$faq = $dbhandle->runquery($sw) or die('cant query');
$raf = $xd->numrows($sw);
// echo $raf;

?>




                <div class=" container-fluid">
                    <div class="row">
                        <div>
        <table class="table table-responsive table-striped table-hover table-bordered">

            <thead>
            <th class="table-header">Itemid</th>
            <th class="table-header">Productname</th>
            <th class="table-header">Manufacturer</th>
            <th class="table-header">Department</th>

             <th class="table-header">Stock</th>


            </thead>
            <tbody>
                 <?php
foreach ($faq as $k => $v) {
	?>
              <tr class="table-row">
                               <td><?php echo $k + 1; ?></td>
                               <td contenteditable="false" onBlur="saveToDatabase(this,'productname','<?php echo $faq[$k]["itemid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["productname"]; ?></td>
                              <td contenteditable="false" onBlur="saveToDatabase(this,'brandname','<?php echo $faq[$k]["itemid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["brandname"]; ?></td>
                              <td contenteditable="false" onBlur="saveToDatabase(this,'deptname','<?php echo $faq[$k]["itemid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["deptname"]; ?></td>
                <td contenteditable="true" onBlur="saveToDatabase(this,'balance','<?php echo $faq[$k]["itemid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["balance"]; ?></td>



              </tr>
        <?php
$k++;

}
?>

            </tbody>

        </table>
                </div>
                </div>
                </div>
    </body>
</html>
