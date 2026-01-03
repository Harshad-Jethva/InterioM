<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaces by KD | InterioM</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Abril+Fatface&family=Bungee&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Three.js & GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        canvas: '#F9F8F6',
                        surface: '#FFFFFF',
                        primary: '#1A3C54',
                        accent: '#E06C3E',
                        secondary: '#BEDEDF',
                        'organic-green': '#C4D6B0',
                        'sand-paper': '#EFE8D8', // New Beige/Tan color from reference
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        serif: ['Abril Fatface', 'serif'],
                        bungee: ['Bungee', 'cursive'],
                    },
                    borderRadius: {
                        '4xl': '2rem',
                        '5xl': '3rem',
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(224, 108, 62, 0.3)',
                        'glass': '0 8px 32px -4px rgba(26, 60, 84, 0.05)',
                        'paper': '0 4px 20px rgba(0,0,0,0.06)',
                    },
                    zIndex: {
                        '999': '999',
                    }
                }
            }
        }
    </script>
    
    <style>
        body { 
            font-family: 'Outfit', sans-serif; 
            background-color: #F9F8F6;
            color: #1A3C54;
            overflow-x: hidden;
        }
        
        /* Smooth Scrolling */
        html { scroll-behavior: smooth; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F9F8F6; }
        ::-webkit-scrollbar-thumb { background: #E06C3E; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #1A3C54; }

        /* Nav Item Hover */
        .nav-link { position: relative; overflow: hidden; }
        /* Simple subtle underline or color shift for the 'paper' theme */
        .nav-link:hover { color: #E06C3E; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

<!-- Fixed Desktop Navigation Architecture -->
<header class="fixed top-0 left-0 w-full h-0 z-[999] pointer-events-none">
    
    <!-- 1. The Anchor Logo (Top Left) -->
    <!-- Added subtle text label above logo to match "Naarm/Melbourne" style -->
    <div id="brand-logo" class="pointer-events-auto fixed top-6 left-6 xl:left-12 z-[1000] flex flex-col items-start justify-center transition-all duration-500 origin-top-left">
        
        <!-- Decoration Text (Visible only when large) -->
        <!-- <span id="logo-label" class="text-[10px] uppercase tracking-widest text-primary/60 mb-1 ml-1 opacity-100 transition-opacity duration-300 font-bold">Design / Build</span> -->

        <div id="logo-container" class="relative bg-white shadow-xl shadow-gray-200/50 group-hover:shadow-glow transition-all duration-500 overflow-hidden ring-1 ring-black/5 rounded-2xl flex items-center justify-center">
            <a href="index.php" class="relative group flex items-center justify-center w-full h-full">
                <!-- Large Rectangular Logo (Initial) -->
                <img src="assest/new_logo.png" alt="Spaces by KD" id="logo-rect" class="absolute w-full h-full object-contain p-3 opacity-100 transition-opacity duration-300">
                <!-- Small Circular Logo (Scrolled) -->
                <img src="assest/logoi.png" alt="S" id="logo-circle" class="absolute w-full h-full object-cover opacity-0 transition-opacity duration-300">
            </a>
        </div>
    </div>

    <!-- 2. The Floating Navbar (Top Center) -->
    <!-- Redesigned: Beige Pill with Socials & Dropdown Arrows -->
    <nav id="main-nav" class="pointer-events-auto fixed top-8 left-1/2 -translate-x-1/2 z-[999] hidden xl:flex items-center gap-8 px-10 py-3 bg-sand-paper rounded-full shadow-paper transform transition-all duration-500 origin-center border border-primary/5">
        
        <!-- Links Group -->
        <div class="flex items-center gap-6 text-sm font-medium text-primary">
            <a href="index.php" class="nav-link flex items-center gap-1 transition-colors">
                Home
            </a>
            <a href="about.php" class="nav-link flex items-center gap-1 transition-colors">
                About <i class="fas fa-chevron-down text-[0.6rem] opacity-50 mt-0.5"></i>
            </a>
            <a href="services.php" class="nav-link flex items-center gap-1 transition-colors">
                Services <i class="fas fa-chevron-down text-[0.6rem] opacity-50 mt-0.5"></i>
            </a>
            <a href="portfolio.php" class="nav-link flex items-center gap-1 transition-colors">
                Portfolio <i class="fas fa-chevron-down text-[0.6rem] opacity-50 mt-0.5"></i>
            </a>
            <a href="success_stories.php" class="nav-link flex items-center gap-1 transition-colors">
                Stories
            </a>
            <a href="contact.php" class="nav-link flex items-center gap-1 transition-colors font-semibold">
                Contact
            </a>
        </div>

        <!-- Divider -->
        <div class="w-px h-4 bg-primary/10"></div>
        
        <!-- Social Icons (Inside Pill) -->
        <div class="flex items-center gap-4 text-primary">
            <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-instagram text-lg"></i></a>
            <a href="#" class="hover:text-accent transition-colors"><i class="fab fa-facebook text-lg"></i></a>
        </div>

    </nav>
    
    <!-- 3. Search Button (Floating Right) -->
    <!-- Matches the circle magnifying glass in reference -->
    <button id="search-btn" class="pointer-events-auto fixed top-8 right-32 z-[999] hidden xl:flex w-12 h-12 bg-sand-paper rounded-full shadow-paper border border-primary/5 items-center justify-center text-primary hover:bg-white transition-all transform hover:scale-105">
        <i class="fas fa-search text-lg"></i>
    </button>

    <!-- 4. Mobile Navigation Trigger (Top Right) -->
    <div class="pointer-events-auto xl:hidden fixed top-8 right-6 z-[1000]">
        <button id="mobile-toggle" class="w-14 h-14 bg-white/90 backdrop-blur-md rounded-full shadow-xl flex items-center justify-center text-primary border border-white/50 hover:bg-accent hover:text-white transition-all duration-300 group">
            <i class="fas fa-bars text-xl group-hover:rotate-180 transition-transform duration-300"></i>
        </button>
    </div>

</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 bg-white/98 backdrop-blur-xl z-[990] hidden flex flex-col items-center justify-center opacity-0 transition-opacity duration-300">
    <div class="space-y-8 text-center" id="mobile-links">
        <a href="index.php" class="block text-4xl font-serif text-primary hover:text-accent transform hover:scale-105 transition-all">Home</a>
        <a href="about.php" class="block text-4xl font-serif text-primary hover:text-accent transform hover:scale-105 transition-all">About</a>
        <a href="services.php" class="block text-4xl font-serif text-primary hover:text-accent transform hover:scale-105 transition-all">Services</a>
        <a href="portfolio.php" class="block text-4xl font-serif text-primary hover:text-accent transform hover:scale-105 transition-all">Portfolio</a>
        <a href="success_stories.php" class="block text-4xl font-serif text-primary hover:text-accent transform hover:scale-105 transition-all">Stories</a>
        <a href="contact.php" class="inline-block px-12 py-5 bg-accent text-white font-bold text-lg rounded-full shadow-2xl mt-8">Start a Project</a>
    </div>
</div>

<script>
    // Register GSAP Plugins
    gsap.registerPlugin(ScrollTrigger);

    document.addEventListener("DOMContentLoaded", () => {
        // --- Desktop Navbar Logic ---
        const brandWrapper = document.getElementById('brand-logo'); // Wrapper
        const logoContainer = document.getElementById('logo-container'); // The Box
        const logoLabel = document.getElementById('logo-label'); // Text above
        
        const logoRect = document.getElementById('logo-rect');
        const logoCircle = document.getElementById('logo-circle');
        
        const nav = document.getElementById('main-nav');
        const searchBtn = document.getElementById('search-btn');
        
        // Initial intro
        gsap.from(nav, { y: -100, opacity: 0, duration: 1, ease: "power4.out", delay: 0.2 });
        gsap.from(searchBtn, { x: 50, opacity: 0, duration: 1, ease: "power4.out", delay: 0.3 });
        gsap.from(brandWrapper, { x: -100, opacity: 0, duration: 1, ease: "power4.out", delay: 0.2 });

        // Initial Style for Large Rect Logo
        gsap.set(logoContainer, { 
            width: 220, 
            height: 70, 
            borderRadius: "16px" 
        });

        // Scroll Animation Timeline
        let navScrollTl = gsap.timeline({
            scrollTrigger: {
                trigger: "body", 
                start: "top top",
                end: "200px top", 
                scrub: 0.5, 
                toggleActions: "play reverse play reverse"
            }
        });

        // 1. Morph Logo Container
        navScrollTl.to(logoContainer, {
            width: 60, height: 60, borderRadius: "50%",
            boxShadow: "0 0 0 4px rgba(26, 60, 84, 0.1), 0 8px 32px rgba(224, 108, 62, 0.3)",
            duration: 0.5, ease: "power2.inOut"
        }, 0);
        
        // Hide Label Text
        navScrollTl.to(logoLabel, { opacity: 0, height: 0, marginBottom: 0, duration: 0.3 }, 0);

        // 2. Crossfade Images
        navScrollTl.to(logoRect, { opacity: 0, scale: 0.5, duration: 0.4 }, 0);
        navScrollTl.to(logoCircle, { opacity: 1, scale: 1, duration: 0.4 }, 0.1);


        // 3. Hide/Collapse Main Navbar AND Search Button
        if(window.innerWidth >= 1280) { 
             
             // Move Nav to logo
             navScrollTl.to(nav, {
                x: -(window.innerWidth / 2) + 80, 
                y: 0, scaleX: 0.1, scaleY: 0.5, opacity: 0, pointerEvents: 'none',
                duration: 0.8, ease: "power3.inOut"
             }, 0);
             
             // Fade out search button
             navScrollTl.to(searchBtn, {
                scale: 0, opacity: 0, duration: 0.5
             }, 0);
        }

        // --- Interaction: Hover Logo to Show Nav ---
        logoContainer.addEventListener('mouseenter', () => {
            if (window.scrollY > 200 && window.innerWidth >= 1280) {
                gsap.to(nav, { 
                    x: 0, scaleX: 1, scaleY: 1, opacity: 1, pointerEvents: 'auto',
                    duration: 0.4, ease: "back.out(1.7)" 
                });
                gsap.to(searchBtn, { 
                    scale: 1, opacity: 1, duration: 0.4, delay: 0.1 
                });
            }
        });

        // Leave Nav Area (and Logo) -> Collapse
        // We add logic to a shared container concept or check bounds, 
        // but simplemouseleave on navbar works if we trigger it right.
        nav.addEventListener('mouseleave', () => {
            if (window.scrollY > 200 && window.innerWidth >= 1280) {
                gsap.to(nav, {
                    x: -(window.innerWidth / 2) + 80,
                    scaleX: 0.1, scaleY: 0.5, opacity: 0, pointerEvents: 'none',
                    duration: 0.4, ease: "power3.in"
                });
                gsap.to(searchBtn, { scale: 0, opacity: 0, duration: 0.3 });
            }
        });


        // --- Mobile Menu ---
        const mobileBtn = document.getElementById('mobile-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.getElementById('mobile-links');
        let isMobileOpen = false;

        mobileBtn.addEventListener('click', () => {
            isMobileOpen = !isMobileOpen;
            if(isMobileOpen) {
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0');
                    gsap.fromTo(mobileLinks.children, 
                        { y: 50, opacity: 0 },
                        { y: 0, opacity: 1, stagger: 0.1, duration: 0.5, ease: "power2.out" }
                    );
                }, 10);
                mobileBtn.innerHTML = '<i class="fas fa-times text-xl"></i>';
            } else {
                mobileMenu.classList.add('opacity-0');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
                mobileBtn.innerHTML = '<i class="fas fa-bars text-xl"></i>';
            }
        });
    });
</script>

<!-- Content Spacer -->
<div class="h-0"></div>
