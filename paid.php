<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
//$recno = $info->rec;
$cname = $info->cname;
$date = $info->date;
$rec = $info->rec;
$amt = $info->amount;
//$rec = mysqli_real_escape_string($don, $info->rec);
//$unitcost = $info->unitcost;
//$qty = $info->qty;
//echo "values..." . $cname;
//echo "values.." . $amt;

$pon = "insert into sales(date,customername,productname,unitprice,qtyout,recno,paid)values(curdate(),'$cname','payment',0,0,'$rec','$amt')";
mysqli_query($don, $pon) or die('cant insert');

//$selx = "select sum(qtyout) as qty,customername,productname,recno,discount,salesid,unitprice from sales where recno ='$rec' group by productname";
$selx = "select date, customername,paid from sales where customername = '$cname' and recno = '$rec'";
$sel = mysqli_query($don, $selx);
$data = array();
$total = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("date" => $row['date'], "cname" => $row['customername'], "payment" => $row['paid'], "recno" => $row['recno']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));

?>