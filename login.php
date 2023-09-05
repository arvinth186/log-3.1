<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if (empty($username) || empty($password)) {
        echo json_encode(array("status" => "error", "message" => "Username and password are required."));
        exit;
    }
    
    $query = "SELECT * FROM logins WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION["username"] = $username;
        echo json_encode(array("status" => "success", "message" => "Login successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Invalid username or password."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
