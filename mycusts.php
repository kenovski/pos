    <?php

include 'conn.php';
//$sel = mysql_query("select productname, rate,dept from afbproducts ");
//$sel = mysql_query("select * from positems  ");

$selx = "select * from customers";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("cname" => $row['customername'], "address" => $row['address'], "phoneno" => $row['phoneno'], "email" => $row['email'], "date" => $row['date']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));
