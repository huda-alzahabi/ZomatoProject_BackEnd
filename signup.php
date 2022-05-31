<?php
include("connection.php");

	$status ="Message Sent!"

    if (isset ($_POST["full_name"])){
		$full_name = $_POST["full_name"];
    }else{
	    $status = "Error";
    }
	if (isset ($_POST["signup_email"])){
        $email =$_POST["signup_email"];
    }else{
	    $status = "Error";
    }

    if (isset ($_POST["signup_pass"])){
        $password = hash("sha256", $_POST["signup_pass"]);
    }else{
	    $status = "Error";
    }

	$usertypes_id = 0;

	$query = $mysqli->prepare("INSERT INTO users(full_name, email, password, usertypes_id) VALUES (?, ?, ?, ?)");
	$query->bind_param("sssi", $full_name, $email, $password, $usertypes_id);
	$query->execute();

	$response = [];
	$status ="Message Sent!"
	$response["status"] = $status;

	echo json_encode($response);

?>