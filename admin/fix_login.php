<?php
require_once '../includes/db_connect.php';

echo "<h2>Admin Login Fixer</h2>";

try {
    $database = new Database();
    $db = $database->getConnection();
    echo "✅ Database connection successful.<br>";

    // 1. Check if table users exists
    $checkTable = $db->query("SHOW TABLES LIKE 'users'");
    if($checkTable->rowCount() == 0) {
        die("❌ Table 'users' does not exist! Please import the database schema first.");
    }
    echo "✅ Table 'users' exists.<br>";

    // 2. Delete existing admin to avoid conflicts
    $db->prepare("DELETE FROM users WHERE username = 'admin'")->execute();
    echo "✅ Cleared old admin user.<br>";

    // 3. Create new admin user
    $username = 'admin';
    $password = 'admin123';
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, 'admin')";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hash);
    
    if($stmt->execute()) {
        echo "✅ Created new user 'admin'.<br>";
    } else {
        die("❌ Failed to create user.");
    }

    // 4. Verify immediately
    echo "<h3>Testing Login Logic...</h3>";
    $testStmt = $db->prepare("SELECT * FROM users WHERE username = 'admin'");
    $testStmt->execute();
    $user = $testStmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo "User found in DB.<br>";
        echo "Stored Hash: " . substr($user['password'], 0, 20) . "...<br>";
        
        if (password_verify($password, $user['password'])) {
            echo "<h1 style='color:green'>SUCCESS! Logic is working.</h1>";
            echo "<p>You can now login with:</p>";
            echo "<ul><li>Username: <strong>admin</strong></li><li>Password: <strong>admin123</strong></li></ul>";
            echo "<a href='index.php'>Click here to Login</a>";
        } else {
            echo "<h1 style='color:red'>FAILURE: Password verify failed immediately.</h1>";
            echo "This indicates a server configuration issue with PHP password hashing.";
        }
    } else {
        echo "❌ Critical Error: User was inserted but cannot be found.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
