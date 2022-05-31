<?php 
include("connection.php");


$query = $mysqli->prepare("SELECT id,full_name,email FROM users;");
$query->execute();
$array = $query ->get_result();
$response = [];
while ($todo = $array -> fetch_assoc()){
    $response[] = $todo ;

}
$json = json_encode($response);
echo $json;



?>