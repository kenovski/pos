<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$search = $info->searchTerm;
//$search = '1507';
//echo "Searched value is...." . $search;
//$selx = "select * from sales where recno = $search";
$selxx = "select sum(qty * unitprice) as extended from posales where recno = $search ";
$sel = mysqli_query($don, $selxx) or die('cant query');
$zade = mysqli_fetch_array($sel);
$total = $zade['extended'];
//$total = 89900;
$data = array();
$data = array("total" => $total, "rec" => $search);
echo json_encode($data);
//echo number_format($total, 2);
//echo json_encode(rata.array_push($data));
//echo $data;

?>
