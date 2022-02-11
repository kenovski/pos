<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$supplier = $info->supplier;
$invoice = $info->invoice;
$pname = $info->pname;
$qty = $info->qty;
$unitcost = $info->unitcost;

$dele = "insert into purchases(date,supplier,invoiceno,productname,qtyin,unitcost)values(curdate(),'$supplier','$invoice','$pname','$qty','$unitcost')";

mysqli_query($don, $dele);

$kopi = "select * from stock where productname = '$pname'";
$zade = mysqli_query($don, $kopi);
$poke = mysqli_fetch_assoc($zade);
//$crate = $poke['unitprice'];
$stock = $poke['stockbal'];
$newstock = $stock + $qty;

$update = "update stock set stockbal = $newstock where productname ='$pname'";

mysqli_query($don, $update);

$padit = "insert into stocktrans(date,productname,opstock,qtyin,qtyout,dmg,balance)values(curdate(),'$pname',0,'$qty',0,0,'$newstock')";

mysqli_query($don, $padit);

$set = "select * from purchases where invoiceno = '$invoice'";
$setts = mysqli_query($don, $set);
$data = array();
while ($row = mysqli_fetch_array($setts)) {
	$data[] = array("prod" => $row['productname'], "supplier" => $row['supplier'], "invoiceno" => $row['invoiceno'], "qty" => $row['qtyin'], "unitcost" => $row['unitcost']);

}

echo json_encode($data);

?>