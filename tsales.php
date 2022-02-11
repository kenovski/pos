<?php
include 'conn.php';

$info = json_decode(file_get_contents("php://input"));
$dte = $info->dte;
$dtx = $info->dtx;

//$dte = {{$dte | date:'short'}};
//$dtx = {{$dtx | date:'short'}};
$data = array();

$gogo = "select sum(qty * unitprice) as mytotal from posalesarchive where date between '$dte' and '$dtx'";

$yoo = mysqli_query($don, $gogo);

$totx = mysqli_fetch_assoc($yoo);
$tots = $totx['mytotal'];

$data[] = array("total" => $tots);

echo json_encode($data);

?>