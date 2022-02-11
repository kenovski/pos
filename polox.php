<?php
$term = $_REQUEST["term"];
$term = utf8_decode($term);

include 'conn.php';
$query = sprintf("SELECT customername FROM customers WHERE customername  LIKE '%%%s%%' And customername != '' order by customername asc", mysqli_real_escape_string($don, $term));

$result = mysqli_query($don, $query);
if ($result) {
// Use the result (sent to the browser)
	while ($row = mysqli_fetch_assoc($result)) {
		echo ("<li>" . utf8_encode($row["customername"]) . "</li>");
//echo ("<li>"  . utf8_encode($row["genericname"]). "</li>");
		//echo "Hello";
	}
	mysqli_free_result($result);
}
mysqli_close($don);
?>