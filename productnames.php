<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$recno = $info->stockid;
$pname = $info->productname;
//$qty = $info->qty;

$data = array();

$del = "delete from stock where  productname = '$pname' and stockid = '$recno'";

mysqli_query($don, $del) or die('cant delete now');

$data = array("recno" => $recno, "product" => $pname, "qty" => $qty);
echo json_encode($data);

?>