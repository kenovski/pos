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
    </head>
    <body>
        <?php
require 'login.php';

$pname = $_POST['pname'];
$sp = $_POST['sp'];

$upt = "update stockbal set cost = $sp where productcode = '$pname'";

if (mysqli_query($don, $upt)) {
	echo 'Cost Price..of........' . $pname . ' Updated to..........' . number_format($sp, 2);

} else {

	echo 'Price Not Updated, Redo from start';
}
?>
    </body>
</html>