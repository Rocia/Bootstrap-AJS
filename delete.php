<?php

 $data = json_decode(file_get_contents("php://input"));
 echo $id=$data->abc;
//echo $_POST['abc'];
$connect = mysqli_connect("localhost", "root", "", "product");
 $query = "DELETE from product where pid='$id'";  
 $result = mysqli_query($connect, $query);
if(!$result){
		die("query failed".mysqli_error($connect));
	} 

?>