<?php
include("connection.php");

$full_name = $_POST["full_name"];
$email = $_POST["signup_email"];
$password = hash("sha256", $_POST["signup_pass"]);
$usertypes_id = 0;

$query = $mysqli->prepare("INSERT INTO users(full_name, email, password, usertypes_id) VALUES (?, ?, ?, ?)");
$query->bind_param("sssi", $full_name, $email, $password, $usertypes_id);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>