<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$dept = $info->deptname;

$craxi = "insert into depts(deptname)values('$dept')";

mysqli_query($don, $craxi) or die('cant insert');

$data = array();
$cart = "select * from depts";

$dart = mysqli_query($don, $cart) or die('cant query');

//$res = mysqli_fetch_assoc($dart);

while ($row = mysqli_fetch_array($dart)) {
	$data[] = array("dept" => $row['deptname']);

}

echo json_encode($data);

?>