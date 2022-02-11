<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$pname = $info->pname;
$dept = $info->dept;
$rate = $info->rate;
$unitcost = $info->unitcost;
$qty = $info->qty;
$status = $info->status;
$expiry = $info->expiry;
$cat = $info->cat;
//echo $expiry;
//$unitcost = mysql_real_escape_string($info->unitcost);
//echo $loginname, $pswd, $status, $usname;

//$xion = "insert into stock(productname)values('fanta orange')";
$pon = "insert into stock(productname,dept,category,unitprice,unitcostprice,opstock,stockbal,status)values('$pname','$dept', '$cat', '$rate','$unitcost','$qty','$qty','$status')";
mysqli_query($don, $pon) or die('cant insert');

$audit = "insert into stocktrans(date,productname,opstock,qtyin,qtyout,dmg,balance)values(curdate(),'$pname','$qty','$qty','$qty',0,'$qty')";

mysqli_query($don, $audit);

$selx = "select * from stock where productname = '$pname'";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['productname'], "dept" => $row['dept'], "rate" => $row['unitprice'], "unitcost" => $row['unitcostprice'], "opstock" => $row['stockbal'], "stock" => $row['stockbal'], "status" => $row['status'], "category" => $row['category']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));

?>