<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaces by KD</title>
    
            <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1b75bc', // Brand Blue
                        accent: '#fbb040', // Brand Orange
                        secondary: '#f3f4f6',
                        dark: '#0f0f0f',
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
        body { font-family: 'Inter', sans-serif; background-color: #0f0f0f; } /* Dark theme base */
        h1, h2, h3, h4 { font-family: 'Playfair Display', serif; }
        
        /* Advanced Animations */
        .reveal-text { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); }
        
        .hover-underline-animation {
            display: inline-block;
            position: relative;
            text-decoration: none;
        }
        .hover-underline-animation::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 1px;
            bottom: -4px;
            left: 0;
            background-color: #fbb040;
            transform-origin: bottom right;
            transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .hover-underline-animation:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .glass-nav {
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            transition: background 0.3s ease;
        }

        /* Gold Glow Button replaced with Brand Orange */
        .gold-btn {
            background: linear-gradient(135deg, #fbb040 0%, #e09b30 100%);
            color: #000;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 1;
            display: inline-block;
        }
        .gold-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
            transition: 0.6s;
            z-index: -1;
        }
        .gold-btn:hover::before {
            left: 100%;
        }
        .gold-btn:hover {
            box-shadow: 0 0 25px rgba(251, 176, 64, 0.5);
            transform: scale(1.05);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f0f0f; }
        ::-webkit-scrollbar-thumb { background: #444; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #fbb040; }
    </style>
</head>
<body class="bg-[#0f0f0f] text-gray-200 antialiased overflow-x-hidden flex flex-col min-h-screen">

<!-- Navigation -->
<nav class="fixed w-full z-50 glass-nav transition-all duration-500 ease-in-out" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center group cursor-pointer">
                <a href="index.php" class="flex items-center space-x-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-accent/20 blur-lg rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <img src="assest/new_logo.png" alt="Spaces by KD" class="relative h-20 w-auto transform group-hover:scale-105 transition-transform duration-500 drop-shadow-xl">
                    </div>
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-10 items-center">
                <a href="index.php" class="text-gray-300 hover:text-white font-medium text-xs uppercase tracking-[0.15em] hover-underline-animation transition-colors">Home</a>
                <a href="about.php" class="text-gray-300 hover:text-white font-medium text-xs uppercase tracking-[0.15em] hover-underline-animation transition-colors">About</a>
                <a href="services.php" class="text-gray-300 hover:text-white font-medium text-xs uppercase tracking-[0.15em] hover-underline-animation transition-colors">Services</a>
                <a href="portfolio.php" class="text-gray-300 hover:text-white font-medium text-xs uppercase tracking-[0.15em] hover-underline-animation transition-colors">Portfolio</a>
                <a href="success_stories.php" class="text-gray-300 hover:text-white font-medium text-xs uppercase tracking-[0.15em] hover-underline-animation transition-colors">Stories</a>
                <a href="contact.php" class="px-8 py-3 gold-btn font-bold text-xs uppercase tracking-widest rounded-sm shadow-xl">Contact Us</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-white hover:text-accent focus:outline-none p-2 transition-colors transform hover:rotate-90 duration-300">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-black/95 backdrop-blur-xl absolute w-full border-t border-gray-800" id="mobile-menu">
        <div class="px-4 pt-6 pb-8 space-y-4 flex flex-col items-center">
            <a href="index.php" class="block px-3 py-2 text-lg font-medium text-gray-300 hover:text-accent transition-colors tracking-widest">HOME</a>
            <a href="about.php" class="block px-3 py-2 text-lg font-medium text-gray-300 hover:text-accent transition-colors tracking-widest">ABOUT</a>
            <a href="services.php" class="block px-3 py-2 text-lg font-medium text-gray-300 hover:text-accent transition-colors tracking-widest">SERVICES</a>
            <a href="portfolio.php" class="block px-3 py-2 text-lg font-medium text-gray-300 hover:text-accent transition-colors tracking-widest">PORTFOLIO</a>
            <a href="success_stories.php" class="block px-3 py-2 text-lg font-medium text-gray-300 hover:text-accent transition-colors tracking-widest">STORIES</a>
            <a href="contact.php" class="mt-6 px-10 py-4 gold-btn text-primary font-bold rounded-sm w-full text-center tracking-widest">CONTACT US</a>
        </div>
    </div>
</nav>
<div class="h-24"></div> <!-- Spacer for fixed nav -->
