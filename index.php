<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';

// Initialize DB for this page
$db_obj = new Database();
$conn = $db_obj->getConnection();
?>

<!-- Hero Section with Three.js Background -->
<section class="relative min-h-screen w-full bg-canvas flex items-center justify-center overflow-hidden">
    <!-- Three.js Canvas Container -->
    <div id="hero-canvas" class="absolute inset-0 z-0 opacity-60"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 flex flex-col items-center text-center">
        
        <!-- Floating Pill Badge -->
        <div class="hero-anim opacity-0 translate-y-10 inline-flex items-center space-x-2 bg-white/40 backdrop-blur-md border border-white/50 rounded-full px-6 py-2 mb-8 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
            <span class="text-primary text-sm font-medium tracking-wide uppercase">Reimagining Spaces</span>
        </div>

        <!-- Main Headline -->
        <h1 class="hero-anim opacity-0 translate-y-10 text-5xl md:text-7xl lg:text-8xl font-sans font-medium text-primary leading-[1.1] mb-8 tracking-tight">
            Design that <br>
            <span class="font-serif italic text-accent font-light">breathes</span> & inspires.
        </h1>

        <!-- Subtext -->
        <p class="hero-anim opacity-0 translate-y-10 text-xl text-primary/70 max-w-2xl font-light mb-12">
            We blend architectural precision with organic beauty to create environments that feel alive. Experience the next evolution of interior design.
        </p>

        <!-- CTA Buttons (Pill Shaped) -->
        <div class="hero-anim opacity-0 translate-y-10 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="portfolio.php" class="group flex items-center justify-center bg-primary text-white text-lg font-medium px-10 py-5 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-lg hover:bg-primary/90">
                View Projects
                <i class="fas fa-arrow-right ml-3 transform -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
            </a>
            <a href="contact.php" class="group flex items-center justify-center bg-white text-primary border border-gray-200 text-lg font-medium px-10 py-5 rounded-full transition-all duration-300 hover:scale-105 hover:shadow-lg hover:border-accent">
                Book Consultation
            </a>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce text-primary/30">
        <i class="fas fa-arrow-down text-xl"></i>
    </div>
</section>

<!-- Stats Section (Organic Grid) -->
<section class="py-20 bg-canvas">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
            <div class="bg-surface p-8 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow text-center group">
                <h3 class="text-4xl md:text-5xl font-sans font-bold text-accent mb-2 counter" data-target="250">0</h3>
                <p class="text-primary/60 font-medium">Projects Done</p>
            </div>
            <div class="bg-surface p-8 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow text-center group">
                <h3 class="text-4xl md:text-5xl font-sans font-bold text-accent mb-2 counter" data-target="15">0</h3>
                <p class="text-primary/60 font-medium">Awards Won</p>
            </div>
            <div class="bg-surface p-8 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow text-center group">
                <h3 class="text-4xl md:text-5xl font-sans font-bold text-accent mb-2 counter" data-target="10">0</h3>
                <p class="text-primary/60 font-medium">Years Active</p>
            </div>
            <div class="bg-secondary p-8 rounded-[2rem] shadow-sm hover:shadow-md transition-shadow text-center group">
                <h3 class="text-4xl md:text-5xl font-sans font-bold text-primary mb-2 counter" data-target="100">0</h3>
                <p class="text-primary/60 font-medium">% Satisfaction</p>
            </div>
        </div>
    </div>
</section>

<!-- Expertise Section (Asymmetrical Layout) -->
<section class="py-24 bg-surface rounded-t-[4rem] -mt-12 relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-start gap-16">
            
            <!-- Text Content -->
            <div class="lg:w-1/2 sticky top-32" data-aos="fade-up">
                <span class="inline-block px-4 py-1 rounded-full bg-accent/10 text-accent font-bold uppercase tracking-wider text-xs mb-6">Our Expertise</span>
                <h2 class="text-4xl md:text-6xl font-sans font-medium text-primary mb-8 leading-tight">
                    Crafting spaces for <br> the modern <span class="italic font-serif text-accent">soul.</span>
                </h2>
                <p class="text-xl text-primary/60 leading-relaxed mb-10">
                    We don't just fill rooms; we curate experiences. Our approach combines data-driven functionality with purely emotional aesthetics.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start space-x-6 p-6 rounded-3xl hover:bg-canvas transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center text-primary text-xl">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-primary mb-2">Strategic Planning</h4>
                            <p class="text-primary/60">Optimizing flow and light before drawing a single line.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6 p-6 rounded-3xl hover:bg-canvas transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center text-accent text-xl">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-primary mb-2">Bespoke Curation</h4>
                            <p class="text-primary/60">Sourcing rare materials that tell your unique story.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Grid -->
            <div class="lg:w-1/2 grid grid-cols-1 gap-8" id="expertise-images">
                <div class="rounded-[3rem] overflow-hidden aspect-[4/5] relative group">
                    <img src="https://images.unsplash.com/photo-1600607686527-6fb886090705?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors"></div>
                </div>
                <div class="rounded-[3rem] overflow-hidden aspect-video relative group translate-x-12">
                    <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Recent Work / Portfolio Section (Horizontal Marquee) -->
<section class="py-24 bg-surface text-primary relative z-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <!-- Left Column: Heading -->
            <div class="lg:w-1/3 z-10">
                <div class="relative">
                    <div class="inline-flex items-center space-x-2 bg-accent/10 rounded-full px-4 py-1.5 mb-6">
                        <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                        <span class="text-accent text-xs font-bold uppercase tracking-widest">Selected Projects</span>
                    </div>
                    
                    <h2 class="text-5xl md:text-6xl font-sans font-medium text-primary mb-6 leading-tight">
                        Spaces that <br> <span class="italic font-serif text-accent font-light">speak.</span>
                    </h2>
                    
                    <p class="text-lg text-primary/60 mb-10 leading-relaxed">
                        Explore our curated selection of residential and commercial transformations. Each project is a unique dialogue between design and function.
                    </p>
                    
                    <a href="portfolio.php" class="hidden lg:inline-flex group items-center justify-center px-8 py-4 bg-primary text-white rounded-full font-bold transition-all hover:bg-accent hover:shadow-lg hover:-translate-y-1">
                        <span>View All Projects</span>
                        <i class="fas fa-arrow-right ml-3 transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            <!-- Right Column: Infinite Horizontal Marquee -->
            <div class="lg:w-2/3 w-full relative">
                <!-- Fade Edges -->
                <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-surface to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-surface to-transparent z-10 pointer-events-none"></div>

                <div class="overflow-hidden" id="marquee-wrapper">
                    <div class="flex gap-8 w-max" id="project-marquee">
                        <?php
                        // Fetch projects - We'll limit to 10 for the marquee base
                        try {
                            $p_stmt = $conn->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 10");
                            $projects_data = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
                        } catch(PDOException $e) { $projects_data = []; }
                        
                        // We will display them once here, JS will duplicate for infinite loop if needed, 
                        // but to be safe/simple, let's output the list TWICE right here for immediate CSS continuity
                        $display_projects = array_merge($projects_data, $projects_data); 

                        if(count($display_projects) > 0):
                            foreach($display_projects as $prj):
                                $imgSrc = !empty($prj['image_path']) ? 'uploads/' . $prj['image_path'] : 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                        ?>
                        <!-- Landscape Card -->
                        <div class="project-card flex-shrink-0 w-[24rem] md:w-[28rem] group relative rounded-[2.5rem] overflow-hidden cursor-pointer" onclick="window.location.href='project_details.php?id=<?php echo $prj['id']; ?>'">
                            <!-- Image Container -->
                            <div class="h-[350px] w-full relative overflow-hidden">
                                <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($prj['title']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent opacity-80 transition-opacity"></div>
                                
                                <!-- Text Overlay -->
                                <div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300 w-full">
                                    <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-[10px] font-bold uppercase tracking-wider mb-3 text-white border border-white/20">
                                        <?php echo htmlspecialchars($prj['category']); ?>
                                    </span>
                                    <h3 class="text-2xl font-serif text-white mb-2 leading-tight"><?php echo htmlspecialchars($prj['title']); ?></h3>
                                    <div class="w-full flex items-center justify-between text-white/80 text-sm mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <span>View Details</span>
                                        <div class="w-8 h-8 rounded-full bg-white text-primary flex items-center justify-center">
                                            <i class="fas fa-arrow-right text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; else: ?>
                            <div class="w-full text-center py-10">No projects found.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
             // Infinite Marquee Logic with GSAP
             const marquee = document.getElementById('project-marquee');
             
             // Animate xPercent: -50 and repeat.
             // Because we merged the array once (doubled it), scrolling 50% of the total width brings us back to the start.
             gsap.to(marquee, {
                 xPercent: -50,
                 ease: "none",
                 duration: 40, // Adjust speed
                 repeat: -1
             });

             // Pause on Hover
             const wrapper = document.getElementById('marquee-wrapper');
             wrapper.addEventListener('mouseenter', () => gsap.getTweensOf(marquee).forEach(t => t.timeScale(0)));
             wrapper.addEventListener('mouseleave', () => gsap.getTweensOf(marquee).forEach(t => t.timeScale(1)));
        });
    </script>
</section>

<!-- Call to Action -->
<section class="py-24 bg-accent relative overflow-hidden rounded-t-[4rem] -mt-10">
    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <h2 class="text-4xl md:text-6xl font-sans font-bold text-white mb-8">Ready to create something <br> extraordinary?</h2>
        <a href="contact.php" class="inline-block bg-primary text-white text-xl font-bold px-12 py-6 rounded-full shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
            Start Your Journey
        </a>
    </div>
</section>

<script>
    // --- Three.js Hero Animation ---
    const initThreeJS = () => {
        const container = document.getElementById('hero-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        // Soft fog to blend with background
        scene.fog = new THREE.Fog(0xF9F8F6, 10, 50);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 20;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Geometries - Floating Icosahedrons
        const geometry = new THREE.IcosahedronGeometry(4, 1);
        const material = new THREE.MeshLambertMaterial({ 
            color: 0xBEDEDF, // Surface Blue
            wireframe: true,
            transparent: true,
            opacity: 0.3
        });
        
        const meshGroup = new THREE.Group();
        
        // Create multiple floating shapes
        for(let i=0; i<5; i++) {
            const mesh = new THREE.Mesh(geometry, material);
            mesh.position.set(
                (Math.random() - 0.5) * 30,
                (Math.random() - 0.5) * 20,
                (Math.random() - 0.5) * 10
            );
            mesh.rotation.set(Math.random() * Math.PI, Math.random() * Math.PI, 0);
            meshGroup.add(mesh);
        }
        
        scene.add(meshGroup);

        // Lights
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
        scene.add(ambientLight);
        
        const pointLight = new THREE.PointLight(0xE06C3E, 1); // Accent Orange
        pointLight.position.set(10, 10, 10);
        scene.add(pointLight);

        // Animation Loop
        const animate = () => {
            requestAnimationFrame(animate);
            
            meshGroup.rotation.x += 0.001;
            meshGroup.rotation.y += 0.002;
            
            // Gentle floating
            meshGroup.children.forEach((mesh, i) => {
                mesh.position.y += Math.sin(Date.now() * 0.001 + i) * 0.02;
                mesh.rotation.x += 0.002;
            });

            renderer.render(scene, camera);
        };
        
        animate();

        // Handle Resize
        window.addEventListener('resize', () => {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        });
    };

    // --- GSAP Animations ---
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Three.js
        initThreeJS();

        gsap.registerPlugin(ScrollTrigger);

        // Hero Reveal
        gsap.to(".hero-anim", {
            y: 0,
            opacity: 1,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out",
            delay: 0.5
        });

        // Stats Counters
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            gsap.to(counter, {
                scrollTrigger: { trigger: counter, start: "top 85%" },
                innerHTML: target,
                duration: 2,
                ease: "power2.out",
                snap: { innerHTML: 1 }
            });
        });

        // Expertise Image Parallax
        gsap.to("#expertise-images > div:last-child", {
            scrollTrigger: { 
                trigger: "#expertise-images", 
                start: "top bottom", 
                end: "bottom top", 
                scrub: 1 
            },
            y: -50,
            ease: "none"
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
