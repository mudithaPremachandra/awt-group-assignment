<?php 
$host = 'localhost';
$username = 'root';
$password = '12345678';
$database = 'inventory';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn){
    die(json_encode(["status"=>"Error", "Message"=> "DB connection failed"]));
} else {
    //echo json_encode(["status"=>"Success", "message"=> "DB connected successfully"]);
}

?>