<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$supplier = $info->supplier;
$invoice = $info->invoice;
$pname = $info->pname;
$selx = "select productname from stock  where productname!= '' ";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['productname']);

}

echo json_encode($data);
?>