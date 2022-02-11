<?php
include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$pname = $info->pname;

$kopi = "select * from stock where productname = '$pname'";
$zade = mysqli_query($don, $kopi);
$poke = mysqli_fetch_assoc($zade);
$crate = $poke['unitprice'];
$stock = $poke['stockbal'];
$data = array();

$data = array("price" => number_format($crate, 2), "productname" => $pname);

echo json_encode($data);

?>