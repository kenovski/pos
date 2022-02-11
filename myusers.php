     <?php

include 'conn.php';
//$sel = mysql_query("select productname, rate,dept from afbproducts ");
//$sel = mysql_query("select * from positems  ");

$selx = "select * from users";
$sel = mysqli_query($don, $selx);
$data = array();
$rata = array();

while ($row = mysqli_fetch_array($sel)) {
	$data[] = array("loginname" => $row['loginname'], "password" => sha1($row['password']), "status" => $row['status'], "date" => $row['date'], "username" => $row['username']);

}

echo json_encode($data);
//echo json_encode(rata.array_push($data));
