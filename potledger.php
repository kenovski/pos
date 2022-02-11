<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$cname = $info->xname;
//echo "Customer Name:" . $cname;
$set = "select sum(qtyout * unitprice) -sum(qtyout * unitprice * discount * 0.01 ) as total,sum(paid) as payment,sum(qtyout * unitprice * discount * 0.01) as discount from sales where customername = '$cname'";
$setts = mysqli_query($don, $set);

$data = array();

$natives = mysqli_fetch_assoc($setts);
$total = $natives['total'];
$payment = $natives['payment'];
$discount = $natives['discount'];

//echo $total;
//echo json_encode($total);

$data = array("gtotal" => $total, "payment" => $payment, "discount" => $discount);

echo json_encode($data);

?>