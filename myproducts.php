   <?php

include 'conn.php';
//$sel = mysql_query("select productname, rate,dept from afbproducts ");
//$sel = mysql_query("select * from positems  ");

$selx = "select * from stock order by productname";
$sel = mysqli_query($don, $selx);
$data = array();
//$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("stockid" => $row['stockid'], "productname" => $row['productname'], "dept" => $row['dept'], "unitprice" => $row['unitprice'], "unitcost" => $row['unitcostprice'], "opstock" => $row['opstock']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));
