<?php
// filepath: c:\xampp\htdocs\ProSportsShop\order.php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$pass = ""; // your MySQL password
$db   = "prosportsshop"; // your database name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['status'=>'error', 'message'=>'Database connection failed']);
    exit;
}

$name = $_POST['order-fullname'] ?? '';
$phone = $_POST['order-phone'] ?? '';
$delivery = $_POST['order-delivery'] ?? '';
$payment = $_POST['order-payment'] ?? '';

if (!$name || !$phone || !$delivery || !$payment) {
    echo json_encode(['status'=>'error', 'message'=>'All fields required']);
    exit;
}

// Save order (customize table/fields as needed)
$stmt = $conn->prepare("INSERT INTO orders (fullname, phone, delivery, payment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $phone, $delivery, $payment);
if ($stmt->execute()) {
    echo json_encode(['status'=>'success']);
} else {
    echo json_encode(['status'=>'error', 'message'=>'Order failed']);
}
$stmt->close();
$conn->close();
?>