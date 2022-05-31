<?php
include("connection.php");
$query = $mysqli->prepare("SELECT r.name, r.description, r.image from restaurants as r");
$query->execute();
$array = $query->get_result();
$response = [];
while($restos = $array->fetch_assoc()){
    $response[] = $restos;
}
$json = json_encode($response);
echo $json;
?>