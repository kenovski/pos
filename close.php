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
            h1{

                color: crimson;
                font-family: cursive;
                text-align: center;
            }
        </style>
    </head>
    <body>
               <?php

include 'conn.php';
$user = $_SESSION['username'];
$wela = "select loginname,password,status from users where loginname = '$user'";
$tas = mysqli_query($don, $wela);
$message = "Access Denied";
while ($vid = mysqli_fetch_assoc($tas)) {
	$perm = $vid['status'];
}

//if($perm!='pharmacy')
if ($perm != 'admin') {
	print '<div id = "jim">';
	print '<h1>' . $message . '</h1>';
	print '</div>';

	exit();
}

?>

        <?php

$laz = "delete from posales ";

$raf = mysqli_query($don, $laz);

if ($raf) {
	echo '<h1>Records Cleared, Ready For Day`s transactions</h1>';
	//echo '<h1>Stock Report Reset to zero</h1>';
	return;
} else {

	echo 'Table Not Cleared, Please Redo';
}

if ($ruf) {
	echo '<h1>Records Cleared, Ready For Day`s transactions</h1>';
	//echo 'Stock Report Reset to zero';
} else {

	echo 'Table Not Cleared, Please Redo';
}

?>

<span class="glyphicon glyphicon-trash"></span>
    </body>
</html>
