

    <?php

    header('Access-Control-Allow-Origin: *');


    // when you press on submit button

    // inserting data into database
    include("connection.php");
    $name = $_POST["name"];
    $description =  $_POST["desc"];
    // $image = basename($_FILES["img"]["name"]);

    $query = $mysqli->prepare("INSERT INTO restaurants(name, description) VALUES (?, ?)");
    $query->bind_param("ss", $name, $description);
    $query->execute();
    $response = [];
    $response["success"] = true;

    echo json_encode($response);

    // echo "<script>alert('Restaurant Added');</script>";


    ?>



