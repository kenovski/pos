<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$cname = $info->cname;

$del = "delete from customers where customername = '$cname'";

mysqli_query($don, $del) or die('cant delete now');
?>