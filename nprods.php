<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
//$posid = $info->posid;
//$pname = $info->pname;
$recno = $info->pc;
$pname = $info->pname;
$data = array();
$del = "delete from posales where recno = '$recno' and itemname = '$pname'";

mysqli_query($don, $del) or die('cant delete now');

$delx = "delete from posalesarchive where recno = '$recno' and itemname = '$pname'";

mysqli_query($don, $delx) or die('cant delete now');

//echo json_encode($salesid);

$data[] = array("recno" => $recno, "itemname" => $pname);

json_encode($data);

?>