<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Sign-Up</h2>
        <form action="signup_handler.php" method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="mobile">Mobile Number:</label>
            <input type="text" id="mobile" name="mobile" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="verify_password">Verify Password:</label>
            <input type="password" id="verify_password" name="verify_password" required>
            
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
