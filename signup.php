<?php
include("connection.php");


    if (isset ($_POST["full_name"])){
		$full_name = $_POST["full_name"];
    }else{
	    die("You didn't submit all the required fields!");
    }
	if (isset ($_POST["signup_email"])){
        $email =$_POST["signup_email"];
    }else{
	    die("You didn't submit all the required fields!");
    }

    if (isset ($_POST["signup_pass"])){
        $password = hash("sha256", $_POST["signup_pass"]);
    }else{
	    die("You didn't submit all the required fields!");
    }

	$usertypes_id = 0;

	$query = $mysqli->prepare("INSERT INTO users(full_name, email, password, usertypes_id) VALUES (?, ?, ?, ?)");
	$query->bind_param("sssi", $full_name, $email, $password, $usertypes_id);
	$query->execute();

	$response = [];
	$response["success"] = true;

	echo json_encode($response);

?>