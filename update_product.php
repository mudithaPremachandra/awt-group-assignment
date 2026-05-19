<?php
include "auth.php";

if ($user['role'] != 'admin') {
    echo json_encode(["status" => "forbidden"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$price = $data['price'];

$sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";
mysqli_query($conn, $sql);

echo json_encode(["status" => "updated"]);
?>