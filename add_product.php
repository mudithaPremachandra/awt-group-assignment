<?php
include "auth.php";

if ($user['role'] != 'admin') {
    echo json_encode(["status" => "Action is not authorized"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$price = $data['price'];

$sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
mysqli_query($conn, $sql);

echo json_encode(["status" => "product added"]);
?>