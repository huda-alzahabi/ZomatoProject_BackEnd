

    <?php
    // when you press on submit button

    // inserting data into database
    include("connection.php");

    if (isset $_POST["name"]){
	    $name = $_POST["name"];

    }else{
	    die("You didn't submit all the required fields!")
    }

    if (isset $_POST["description"]){
	    $description = $_POST["description"];

    }else{
	    die("You didn't submit all the required fields!")
    }

    $query = $mysqli->prepare("INSERT INTO restaurants(name, description) VALUES (?, ?)");
    $query->bind_param("ss", $name, $description);
    $query->execute();
    $response = [];
    $response["success"] = true;

    echo json_encode($response);

    ?>



