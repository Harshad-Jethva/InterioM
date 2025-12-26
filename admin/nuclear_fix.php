<?php
require_once '../includes/db_connect.php';
echo "<body style='font-family: sans-serif; padding: 20px;'>";
echo "<h1>Nuclear Fix initiated...</h1>";

try {
    $database = new Database();
    $db = $database->getConnection();

    // 1. DROP TABLE
    echo "Dropping 'users' table... ";
    $db->exec("DROP TABLE IF EXISTS users");
    echo "✅ <br>";

    // 2. CREATE TABLE
    echo "Recreating 'users' table... ";
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('admin', 'sub-admin') NOT NULL DEFAULT 'sub-admin',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $db->exec($sql);
    echo "✅ <br>";

    // 3. INSERT ADMIN
    echo "Inserting Admin user... ";
    $pass = 'admin123';
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    
    // Check hash length
    if(strlen($hash) < 60) {
        die("❌ Critical Error: System is failing to generate valid bcrypt hashes.");
    }

    $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES ('admin', :pass, 'admin')");
    $stmt->bindParam(':pass', $hash);
    
    if($stmt->execute()) {
        echo "✅ <br>";
    } else {
        echo "❌ <br>";
        print_r($stmt->errorInfo());
        exit;
    }

    echo "<hr>";
    echo "<h2>Fix Complete.</h2>";
    echo "<p>The database has been completely reset for users.</p>";
    echo "<p><strong>Username:</strong> admin</p>";
    echo "<p><strong>Password:</strong> admin123</p>";
    echo "<br><a href='index.php' style='background:green; color:white; padding:10px 20px; text-decoration:none;'>Go to Login</a>";

} catch (Exception $e) {
    echo "<h1>Error: " . $e->getMessage() . "</h1>";
}
echo "</body>";
?>
