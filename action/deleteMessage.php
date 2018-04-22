<?php
	require_once '../connect.php';
	$id = $_POST['id'];
	$query = "delete from message where id = '{$id}'";
	$result = $conn->query($query);
	if($result == true){
		echo json_encode([
			'success' =>  true,
			'message' => 'Delete Susscessfully'
		]);
	}
	else{
		echo json_encode([
			'success' =>  false,
			'message' => "Can't delete "
		]);
	}
?>