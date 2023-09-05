<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dob = $_POST["dob"];
    $phoneNumber = $_POST["phonenumber"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    $username = $_SESSION["username"]; 



    $jsonString = file_get_contents('data.json');
    $jsonData = json_decode($jsonString, true);

    if ($jsonData === null) {
        echo json_encode(['success' => false, 'error' => 'Invalid JSON data']);
        exit;
    }

    foreach ($jsonData as &$user) {
        if ($user['username'] === $username) {
            $user['dob'] = $dob;
            $user['age'] = $age;
            $user['address'] = $address;
            $user['phone_number'] = $phoneNumber;
            break;
        }
    }

    $updatedJsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $updatedJsonString);


    if (empty($dob) || empty($phoneNumber) || empty($age) || empty($address)) {
        echo json_encode(array("status" => "error", "message" => "All fields are required."));
        exit;
    }

    if ($newPassword != $confirmPassword) {
        echo json_encode(array("status" => "error", "message" => "New password and confirm password do not match."));
        exit;
    }
    
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE logins SET dob=?, phone_number=?, age=?, address=?, password=? WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisss", $dob, $phoneNumber, $age, $address, $hashedNewPassword, $username);
    
    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Details updated successfully."));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating details."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
