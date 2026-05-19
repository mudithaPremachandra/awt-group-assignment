<?php
include "db.php";

$headers = getallheaders();
$token = $headers['Authorization'] ?? '';

$sql = "SELECT * FROM users WHERE token='$token'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo json_encode(["status" => "unauthorized"]);
    exit;
}
?>