<?php 
include("connection.php");
$query = $mysqli->prepare("SELECT id,stars,reviews FROM ratings;");
$query->execute();
$array = $query ->get_result();
$response = [];
while ($todo = $array -> fetch_assoc()){
    $response[] = $todo ;

}
$json = json_encode($response);
echo $json;


?>