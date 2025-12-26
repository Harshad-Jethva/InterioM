<?php
require_once '../includes/db_connect.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    // The password you want to set
    $new_password = 'admin123';
    
    // Generate a secure hash
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    $username = 'admin';

    // Update the user
    $query = "UPDATE users SET password = :password WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':username', $username);
    
    if($stmt->execute()) {
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h1 style='color: green;'>Success!</h1>";
        echo "<p>Admin password has been reset to: <strong>" . $new_password . "</strong></p>";
        echo "<p>Hash generated: " . $hashed_password . "</p>";
        echo "<br><a href='index.php' style='padding: 10px 20px; background: #000; color: #fff; text-decoration: none; border-radius: 5px;'>Go to Login</a>";
        echo "</div>";
    } else {
        echo "Failed to update password.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
