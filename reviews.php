<?php
include("connection.php");

	if (isset $_POST["rate"]){
		$rate = $_POST["rate"];

	}else{
		die("You didn't submit all the required fields!")
	}

	if (isset $_POST["comment"]){
		$comment = $_POST["comment"];

	}else{
		die("You didn't submit all the required fields!")
	}

	$resto_id=1;
	$cust_id=1;
	$rating_status=0;

	// $query1 = $mysqli->prepare("Select id from restaurants where email = ? AND password = ?");
	// $query1->bind_param("ss", $email, $password);
	// $query1->execute();
	// $query1->store_result();

	// $num_rows = $query1->num_rows;

	// $query1->bind_result($resto_id);
	$query = $mysqli->prepare("INSERT INTO ratings(stars, reviews, restaurant_id, customer_id,rating_status) VALUES (?, ?, ?, ?,?)");
	$query->bind_param("isiii", $rate, $comment, $resto_id, $cust_id,$rating_status);
	$query->execute();

$response = [];
$response["status"] = true;

echo json_encode($response);

?>