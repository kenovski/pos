<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$search = $info->mearch;
//echo "Searched value is...." . $search;
//$selx = "select * from sales where recno = $search";
$selx = "select sum(qtyout * unitprice) as extended from sales where recno = $search";
$dabx = "select sum(qtyout * unitprice * discount * 0.01) as discount from sales where recno = $search";
$sel = mysqli_query($don, $selx);
$zade = mysqli_fetch_assoc($sel);
$total = $zade['extended'];

$dab = mysqli_query($don, $dabx);
$yade = mysqli_fetch_assoc($dab);
$discount = $yade['discount'];
//$discount = 5690.78;
$data = array();

$data[] = array("total" => $total, "discount" => $discount);
echo json_encode($data);
//echo number_format($total, 2);
//echo number_format($discount, 2);
//echo $data;
//echo number_format($total, 2);
//echo number_format($discount);

//echo json_encode(rata.array_push($data));
//echo $data;
