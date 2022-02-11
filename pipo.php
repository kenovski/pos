<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            th{
                font-size: 1em;
                font-weight:  bold;
                font-family:Courier New
                color:black;

            }

            td{
                font-size: 1.2em;
                color: black;
                border: 1px black solid;
                font-weight:  bolder;
                font-family:Courier New;
            }

            #diaga{
                width: 400px;
            }

            h4{

                font-family:Courier New;
            }
        </style>

    </head>
    <body>
        <?php
require 'login.php';

$date = $_POST['date'];
$supname = $_POST['supplier'];
$pays = $_POST['payment'];
$rems = $_POST['rems'];
$mode = $_POST['mode'];

$sdl = "insert into dailies(ddate,productcode,customer,custpmt,mode)values('$date', 'payment',  '$supname','$pays','$mode')";
$pds = "insert into drecs(ddate,productname,custpmt,remarks,mode)values('$date','payment','$pays','$rems','$mode')";
mysqli_query($don, $pds) or die('cant pay');
if (mysqli_query($don, $sdl)) {
	echo '<h4>Customers`s Account has been credited with...' . number_format($pays) . '</h4><br>';
} else {
	echo 'Failed To Insert';
}

?>

        <?php
$fed = "select SUM(qtysold * unitprice) As Credit,SUM(custpmt) As Payment,sum(disc * 0.01 * qtysold * unitprice)+ sum(naira) as discount from dailies where customer = '$supname'";
$dap = mysqli_query($don, $fed);
$rolo = mysqli_fetch_assoc($dap);
$debit = $rolo['Credit'];
$credit = $rolo['Payment'];
$disc = $rolo['discount'];
$sarah = $debit - $credit;
echo '<h4>Total Purchases Amount------------' . number_format($debit, 2) . '</h4><br>';
echo '<h4>Total Payments By Customer--------' . number_format($credit, 2) . '</h4><br>';
echo '<h4>Total Discount For Customer--------' . number_format($disc, 2) . '</h4><br>';
echo '<h4>Balance is------------' . number_format($sarah) . '</h4>';

?>

        <?php
$jilo = "select ddate as date,productcode as name, qtysold * unitprice As extended,disc * 0.01 * unitprice * qtysold+naira as discount,naira as discinnaira,custpmt as payment from dailies where customer = '$supname'  >0";
$res = mysqli_query($don, $jilo);

$dre = "insert into drecs(ddate,productname,expenses,custpmt,purchases,banks,sales,cashrecs)values('$date','cash receipts',0,0,0,'$amount',0,'$credit')";

//mysql_query($dre) or die('cant insert into payments');

$buns = mysqli_num_fields($res);
echo '<table class = "table table-responsive table-hover table-striped table-bordered">';

while ($row2 = mysqli_fetch_row($res)) {
	echo '<tr>';

	for ($i = 0; $i < $buns; $i++) {
		echo '<td>';
		if (is_numeric($row2[$i])) {
			echo number_format($row2[$i], 2);
		} else {
			echo '<nobr>' . $row2[$i] . '</nobr>';
		}
	}
	echo '</td>';
	echo '</tr>';

}
echo '<tr>';
echo '<td>';
echo 'Total Bill';
echo '</td>';
echo '<td>';
echo number_format($debit, 2);
echo '</td>';
echo '</tr>';

echo '<tr>';

echo '<tr>';
echo '<td>';
echo 'Total Payment';
echo '</td>';
echo '<td>';
echo number_format($credit, 2);
echo '</td>';
echo '</tr>';

echo '<tr>';

echo '<tr>';
echo '<td>';
echo 'Total Discount';
echo '</td>';
echo '<td>';
echo number_format($disc, 2);
echo '</td>';
echo '</tr>';

echo '<tr>';

$bala = $toamt - $tpmt;

echo '<tr>';
echo '<td>';
echo 'Balance';
echo '</td>';
echo '<td>';
echo number_format($sarah, 2);
echo '</td>';
echo '</tr>';

echo '<tr>';

echo '</table>';

?>
    </body>
</html>
