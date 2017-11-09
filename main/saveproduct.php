<?php
session_start();
//Connect to mysql server and selecting db
require '../conn2.php';
	

$a = $_POST['code'];
$b = $_POST['name'];
$c = $_POST['exdate'];
$d = $_POST['price'];
$e = $_POST['supplier'];
$f = $_POST['qty'];
$g = $_POST['o_price'];
$h = $_POST['profit'];
$i = $_POST['gen'];
$j = $_POST['date_arrival'];
$num_bag = $_POST['num_bag'];
$weight_no= $_POST['weight_no'];
$recom_mois = $_POST['recom_mois'];
$actual_mois = $_POST['actual_mois'];
$del_no = $_POST['del_no'];
$branch_name =  $_POST['branch_name'];
//moisture content deduction
$deduc_bags = 0.25*$num_bag;
$excess_mois = $f*($actual_mois-$recom_mois);

$actual_mois_diff = 100-$actual_mois;
$mois_cont_deduc = $excess_mois/$actual_mois_diff;

//chaff 
$chaff = 0.03*$f;

//Net weight
$net_weight = $f-$chaff-$mois_cont_deduc-0.25;

echo $a;

echo "\n";
echo $a;

echo "\n";
echo $b;

echo "\n";
echo $c;

echo "\n";

echo $actual_mois;

echo "\n";

// query
$sql = "INSERT INTO products (product_code,product_name,expiry_date,price,supplier,qty,o_price,profit,gen_name,date_arrival,qty_sold, cost,onhand_qty, units,numbags,weight_no,remm_mositure,actual_moist,deduct_no,delivery_notenum,mois_cont_deduc,chaff,net_weight,branch_name) VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j',$f,'0.0', 0.0, '$k','$num_bag','$weight_no','$recom_mois','$actual_mois','$deduc_bags','$del_no','$mois_cont_deduc','$chaff','$net_weight','$branch_name')";
$q = mysql_query($sql) or die(mysql_error());

header("location: products.php");


?>