<?php
// filepath: c:\xampp\htdocs\signup\signup.php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$password = ""; // your MySQL password
$dbname = "prosportsshop"; // your database name

$conn = new mysqli($host, $user, $password, $dbname); // <-- fix variable name here
if ($conn->connect_error) {
    echo json_encode(['status'=>'error', 'message'=>'Database connection failed']);
    exit;
}

$name = $_POST['signup-name'] ?? '';
$email = $_POST['signup-email'] ?? '';
$password = $_POST['signup-password'] ?? '';

if (!$name || !$email || !$password) {
    echo json_encode(['status'=>'error', 'message'=>'All fields required']);
    exit;
}

// Hash password for security
$hashed = password_hash($password, PASSWORD_DEFAULT);

// Check if email exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    echo json_encode(['status'=>'error', 'message'=>'Email already registered']);
    exit;
}
$stmt->close();

// Insert user
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashed);
if ($stmt->execute()) {
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error', 'message'=>'Signup failed']);
}
$stmt->close();
$conn->close();
?>