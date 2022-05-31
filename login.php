<?php

include("connection.php");
	$status ="Message Sent!"

    if (isset ($_POST["login_email"])){
	    $email = $_POST["login_email"];

    }else{
	    $status = "Error";
    }

    if (isset ($_POST["login_pass"])){
        $password = hash("sha256", $_POST["login_pass"]);
    }else{
	    $status = "Error";
    }


    $query = $mysqli->prepare("Select id,usertypes_id from users where email = ? AND password = ?");
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $query->store_result();

    $num_rows = $query->num_rows;

    $query->bind_result($id,$usertypes_id);
    $query->fetch();


    $response = [];
    $response["status"] = $status;
    if($num_rows == 0){
        $response["response"] = "User Not Found";
    }else{
        $response["response"] = "Logged in";
        $response["id"] = $id;
        $response["type"]=$usertypes_id;
    }

    echo json_encode($response);

?>