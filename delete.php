<?php

 $data = json_decode(file_get_contents("php://input"));
 echo $id=$data->abc;
//echo $_POST['abc'];
$connect = mysqli_connect("localhost", "root", "", "shopping_testz");
 $query = "DELETE from product_info where pid='$id'";  
 $result = mysqli_query($connect, $query);
if(!$result){
		die("query failed".mysqli_error($connect));
	} 

?>