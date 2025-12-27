<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $stmt = $db->prepare("DELETE FROM testimonials WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

$query = "SELECT * FROM testimonials ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$testimonials = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Testimonials - Spaces by KD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
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
                    <li><a href="testimonials.php" class="flex items-center space-x-3 bg-gray-700/50 text-[#c0a062] px-4 py-2 rounded-md"><i class="fas fa-star w-5"></i><span>Testimonials</span></a></li>
                </ul>
            </nav>
        </div>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Testimonials</h2>
                <!-- Minimal Add Button (could link to form) -->
                <button onclick="alert('Implement Add Testimonial Form akin to Projects!')" class="bg-[#1a1a1a] text-white px-4 py-2 rounded-md">
                    <i class="fas fa-plus mr-2"></i> Add New
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach($testimonials as $t): ?>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-xl font-serif text-gray-600">
                            <?php echo strtoupper(substr($t['client_name'], 0, 1)); ?>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($t['client_name']); ?></p>
                            <div class="flex text-yellow-400 text-xs">
                                <?php for($i=0; $i<$t['rating']; $i++) echo '<i class="fas fa-star"></i>'; ?>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm italic">"<?php echo htmlspecialchars($t['review_text']); ?>"</p>
                    <div class="mt-4 flex justify-end">
                         <form method="POST" onsubmit="return confirm('Delete?');">
                            <input type="hidden" name="delete_id" value="<?php echo $t['id']; ?>">
                            <button class="text-red-500 hover:text-red-700 text-xs uppercase font-semibold">Delete</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
                 <?php if(count($testimonials) == 0): ?>
                    <p class="text-gray-500 col-span-3 text-center py-10">No testimonials yet.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
