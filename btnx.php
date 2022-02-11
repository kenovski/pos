<?php

include 'conn.php';

$info = json_decode(file_get_contents("php://input"));

$data = array();
$pname = $info->pname;
$pc = $info->pc;

$selxx = "select unitprice, productname from stock where productname = '$pname' ";

$sel = mysqli_query($don, $selxx);
$boo = mysqli_fetch_assoc($sel);
$lrate = $boo['unitprice'];
//$rate = json_decode($rate);
//echo $lrate;

$zoom = "insert into posales(date,itemname,qty,unitprice,recno)values(curdate(),'$pname',1,'$lrate','$pc')";
mysqli_query($don, $zoom) or die('cant insert');

$res = "select sum(qty) as qty,itemname,unitprice from posales where recno = '$pc' group by itemname";
$sel = mysqli_query($don, $res);
while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['itemname'], "rate" => $row['unitprice'], "qty" => $row['qty']);

}

//$data[] = array("pname" => $pname, "pc" => $pc, "rate" => $lrate);
echo json_encode($data);
?>