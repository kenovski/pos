<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$cname = $info->cname;
$address = $info->address;
$phoneno = $info->phoneno;
$email = $info->email;
//$unitcost = mysql_real_escape_string($info->unitcost);
//echo $loginname, $pswd, $status, $usname;

$xion = "insert into customers(customername,address,phoneno,email)values('$cname','$address','$phoneno','$email')";

mysqli_query($don, $xion) or die('cant insert');

$selx = "select * from customers where customername = '$cname'";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("cname" => $row['customername'], "address" => $row['address'], "phoneno" => $row['phoneno'], "email" => $row['email']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));

?>