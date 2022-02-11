<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    include 'login.php';

    $dte = $_POST['dte'];
    $dtx = $_POST['dtx'];

    $rtx = "select costcenter, sum(amount) as total from expenses where expdate between '$dte' and '$dtx' group by costcenter";

    $res = mysqli_query($don,$rtx);

    $paty = "select sum(amount) as total from expenses where expdate between '$dte' and '$dtx'";
    $yuyu = mysqli_query($don,$paty);
    $bolt = mysqli_fetch_assoc($yuyu);
    $total = $bolt['total'];

    $buns = mysqli_num_fields($res);
 echo '<table class ="table table-responsive table-bordered table-hover table-striped">';

?>
<thead>
  <tr>
    <th>Cost-Center</th>
    <th>Amount</th>
  </tr>
</thead>

<?php

while ($row2 = mysqli_fetch_row($res))
{
echo '<tr>';

for($i = 0;$i<$buns;$i++)

{
echo '<td>';
if(is_numeric($row2[$i]))
{
echo number_format( $row2[$i],2);
}

else
{
echo '<nobr>'. $row2[$i] . '</nobr>';
}
}   echo '</td>';
echo '</tr>';



}







echo '</table>';



     ?>


     <table class="table table-responsive">
       <thead>
         <tr>
           <th>Total Expenses for selected period</th>
           <th><?php echo number_format($total,2) ?></th>
         </tr>
       </thead>

     </table>
  </body>
</html>
