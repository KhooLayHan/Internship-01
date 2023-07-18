<?php
session_start();

// Database configuration
$host = 'localhost';
$dbName = 'members_db';
$username = 'root';
$password = '';

// Handle member profile update
if (isset($_POST['update'])) {
    // Get form data
    $id = $_POST['id'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    // Update member data in the database
    $sql = "UPDATE members SET email = ?, fullname = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $fullname, $id]);

    // Redirect to profile page after successful update
    header('Location: profile.php');
    exit();
}

// Retrieve member data from the database
$pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
$sql = "SELECT * FROM members WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['id']]);
$member = $stmt->fetch();
?>

<!-- HTML form for member profile update -->
<form action="profile.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $member['id']; ?>">
    <input type="email" name="email" value="<?php 
        if (!empty($member['email'])) { 
            echo $member['email']; 
        }?>" 
    required><br>
    <input type="text" name="fullname" value="<?php  
        if (!empty($member['fullname'])) { 
            echo $member['fullname']; 
        }?>"
    required><br>
    <input type="submit" name="update" value="Update">
</form>


<?php 
// session_destroy();
?>