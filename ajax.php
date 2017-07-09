<?php
//require_once 'config.php';
require_once('config.php');

if( isset($_POST['type']) && !empty( isset($_POST['type']) ) ){
	$type = $_POST['type'];
	
	switch ($type) {
		case "save_employee":
			save_employee($mysqli);
			break;
		case "delete_employee":
			delete_employee($mysqli, $_POST['id']);
			break;
		case "getemployees":
			getemployees($mysqli);
			break;
		default:
			invalidRequest();
	}
}else{
	invalidRequest();
}

/**
 * This function will handle employee add, update functionality
 * @throws Exception
 */
function save_employee($mysqli){
	try{
		$data = array();
		$name = $mysqli->real_escape_string(isset( $_POST['employee']['name'] ) ? $_POST['employee']['name'] : '');
		$companyName = $mysqli->real_escape_string(isset( $_POST['employee']['companyName'] ) ? $_POST['employee']['companyName'] : '');
		$designation = $mysqli->real_escape_string( isset( $_POST['employee']['designation'] ) ? $_POST['employee']['designation'] : '');
		$email = $mysqli->real_escape_string( isset( $_POST['employee']['email'] ) ? $_POST['employee']['email'] : '');
		$id = $mysqli->real_escape_string( isset( $_POST['employee']['id'] ) ? $_POST['employee']['id'] : '');
	
		if($name == '' || $companyName == '' || $designation == ''|| $email == '' ){
			throw new Exception( "Required fields missing, Please enter and submit" );
		}
	
	
		if(empty($id)){
			$query = "INSERT INTO employee (`id`, `name`, email, `companyName`, `designation`) VALUES (NULL, '$name', '$email', '$companyName', '$designation')";
		}else{
			$query = "UPDATE employee SET `name` = '$name', email = '$email', `companyName` = '$companyName', `designation` = '$designation' WHERE `employee`.`id` = $id";
		}
	
		if( $mysqli->query( $query ) ){
			$data['success'] = true;
			if(!empty($id))$data['message'] = 'employee updated successfully.';
			else $data['message'] = 'employee inserted successfully.';
			if(empty($id))$data['id'] = (int) $mysqli->insert_id;
			else $data['id'] = (int) $id;
		}else{
			throw new Exception( $mysqli->sqlstate.' - '. $mysqli->error );
		}
		$mysqli->close();
		echo json_encode($data);
		exit;
	}catch (Exception $e){
		$data = array();
		$data['success'] = false;
		$data['message'] = $e->getMessage();
		echo json_encode($data);
		exit;
	}
}

/**
 * This function will handle employee deletion
 * @param string $id
 * @throws Exception
 */
function delete_employee($mysqli, $id = ''){
	try{
		if(empty($id)) throw new Exception( "Invalid employee." );
		$query = "DELETE FROM `employee` WHERE `id` = $id";
		if($mysqli->query( $query )){
			$data['success'] = true;
			$data['message'] = 'employee deleted successfully.';
			echo json_encode($data);
			exit;
		}else{
			throw new Exception( $mysqli->sqlstate.' - '. $mysqli->error );
		}
		
	
	}catch (Exception $e){
		$data = array();
		$data['success'] = false;
		$data['message'] = $e->getMessage();
		echo json_encode($data);
		exit;
	}
}
	
/**
 * This function gets list of employees from database
 */
function getemployees($mysqli){
	try{
	
		$query = "SELECT * FROM `employee` order by id desc limit 8";
		$result = $mysqli->query( $query );
		$data = array();
		while ($row = $result->fetch_assoc()) {
			$row['id'] = (int) $row['id'];
			$data['data'][] = $row;
		}
		$data['success'] = true;
		echo json_encode($data);exit;
	
	}catch (Exception $e){
		$data = array();
		$data['success'] = false;
		$data['message'] = $e->getMessage();
		echo json_encode($data);
		exit;
	}
}
	
	


function invalidRequest()
{
	$data = array();
	$data['success'] = false;
	$data['message'] = "Invalid request.";
	echo json_encode($data);
	exit;
}