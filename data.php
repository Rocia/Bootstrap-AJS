<?php

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'shopping_test');
$sql="SELECT * FROM product_info ";
$result=mysqli_query($con,$sql) or die(mysqli_error());

while($row=mysqli_fetch_assoc($result))
{
$myJSON[]=$row;
}
 $a=json_encode($myJSON);
 print_r($a);
 
?>
