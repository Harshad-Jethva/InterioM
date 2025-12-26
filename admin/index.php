<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

require_once '../includes/db_connect.php';

$debug_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Debug 1: Check inputs
    // $debug_message .= "Input User: [" . htmlspecialchars($username) . "]<br>";
    
    $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Debug 2: Check Hash
        // $debug_message .= "DB Hash: [" . $row['password'] . "]<br>";
        
        if (password_verify($password, $row['password'])) {
            // Login Success
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username'];
            
            // Force save session
            session_write_close();
            
            // Debug 3: Link instead of header to see if it works
            // echo "Login Verified! <a href='dashboard.php'>Click to go to Dashboard</a>";
            // exit();

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Incorrect Password. Please try again.";
        }
    } else {
        $error = "Username not found.";
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
            background-color: #f3f4f6;
            background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="h-screen login-bg flex items-center justify-center">
    <div class="absolute inset-0 bg-black/60"></div>
    
    <div class="relative z-10 w-full max-w-sm bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl overflow-hidden border border-gray-200">
        <div class="p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold font-serif text-gray-900">Interio<span class="text-yellow-600">M</span></h1>
                <p class="text-gray-500 text-sm mt-2">Admin Control Panel</p>
            </div>
            
            <?php if(!empty($debug_message)): ?>
                <div class="bg-blue-100 text-blue-800 p-3 rounded mb-4 text-xs font-mono">
                    <?php echo $debug_message; ?>
                </div>
            <?php endif; ?>

            <?php if(isset($error)): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700"><?php echo $error; ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="username">Username</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" id="username" name="username" type="text" placeholder="admin" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                    <input class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" id="password" name="password" type="password" placeholder="••••••••" required>
                </div>
                <div>
                    <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors" type="submit">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
        <div class="px-6 py-3 bg-gray-50 text-center border-t border-gray-100">
             <span class="text-xs text-gray-500">System v1.0 • Protected Area</span>
        </div>
    </div>
</body>
</html>
