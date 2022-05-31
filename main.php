
<?php
include("connection.php");
$status ="Message Sent!";
    if (isset ($_GET["restaurant_id"])){
		 $restaurant_id = $_GET["restaurant_id"];
    }else{
	   $status = "Error";
    }
	$query = $mysqli->prepare("SELECT name,description from restaurants where id=?");
	$query->bind_param("i", $restaurant_id);
    $query->execute();
	$query->store_result();
	$num_rows = $query->num_rows;
    $query->bind_result($name,$description);
    $query->fetch();
    $response = [];
    if($num_rows == 0){
        $response["response"] = "Restaurant Not Found";
    }else{
        $response["response"] = "Logged in";
        $response["name"] = $name;
        $response["description"]=$description;
    }

	echo json_encode($response);

?>