<?php ob_start();
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
        li{

            color:crimson;
            text-align:center;
            font-size:2em;
        }


        h1{

            text-align: center;
            color: darkred;
        }
        </style>




    </head>
    <body>


        <?php
include 'conn.php';
//$don = mysqli_connect('localhost','kslachop_staff','kovachenko123','kslachop_kafetaria') or die('cant connect');
//mysql_select_db(kslachop_kafetaria)or die('cant select');

//echo "Hello";

$uname = $_POST['username'];
$pword = $_POST['password'];
$pwordd = sha1($pword);
$shift = $_POST['shift'];

//echo $uname;
//session_start();
$_SESSION['username'] = $uname;
$xeq = "select * from users where username = '$uname' And password = '$pwordd'";
$rods = mysqli_query($don, $xeq);

$myrod = mysqli_fetch_assoc($rods);
$mybase = $myrod['location'];
$myshift = $shift;
$_SESSION['loc'] = $mybase;
$_SESSION['shift'] = $shift;

$rej = mysqli_query($don, $xeq);
$numrows = mysqli_num_rows($rej);
$back = ' <a href = "index.php"';

if ($numrows >= 1) {
	echo "Access Granted";
	header('Location:jogger.php');
	//echo $_SESSION['username'];
	//exit();

	//echo '<a href = "mainza.php" class = "btn btn-primary btn-lg">Continue</a>';
} else {

	echo '<h1>Access Denied</h1>';
}
?>



    </body>
</html>
