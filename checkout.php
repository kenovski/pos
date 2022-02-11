<?php
include 'conn.php';

$info = json_decode(file_get_contents("php://input"));

$data = array();
//$pname = $info->pname;
$pc = $info->pc;

$res = "select  sum(qty) as qty,itemname,unitprice, sum(qty * unitprice) as extended, posid,cashier from posales where recno = '$pc' group by itemname";

$yogo = "select sum(qty * unitprice) as extended from posales where recno = '$pc'";
$zojo = mysqli_query($don, $yogo);
$tojo = mysqli_fetch_assoc($zojo);
$ext = $tojo['extended'];

$sel = mysqli_query($don, $res);
while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['itemname'], "rate" => $row['unitprice'], "qty" => $row['qty'], "posid" => $row['posid'], "cashier" => $cashier, "extended" => $row['extended'], "posid" => $row['posid'], "ext" => $ext);

}

//$data[] = array("pname" => $pname, "pc" => $pc, "rate" => $lrate);
echo json_encode($data);

?>