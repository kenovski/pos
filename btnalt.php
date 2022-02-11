<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));

$pname = $info->pname;
$pc = $info->pc;

$selxx = "select productname from stock ";

$sel = mysqli_query($don, $selxx);
$boo = mysqli_fetch_assoc($sel);
$rate = $boo['unitprice'];
//echo $rate;

$zoom = "insert into posalese(date,itemname,qty,recno)values(curdate(),'$pname',1,'998')";
mysqli_query($don, $zoom) or die('cant insert');

$selo = "select *  from posales  where recno = '$pc' ";
$koll = mysqli_query($don, $selo);
$yoll = mysqli_query($don, $selo);
$zade = mysqli_fetch_assoc($koll);
//$rate = $zade['unitprice'];
//echo $pname;

$data = array();
$rata = array();

while ($row = mysqli_fetch_array($yoll)) {
	//$data[] = array("pname" => $row['itemname'], "rate" => $rate, "qty" => 1, "rec" => $pc);
	$data[] = array("pname" => "hello", "pc" => "mookie");

}

//echo json_encode($data);
?>