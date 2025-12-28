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
    'category' => 'Residential',
    'completion_date' => '',
    'image_path' => '',
    'client' => '',
    'location' => '',
    'area' => '',
    'project_year' => '',
    'architect' => ''
];
$gallery_images = [];
$error = '';
$success = '';

// Handle Image Deletion
if (isset($_GET['action']) && $_GET['action'] == 'delete_img' && isset($_GET['img_id'])) {
    $img_id = $_GET['img_id'];
    $stmt = $db->prepare("SELECT image_path FROM project_images WHERE id = :id");
    $stmt->bindParam(':id', $img_id);
    $stmt->execute();
    $img = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($img) {
        $file_path = "../uploads/" . $img['image_path'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $del_stmt = $db->prepare("DELETE FROM project_images WHERE id = :id");
        $del_stmt->bindParam(':id', $img_id);
        $del_stmt->execute();
        header("Location: project_form.php?id=" . $id); // Refresh to remove deleted image
        exit();
    }
}

// Fetch existing project if editing
if ($id) {
    $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id LIMIT 1");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $project = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Fetch Gallery Images
        $g_stmt = $db->prepare("SELECT * FROM project_images WHERE project_id = :pid");
        $g_stmt->bindParam(':pid', $id);
        $g_stmt->execute();
        $gallery_images = $g_stmt->fetchAll(PDO::FETCH_ASSOC);
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
    $client = trim($_POST['client']);
    $location = trim($_POST['location']);
    $area = trim($_POST['area']);
    $project_year = !empty($_POST['project_year']) ? $_POST['project_year'] : null;
    $architect = trim($_POST['architect']);
    
    // Main Cover Image Logic
    $image_path = $project['image_path'];
    $target_dir = "../uploads/";
    if (!file_exists($target_dir)) { mkdir($target_dir, 0777, true); }

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_name = time() . '_cover_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
             $image_path = $file_name;
        } else {
             $error = "Error uploading cover image.";
        }
    }

    if (empty($error)) {
        if ($id) {
            // Update
            $query = "UPDATE projects SET title = :title, description = :description, category = :category, completion_date = :cdate, image_path = :img, client = :client, location = :location, area = :area, project_year = :year, architect = :architect WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id);
        } else {
            // Insert
            $query = "INSERT INTO projects (title, description, category, completion_date, image_path, client, location, area, project_year, architect) VALUES (:title, :description, :category, :cdate, :img, :client, :location, :area, :year, :architect)";
            $stmt = $db->prepare($query);
        }

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':cdate', $completion_date);
        $stmt->bindParam(':img', $image_path);
        $stmt->bindParam(':client', $client);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':year', $project_year);
        $stmt->bindParam(':architect', $architect);

        if ($stmt->execute()) {
            $project_id = $id ? $id : $db->lastInsertId();
            
            // Handle Gallery Uploads
            if (isset($_FILES['gallery'])) {
                $totalParams = count($_FILES['gallery']['name']);
                for ($i = 0; $i < $totalParams; $i++) {
                    if ($_FILES['gallery']['error'][$i] == 0) {
                        $g_file_name = time() . '_' . $i . '_' . basename($_FILES['gallery']['name'][$i]);
                        $g_target_file = $target_dir . $g_file_name;
                        
                        if (move_uploaded_file($_FILES['gallery']['tmp_name'][$i], $g_target_file)) {
                            $g_insert = $db->prepare("INSERT INTO project_images (project_id, image_path) VALUES (:pid, :path)");
                            $g_insert->bindParam(':pid', $project_id);
                            $g_insert->bindParam(':path', $g_file_name);
                            $g_insert->execute();
                        }
                    }
                }
            }

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
    <title><?php echo $id ? 'Edit' : 'Add'; ?> Project - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b75bc',
                        accent: '#f6ae2d',
                        dark: '#141414',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="flex h-screen overflow-hidden">
        <!-- Re-using Sidebar (Should ideally be a component, but manual for now to match dashboard) -->
        <div class="bg-primary text-white w-64 flex-shrink-0 flex flex-col hidden md:flex">
             <div class="p-6 border-b border-white/10">
                <div class="flex items-center space-x-2">
                     <i class="fas fa-layer-group text-2xl"></i>
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                </div>
            </div>
            <nav class="flex-1 py-4">
                <ul class="space-y-1 px-4">
                     <li><a href="dashboard.php" class="block px-4 py-2 rounded text-gray-300 hover:bg-white/10 hover:text-white">Dashboard</a></li>
                     <li><a href="projects.php" class="block px-4 py-2 rounded bg-white/20 text-white font-bold">Projects</a></li>
                     <li><a href="users.php" class="block px-4 py-2 rounded text-gray-300 hover:bg-white/10 hover:text-white">Users</a></li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
             <!-- Header -->
             <div class="bg-white shadow-sm sticky top-0 z-30">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800"><?php echo $id ? 'Edit Project' : 'Add New Project'; ?></h2>
                    <a href="projects.php" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times text-xl"></i></a>
                </div>
            </div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                
                <?php if ($error): ?>
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Error</p>
                        <p><?php echo $error; ?></p>
                    </div>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data" class="space-y-8">
                    
                    <!-- Section 1: Basic Information -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Step 1</span>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Title <span class="text-red-500">*</span></label>
                                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['title']); ?>" placeholder="e.g. Modern Penthouse Renovation">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent">
                                    <option value="Residential" <?php echo $project['category'] == 'Residential' ? 'selected' : ''; ?>>Residential</option>
                                    <option value="Commercial" <?php echo $project['category'] == 'Commercial' ? 'selected' : ''; ?>>Commercial</option>
                                    <option value="Turnkey" <?php echo $project['category'] == 'Turnkey' ? 'selected' : ''; ?>>Turnkey</option>
                                    <option value="Consultancy" <?php echo $project['category'] == 'Consultancy' ? 'selected' : ''; ?>>Consultancy</option>
                                    <option value="Hospitality" <?php echo $project['category'] == 'Hospitality' ? 'selected' : ''; ?>>Hospitality</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Completion Year</label>
                                <input type="number" name="project_year" min="2000" max="2100" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['project_year']); ?>" placeholder="e.g. 2024">
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Detailed Specs -->
                     <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Project Details</h3>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Step 2</span>
                        </div>
                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Client Name</label>
                                <input type="text" name="client" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['client']); ?>" placeholder="e.g. Mr. & Mrs. Smith">
                            </div>
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                                <input type="text" name="location" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['location']); ?>" placeholder="e.g. New York, NY">
                            </div>
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Area (sq ft)</label>
                                <input type="text" name="area" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['area']); ?>" placeholder="e.g. 2500">
                            </div>
                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Lead Architect</label>
                                <input type="text" name="architect" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" value="<?php echo htmlspecialchars($project['architect']); ?>" placeholder="e.g. James Smith">
                            </div>
                            <div class="col-span-2">
                                 <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                 <textarea name="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-accent focus:border-accent" placeholder="Describe the project concept, challenges, and outcome..."><?php echo htmlspecialchars($project['description']); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Visuals & Gallery -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">Visuals</h3>
                            <span class="text-xs text-gray-500 uppercase tracking-wider">Step 3</span>
                        </div>
                        <div class="p-6 space-y-8">
                            
                            <!-- Cover Image -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start border-b border-gray-200 pb-8">
                                <div class="col-span-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
                                    <p class="text-xs text-gray-500 mb-3">This is the main image displayed on the portfolio grid.</p>
                                    <?php if($project['image_path']): ?>
                                        <div class="relative w-full h-40 rounded-lg overflow-hidden group shadow-sm mb-4">
                                            <img src="../uploads/<?php echo $project['image_path']; ?>" class="w-full h-full object-cover">
                                        </div>
                                    <?php endif; ?>
                                    <div id="cover-preview-container" class="hidden relative w-full h-40 rounded-lg overflow-hidden group shadow-sm border border-accent">
                                        <img id="cover-preview-img" src="" class="w-full h-full object-cover">
                                        <div class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded">New</div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                     <div class="flex items-center justify-center w-full">
                                        <label for="cover-upload" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                                <p class="text-sm text-gray-500"><span class="font-semibold text-accent">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF</p>
                                            </div>
                                            <input id="cover-upload" name="image" type="file" class="hidden" />
                                        </label>
                                    </div> 
                                </div>
                            </div>
                            
                            <!-- Gallery Upload -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Project Gallery</label>
                                <p class="text-xs text-gray-500 mb-4">Upload multiple images to show off different angles and details.</p>
                                
                                <div class="flex items-center justify-center w-full mb-6">
                                    <label for="gallery-upload" class="flex flex-col items-center justify-center w-full h-32 border-2 border-accent/30 border-dashed rounded-lg cursor-pointer bg-accent/5 hover:bg-accent/10 transition-colors">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <i class="fas fa-images text-3xl text-accent mb-2"></i>
                                            <p class="text-sm text-gray-600 font-semibold">Upload Multiple Images</p>
                                        </div>
                                        <input id="gallery-upload" name="gallery[]" type="file" multiple class="hidden" />
                                    </label>
                                </div> 
                                
                                <!-- New Uploads Preview -->
                                <div id="gallery-preview-grid" class="grid grid-cols-3 md:grid-cols-5 gap-4 mb-6 hidden">
                                    <!-- Dynamic content -->
                                </div> 
                                
                                <!-- Existing Gallery Grid -->
                                <?php if(count($gallery_images) > 0): ?>
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        <?php foreach($gallery_images as $img): ?>
                                            <div class="relative group rounded-lg overflow-hidden aspect-square shadow-sm">
                                                <img src="../uploads/<?php echo htmlspecialchars($img['image_path']); ?>" class="w-full h-full object-cover">
                                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                                    <a href="?id=<?php echo $id; ?>&action=delete_img&img_id=<?php echo $img['id']; ?>" class="text-white hover:text-red-400 p-2" onclick="return confirm('Delete this image?');">
                                                        <i class="fas fa-trash-alt text-xl"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <p class="text-center text-sm text-gray-400 italic">No gallery images uploaded yet.</p>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-4 pt-4">
                        <a href="projects.php" class="px-6 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                            Cancel
                        </a>
                        <button type="button" onclick="showProjectPreview()" class="px-6 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none flex items-center">
                            <i class="fas fa-eye mr-2"></i> Preview Project
                        </button>
                        <button type="submit" class="px-8 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary shadow-lg transform hover:-translate-y-0.5 transition-all">
                            Save Project
                        </button>
                    </div>

                </form>
            </div>
        </main>
    </div>
    <!-- Full Screen Preview Modal -->
    <div id="preview-modal" class="fixed inset-0 z-50 hidden bg-white overflow-y-auto">
        <div class="relative">
            <!-- Close Button for Modal -->
            <button onclick="closePreviewModal()" class="fixed top-6 right-6 z-[60] bg-white rounded-full p-2 shadow-lg text-gray-800 hover:text-red-500 transition-colors">
                <i class="fas fa-times text-2xl"></i>
            </button>

            <!-- Content Area (Mimics project_details.php) -->
            <div id="modal-content" class="w-full">
                <!-- Hero Section Params -->
                <section class="relative h-[60vh] md:h-[80vh] bg-stone-900 overflow-hidden">
                    <div class="absolute inset-0">
                        <img id="p-hero-img" src="" class="w-full h-full object-cover opacity-60">
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-900 via-transparent to-transparent"></div>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full p-8 md:p-16 z-10">
                        <div class="max-w-7xl mx-auto">
                            <span id="p-category" class="inline-block py-1 px-3 border border-yellow-500 text-yellow-500 text-sm font-bold uppercase tracking-widest mb-4 bg-black/30 backdrop-blur-md rounded-sm">Category</span>
                            <h1 id="p-title" class="text-5xl md:text-7xl font-bold font-serif text-white mb-4">Project Title</h1>
                            <p id="p-location" class="text-xl text-gray-300 max-w-2xl font-light">Location</p>
                        </div>
                    </div>
                </section>

                <!-- Detailed Content -->
                <section class="py-24 bg-white relative">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex flex-col md:flex-row gap-16">
                            <!-- Sidebar -->
                            <div class="md:w-1/3 order-2 md:order-1">
                                <div class="bg-gray-50 p-8 rounded-lg border border-gray-100 sticky top-24">
                                    <h3 class="text-2xl font-bold text-blue-900 font-serif mb-6 border-b border-gray-200 pb-4">Project Info</h3>
                                    <div class="space-y-6">
                                        <div><span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Client</span><span id="p-client" class="block text-lg font-medium text-gray-800">-</span></div>
                                        <div><span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Area</span><span id="p-area" class="block text-lg font-medium text-gray-800">-</span></div>
                                        <div><span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Year</span><span id="p-year" class="block text-lg font-medium text-gray-800">-</span></div>
                                        <div><span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Architect</span><span id="p-architect" class="block text-lg font-medium text-gray-800">-</span></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Main -->
                            <div class="md:w-2/3 order-1 md:order-2">
                                <h2 class="text-3xl font-bold text-gray-800 mb-8 font-serif">The Concept</h2>
                                <div id="p-description" class="prose prose-lg text-gray-600 leading-relaxed space-y-6"></div>
                                
                                <div class="mt-16">
                                     <h2 class="text-3xl font-bold text-gray-800 mb-8 font-serif">Gallery Preview</h2>
                                     <div id="p-gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                         <!-- JS Injected -->
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        // --- Image Preview Logic ---
        
        // Cover Image
        const coverInput = document.getElementById('cover-upload');
        const coverPreviewContainer = document.getElementById('cover-preview-container');
        const coverPreviewImg = document.getElementById('cover-preview-img');
        
        coverInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    coverPreviewImg.src = e.target.result;
                    coverPreviewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Gallery Images
        const galleryInput = document.getElementById('gallery-upload');
        const galleryPreviewGrid = document.getElementById('gallery-preview-grid');
        
        galleryInput.addEventListener('change', function(e) {
            galleryPreviewGrid.innerHTML = ''; // Clear old previews
            galleryPreviewGrid.classList.remove('hidden');
            
            const files = Array.from(e.target.files);
            
            if(files.length > 0) {
                files.forEach(file => {
                     const reader = new FileReader();
                     reader.onload = function(e) {
                         const div = document.createElement('div');
                         div.className = "relative rounded overflow-hidden aspect-square border border-gray-200";
                         div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                         galleryPreviewGrid.appendChild(div);
                     }
                     reader.readAsDataURL(file);
                });
            }
        });

        // --- Full Project Preview Logic ---
        function showProjectPreview() {
            // 1. Gather Data
            const title = document.querySelector('input[name="title"]').value || 'Project Title';
            const category = document.querySelector('select[name="category"]').value || 'Category';
            const client = document.querySelector('input[name="client"]').value || '-';
            const location_val = document.querySelector('input[name="location"]').value || 'Location';
            const area = document.querySelector('input[name="area"]').value || '-';
            const year = document.querySelector('input[name="project_year"]').value || '-';
            const architect = document.querySelector('input[name="architect"]').value || '-';
            const desc = document.querySelector('textarea[name="description"]').value || 'No description provided.';
            
            // 2. Populate Modal
            document.getElementById('p-title').innerText = title;
            document.getElementById('p-category').innerText = category;
            document.getElementById('p-client').innerText = client;
            document.getElementById('p-location').innerText = location_val;
            document.getElementById('p-area').innerText = area + ' sq ft';
            document.getElementById('p-year').innerText = year;
            document.getElementById('p-architect').innerText = architect;
            document.getElementById('p-description').innerText = desc;
            
            // 3. Handle Images for Preview
            
            // Cover: Use new upload preview if available, else existing image, else placeholder
            let coverSrc = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
            if (coverPreviewImg.src && !coverPreviewContainer.classList.contains('hidden')) {
                coverSrc = coverPreviewImg.src;
            } else {
                // Try to find existing image in DOM if in edit mode (simple check)
                const existingImg = document.querySelector('img[src^="../uploads/"]');
                if(existingImg) coverSrc = existingImg.src;
            }
            document.getElementById('p-hero-img').src = coverSrc;
            
            // Gallery
            const pGallery = document.getElementById('p-gallery-grid');
            pGallery.innerHTML = '';
            
            // Add new uploads
            if(!galleryPreviewGrid.classList.contains('hidden')) {
                 const newImgs = galleryPreviewGrid.querySelectorAll('img');
                 newImgs.forEach(img => {
                     const clone = img.cloneNode();
                     clone.className = "w-full h-64 object-cover rounded-lg shadow-sm";
                     pGallery.appendChild(clone);
                 });
            }
            
            // Add existing images (if any)
            const existingGallery = document.querySelectorAll('.grid > .relative.group > img'); // Selector for existing gallery in form
            existingGallery.forEach(img => {
                 const clone = img.cloneNode();
                 clone.className = "w-full h-64 object-cover rounded-lg shadow-sm opacity-70 grayscale hover:grayscale-0 transition-all"; // Distinguish slightly
                 pGallery.appendChild(clone);
            });

            // 4. Show Modal
            document.getElementById('preview-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Stop background scrolling
        }

        function closePreviewModal() {
             document.getElementById('preview-modal').classList.add('hidden');
             document.body.style.overflow = 'auto';
        }
    </script>
</body>
</html>
