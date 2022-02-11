<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$cname = $info->cname;
//echo $cname;
$set = "select * from sales where customername = '$cname'";
$setts = mysqli_query($don, $set);
$data = array();
$credit = 238900;
$rata = array("one" => 1, "two" => 2, "three" => 3);
while ($row = mysqli_fetch_array($setts)) {
	$data[] = array("prod" => $row['productname'], "qty" => $row['qtyout'], "unitprice" => $row['unitprice'], "discount" => $row['discount'], "recno" => $row['recno'], "payment" => $row['paid']);

}

echo json_encode($data);
//echo json_encode($credit);

?>