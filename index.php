<?php include 'includes/header.php'; ?>

<!-- Hero Video/Image with Overlay -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30 z-10"></div>
        <!-- High-res Background -->
        <img src="https://images.unsplash.com/photo-1631679706909-1844bbd07221?ixlib=rb-4.0.3&auto=format&fit=crop&w=2500&q=80" alt="Luxury Interior" class="w-full h-full object-cover animate-pan-zoom">
    </div>

    <div class="relative z-20 text-center text-white px-4 max-w-5xl mx-auto">
        <h5 class="text-accent uppercase tracking-[0.2em] mb-4 opacity-0 animate-fade-in-down delay-300 font-semibold">Premium Interior Consulatncy</h5>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-8 font-serif leading-none tracking-tight opacity-0 animate-fade-in-up delay-500">
            Design Beyond <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent to-yellow-200">Boundaries</span>
        </h1>
        <p class="text-lg md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto font-light opacity-0 animate-fade-in-up delay-700">
            We curate spaces that inspire lifestyle. From concept to creation, experience the art of living.
        </p>
        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6 opacity-0 animate-fade-in-up delay-1000">
            <a href="portfolio.php" class="px-10 py-4 bg-accent text-white font-bold tracking-wide rounded-sm hover:bg-white hover:text-primary transition-all duration-300 shadow-[0_10px_20px_rgba(192,160,98,0.3)]">
                Explore Projects
            </a>
            <a href="contact.php" class="px-10 py-4 bg-transparent border-2 border-white text-white font-bold tracking-wide rounded-sm hover:bg-white hover:text-primary transition-all duration-300">
                Book Consultation
            </a>
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
                    <h5 class="text-accent font-bold uppercase tracking-widest mb-4">About InterioM</h5>
                    <h2 class="text-4xl lg:text-5xl font-bold text-primary mb-8 font-serif leading-tight">We Bring <span class="italic text-accent">Soul</span> to Your Space</h2>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        InterioM is an award-winning interior consultancy firm based in New York. We believe that good design is a powerful tool that can transform how you live, work, and feel.
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
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h5 class="text-accent font-bold uppercase tracking-widest mb-2">Our Expertise</h5>
            <h2 class="text-4xl font-bold text-primary font-serif">What We Do Best</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group cursor-pointer hover:-translate-y-2">
                <div class="w-16 h-16 bg-primary text-white group-hover:bg-accent rounded-full flex items-center justify-center text-2xl mb-6 transition-colors">
                    <i class="fas fa-couch"></i>
                </div>
                <h3 class="text-2xl font-bold text-primary mb-4">Interior Styling</h3>
                <p class="text-gray-600 mb-6 line-clamp-3">
                    Selecting the perfect color palette, furniture, and lighting to create a cohesive atmosphere that reflects your personality.
                </p>
                <span class="text-accent font-bold group-hover:underline">Learn More &rarr;</span>
            </div>
             <!-- Card 2 -->
             <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group cursor-pointer hover:-translate-y-2">
                <div class="w-16 h-16 bg-primary text-white group-hover:bg-accent rounded-full flex items-center justify-center text-2xl mb-6 transition-colors">
                    <i class="fas fa-pencil-ruler"></i>
                </div>
                <h3 class="text-2xl font-bold text-primary mb-4">Renovation Planning</h3>
                <p class="text-gray-600 mb-6 line-clamp-3">
                    Structural changes, kitchen remodels, and bathroom upgrades managed with precision engineering and design.
                </p>
                <span class="text-accent font-bold group-hover:underline">Learn More &rarr;</span>
            </div>
             <!-- Card 3 -->
             <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 group cursor-pointer hover:-translate-y-2">
                <div class="w-16 h-16 bg-primary text-white group-hover:bg-accent rounded-full flex items-center justify-center text-2xl mb-6 transition-colors">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3 class="text-2xl font-bold text-primary mb-4">Project Management</h3>
                <p class="text-gray-600 mb-6 line-clamp-3">
                    We handle the budget, timelines, and contractors. You get a stress-free experience and daily progress reports.
                </p>
                <span class="text-accent font-bold group-hover:underline">Learn More &rarr;</span>
            </div>
        </div>
    </div>
</section>

<!-- Latest Projects Slider -->
<section class="py-24 bg-primary overflow-hidden relative">
    <div class="absolute top-0 right-0 p-12 opacity-10">
        <svg width="200" height="200" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#C0A062" d="M42.7,-72.8C54.4,-67.2,62.3,-53.6,68.9,-40.8C75.5,-28,80.8,-15.9,79.5,-4.4C78.2,7,70.2,17.9,62.1,28.2C54,38.5,45.8,48.2,35.8,55.8C25.8,63.4,14,68.9,1.7,66C-10.6,63.1,-23.4,51.8,-35.1,43.2C-46.8,34.6,-57.4,28.7,-64.7,19.3C-72,10,-76,-2.8,-73.4,-14.7C-70.8,-26.6,-61.6,-37.6,-51.2,-44.7C-40.8,-51.8,-29.2,-55,-17.8,-58.3C-6.4,-61.6,4.8,-65.1,17.2,-67.4C29.6,-69.7,43.2,-70.8,42.7,-72.8Z" transform="translate(100 100)" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex justify-between items-end mb-12">
            <div>
                 <h5 class="text-accent font-bold uppercase tracking-widest mb-2">Portfolio</h5>
                 <h2 class="text-4xl font-bold text-white font-serif">Recent Masterpieces</h2>
            </div>
            <a href="portfolio.php" class="hidden md:inline-block border border-gray-600 text-white px-6 py-2 rounded-full hover:bg-accent hover:border-accent transition-colors">View All Works</a>
        </div>
        
        <!-- Scrolling Horizontal Layout -->
         <div class="flex overflow-x-auto space-x-8 pb-8 snap-x snap-mandatory hide-scrollbars"> 
            
            <!-- Project 1 -->
            <div class="min-w-[85vw] md:min-w-[400px] snap-center group relative rounded-lg overflow-hidden aspect-[3/4] cursor-pointer">
                <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="text-accent text-xs uppercase font-bold mb-2 block">Residential</span>
                    <h3 class="text-2xl font-bold text-white mb-2">The Glass House</h3>
                    <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Winner of Modern Living Award 2024</p>
                </div>
            </div>
             <!-- Project 2 -->
             <div class="min-w-[85vw] md:min-w-[400px] snap-center group relative rounded-lg overflow-hidden aspect-[3/4] cursor-pointer">
                <img src="https://images.unsplash.com/photo-1596205730303-34e2c8a2455b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="text-accent text-xs uppercase font-bold mb-2 block">Hospitality</span>
                    <h3 class="text-2xl font-bold text-white mb-2">Azure Lounge</h3>
                    <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Luxury bar design in Miami</p>
                </div>
            </div>
             <!-- Project 3 -->
             <div class="min-w-[85vw] md:min-w-[400px] snap-center group relative rounded-lg overflow-hidden aspect-[3/4] cursor-pointer">
                <img src="https://images.unsplash.com/photo-1606744824163-985d376605aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="text-accent text-xs uppercase font-bold mb-2 block">Commercial</span>
                    <h3 class="text-2xl font-bold text-white mb-2">Nexus Hub</h3>
                    <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Futuristic coworking space</p>
                </div>
            </div>
            <!-- Project 4 -->
             <div class="min-w-[85vw] md:min-w-[400px] snap-center group relative rounded-lg overflow-hidden aspect-[3/4] cursor-pointer">
                <img src="https://images.unsplash.com/photo-1540932296774-84d48ed38c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <span class="text-accent text-xs uppercase font-bold mb-2 block">Residential</span>
                    <h3 class="text-2xl font-bold text-white mb-2">Penthouse 45</h3>
                    <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity transform translate-y-2 group-hover:translate-y-0">Skyline views with minimal aesthetic</p>
                </div>
            </div>
            
         </div>
    </div>
</section>

<!-- Review Section (Enhanced) -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-primary mb-12">Words of Delight</h2>
        
        <div class="relative overflow-hidden h-64">
            <!-- Review 1 -->
            <div class="absolute inset-0 flex flex-col items-center justify-center opacity-0 animate-fade-slide-in active-review">
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
    @keyframes pan-zoom {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    .animate-pan-zoom { animation: pan-zoom 20s infinite alternate ease-in-out; }
    
    .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    
    .animate-fade-in-down { animation: fadeInDown 1s ease-out forwards; }
    @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
    
    .hide-scrollbars::-webkit-scrollbar { display: none; }
    .hide-scrollbars { -ms-overflow-style: none; scrollbar-width: none; }
    
    .active-review { opacity: 1 !important; transform: translateY(0) !important; animation: none; }
</style>

<script>
    gsap.registerPlugin(ScrollTrigger);
    
    // Count up animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        gsap.to(counter, {
            scrollTrigger: { trigger: counter, start: "top 90%" },
            innerHTML: target,
            duration: 2,
            snap: { innerHTML: 1 }
        });
    });

    // Content fade-ins
    gsap.utils.toArray('[data-aos="fade-right"]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 80%" },
            x: -50, opacity: 0, duration: 1
        });
    });
    
    gsap.utils.toArray('[data-aos="fade-left"]').forEach(el => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: "top 80%" },
            x: 50, opacity: 0, duration: 1
        });
    });

</script>

<?php include 'includes/footer.php'; ?>
