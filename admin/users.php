<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM users ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - Spaces by KD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-[#1a1a1a] text-white w-64 flex-shrink-0 flex flex-col">
             <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-2 mb-2">
                    <img src="../assest/logo.png" alt="Logo" class="h-8 w-auto bg-white/10 rounded p-0.5">
                    <h1 class="text-xl font-bold font-serif">Spaces by KD</h1>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-2 px-4">
                    <li><a href="dashboard.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md"><i class="fas fa-chart-line w-5"></i><span>Dashboard</span></a></li>
                    <li><a href="projects.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md"><i class="fas fa-project-diagram w-5"></i><span>Projects</span></a></li>
                    <li><a href="testimonials.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md"><i class="fas fa-star w-5"></i><span>Testimonials</span></a></li>
                    <li><a href="inquiries.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md"><i class="fas fa-envelope-open-text w-5"></i><span>Inquiries</span></a></li>
                    <li><a href="users.php" class="flex items-center space-x-3 bg-gray-700/50 text-[#c0a062] px-4 py-2 rounded-md"><i class="fas fa-users-cog w-5"></i><span>User Roles</span></a></li>
                </ul>
            </nav>
        </div>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Users</h2>
                <button onclick="alert('You can implement Add User form similar to Projects')" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Add User</button>
            </div>
            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Username</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Role</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $u): ?>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 font-medium">#<?php echo $u['id']; ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 font-bold"><?php echo htmlspecialchars($u['username']); ?></p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="px-3 py-1 text-xs rounded-full <?php echo $u['role'] == 'admin' ? 'bg-purple-200 text-purple-900' : 'bg-gray-200 text-gray-800'; ?>">
                                    <?php echo ucfirst($u['role']); ?>
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap"><?php echo date('M j, Y', strtotime($u['created_at'])); ?></p>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
