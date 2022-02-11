<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
//$recno = $info->stockid;
$kname = $info->dept;
//$qty = $info->qty;

//echo json_encode($pname);

$data = array();

$del = "delete from depts where deptname = '$kname' ";

mysqli_query($don, $del) or die('cant delete now');

$data = array("dept" => $kname);
echo json_encode($data);

?>