<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    // Check if passwords match
    if ($password !== $verify_password) {
        die("Passwords do not match.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, address, mobile, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstname, $lastname, $address, $mobile, $email, $username, $hashed_password);

   if ($stmt->execute()) {
    // Redirect to the login page after successful sign-up
    header("Location: login.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}


    $stmt->close();
}

$conn->close();
?>
