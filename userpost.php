<?php

include 'conn.php';
$info = json_decode(file_get_contents("php://input"));
$loginname = $info->loginname;
$pswdd = $info->pswd;
$pswd = sha1($pswdd);
$status = $info->status;
$usname = $info->usname;
//$unitcost = mysql_real_escape_string($info->unitcost);
echo $loginname, $pswd, $status, $usname;

$xion = "insert into users(loginname,password,username,status,date)values('$loginname','$pswd','$usname','$status', curdate())";

mysqli_query($don, $xion) or die('cant insert');
?>