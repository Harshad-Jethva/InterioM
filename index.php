<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';

// Initialize DB for this page
$db_obj = new Database();
$conn = $db_obj->getConnection();
?>

<!-- Hero Video/Image with Overlay -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30 z-10"></div>
        <!-- High-res Background -->
        <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?ixlib=rb-4.0.3&auto=format&fit=crop&w=2500&q=80" alt="Luxury Interior" class="w-full h-full object-cover animate-pan-zoom">
    </div>

    <div class="relative z-20 text-center text-white px-4 max-w-6xl mx-auto flex flex-col items-center">
        <!-- Badge -->
        <div class="hero-element inline-block px-4 py-1 mb-6 border border-accent/50 rounded-full bg-black/30 backdrop-blur-sm">
             <span class="text-accent text-sm uppercase tracking-[0.2em] font-bungee">Premium Interior & Project Management</span>
        </div>

        <!-- Main Title -->
        <h1 class="hero-element text-5xl md:text-7xl lg:text-8xl font-bold mb-8 font-serif leading-tight tracking-tight">
            <span class="font-black-ops">Elevating</span> <span class="italic font-light text-gray-300">Spaces,</span> <br>
            Enriching <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent via-yellow-200 to-accent animate-gradient-x text-gradient-gold font-black-ops animate-glitch cursor-default">Lifestyles.</span>
        </h1>

        <!-- Descriptive Text -->
        <p class="hero-element text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Welcome to <strong class="text-white font-cabin text-2xl">Spaces by KD</strong>. We are a full-service design consultancy specializing in residential transformations, commercial ergonomics, and end-to-end turnkey execution. 
            <span class="hidden md:inline">From the first sketch to the final handover, we craft environments that tell your unique story.</span>
        </p>

        <!-- CTAs -->
        <div class="hero-element flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 w-full sm:w-auto">
            <a href="portfolio.php" class="group relative px-10 py-4 bg-accent text-white font-bold tracking-wide rounded-sm overflow-hidden transition-all duration-300 shadow-[0_0_20px_rgba(246,174,45,0.4)] hover:shadow-[0_0_30px_rgba(246,174,45,0.6)]">
                <span class="relative z-10 group-hover:text-primary transition-colors">View Our Portfolio</span>
                <div class="absolute inset-0 bg-white transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300 ease-out z-0"></div>
            </a>
            <a href="contact.php" class="group relative px-10 py-4 bg-white/5 border border-white/30 backdrop-blur-md text-white font-bold tracking-wide rounded-sm overflow-hidden transition-all duration-300 hover:bg-white/20">
                <span class="relative z-10">Start Your Project</span>
                <div class="absolute inset-0 bg-white/10 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out z-0"></div>
            </a>
        </div>
        
        <!-- Features / Tags -->
        <div class="hero-features mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-16">
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10 animate-float">
                    <i class="fas fa-home text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Residential</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10 animate-float" style="animation-delay: 0.5s;">
                    <i class="fas fa-building text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Commercial</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10 animate-float" style="animation-delay: 1s;">
                    <i class="fas fa-tools text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Turnkey</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10 animate-float" style="animation-delay: 1.5s;">
                    <i class="fas fa-paint-brush text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Consultancy</span>
             </div>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <i class="fas fa-chevron-down text-2xl"></i>
    </div>
</section>

<!-- Stats / Credibility Bar -->
<section class="bg-primary text-white border-b border-gray-800 relative z-20 -mt-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-800 text-center">
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-4xl font-bungee text-accent counter" data-target="250">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Projects Done</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-4xl font-bungee text-accent counter" data-target="15">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Design Awards</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-4xl font-bungee text-accent counter" data-target="10">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Years Active</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-4xl font-bungee text-accent counter" data-target="98">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">% Happiness</span>
            </div>
        </div>
    </div>
</section>

<!-- Our Expertise / What We Do Best -->
<section class="py-28 bg-white overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <!-- Image Side -->
            <div class="relative" data-aos="fade-right">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl group">
                    <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
                
                <!-- Floating Badge -->
                <div class="absolute -bottom-10 -right-10 bg-white p-6 rounded-xl shadow-xl z-20 animate-float">
                    <div class="flex items-center space-x-4">
                        <div class="bg-accent/10 p-3 rounded-full text-accent">
                            <i class="fas fa-certificate text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-primary font-bungee">10+</p>
                            <p class="text-xs text-gray-500 uppercase tracking-widest font-semibold">Years Experience</p>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Circle -->
                <div class="absolute -top-10 -left-10 w-40 h-40 bg-accent/10 rounded-full blur-2xl -z-10"></div>
            </div>
            
            <!-- Text Side -->
            <div data-aos="fade-left">
                <div class="pl-0 lg:pl-8">
                    <span class="inline-block py-1 px-3 border border-accent text-accent text-xs font-bold uppercase tracking-widest mb-4 rounded-full bg-accent/5">Our Expertise</span>
                    <h2 class="text-4xl lg:text-5xl font-bold text-primary mb-8 font-serif leading-tight">What We Do <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-yellow-500">Best</span></h2>
                    
                    <p class="text-gray-600 text-lg mb-10 leading-relaxed">
                        We don't just fill rooms with furniture; we curate experiences. Our expertise lies in identifying the unique rhythm of your life and translating it into a spatial reality that feels intuitive, luxurious, and distinctly yours.
                    </p>
                    
                    <!-- Expertise List -->
                    <div class="space-y-6">
                        <!-- Item 1 -->
                        <div class="group flex items-start p-4 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-100">
                            <div class="mt-1 mr-6 flex-shrink-0 w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center text-lg shadow-lg group-hover:bg-accent transition-colors duration-300">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">Strategic Planning</h4>
                                <p class="text-gray-500 text-sm leading-relaxed">We analyze your space's potential, optimizing flow and functionality before drawing a single line.</p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="group flex items-start p-4 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-100">
                            <div class="mt-1 mr-6 flex-shrink-0 w-12 h-12 bg-white border-2 border-primary text-primary rounded-full flex items-center justify-center text-lg shadow-md group-hover:border-accent group-hover:text-accent transition-colors duration-300">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">Bespoke Curation</h4>
                                <p class="text-gray-500 text-sm leading-relaxed">Sourcing rare materials and custom-designing furniture that you won't find in any catalog.</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="group flex items-start p-4 hover:bg-gray-50 rounded-lg transition-colors border border-transparent hover:border-gray-100">
                            <div class="mt-1 mr-6 flex-shrink-0 w-12 h-12 bg-gray-800 text-white rounded-full flex items-center justify-center text-lg shadow-lg group-hover:bg-accent transition-colors duration-300">
                                <i class="fas fa-hammer"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">Flawless Execution</h4>
                                <p class="text-gray-500 text-sm leading-relaxed">Our project managers coordinate every nail and stitch, ensuring on-time and on-budget delivery.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Services Highlight (Premium Cards) -->
<section class="py-24 bg-stone-100 relative overflow-hidden">
    <!-- Abstract Background Shapes -->
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-accent/5 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-accent font-bold uppercase tracking-[0.2em] text-sm mb-3 block">Our Core Services</span>
            <h2 class="text-4xl md:text-5xl font-bold text-primary font-serif">Comprehensive Design Solutions</h2>
            <div class="w-16 h-1 bg-accent mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="services-grid grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1: Interior Styling -->
            <a href="services.php" class="group relative bg-white p-10 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border-t-4 border-accent">
                <!-- Hover BG Effect -->
                <div class="absolute inset-0 bg-accent/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-accent/20 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white shadow-md rounded-lg flex items-center justify-center text-3xl text-accent mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <i class="fas fa-swatchbook"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 font-serif group-hover:text-primary transition-colors">Interior Styling</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Selecting the perfect color palette, furniture, and lighting to create a cohesive atmosphere that reflects your personality.
                    </p>
                    
                    <div class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                        <span>Discover More</span>
                        <span class="ml-3 w-8 h-[1px] bg-primary group-hover:w-12 group-hover:bg-accent transition-all duration-300"></span>
                        <i class="fas fa-chevron-right ml-[-8px] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 delay-100"></i>
                    </div>
                </div>
            </a>

             <!-- Card 2: Renovation Planning -->
             <a href="services.php" class="group relative bg-white p-10 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border-t-4 border-primary">
                <!-- Hover BG Effect -->
                <div class="absolute inset-0 bg-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-primary/20 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white shadow-md rounded-lg flex items-center justify-center text-3xl text-primary mb-8 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 font-serif group-hover:text-primary transition-colors">Renovation Planning</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Structural changes, kitchen remodels, and bathroom upgrades managed with precision engineering and design.
                    </p>
                    
                    <div class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                        <span>Discover More</span>
                        <span class="ml-3 w-8 h-[1px] bg-primary group-hover:w-12 group-hover:bg-accent transition-all duration-300"></span>
                        <i class="fas fa-chevron-right ml-[-8px] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 delay-100"></i>
                    </div>
                </div>
            </a>

             <!-- Card 3: Project Management -->
             <a href="services.php" class="group relative bg-white p-10 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border-t-4 border-gray-800">
                <!-- Hover BG Effect -->
                <div class="absolute inset-0 bg-gray-100 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-gray-200 rounded-full blur-xl group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white shadow-md rounded-lg flex items-center justify-center text-3xl text-gray-800 mb-8 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        <i class="fas fa-tasks"></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 font-serif group-hover:text-primary transition-colors">Project Management</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        We handle the budget, timelines, and contractors. You get a stress-free experience and daily progress reports.
                    </p>
                    
                    <div class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                        <span>Discover More</span>
                        <span class="ml-3 w-8 h-[1px] bg-primary group-hover:w-12 group-hover:bg-accent transition-all duration-300"></span>
                        <i class="fas fa-chevron-right ml-[-8px] opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300 delay-100"></i>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</section>

<!-- Recent Masterpieces (Cinematic Portfolio Slider) -->
<section class="py-32 bg-[#0a0a0a] relative overflow-hidden">
    <!-- Cinematic Background Elements -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[800px] h-[600px] bg-primary/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-accent/5 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/4 pointer-events-none"></div>

    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 space-y-6 md:space-y-0 px-4">
            <div data-aos="fade-right">
                 <div class="flex items-center space-x-3 mb-4">
                     <span class="h-[1px] w-12 bg-accent"></span>
                     <span class="text-accent font-bold uppercase tracking-[0.3em] text-xs">Our Portfolio</span>
                 </div>
                 <h2 class="text-5xl md:text-7xl font-bold text-white font-serif leading-tight">Recent <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-gray-200 to-gray-500">Masterpieces</span></h2>
            </div>
            
        <!-- Infinite Marquee Container -->
        <div class="marquee-container relative w-full overflow-hidden">
            <!-- Gradient Masks for Fade Affect -->
            <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-[#0a0a0a] to-transparent z-20 pointer-events-none"></div>
            <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-[#0a0a0a] to-transparent z-20 pointer-events-none"></div>

            <div class="marquee-content flex gap-8 w-max animate-marquee hover:pause-animation py-10">
                 <?php
                // Fetch Projects
                try {
                    $p_stmt = $conn->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 6");
                    $idx_projects = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch(PDOException $e) { $idx_projects = []; }
                
                // Duplicate the array to create seamless loop (at least 2 sets, maybe 3 if few items)
                $loop_projects = array_merge($idx_projects, $idx_projects, $idx_projects); 

                if(count($loop_projects) > 0):
                    foreach($loop_projects as $prj):
                        $imgSrc = !empty($prj['image_path']) ? 'uploads/' . $prj['image_path'] : 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                ?>
                <!-- Luxe Card (Medium Size) -->
                <div class="w-[80vw] md:w-[380px] flex-shrink-0 group relative rounded-xl overflow-hidden aspect-[4/5] cursor-pointer shadow-xl transition-all duration-500 hover:scale-[1.02] hover:shadow-[0_20px_50px_rgba(246,174,45,0.25)] bg-gray-900 border border-white/5" onclick="window.location.href='portfolio.php'">
                    
                    <!-- Image -->
                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" class="w-full h-full object-cover transform transition-transform duration-[1.5s] ease-out group-hover:scale-110 opacity-80 group-hover:opacity-100">
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                    
                    <!-- Floating Info Card -->
                    <div class="absolute inset-x-0 bottom-0 p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 ease-out z-20">
                        <div class="bg-white/10 backdrop-blur-md border border-white/10 p-5 rounded-lg overflow-hidden relative">
                            <!-- Shine Effect -->
                            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-white/5 to-transparent -translate-x-full group-hover:animate-shine"></div>
                            
                            <div class="relative z-10">
                                <span class="text-accent text-[10px] font-bold uppercase tracking-widest bg-black/50 px-2 py-1 rounded mb-2 inline-block backdrop-blur-sm"><?php echo htmlspecialchars($prj['category']); ?></span>
                                
                                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 font-serif leading-none group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-white group-hover:to-gray-400 transition-colors"><?php echo htmlspecialchars($prj['title']); ?></h3>
                                
                                <div class="h-0 group-hover:h-auto overflow-hidden transition-all duration-500 opacity-0 group-hover:opacity-100">
                                    <div class="mt-3 pt-3 border-t border-white/10 flex items-center text-white text-xs font-bold tracking-wider uppercase group-hover:translate-x-2 transition-transform duration-300">
                                        View Project <i class="fas fa-long-arrow-alt-right ml-2 text-accent"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hover Border -->
                    <div class="absolute inset-0 border-2 border-accent/0 group-hover:border-accent/50 rounded-xl transition-all duration-500 z-30 pointer-events-none"></div>
                </div>
                <?php endforeach; else: ?>
                    <div class="text-white text-center w-full py-10">No projects found for marquee.</div>
                <?php endif; ?>
            </div>
        </div>
         
    </div>
    
    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); } /* Ensure this matches content duplication width logic */
        }
        .animate-marquee {
            animation: marquee 40s linear infinite;
        }
        .hover\:pause-animation:hover {
            animation-play-state: paused;
        }
        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(200%); }
        }
        .group:hover .group-hover\:animate-shine {
            animation: shine 1.5s infinite linear;
        }
    </style>
</section>

<!-- Review Section (Enhanced) -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-primary mb-12">Words of Delight</h2>
        
        <div class="relative overflow-hidden h-64">
            <!-- Review 1 -->
            <div class="absolute inset-0 flex flex-col items-center justify-center active-review">
                <div class="text-accent text-4xl mb-6">“</div>
                <p class="text-2xl text-gray-700 italic font-serif mb-6 leading-relaxed">"The team at InterioM completely understood my vision. They took a vague idea and turned it into my dream home."</p>
                <div>
                   <h5 class="font-bold text-primary">Jennifer Lawrence</h5>
                   <p class="text-sm text-gray-500">New York</p>
                </div>
            </div>
             <!-- Review 2 (Hidden by logic but accessible via script usually) - Simulating with CSS or JS -->
        </div>
        
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-accent relative text-white">
    <div class="absolute inset-0 bg-black/10 pattern-dots"></div>
    <div class="max-w-5xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 font-serif">Ready to redefine your space?</h2>
        <p class="text-xl opacity-90 mb-10 max-w-2xl mx-auto">Book a free 30-minute consultation with our lead designer. No strings attached.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="contact.php" class="bg-white text-accent font-bold py-4 px-10 rounded-sm hover:bg-gray-100 transition-transform hover:-translate-y-1 shadow-lg">Schedule Now</a>
            <a href="portfolio.php" class="bg-transparent border-2 border-white text-white font-bold py-4 px-10 rounded-sm hover:bg-white hover:text-accent transition-transform hover:-translate-y-1">View Portfolio</a>
        </div>
    </div>
</section>

<style>
    /* Custom Animations for Index */
    .animate-pan-zoom { animation: pan-zoom 20s infinite alternate ease-in-out; }
    @keyframes pan-zoom { 0% { transform: scale(1.1); } 100% { transform: scale(1); } }

    .hide-scrollbars::-webkit-scrollbar { display: none; }
    .hide-scrollbars { -ms-overflow-style: none; scrollbar-width: none; }

    /* Gold Text Gradient */
    .text-gradient-gold {
        background: linear-gradient(to right, #f6ae2d, #ffdf9e, #f6ae2d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% auto;
        animation: shine 4s linear infinite;
    }
    @keyframes shine { to { background-position: 200% center; } }
</style>

<script>
    gsap.registerPlugin(ScrollTrigger);
    
    // --- Hero Animations (On Load) ---
    const heroTl = gsap.timeline({ defaults: { ease: "power3.out", duration: 1 } });
    
    heroTl.from(".hero-element", {
        y: 50,
        opacity: 0,
        stagger: 0.2,
        delay: 0.2
    })
    .from(".hero-features > div", {
        scale: 0.8,
        opacity: 0,
        y: 20,
        stagger: 0.1,
        duration: 0.8
    }, "-=0.5");

    // --- Stats Counter ---
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        gsap.to(counter, {
            scrollTrigger: { trigger: counter, start: "top 90%" },
            innerHTML: target,
            duration: 2.5,
            ease: "circ.out",
            snap: { innerHTML: 1 }
        });
    });

    // --- Content Fade-ins ---
    gsap.utils.toArray('[data-aos="fade-right"]').forEach(el => {
        gsap.fromTo(el, { x: -60, opacity: 0 }, {
            scrollTrigger: { trigger: el, start: "top 80%" },
            x: 0, opacity: 1, duration: 1.2, ease: "power4.out"
        });
    });
    
    gsap.utils.toArray('[data-aos="fade-left"]').forEach(el => {
        gsap.fromTo(el, { x: 60, opacity: 0 }, {
            scrollTrigger: { trigger: el, start: "top 80%" },
            x: 0, opacity: 1, duration: 1.2, ease: "power4.out"
        });
    });

    // --- Services Cards Stagger ---
    // Specifically target the services grid
    gsap.from(".services-grid > div", {
        scrollTrigger: { trigger: ".services-grid", start: "top 85%" },
        y: 60,
        opacity: 0,
        stagger: 0.15,
        duration: 1,
        ease: "back.out(1.7)"
    });
    
    // --- Review Section ---
    // Simple fade in for the active review
    gsap.from(".active-review", {
        scrollTrigger: { trigger: ".active-review", start: "top 80%" },
        opacity: 0,
        y: 30,
        duration: 1
    });

</script>

<?php include 'includes/footer.php'; ?>
