<?php

    include("connection.php");
	$status ="Message Sent!";

    if (isset $_POST["name"]){
	    $name = $_POST["name"];

    }else{
	   $status = "Error";
    }

    if (isset $_POST["description"]){
	    $description = $_POST["description"];

    }else{
	   $status = "Error";
    }

    $query = $mysqli->prepare("INSERT INTO restaurants(name, description) VALUES (?, ?)");
    $query->bind_param("ss", $name, $description);
    $query->execute();
    $response = [];
    $response["status"] = $status;

    echo json_encode($response);

?>



