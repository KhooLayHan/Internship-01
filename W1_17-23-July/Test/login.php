<?php
session_start();

// Database configuration
$host = 'localhost';
$dbName = 'members_db';
$username_ = 'root';
$password_ = '';

// Handle member login
if (isset($_POST['login'])) {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username_, $password_);

    // Check if the member exists in the database
    $sql = "SELECT * FROM members WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $member = $stmt->fetch();

    $_SESSION['id'] = $member['id'];

    if ($member) {
        // Redirect to profile page after successful login
        header('Location: profile.php');
        exit();
    } else {
        // Display an error message for invalid login credentials
        echo "Invalid username or password";
    }
}
?>

<!-- HTML form for member login -->
<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="login" value="Login">
</form>
