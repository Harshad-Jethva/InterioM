<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

// Handle Delete
if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $stmt = $db->prepare("DELETE FROM success_stories WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Fetch Stories
$query = "SELECT * FROM success_stories ORDER BY created_at DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$stories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success Stories - Spaces by KD</title>
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
                    <li><a href="testimonials.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md"><i class="fas fa-star w-5"></i><span>Testimonials</span></a></li>
                    <li><a href="success_stories.php" class="flex items-center space-x-3 bg-gray-700/50 text-[#c0a062] px-4 py-2 rounded-md"><i class="fas fa-trophy w-5"></i><span>Success Stories</span></a></li>
                </ul>
            </nav>
        </div>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Success Stories</h2>
                <a href="success_story_form.php" class="bg-[#1a1a1a] text-white px-4 py-2 rounded-md shadow hover:bg-black transition-colors">
                    <i class="fas fa-plus mr-2"></i> Add New Story
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach($stories as $s): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
                    <div class="h-48 relative">
                         <!-- Before -->
                        <img src="../uploads/<?php echo $s['before_image']; ?>" class="absolute inset-0 w-1/2 h-full object-cover">
                        <div class="absolute top-2 left-2 bg-black/50 text-white text-xs px-2 py-1 rounded">Before</div>
                         <!-- After -->
                        <img src="../uploads/<?php echo $s['after_image']; ?>" class="absolute inset-y-0 right-0 w-1/2 h-full object-cover">
                        <div class="absolute top-2 right-2 bg-white/80 text-black text-xs px-2 py-1 rounded font-bold">After</div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-900 mb-1"><?php echo htmlspecialchars($s['title']); ?></h3>
                        <p class="text-sm text-gray-500 line-clamp-2"><?php echo htmlspecialchars($s['description']); ?></p>
                        <div class="mt-4 flex justify-between items-center border-t pt-2">
                             <a href="success_story_form.php?id=<?php echo $s['id']; ?>" class="text-blue-600 hover:underline text-sm">Edit</a>
                             <form method="POST" onsubmit="return confirm('Delete this story?');">
                                <input type="hidden" name="delete_id" value="<?php echo $s['id']; ?>">
                                <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                 <?php if(count($stories) == 0): ?>
                    <p class="text-gray-500 col-span-3 text-center py-10">No success stories yet.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
