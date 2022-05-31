
<?php
include("connection.php");
$status ="Message Sent!";

    if (isset ($_POST["restaurant_id"])){
		 $restaurant_id = $_POST["restaurant_id"];

    }else{
	   $status = "Error";
    }
	$query = $mysqli->prepare("SELECT r.name, r.description from restaurants as r where r.id=?");
	$query->bind_param("i", $restaurant_id);
    $query->execute();
	$array = $query ->get_result();
	$response = [];
    $response["status"] = $status;


?>