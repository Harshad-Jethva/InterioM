<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interior & Project Management Consultancy</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a1a1a',
                        accent: '#c0a062', // Gold-ish accent
                        secondary: '#f3f4f6',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4 { font-family: 'Playfair Display', serif; }
        
        .gsap-fade-in { opacity: 0; transform: translateY(20px); }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #c0a062;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #a08042;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased overflow-x-hidden flex flex-col min-h-screen">

<!-- Navigation -->
<nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md shadow-sm transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex-shrink-0 flex items-center">
                <a href="index.php" class="text-3xl font-bold font-serif text-primary">Interio<span class="text-accent">M</span></a>
            </div>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="index.php" class="text-gray-700 hover:text-accent font-medium transition-colors relative group">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="about.php" class="text-gray-700 hover:text-accent font-medium transition-colors relative group">
                    About
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="services.php" class="text-gray-700 hover:text-accent font-medium transition-colors relative group">
                    Services
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="portfolio.php" class="text-gray-700 hover:text-accent font-medium transition-colors relative group">
                    Portfolio
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300 group-hover:w-full"></span>
                </a>
                 <a href="success_stories.php" class="text-gray-700 hover:text-accent font-medium transition-colors relative group">
                    Stories
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-accent transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="contact.php" class="px-6 py-2.5 bg-primary text-white font-medium rounded-sm hover:bg-accent hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">Contact Us</a>
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-primary focus:outline-none p-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white shadow-xl absolute w-full border-t border-gray-100" id="mobile-menu">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="index.php" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-accent rounded-md">Home</a>
            <a href="about.php" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-accent rounded-md">About</a>
            <a href="services.php" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-accent rounded-md">Services</a>
            <a href="portfolio.php" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-accent rounded-md">Portfolio</a>
            <a href="success_stories.php" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-accent rounded-md">Stories</a>
            <a href="contact.php" class="block px-3 py-3 text-base font-medium text-white bg-primary rounded-md mt-4 text-center">Contact Us</a>
        </div>
    </div>
</nav>
<div class="h-20"></div> <!-- Spacer for fixed nav -->
