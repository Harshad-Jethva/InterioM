<?php
session_start();
require_once '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // In a real scenario, use password_verify and prepared statements strictly
    $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // For demo purposes, we are checking the hashed password against the hash we inserted in schema
        // Default password 'admin123' -> hash is in schema
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - InterioM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-bg {
            background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="h-screen login-bg flex items-center justify-center">
    <div class="absolute inset-0 bg-black/50"></div>
    
    <div class="relative z-10 w-full max-w-md bg-white rounded-lg shadow-2xl overflow-hidden">
        <div class="p-8">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Welcome Back</h2>
            <p class="text-gray-500 text-center mb-8">Sign in to manage your empire.</p>
            
            <?php if(isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo $error; ?></span>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="username" name="username" type="text" placeholder="Username">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" type="password" placeholder="******************">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition-colors" type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-gray-100 px-8 py-4 text-center">
            <p class="text-xs text-gray-500">Only authorized personnel access.</p>
        </div>
    </div>
</body>
</html>
