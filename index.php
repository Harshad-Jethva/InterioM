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
             <span class="text-accent text-sm uppercase tracking-[0.2em] font-bold">Premium Interior & Project Management</span>
        </div>

        <!-- Main Title -->
        <h1 class="hero-element text-5xl md:text-7xl lg:text-8xl font-bold mb-8 font-serif leading-tight tracking-tight">
            Elevating <span class="italic font-light text-gray-300">Spaces,</span> <br>
            Enriching <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent via-yellow-200 to-accent animate-gradient-x text-gradient-gold">Lifestyles.</span>
        </h1>

        <!-- Descriptive Text -->
        <p class="hero-element text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto font-light leading-relaxed">
            Welcome to <strong class="text-white">Spaces by KD</strong>. We are a full-service design consultancy specializing in residential transformations, commercial ergonomics, and end-to-end turnkey execution. 
            <span class="hidden md:inline">From the first sketch to the final handover, we craft environments that tell your unique story.</span>
        </p>

        <!-- CTAs -->
        <div class="hero-element flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 w-full sm:w-auto">
            <a href="portfolio.php" class="group relative px-10 py-4 bg-accent text-white font-bold tracking-wide rounded-sm overflow-hidden transition-all duration-300 shadow-[0_0_20px_rgba(251,176,64,0.4)] hover:shadow-[0_0_30px_rgba(251,176,64,0.6)]">
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
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10">
                    <i class="fas fa-home text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Residential</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10">
                    <i class="fas fa-building text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Commercial</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10">
                    <i class="fas fa-tools text-lg text-white"></i>
                 </div>
                 <span class="text-xs uppercase tracking-widest font-semibold text-gray-400 group-hover:text-white transition-colors">Turnkey</span>
             </div>
             <div class="flex flex-col items-center space-y-3 group cursor-pointer">
                 <div class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full group-hover:bg-accent group-hover:scale-110 transition-all duration-300 border border-white/10">
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
                <span class="block text-3xl font-bold text-accent counter" data-target="250">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Projects Done</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-3xl font-bold text-accent counter" data-target="15">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Design Awards</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-3xl font-bold text-accent counter" data-target="10">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">Years Active</span>
            </div>
            <div class="py-8 hover:bg-gray-800 transition-colors">
                <span class="block text-3xl font-bold text-accent counter" data-target="98">0</span>
                <span class="text-xs text-gray-400 uppercase tracking-widest mt-1">% Happiness</span>
            </div>
        </div>
    </div>
</section>

<!-- Introduction 'Who We Are' -->
<section class="py-28 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-5 relative" data-aos="fade-right">
                <div class="relative z-10">
                    <img src="https://images.unsplash.com/photo-1596205730303-34e2c8a2455b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="rounded-lg shadow-2xl w-full">
                </div>
                <!-- Offset Image -->
                <div class="absolute -bottom-10 -right-10 w-2/3 border-8 border-white rounded-lg shadow-xl z-20 hidden md:block">
                     <img src="https://images.unsplash.com/photo-1556912998-c57cc6b63cd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="w-full rounded-lg">
                </div>
                <!-- Deco Shape -->
                <div class="absolute top-10 -left-10 w-24 h-24 bg-accent/20 rounded-full z-0"></div>
            </div>
            
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="pl-0 lg:pl-10">
                    <h5 class="text-accent font-bold uppercase tracking-widest mb-4">About Spaces by KD</h5>
                    <h2 class="text-4xl lg:text-5xl font-bold text-primary mb-8 font-serif leading-tight">We Bring <span class="italic text-accent">Soul</span> to Your Space</h2>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        Spaces by KD is an award-winning interior consultancy firm based in New York. We believe that good design is a powerful tool that can transform how you live, work, and feel.
                    </p>
                    <p class="text-gray-600 leading-relaxed mb-8">
                        Our integrated approach combines architecture, design, and project management to ensure seamless execution. From the initial layout to the final cushion placement, we manage the chaos so you can enjoy the creation.
                    </p>
                    
                    <div class="flex items-center space-x-8 mb-8">
                        <div class="flex items-center">
                            <div class="p-3 bg-gray-100 rounded-full text-accent mr-4">
                                <i class="fas fa-drafting-compass text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary">Custom Design</h4>
                                <p class="text-sm text-gray-500">Tailored to your taste</p>
                            </div>
                        </div>
                         <div class="flex items-center">
                            <div class="p-3 bg-gray-100 rounded-full text-accent mr-4">
                                <i class="fas fa-toolbox text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-primary">Master Build</h4>
                                <p class="text-sm text-gray-500">Quality execution</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="about.php" class="text-primary font-bold border-b-2 border-accent pb-1 hover:text-accent transition-colors">Read Our Story &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Highlight -->
<section class="py-24 bg-gray-50 relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-accent/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h5 class="text-accent font-bold uppercase tracking-[0.2em] mb-3 text-sm">Our Expertise</h5>
            <h2 class="text-4xl md:text-5xl font-bold text-primary font-serif">What We Do Best</h2>
            <div class="w-24 h-1 bg-accent mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="services-grid grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-10 rounded-sm shadow-xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500 group cursor-pointer border border-gray-100 hover:-translate-y-2 hover:border-accent/30 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition-colors group-hover:bg-accent/10"></div>
                
                <div class="w-16 h-16 bg-white border border-gray-200 text-primary group-hover:text-white group-hover:bg-accent group-hover:border-accent rounded-full flex items-center justify-center text-2xl mb-8 transition-all duration-500 shadow-sm relative z-10">
                    <i class="fas fa-couch transform group-hover:rotate-12 transition-transform duration-500"></i>
                </div>
                
                <h3 class="text-2xl font-bold text-primary mb-4 font-serif group-hover:text-accent transition-colors">Interior Styling</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Selecting the perfect color palette, furniture, and lighting to create a cohesive atmosphere that reflects your personality.
                </p>
                
                <a href="services.php" class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                    <span class="border-b border-primary group-hover:border-accent pb-1 transition-colors">Learn More</span>
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>

             <!-- Card 2 -->
             <div class="bg-white p-10 rounded-sm shadow-xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500 group cursor-pointer border border-gray-100 hover:-translate-y-2 hover:border-accent/30 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition-colors group-hover:bg-accent/10"></div>
                
                <div class="w-16 h-16 bg-white border border-gray-200 text-primary group-hover:text-white group-hover:bg-accent group-hover:border-accent rounded-full flex items-center justify-center text-2xl mb-8 transition-all duration-500 shadow-sm relative z-10">
                    <i class="fas fa-pencil-ruler transform group-hover:rotate-12 transition-transform duration-500"></i>
                </div>
                
                <h3 class="text-2xl font-bold text-primary mb-4 font-serif group-hover:text-accent transition-colors">Renovation Planning</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Structural changes, kitchen remodels, and bathroom upgrades managed with precision engineering and design.
                </p>
                
                <a href="services.php" class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                    <span class="border-b border-primary group-hover:border-accent pb-1 transition-colors">Learn More</span>
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>

             <!-- Card 3 -->
             <div class="bg-white p-10 rounded-sm shadow-xl hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500 group cursor-pointer border border-gray-100 hover:-translate-y-2 hover:border-accent/30 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gray-50 rounded-bl-full -mr-4 -mt-4 transition-colors group-hover:bg-accent/10"></div>
                
                <div class="w-16 h-16 bg-white border border-gray-200 text-primary group-hover:text-white group-hover:bg-accent group-hover:border-accent rounded-full flex items-center justify-center text-2xl mb-8 transition-all duration-500 shadow-sm relative z-10">
                    <i class="fas fa-chart-pie transform group-hover:rotate-12 transition-transform duration-500"></i>
                </div>
                
                <h3 class="text-2xl font-bold text-primary mb-4 font-serif group-hover:text-accent transition-colors">Project Management</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    We handle the budget, timelines, and contractors. You get a stress-free experience and daily progress reports.
                </p>
                
                <a href="services.php" class="inline-flex items-center text-primary font-bold uppercase tracking-widest text-xs group-hover:text-accent transition-colors">
                    <span class="border-b border-primary group-hover:border-accent pb-1 transition-colors">Learn More</span>
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Projects Slider -->
<section class="py-24 bg-primary relative overflow-hidden">
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 p-12 opacity-10 pointer-events-none">
        <svg width="300" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fbb040" d="M42.7,-72.8C54.4,-67.2,62.3,-53.6,68.9,-40.8C75.5,-28,80.8,-15.9,79.5,-4.4C78.2,7,70.2,17.9,62.1,28.2C54,38.5,45.8,48.2,35.8,55.8C25.8,63.4,14,68.9,1.7,66C-10.6,63.1,-23.4,51.8,-35.1,43.2C-46.8,34.6,-57.4,28.7,-64.7,19.3C-72,10,-76,-2.8,-73.4,-14.7C-70.8,-26.6,-61.6,-37.6,-51.2,-44.7C-40.8,-51.8,-29.2,-55,-17.8,-58.3C-6.4,-61.6,4.8,-65.1,17.2,-67.4C29.6,-69.7,43.2,-70.8,42.7,-72.8Z" transform="translate(100 100)" />
        </svg>
    </div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 space-y-6 md:space-y-0">
            <div data-aos="fade-right">
                 <h5 class="text-accent font-bold uppercase tracking-[0.2em] mb-3 text-sm">Portfolio</h5>
                 <h2 class="text-4xl md:text-5xl font-bold text-white font-serif">Recent Masterpieces</h2>
                 <div class="w-24 h-1 bg-accent mt-6 rounded-full"></div>
            </div>
            
            <div class="flex items-center space-x-6" data-aos="fade-left">
                <a href="portfolio.php" class="hidden md:inline-flex items-center text-white font-bold uppercase tracking-widest text-xs hover:text-accent transition-colors group">
                    <span class="border-b border-transparent group-hover:border-accent pb-1 transition-all">View All Works</span>
                    <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
                
                <!-- Navigation Buttons -->
                <div class="flex space-x-3">
                    <button id="slider-prev" class="w-12 h-12 rounded-full border border-gray-600 text-white flex items-center justify-center hover:bg-accent hover:border-accent hover:text-primary transition-all duration-300 active:scale-95">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button id="slider-next" class="w-12 h-12 rounded-full border border-gray-600 text-white flex items-center justify-center hover:bg-accent hover:border-accent hover:text-primary transition-all duration-300 active:scale-95">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scrolling Horizontal Layout -->
         <div id="projects-container" class="flex overflow-x-auto space-x-8 pb-12 snap-x snap-mandatory hide-scrollbars scroll-smooth"> 
            
            <?php
            // Fetch Projects for Slider
            try {
                $p_stmt = $conn->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 6");
                $idx_projects = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) { $idx_projects = []; }

            if(count($idx_projects) > 0):
                foreach($idx_projects as $prj):
                    $imgSrc = !empty($prj['image_path']) ? 'uploads/' . $prj['image_path'] : 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
            ?>
            <!-- Dynamic Project Item -->
            <div class="min-w-[85vw] md:min-w-[450px] snap-center group relative rounded-sm overflow-hidden aspect-[4/5] cursor-pointer shadow-2xl border border-white/5" onclick="window.location.href='portfolio.php'">
                <img src="<?php echo htmlspecialchars($imgSrc); ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-500"></div>
                
                <!-- Hover Border Effect -->
                <div class="absolute inset-4 border border-white/20 scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition-all duration-500 rounded-sm pointer-events-none"></div>

                <div class="absolute bottom-0 left-0 w-full p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                    <div class="flex items-center space-x-2 text-accent text-xs uppercase font-bold tracking-widest mb-3">
                        <span class="w-8 h-[1px] bg-accent"></span>
                        <span><?php echo htmlspecialchars($prj['category']); ?></span>
                    </div>
                    
                    <h3 class="text-3xl font-bold text-white mb-3 font-serif leading-tight group-hover:text-accent transition-colors"><?php echo htmlspecialchars($prj['title']); ?></h3>
                    
                    <p class="text-gray-400 text-sm line-clamp-2 mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100"><?php echo htmlspecialchars(substr($prj['description'], 0, 80)); ?>...</p>
                    
                    <span class="inline-flex items-center text-white text-xs font-bold uppercase tracking-widest group-hover:text-accent transition-colors">
                        View Project <i class="fas fa-long-arrow-alt-right ml-2"></i>
                    </span>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="text-white text-center w-full py-10">No projects found. Add some from the Admin Panel!</div>
            <?php endif; ?>
         </div>
         
         <!-- Mobile View All Link -->
         <div class="md:hidden text-center mt-6">
             <a href="portfolio.php" class="inline-block border border-gray-600 text-white px-8 py-3 rounded-full hover:bg-accent hover:border-accent hover:text-primary transition-all duration-300 text-sm font-bold tracking-widest uppercase">View All Works</a>
         </div>
    </div>
    
    <script>
        // Simple Slider Logic
        const slider = document.getElementById('projects-container');
        const prevBtn = document.getElementById('slider-prev');
        const nextBtn = document.getElementById('slider-next');

        if(slider && prevBtn && nextBtn) {
            nextBtn.addEventListener('click', () => {
                const scrollAmount = slider.clientWidth * 0.5; // Scroll half screen width
                slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
            
            prevBtn.addEventListener('click', () => {
                const scrollAmount = slider.clientWidth * 0.5;
                slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
        }
    </script>
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
        background: linear-gradient(to right, #fbb040, #ffebb0, #fbb040);
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
