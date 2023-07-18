<?php
session_start();

// Database configuration
$host = 'localhost';
$dbName = 'members_db';
$username_ = 'root';
$password_ = '';

// Handle member registration
if (isset($_POST['register'])) {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];

    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username_, $password_);

    // Insert member data into the database
    $sql = "INSERT INTO members (username, password, email, fullname) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $email, $fullname]);

    // Redirect to login page after successful registration
    header('Location: login.php');
    exit();
}
?>

<!-- HTML form for member registration -->
<form action="register.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="fullname" placeholder="Full Name" required><br>
    <input type="submit" name="register" value="Register">
</form>
