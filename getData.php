    <?php

include 'conn.php';
//$sel = mysql_query("select productname, rate,dept from afbproducts ");
//$sel = mysql_query("select * from positems  ");
$selx = "select productname from stock where productname LIKE '%%%s%%' order by productname asc";

$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("pname" => $row['productname']);

}

echo json_encode($data);
//echo $data;
//echo json_encode(rata.array_push($data));