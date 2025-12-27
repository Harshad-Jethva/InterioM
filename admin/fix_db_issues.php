<?php
// fix_db_issues.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db_connect.php';

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Fixer</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; max-width: 800px; margin: 40px auto; padding: 20px; line-height: 1.6; background: #f9fafb; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; }
        h1 { margin-top: 0; color: #111827; }
        .success { color: #059669; font-weight: bold; background: #d1fae5; padding: 10px; border-radius: 6px; margin: 10px 0; }
        .error { color: #dc2626; font-weight: bold; background: #fee2e2; padding: 10px; border-radius: 6px; margin: 10px 0; }
        code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-family: monospace; }
        .btn { display: inline-block; background: #2563eb; color: white; text-decoration: none; padding: 10px 20px; border-radius: 6px; margin-top: 20px; font-weight: 500; }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>
<div class="card">
    <h1>Admin Panel Repair</h1>
';

try {
    $database = new Database();
    $db = $database->getConnection();
    echo "<p>✅ Database connection established.</p>";

    // 1. Force Reset Admin Password
    $adminUser = 'admin';
    $adminPass = 'admin123';
    $adminHash = password_hash($adminPass, PASSWORD_DEFAULT);

    // Check if user exists
    $stmt = $db->prepare("SELECT id FROM users WHERE username = :u");
    $stmt->bindParam(':u', $adminUser);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        // Update
        $update = $db->prepare("UPDATE users SET password = :p WHERE username = :u");
        $update->bindParam(':p', $adminHash);
        $update->bindParam(':u', $adminUser);
        $update->execute();
        echo "<div class='success'>Updated existing 'admin' password to: <code>admin123</code></div>";
    } else {
        // Create
        $insert = $db->prepare("INSERT INTO users (username, password, role) VALUES (:u, :p, 'admin')");
        $insert->bindParam(':u', $adminUser);
        $insert->bindParam(':p', $adminHash);
        $insert->execute();
        echo "<div class='success'>Created missing 'admin' user with password: <code>admin123</code></div>";
    }

    // 2. Fix admindev (The SQL file had it as plaintext, which breaks login)
    $devUser = 'admindev';
    $devPass = 'admindev123';
    $devHash = password_hash($devPass, PASSWORD_DEFAULT);
    
    $checkDev = $db->prepare("SELECT id FROM users WHERE username = :u");
    $checkDev->bindParam(':u', $devUser);
    $checkDev->execute();
    
    if($checkDev->rowCount() > 0) {
        $updateDev = $db->prepare("UPDATE users SET password = :p WHERE username = :u");
        $updateDev->bindParam(':p', $devHash);
        $updateDev->bindParam(':u', $devUser);
        $updateDev->execute();
        echo "<div class='success'>Fixed 'admindev' password hash (was plaintext). New password: <code>admindev123</code></div>";
    }

    echo "<h3>🎉 Repairs Complete</h3>";
    echo "<p>You should now be able to log in with:</p>";
    echo "<ul><li>Username: <strong>admin</strong></li><li>Password: <strong>admin123</strong></li></ul>";
    echo "<a href='index.php' class='btn'>Go to Login Page</a>";

} catch (Exception $e) {
    echo "<div class='error'>Database Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    echo "<p>Please ensure your XAMPP MySQL server is running and the database <code>interior_mis_db</code> exists.</p>";
}

echo '</div></body></html>';
?>
