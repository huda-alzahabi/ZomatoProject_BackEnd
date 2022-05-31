<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
$host = "localhost:3306";
$db_user = "root";
$db_pass = null;
$db_name = "zomatodb";

$mysqli = new mysqli($host, $db_user, $db_pass, $db_name);

?>
