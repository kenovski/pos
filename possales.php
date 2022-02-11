<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$pname = $info->pname;
$cname = $info->cname;
//$rec = $info->rec;
$rec = $info->rec;
$stype = $info->stype;
//$rec = mysqli_real_escape_string($don, $info->rec);
//$unitcost = $info->unitcost;
$qty = $info->qty;
$discount = $info->discount;
//$expiry = $info->expiry;
//echo $rec;
//$unitcost = mysql_real_escape_string($info->unitcost);
//echo $loginname, $pswd, $status, $usname;

//$xion = "insert into stock(productname)values('fanta orange')";
$kopi = "select * from stock where productname = '$pname'";
$zade = mysqli_query($don, $kopi);
$poke = mysqli_fetch_assoc($zade);
$crate = $poke['unitprice'];
$stock = $poke['stockbal'];

$newstock = $stock - $qty;

$update = "update stock set stockbal = $newstock where productname ='$pname'";

mysqli_query($don, $update);
if ($stype == 'promo') {

	$crate = 0.0;
}

//echo "unitprice is..." . json_encode($crate);
$pon = "insert into sales(date,customername,productname,unitprice,qtyout,discount,recno,stype)values(curdate(),'$cname','$pname','$crate','$qty', '$discount','$rec','$stype')";
mysqli_query($don, $pon) or die('cant insert');

$padit = "insert into stocktrans(date,productname,opstock,qtyin,qtyout,dmg,balance)values(curdate(),'$pname',0,0,'$qty',0,'$newstock')";

mysqli_query($don, $padit);

//$selx = "select * from sales where recno = $rec ";
$selx = "select sum(qtyout) as qty,customername,productname,recno,discount,salesid,unitprice from sales where recno ='$rec' group by productname";
$sel = mysqli_query($don, $selx);
$data = array();
$total = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("cname" => $row['customername'], "productname" => $row['productname'], "recno" => $row['recno'], "qty" => $row['qty'], "discount" => $row['discount'], "salesid" => $row['salesid'], "rate" => $row['unitprice']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));

?>