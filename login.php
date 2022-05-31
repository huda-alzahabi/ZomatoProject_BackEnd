<?php

include("connection.php");

    if (isset $_POST["login_email"]){
	    $email = $_POST["login_email"];

    }else{
	    die("You didn't submit all the required fields!")
    }

    if (isset $_POST["login_pass"]){
        $password = hash("sha256", $_POST["login_pass"]);
    }else{
	    die("You didn't submit all the required fields!")
    }


    $query = $mysqli->prepare("Select id from users where email = ? AND password = ?");
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $query->store_result();

    $num_rows = $query->num_rows;

    $query->bind_result($id);
    $query->fetch();

    $response = [];
    if($num_rows == 0){
        $response["response"] = "User Not Found";
    }else{
        $response["response"] = "Logged in";
        $response["id"] = $id;
    }

    echo json_encode($response);

?>