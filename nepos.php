<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));

$selx = "select deptname from depts where deptname!= '' order by deptname ";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['deptname']);

}

echo json_encode($data);
?>