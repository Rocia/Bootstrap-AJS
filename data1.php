<?php
 $id = $_GET['id'];
$con=mysqli_connect('localhost','root','','shopping_test');
 $sql = "select * from product_info where pid = '$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error());

while($row=mysqli_fetch_assoc($result))
{
$myJSON=$row;
}
 $a=json_encode($myJSON);
 print_r($a);

?>