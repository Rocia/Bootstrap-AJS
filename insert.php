<?php
//insert.php
$data = json_decode(file_get_contents("php://input"));

echo $prodname = $data -> name;
echo $prodtype = $data -> type;
echo $prodbrand = $data -> brand;
echo $prodcost = $data -> cost;
echo $imagename = $data -> img;


$connect = mysqli_connect("localhost","root","","product");
$query = "INSERT INTO product(pid,pname,ptype,pbrand,pcost,pimage)values('','$prodname','$prodtype','$prodbrand','$prodcost','$imagename')";
$result = mysqli_query($connect,$query);

if(!result){
	die("query failed".mysqli_error($connect));
}
?>