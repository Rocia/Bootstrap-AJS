<?php  
 //insert.php 
 $data = json_decode(file_get_contents("php://input"));
 


echo $prodname = $data->abc;
echo $prodtype = $data->ba; 
 //move_uploaded_file($_FILES['pic']['tmp_name'],"images/".$_FILES['pic']['name']);
 $connect = mysqli_connect("localhost", "root", "", "product");
 $query = "INSERT INTO product(pid,pname,ptype)values('','$prodname','$prodtype')";  
 $result = mysqli_query($connect, $query);
if(!$result){
		die("query failed".mysqli_error($connect));
	} 
 ?>  
 
 

