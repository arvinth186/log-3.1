<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    





 
    if (empty($username) || empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode(array("status" => "error", "message" => "All fields are required."));
        exit;
    }
    
    if ($password !== $confirmPassword) {
        echo json_encode(array("status" => "error", "message" => "Passwords do not match."));
        exit;
    }
    
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
         // read of json file

         $jsonString = file_get_contents('data.json');
         $jsonData = json_decode($jsonString, true);
     
         if ($jsonData === null) {
             $jsonData = [];
         }
     
         $newUserData = [
             'name' => $_POST['name'],
             'username' => $_POST['username'],
             'password' => $_POST['password'],
             'email' => $_POST['email'],
             'dob' => null, 
             'phone_number' => 0, 
             'age' => 0, 
             'address' => 0, 
         ];
     
         $jsonData[] = $newUserData;
     
         $updatedJsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
         file_put_contents('data.json', $updatedJsonString);
    
    

    $sql = "INSERT INTO logins (username, name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $name, $email, $hashedPassword);
    
    if ($stmt->execute()) {
        echo json_encode(array("status" => "success", "message" => "Registration successful!"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Registration failed. Please try again later."));
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
