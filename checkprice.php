<?php
include 'conn.php';
//$info = json_decode(file_get_contents("php://input"));
$pname = $_POST['pname'];
$rate = $_POST['rate'];

//echo $pame;
//echo $rate;
//$kopi = "select * from stock where productname = '$pname'";
$update = "update stock set unitprice = $rate where productname = '$pname'";
$zade = mysqli_query($don, $update);

$fax = "<h2>price of..." . $pname . "...updated to.." . number_format($rate, 2) . "</h2>";

echo $fax;

?>