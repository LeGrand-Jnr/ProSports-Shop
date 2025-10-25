<?php
// filepath: c:\xampp\htdocs\ProSportsShop\login.php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$password = ""; // your MySQL password
$dbname = "prosportsshop"; // your database name

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(['status'=>'error', 'message'=>'Database connection failed']);
    exit;
}

$email = $_POST['login-email'] ?? '';
$password = $_POST['login-password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['status'=>'error', 'message'=>'All fields required']);
    exit;
}

$stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 0) {
    echo json_encode(['status'=>'error', 'message'=>'Account not found']);
    exit;
}
$stmt->bind_result($hashed);
$stmt->fetch();

if (password_verify($password, $hashed)) {
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error', 'message'=>'Incorrect password']);
}
$stmt->close();
$conn->close();
?>