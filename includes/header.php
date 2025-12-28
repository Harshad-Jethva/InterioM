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
                        primary: '#1b75bc', // Twitter Blue
                        accent: '#f6ae2d', // Honey Bronze
                        secondary: '#11263e', // Prussian Blue
                        dark: '#141414', // Onyx
                        
                        // User Requested Palette
                        'onyx': '#141414',
                        'twitter-blue': '#1b75bc',
                        'prussian-blue': '#11263e',
                        'pacific-blue': '#6da4b0',
                        'chocolate-brown': '#924c1c',
                        'honey-bronze': '#f6ae2d',
                        'grey-olive': '#858585',
                        'spicy-paprika': '#cb5d2a',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Abril Fatface', 'serif'],
                        blackops: ['Black Ops One', 'system-ui'],
                        bungee: ['Bungee', 'cursive'],
                        cabin: ['Cabin Sketch', 'cursive'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Black+Ops+One&family=Bungee&family=Cabin+Sketch:wght@400;700&family=Inter:wght@300;400;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #141414; } /* Onyx background */
        
        /* Font Families */
        .font-abril { font-family: 'Abril Fatface', serif; }
        .font-black-ops { font-family: 'Black Ops One', system-ui; }
        .font-bungee { font-family: 'Bungee', cursive; }
        .font-cabin { font-family: 'Cabin Sketch', cursive; }
        
        /* Default Headings Map */
        h1 { font-family: 'Abril Fatface', serif; letter-spacing: 1px; }
        h2 { font-family: 'Black Ops One', system-ui; letter-spacing: 1.5px; }
        h3 { font-family: 'Bungee', cursive; }
        h4, h5, h6 { font-family: 'Cabin Sketch', cursive; }

        /* Advanced Animations */
        .reveal-text { clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%); }
        
        /* Text Glow Effect */
        .text-glow-gold { text-shadow: 0 0 10px rgba(246, 174, 45, 0.3), 0 0 20px rgba(246, 174, 45, 0.2); }
        .text-glow-blue { text-shadow: 0 0 10px rgba(27, 117, 188, 0.3), 0 0 20px rgba(27, 117, 188, 0.2); }

        /* Hover Animation */
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
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #f6ae2d; /* Honey Bronze */
            transform-origin: bottom right;
            transition: transform 0.3s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .hover-underline-animation:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .glass-nav {
            background: rgba(20, 20, 20, 0.85); /* Onyx-ish */
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: background 0.3s ease;
        }

        /* Glitch Animation */
        @keyframes glitch {
            0% { transform: translate(0) }
            20% { transform: translate(-2px, 2px) }
            40% { transform: translate(-2px, -2px) }
            60% { transform: translate(2px, 2px) }
            80% { transform: translate(2px, -2px) }
            100% { transform: translate(0) }
        }
        .animate-glitch:hover {
            animation: glitch 0.3s cubic-bezier(.25, .46, .45, .94) both infinite;
            color: #f6ae2d;
        }

        /* Floating Animation */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Sketch Jitter */
        @keyframes jitter {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(1deg); }
            75% { transform: rotate(-1deg); }
            100% { transform: rotate(0deg); }
        }
        .animate-sketch {
            animation: jitter 0.3s linear infinite;
        }
        .hover-sketch:hover {
            animation: jitter 0.4s linear infinite;
        }

        /* Elegant Fade Up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        .animate-fade-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* Neon Pulse */
        @keyframes neonPulse {
            0% { text-shadow: 0 0 5px rgba(246,174,45,0.5); }
            50% { text-shadow: 0 0 20px rgba(246,174,45,0.8), 0 0 30px rgba(246,174,45,0.6); }
            100% { text-shadow: 0 0 5px rgba(246,174,45,0.5); }
        }
        .animate-pulse-neon {
            animation: neonPulse 2s infinite alternate;
        }

        /* Gold/Honey Button */
        .gold-btn {
            background: linear-gradient(135deg, #f6ae2d 0%, #cb5d2a 100%); /* Honey to Paprika */
            color: #000;
            font-family: 'Black Ops One', system-ui;
            letter-spacing: 1px;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            transition: 0.6s;
            z-index: -1;
        }
        .gold-btn:hover::before {
            left: 100%;
        }
        .gold-btn:hover {
            box-shadow: 0 0 30px rgba(246, 174, 45, 0.6);
            transform: scale(1.05) translateY(-2px);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #141414; }
        ::-webkit-scrollbar-thumb { background: #444; border-radius: 5px; border: 2px solid #141414; }
        ::-webkit-scrollbar-thumb:hover { background: #f6ae2d; }
    </style>
</head>
<body class="bg-onyx text-gray-200 antialiased overflow-x-hidden flex flex-col min-h-screen">

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
