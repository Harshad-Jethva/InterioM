<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

// Handle Delete Request
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $deleteQuery = "DELETE FROM projects WHERE id = :id";
    $stmt = $db->prepare($deleteQuery);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
         $success_msg = "Project deleted successfully.";
    } else {
         $error_msg = "Failed to delete project.";
    }
}

// Fetch Projects
$query = "SELECT * FROM projects ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Projects - Spaces by KD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Reusing Sidebar (should normally be an include) -->
        <div class="bg-[#1a1a1a] text-white w-64 flex-shrink-0 flex flex-col transition-all duration-300">
             <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-2 mb-2">
                    <img src="../assest/logo.png" alt="Logo" class="h-8 w-auto bg-white/10 rounded p-0.5">
                    <h1 class="text-xl font-bold font-serif">Spaces by KD</h1>
                </div>
                <p class="text-xs text-gray-400 mt-1">Admin Panel</p>
            </div>
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-2 px-4">
                    <li><a href="dashboard.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors"><i class="fas fa-chart-line w-5"></i><span>Dashboard</span></a></li>
                    <li><a href="projects.php" class="flex items-center space-x-3 bg-gray-700/50 text-[#c0a062] px-4 py-2 rounded-md transition-colors"><i class="fas fa-project-diagram w-5"></i><span>Projects</span></a></li>
                </ul>
            </nav>
        </div>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Projects</h2>
                <a href="project_form.php" class="bg-[#1a1a1a] hover:bg-black text-white px-4 py-2 rounded-md shadow-sm transition-colors">
                    <i class="fas fa-plus mr-2"></i> Add New Project
                </a>
            </div>

            <?php if(isset($success_msg)): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert"><?php echo $success_msg; ?></div>
            <?php endif; ?>
            
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($projects) > 0): ?>
                            <?php foreach($projects as $project): ?>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex-shrink-0 w-16 h-16">
                                        <?php if(!empty($project['image_path'])): ?>
                                            <img class="w-full h-full rounded object-cover" src="../uploads/<?php echo htmlspecialchars($project['image_path']); ?>" alt="" />
                                        <?php else: ?>
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">No Img</div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap font-medium"><?php echo htmlspecialchars($project['title']); ?></p>
                                    <p class="text-gray-500 text-xs mt-1 truncate max-w-xs"><?php echo htmlspecialchars(substr($project['description'], 0, 50)) . '...'; ?></p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap capitalize"><?php echo htmlspecialchars($project['category']); ?></p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight <?php echo $project['category'] == 'completed' ? 'text-green-900' : 'text-orange-900'; ?>">
                                        <span aria-hidden="true" class="absolute inset-0 <?php echo $project['category'] == 'completed' ? 'bg-green-200' : 'bg-orange-200'; ?> opacity-50 rounded-full"></span>
                                        <span class="relative"><?php echo ucfirst($project['category']); ?></span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center space-x-4">
                                        <a href="project_form.php?id=<?php echo $project['id']; ?>" class="text-blue-600 hover:text-blue-900"><i class="fas fa-edit"></i> Edit</a>
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                            <input type="hidden" name="delete_id" value="<?php echo $project['id']; ?>">
                                            <button type="submit" class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">No projects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
