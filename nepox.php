<?php
ob_start();
session_start();?>

<?php

include 'conn.php';

$info = json_decode(file_get_contents("php://input"));

$data = array();
$pname = $info->pname;
$pc = $info->pc;
$waiter = $info->waiter;
$cashier = $_SESSION['username'];

if ($cashier == '') {

	echo "Access Denied, System May Have Timed You Out,Re-login to continue";
	return;
}

$selxx = "select unitprice, productname,category from stock where productname = '$pname' ";

$sel = mysqli_query($don, $selxx);
$boo = mysqli_fetch_assoc($sel);
$lrate = $boo['unitprice'];
$cat = $boo['category'];
//$rate = json_decode($rate);
//echo $lrate;

$zoom = "insert into posales(date,itemname,qty,unitprice,waiter,recno,cashier,category)values(curdate(),'$pname',1,'$lrate', '$waiter','$pc','$cashier','$cat')";
mysqli_query($don, $zoom) or die('cant insert');
$poom = "insert into posalesarchive(date,itemname,qty,unitprice,waiter,recno,cashier,category)values(curdate(),'$pname',1,'$lrate', '$waiter','$pc','$cashier','$cat')";
mysqli_query($don, $poom) or die('cant insert');

$res = "select  sum(qty) as qty,itemname,unitprice, sum(qty * unitprice) as extended, posid,cashier from posales where recno = '$pc' group by itemname";
$sel = mysqli_query($don, $res);
while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['itemname'], "rate" => $row['unitprice'], "qty" => $row['qty'], "posid" => $row['posid'], "cashier" => $cashier, "extended" => $row['extended'], "posid" => $row['posid']);

}

//$data[] = array("pname" => $pname, "pc" => $pc, "rate" => $lrate);
echo json_encode($data);
?>