<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));

$selx = "select waitername from waiters where waitername!= '' order by waitername ";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("wname" => $row['waitername']);

}

echo json_encode($data);
?>