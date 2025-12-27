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
$story = [
    'title' => '',
    'description' => '',
    'before_image' => '',
    'after_image' => ''
];
$error = '';

if ($id) {
    $stmt = $db->prepare("SELECT * FROM success_stories WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $story = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Upload Helper
    function uploadImage($fileKey, $targetDir = "../uploads/") {
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == 0) {
            if (!file_exists($targetDir)) mkdir($targetDir, 0777, true);
            $fileName = time() . '_' . basename($_FILES[$fileKey]["name"]);
            $targetFile = $targetDir . $fileName;
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $fileName;
            }
        }
        return null;
    }

    $beforeImg = uploadImage('before_image');
    $afterImg = uploadImage('after_image');
    
    // Keep old images if not replaced
    $finalBefore = $beforeImg ? $beforeImg : $story['before_image'];
    $finalAfter = $afterImg ? $afterImg : $story['after_image'];

    if ($id) {
        $stmt = $db->prepare("UPDATE success_stories SET title=:t, description=:d, before_image=:b, after_image=:a WHERE id=:id");
        $stmt->bindParam(':id', $id);
    } else {
        $stmt = $db->prepare("INSERT INTO success_stories (title, description, before_image, after_image) VALUES (:t, :d, :b, :a)");
    }
    
    $stmt->bindParam(':t', $title);
    $stmt->bindParam(':d', $description);
    $stmt->bindParam(':b', $finalBefore);
    $stmt->bindParam(':a', $finalAfter);
    
    if ($stmt->execute()) {
        header("Location: success_stories.php");
        exit();
    } else {
        $error = "Failed to save.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Story - InterioM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-12 px-4">
    <div class="max-w-xl w-full bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6"><?php echo $id ? 'Edit' : 'Add'; ?> Success Story</h2>
        
        <?php if($error): ?><div class="bg-red-100 text-red-700 p-3 mb-4 rounded"><?php echo $error; ?></div><?php endif; ?>

        <form method="POST" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" required value="<?php echo htmlspecialchars($story['title']); ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-yellow-500 focus:border-yellow-500">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ring-yellow-500 focus:border-yellow-500"><?php echo htmlspecialchars($story['description']); ?></textarea>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">Before Image</label>
                     <?php if($story['before_image']): ?><img src="../uploads/<?php echo $story['before_image']; ?>" class="h-20 w-auto mb-2 rounded"><?php endif; ?>
                     <input type="file" name="before_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                </div>
                <div>
                     <label class="block text-sm font-medium text-gray-700 mb-2">After Image</label>
                     <?php if($story['after_image']): ?><img src="../uploads/<?php echo $story['after_image']; ?>" class="h-20 w-auto mb-2 rounded"><?php endif; ?>
                     <input type="file" name="after_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="success_stories.php" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-900 hover:bg-black">Save Story</button>
            </div>
        </form>
    </div>
</body>
</html>
