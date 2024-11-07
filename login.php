<?php
// Include database configuration file
include 'db_config.php'; // Ensure you have this file with the DB connection logic

session_start();

// Handle login submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get user details
    $stmt = $conn->prepare("SELECT user_id, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Store session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $username;

            // Redirect to profile page
            header("Location: profile.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Invalid username!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
