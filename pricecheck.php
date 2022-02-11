<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
include 'conn.php';

$pname = $_POST['pname'];

$rtx = "select * from stock where productname = '$pname'";

$zade = mysqli_query($don, $rtx);

$pop = mysqli_fetch_assoc($zade);
$rate = $pop['unitprice'];

echo "<h2>unitprice of ...." . $pname . ".....is....." . number_format($rate, 2) . "</h2>";

?>
</body>
</html>