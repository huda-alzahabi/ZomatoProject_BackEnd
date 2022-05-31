<?php

    include("connection.php");
  
	$status ="Message Sent!";

    if (isset ($_POST["name"])){
	    $name = $_POST["name"];

    }else{
	   $status = "Error";
    }

    if (isset ($_POST["description"])){
	    $description = $_POST["description"];

    }else{
	   $status = "Error";
    }
    
    $query = $mysqli->prepare("INSERT INTO restaurants(name, description, image) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $description, $image);
    $query->execute();
    $response = [];
    $response["status"] = $status;

    echo json_encode($response);


