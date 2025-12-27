<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once '../includes/db_connect.php';

$database = new Database();
$db = $database->getConnection();

$id = isset($_GET['id']) ? $_GET['id'] : null;
$project = [
    'title' => '',
    'description' => '',
    'category' => 'ongoing',
    'completion_date' => '',
    'image_path' => ''
];
$error = '';
$success = '';

// Fetch existing project if editing
if ($id) {
    $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id LIMIT 1");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $project = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: projects.php");
        exit();
    }
}

// Handle Form Submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category = $_POST['category'];
    $completion_date = !empty($_POST['completion_date']) ? $_POST['completion_date'] : null;
    
    // File Upload Query Logic
    $image_path = $project['image_path']; // Keep old image by default

    // Handle Image Upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
             if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                 $image_path = $file_name;
             } else {
                 $error = "Sorry, there was an error uploading your file.";
             }
        } else {
            $error = "File is not an image.";
        }
    }

    if (empty($error)) {
        if ($id) {
            // Update
            $query = "UPDATE projects SET title = :title, description = :description, category = :category, completion_date = :cdate, image_path = :img WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id);
        } else {
            // Insert
            $query = "INSERT INTO projects (title, description, category, completion_date, image_path) VALUES (:title, :description, :category, :cdate, :img)";
            $stmt = $db->prepare($query);
        }

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':cdate', $completion_date);
        $stmt->bindParam(':img', $image_path);

        if ($stmt->execute()) {
            header("Location: projects.php");
            exit();
        } else {
            $error = "Database error: Could not save project.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $id ? 'Edit' : 'Add'; ?> Project - InterioM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-md">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    <?php echo $id ? 'Edit Project' : 'Add New Project'; ?>
                </h2>
            </div>
            
            <?php if ($error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"><?php echo $error; ?></div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="" method="POST" enctype="multipart/form-data">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                        <input id="title" name="title" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" value="<?php echo htmlspecialchars($project['title']); ?>">
                    </div>
                    
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" name="category" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm rounded-md">
                            <option value="ongoing" <?php echo $project['category'] == 'ongoing' ? 'selected' : ''; ?>>Ongoing</option>
                            <option value="completed" <?php echo $project['category'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="completion_date" class="block text-sm font-medium text-gray-700">Completion Date (Optional)</label>
                        <input id="completion_date" name="completion_date" type="date" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm" value="<?php echo htmlspecialchars($project['completion_date']); ?>">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="4" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"><?php echo htmlspecialchars($project['description']); ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Project Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <?php if($project['image_path']): ?>
                                    <img src="../uploads/<?php echo $project['image_path']; ?>" class="mx-auto h-32 object-cover rounded mb-2">
                                    <p class="text-xs text-gray-500">Current Image</p>
                                <?php else: ?>
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                <?php endif; ?>
                                <div class="flex text-sm text-gray-600">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-yellow-600 hover:text-yellow-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-yellow-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a href="projects.php" class="text-sm font-medium text-gray-600 hover:text-gray-500">Cancel</a>
                    <button type="submit" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-900 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
                        Save Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
