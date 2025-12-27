<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role']; // 'admin' or 'sub-admin'

require_once '../includes/db_connect.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    // 1. Count Ongoing Projects
    $stmt = $db->query("SELECT COUNT(*) FROM projects WHERE category = 'ongoing'");
    $ongoing_projects = $stmt->fetchColumn();

    // 2. Count Completed Projects
    $stmt = $db->query("SELECT COUNT(*) FROM projects WHERE category = 'completed'");
    $completed_projects = $stmt->fetchColumn();

    // 3. Count New Inquiries
    $stmt = $db->query("SELECT COUNT(*) FROM inquiries WHERE status = 'new'");
    $new_inquiries = $stmt->fetchColumn();

    // 4. Count Testimonials (Happy Clients)
    // Assuming all testimonials are happy clients for now
    $stmt = $db->query("SELECT COUNT(*) FROM testimonials");
    $happy_clients = $stmt->fetchColumn();

} catch (Exception $e) {
    // Fallback if DB fails
    $ongoing_projects = 0;
    $completed_projects = 0;
    $new_inquiries = 0;
    $happy_clients = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Spaces by KD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b75bc',
                        accent: '#fbb040',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-primary text-white w-64 flex-shrink-0 flex flex-col transition-all duration-300">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-2 mb-2">
                    <img src="../assest/new_logo.png" alt="Logo" class="h-12 w-auto bg-white/10 rounded p-0.5">
                    <h1 class="text-xl font-bold font-serif">Spaces by KD</h1>
                </div>
                <p class="text-xs text-gray-400 mt-1">Role: <?php echo ucfirst($role); ?></p>
            </div>
            
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-2 px-4">
                    <li>
                        <a href="dashboard.php" class="flex items-center space-x-3 bg-gray-700/50 text-accent px-4 py-3 rounded-md transition-colors">
                            <i class="fas fa-chart-line w-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-2 text-xs text-gray-500 uppercase font-semibold">Content Management</li>
                    <li>
                        <a href="projects.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-project-diagram w-5"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="testimonials.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-star w-5"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href="success_stories.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-trophy w-5"></i>
                            <span>Success Stories</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 text-xs text-gray-500 uppercase font-semibold">CRM</li>
                    <li>
                        <a href="inquiries.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-envelope-open-text w-5"></i>
                            <span>Inquiries</span>
                            <?php if($new_inquiries > 0): ?>
                                <span class="bg-red-500 text-white text-xs rounded-full px-2 py-0.5 ml-auto"><?php echo $new_inquiries; ?> New</span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <?php if($role == 'admin'): ?>
                    <li class="pt-4 pb-2 text-xs text-gray-500 uppercase font-semibold">Administration</li>
                    <li>
                        <a href="users.php" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-users-cog w-5"></i>
                            <span>User Roles</span>
                        </a>
                    </li>
                    <!--
                    <li>
                        <a href="#" class="flex items-center space-x-3 text-gray-300 hover:bg-gray-800 hover:text-white px-4 py-2 rounded-md transition-colors">
                            <i class="fas fa-file-invoice w-5"></i>
                            <span>Progress Reports</span>
                        </a>
                    </li>
                    -->
                    <?php endif; ?>
                </ul>
            </nav>
            
            <div class="p-4 border-t border-gray-700">
                <a href="logout.php" class="flex items-center space-x-3 text-gray-400 hover:text-white px-4 py-2 transition-colors">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
            <div class="container mx-auto px-6 py-8">
                <h3 class="text-gray-700 text-3xl font-medium mb-4">Analytics Overview</h3>
                
                <!-- KPI Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-md shadow-md p-6 border-l-4 border-accent">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-orange-100 text-accent">
                                <i class="fas fa-hard-hat text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Ongoing Projects</p>
                                <p class="text-2xl font-semibold text-gray-700"><?php echo $ongoing_projects; ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white rounded-md shadow-md p-6 border-l-4 border-green-500">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-500">
                                <i class="fas fa-check-circle text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Completed Projects</p>
                                <p class="text-2xl font-semibold text-gray-700"><?php echo $completed_projects; ?></p>
                            </div>
                        </div>
                    </div>
                     <!-- Card 3 -->
                     <div class="bg-white rounded-md shadow-md p-6 border-l-4 border-blue-500">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">New Inquiries</p>
                                <p class="text-2xl font-semibold text-gray-700"><?php echo $new_inquiries; ?></p>
                            </div>
                        </div>
                    </div>
                     <!-- Card 4 -->
                     <div class="bg-white rounded-md shadow-md p-6 border-l-4 border-purple-500">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Happy Clients</p>
                                <p class="text-2xl font-semibold text-gray-700"><?php echo $happy_clients; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Chart 1: Project Completion -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-700 mb-4">Monthly Project Completion</h4>
                        <div class="relative h-64">
                            <canvas id="projectChart"></canvas>
                        </div>
                    </div>
                    
                    <!-- Chart 2: Inquiry Volume -->
                     <div class="bg-white shadow-md rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-700 mb-4">Inquiry Volume</h4>
                        <div class="relative h-64">
                            <canvas id="inquiryChart"></canvas>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </div>

    <script>
        // Chart Config
        const projectCtx = document.getElementById('projectChart').getContext('2d');
        const inquiryCtx = document.getElementById('inquiryChart').getContext('2d');

        // Mock Data - In a real app, fetch via JSON buffer from PHP
        // Project Completion Chart
        new Chart(projectCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Projects Completed',
                    data: [2, 3, 5, 2, 4, 6],
                    backgroundColor: '#fbb040',
                    borderRadius: 4
                }, {
                    label: 'New Projects Started',
                    data: [3, 4, 3, 5, 4, 5],
                    backgroundColor: '#1a1a1a',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Inquiry Volume Chart
        new Chart(inquiryCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Inquiries',
                    data: [12, 19, 15, 25, 22, 30],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
