<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$search = $info->searchTerm;

$selx = "select * from posales where recno = $search";
$dex = "select sum(qty * unitprice) as extended from posales where recno = $search";
$sel = mysqli_query($don, $selx);
$data = array();
$dada = mysqli_query($don, $dex);
$pito = mysqli_fetch_assoc($dada);
$amount = $pito['extended'];
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("cashier" => $row['cashier'], "item" => $row['itemname'], "qty" => $row['qty'], "waiter" => $row['waiter'], "rec" => $row['recno'], "rate" => $row['unitprice'], "salesid" => $row['posid'], "amount" => $amount);

}

echo json_encode($data);
//echo json_encode($amount);
//echo json_encode(rata.array_push($data));
//echo $data;
