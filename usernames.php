<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$loginname = $info->loginname;

$del = "delete from users where loginname = '$loginname'";

mysqli_query($don, $del) or die('cant delete now');
?>