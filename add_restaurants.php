

    <?php

    header('Access-Control-Allow-Origin: *');


    // when you press on submit button

    // inserting data into database
    include("connection.php");
    $name = $_POST["name"];
    $description =  $_POST["description"];
    $image =  $_POST["image"];
    // $image = basename($_FILES["img"]["name"]);

    $query = $mysqli->prepare("INSERT INTO restaurants(name, description, image) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $description, $image);
    $query->execute();
    $response = [];
    $response["success"] = true;

    echo json_encode($response);

    echo "<script>alert('Restaurant Added');</script>";


    ?>



