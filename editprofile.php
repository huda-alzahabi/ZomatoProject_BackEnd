<?php
	include("connection.php");
	include("login.php");
	$status ="Message Sent!";
	$id = $_SESSION['varname'];

	$query = $mysqli->prepare("Select  full_name, email from users where id=?");
	$query->bind_param("i", $id);
	$query->execute();
	echo $_SESSION['varname'];

	if (isset ($_POST["fullname"])){
		$fullname = $_POST["fullname"];
    }
	if (isset ($_POST["login_email"])){
        $email =$_POST["login_email"];
    }
	$query = $mysqli->prepare("UPDATE users SET full_name=?, email=?");
	$query->bind_param("ss", $full_name, $email);

	$response = [];
	$response["status"] = $status;

	echo json_encode($response);

?>