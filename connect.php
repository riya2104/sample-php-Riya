<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$symtoms = $_POST['symtoms'];
	$temperature = $_POST['temperature'];
	$glucoseLevel = $_POST['glucoseLevel'];

	//Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into patient(firstName, lastName, gender, symtoms, temperature, glucoseLevel) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssii",$firstName, $lastName, $gender, $symtoms, $temperature, $glucoseLevel);
		$stmt->execute();
		echo "Data Entered...";
		$stmt->close();
		$conn->close();
	}
?>