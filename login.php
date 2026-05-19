<?php
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$password = $data['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $token = bin2hex(random_bytes(16));

    $sql = "UPDATE users SET token='$token' WHERE id=".$user['id'];
    mysqli_query($conn, $sql);

    echo json_encode([
        "status" => "success",
        "token" => $token,
        "role" => $user['role']
    ]);
} else {
    echo json_encode(["status" => "error"]);
}
?>