     <?php
include 'conn.php';

$adele = "insert into receipts(date,staffname)values(CURDATE(),'na')";
mysqli_query($don, $adele) or die('cant insert');

$jan = "select MAX(recno)as Recno,curdate() as date from receipts ";
$ran = mysqli_query($don, $jan);

?>

        <?php
$fam = mysqli_fetch_assoc($ran);

$max = $fam['Recno'];

$rec = $fam['Recno'];
$datex = $fam['date'];
echo $max;

?>