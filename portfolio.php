<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- Portfolio Hero -->
<section class="relative bg-canvas pt-48 pb-16 overflow-hidden">
    <!-- Three.js Canvas -->
    <div id="portfolio-canvas" class="absolute inset-0 z-0 opacity-20 pointer-events-none"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-7xl font-sans font-medium text-primary mb-6 animate-slide-up">
            Selected <span class="italic font-serif text-accent font-light">Works</span>
        </h1>
        <p class="text-xl text-primary/60 max-w-2xl mx-auto font-light animate-slide-up delay-100">
            A curation of spaces that inspire, endure, and tell a story.
        </p>
    </div>
</section>

<!-- Portfolio Grid & Filters -->
<section class="py-12 bg-canvas min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-3 mb-16 animate-fade-in-up">
            <button class="filter-btn active px-6 py-2 rounded-full border border-primary text-white bg-primary font-medium text-sm transition-all focus:outline-none hover:scale-105" data-filter="all">All</button>
            <button class="filter-btn px-6 py-2 rounded-full border border-primary/20 text-primary font-medium text-sm transition-all focus:outline-none hover:border-primary hover:bg-primary/5" data-filter="Residential">Residential</button>
            <button class="filter-btn px-6 py-2 rounded-full border border-primary/20 text-primary font-medium text-sm transition-all focus:outline-none hover:border-primary hover:bg-primary/5" data-filter="Commercial">Commercial</button>
            <button class="filter-btn px-6 py-2 rounded-full border border-primary/20 text-primary font-medium text-sm transition-all focus:outline-none hover:border-primary hover:bg-primary/5" data-filter="Turnkey">Turnkey</button>
            <button class="filter-btn px-6 py-2 rounded-full border border-primary/20 text-primary font-medium text-sm transition-all focus:outline-none hover:border-primary hover:bg-primary/5" data-filter="Hospitality">Hospitality</button>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            
            <?php
            // Fetch All Projects
            try {
                $db_obj = new Database();
                $db = $db_obj->getConnection();
                $stmt = $db->query("SELECT * FROM projects ORDER BY created_at DESC");
                $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) { $projects = []; }

            if(count($projects) > 0):
                foreach($projects as $p):
                    $imgSrc = !empty($p['image_path']) ? 'uploads/' . $p['image_path'] : 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
            ?>
            <!-- Project Card -->
            <div class="portfolio-item group relative overflow-hidden rounded-[2.5rem] shadow-lg cursor-pointer aspect-[3/4]" data-category="<?php echo htmlspecialchars($p['category']); ?>" onclick="window.location.href='project_details.php?id=<?php echo $p['id']; ?>'">
                <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                    <span class="text-accent text-xs font-bold uppercase tracking-widest mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75"><?php echo htmlspecialchars($p['category']); ?></span>
                    <h3 class="text-3xl font-serif text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100 leading-none"><?php echo htmlspecialchars($p['title']); ?></h3>
                    <div class="w-full h-px bg-white/30 my-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-150"></div>
                    <div class="flex items-center text-white/80 text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-200">
                        <span>View Project</span>
                        <i class="fas fa-arrow-right ml-2 text-accent"></i>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="col-span-3 text-center py-20">
                    <div class="text-6xl text-primary/10 mb-4"><i class="fas fa-folder-open"></i></div>
                    <p class="text-primary/50 text-xl font-light">No masterpieces found yet. <br> Check back soon.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<script>
    gsap.registerPlugin(ScrollTrigger);
    
    // Animate Grid Items
    gsap.from(".portfolio-item", {
        scrollTrigger: { trigger: "#portfolio-grid", start: "top 85%" },
        y: 100, opacity: 0, stagger: 0.1, duration: 1, ease: "power2.out"
    });

    // Filter Logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update Active State
            filterBtns.forEach(b => {
                b.classList.remove('bg-primary', 'text-white', 'border-primary');
                b.classList.add('text-primary', 'border-primary/20');
            });
            btn.classList.add('bg-primary', 'text-white', 'border-primary');
            btn.classList.remove('text-primary', 'border-primary/20');

            const value = btn.getAttribute('data-filter');
            
            // GSAP Filter Animation
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (value === 'all' || category === value) {
                    if (item.style.display === 'none') {
                        item.style.display = 'block';
                        gsap.fromTo(item, { scale: 0.8, opacity: 0 }, { scale: 1, opacity: 1, duration: 0.4, ease: "power2.out" });
                    }
                } else {
                    if (item.style.display !== 'none') {
                        gsap.to(item, { scale: 0.8, opacity: 0, duration: 0.3, onComplete: () => item.style.display = 'none' });
                    }
                }
            });
            
            // Refresh ScrollTrigger after filtering (slight delay)
            setTimeout(() => ScrollTrigger.refresh(), 500);
        });
    });

    // --- Three.js Background Animation (Floating Cubes) ---
    const initPortfolio3D = () => {
        const container = document.getElementById('portfolio-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        // Light fog to blend with background
        scene.fog = new THREE.Fog(0xF9F8F6, 10, 50);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 30;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Created scattered cubes to represent "Projects/spaces"
        const geometry = new THREE.BoxGeometry(2, 2, 2);
        const material = new THREE.MeshBasicMaterial({ 
            color: 0x1A3C54, // Primary
            wireframe: true,
            transparent: true,
            opacity: 0.15
        });

        const cubes = [];
        for(let i=0; i<30; i++) {
            const cube = new THREE.Mesh(geometry, material);
            cube.position.x = (Math.random() - 0.5) * 60;
            cube.position.y = (Math.random() - 0.5) * 40;
            cube.position.z = (Math.random() - 0.5) * 20;
            cube.rotation.x = Math.random() * Math.PI;
            cube.rotation.y = Math.random() * Math.PI;
            
            const scale = Math.random() * 2 + 0.5;
            cube.scale.set(scale, scale, scale);

            scene.add(cube);
            cubes.push({
                mesh: cube,
                speedX: (Math.random() - 0.5) * 0.01,
                speedY: (Math.random() - 0.5) * 0.01
            });
        }

        // Animation Loop
        const animate = () => {
            requestAnimationFrame(animate);
            
            cubes.forEach(item => {
                item.mesh.rotation.x += 0.005;
                item.mesh.rotation.y += 0.005;
                item.mesh.position.y += item.speedY;
                item.mesh.position.x += item.speedX;

                // Reset position if too far
                if(item.mesh.position.y > 30) item.mesh.position.y = -30;
                if(item.mesh.position.y < -30) item.mesh.position.y = 30;
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

    // Init Three.js after DOM
    initPortfolio3D();

</script>

<?php include 'includes/footer.php'; ?>
