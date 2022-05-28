
<?php
include("connection.php");

$name = $_POST["name"];
$description = $_POST["description"];
$path = './assets/crepaway.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$cuisines_id = 0;

$query = $mysqli->prepare("INSERT INTO restaurants (name, description,image,cuisines_id) VALUES (?, ?, ?, ?)");
$query->bind_param("sssi", $name, $description, $base64, $cuisines_id);
$query->execute();

$response = [];
$response["success"] = true;
echo $base64;
echo json_encode($response);
	?>