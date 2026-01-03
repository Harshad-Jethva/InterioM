<?php include 'includes/header.php'; ?>

<!-- Success Stories Hero -->
<section class="relative bg-canvas pt-48 pb-16 overflow-hidden">
    <!-- Three.js Canvas -->
    <div id="stories-canvas" class="absolute inset-0 z-0 opacity-20 pointer-events-none"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-7xl font-sans font-medium text-primary mb-6 animate-slide-up">
            Proof of <span class="italic font-serif text-accent font-light">concept.</span>
        </h1>
        <p class="text-xl text-primary/60 max-w-2xl mx-auto font-light animate-slide-up delay-100">
            Real spaces, transformed. See the difference thoughtful design makes.
        </p>
    </div>
</section>

<div class="max-w-7xl mx-auto px-6 pb-24 space-y-32">
    
    <?php
    require_once 'includes/db_connect.php';
    try {
        $db_obj = new Database();
        $db = $db_obj->getConnection();
        $stmt = $db->query("SELECT * FROM success_stories ORDER BY created_at DESC");
        $stories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) { $stories = []; }
    
    if(count($stories) > 0):
        foreach($stories as $index => $s):
            $sliderId = $index + 1;
            $beforeSrc = !empty($s['before_image']) ? 'uploads/'.$s['before_image'] : 'https://images.unsplash.com/photo-1513694203232-719a280e022f?ixlib=rb-4.0.3';
            $afterSrc = !empty($s['after_image']) ? 'uploads/'.$s['after_image'] : 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3';
    ?>
    <!-- Story <?php echo $sliderId; ?> -->
    <div class="story-block group">
        <div class="flex flex-col items-center mb-12">
            <span class="text-xs font-bold text-accent uppercase tracking-[0.2em] mb-4">Transformation <?php echo str_pad($sliderId, 2, '0', STR_PAD_LEFT); ?></span>
            <h2 class="text-4xl md:text-5xl font-medium font-serif text-primary text-center"><?php echo htmlspecialchars($s['title']); ?></h2>
        </div>
        
        <div class="relative h-[500px] w-full max-w-6xl mx-auto rounded-[3rem] overflow-hidden shadow-2xl cursor-ew-resize select-none ring-4 ring-white/50" id="slider-<?php echo $sliderId; ?>">
            <!-- After Image (Background) -->
            <div class="absolute inset-0 w-full h-full">
                <img src="<?php echo htmlspecialchars($afterSrc); ?>" class="w-full h-full object-cover">
                <div class="absolute top-8 right-8 bg-white/10 backdrop-blur-md text-white px-4 py-2 text-xs font-bold uppercase tracking-widest rounded-full border border-white/20">After</div>
            </div>
            
            <!-- Before Image (Clipped on top) -->
            <div class="absolute inset-0 w-1/2 h-full overflow-hidden border-r-2 border-white/80" id="before-img-<?php echo $sliderId; ?>" style="width: 50%;">
                <img src="<?php echo htmlspecialchars($beforeSrc); ?>" class="absolute top-0 left-0 w-[200%] max-w-none h-full object-cover">
                <div class="absolute top-8 left-8 bg-black/30 backdrop-blur-md text-white px-4 py-2 text-xs font-bold uppercase tracking-widest rounded-full border border-white/10">Before</div>
            </div>
            
             <!-- Slider Handle -->
             <div class="absolute inset-y-0 left-1/2 w-16 -ml-8 flex items-center justify-center pointer-events-none transition-transform duration-100 ease-out" id="handle-<?php echo $sliderId; ?>" style="left: 50%;">
                <div class="w-16 h-16 bg-white rounded-full shadow-2xl flex items-center justify-center text-primary transform transition-transform group-hover:scale-110">
                    <i class="fas fa-arrows-alt-h text-xl text-accent"></i>
                </div>
            </div>
        </div>
        
        <div class="max-w-3xl mx-auto mt-12 text-center">
            <i class="fas fa-quote-left text-3xl text-primary/10 mb-4 block"></i>
            <p class="text-xl text-primary/70 font-light leading-relaxed">"<?php echo htmlspecialchars($s['description']); ?>"</p>
        </div>
    </div>
    <?php endforeach; else: ?>
        <div class="text-center py-24">
            <div class="text-6xl text-primary/10 mb-6"><i class="fas fa-magic"></i></div>
            <p class="text-xl text-primary/50 font-light">No transformations to show yet.</p>
        </div>
    <?php endif; ?>
    
</div>

<script>
    gsap.registerPlugin(ScrollTrigger);
    
    // Animate Blocks
    gsap.utils.toArray('.story-block').forEach((block, i) => {
        gsap.from(block, {
            scrollTrigger: {
                trigger: block,
                start: "top 80%"
            },
            y: 100,
            opacity: 0,
            duration: 1,
            ease: "power2.out"
        });
    });

    // Before/After Slider Logic
    document.querySelectorAll('[id^="slider-"]').forEach(slider => {
        const id = slider.id.split('-')[1];
        const beforeContainer = document.getElementById(`before-img-${id}`);
        const beforeImgElement = beforeContainer.querySelector('img');
        const handle = document.getElementById(`handle-${id}`);
        
        const updateSlider = (x) => {
            const rect = slider.getBoundingClientRect();
            let position = x - rect.left;
            let width = rect.width;
            let percent = (position / width) * 100;
            
            // Clamp
            if (percent < 0) percent = 0;
            if (percent > 100) percent = 100;
            
            beforeContainer.style.width = `${percent}%`;
            beforeImgElement.style.width = `${width}px`; 
            
            if(handle) handle.style.left = `${percent}%`;
        };

        const initImg = () => {
             if(beforeImgElement) beforeImgElement.style.width = `${slider.offsetWidth}px`;
        };
        initImg();
        window.addEventListener('resize', initImg);

        slider.addEventListener('mousemove', (e) => {
            updateSlider(e.clientX);
        });
        
        slider.addEventListener('touchmove', (e) => {
             updateSlider(e.touches[0].clientX);
        });
    });

    // --- Three.js Background Animation (Organic Morphing Sphere) ---
    const initStories3D = () => {
        const container = document.getElementById('stories-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        scene.fog = new THREE.Fog(0xF9F8F6, 10, 50);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 15;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Particle Sphere
        const geometry = new THREE.SphereGeometry(6, 32, 32);
        const material = new THREE.PointsMaterial({
            color: 0xE06C3E, // Accent
            size: 0.1,
            transparent: true,
            opacity: 0.3
        });
        const sphere = new THREE.Points(geometry, material);
        scene.add(sphere);

        // Outer Ring
        const ringGeo = new THREE.TorusGeometry(8, 0.1, 16, 100);
        const ringMat = new THREE.MeshBasicMaterial({ color: 0x1A3C54, transparent: true, opacity: 0.1 });
        const ring = new THREE.Mesh(ringGeo, ringMat);
        ring.rotation.x = Math.PI / 2;
        scene.add(ring);

        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            sphere.rotation.y += 0.003;
            sphere.rotation.x += 0.001;
            
            ring.rotation.z -= 0.002;
            ring.rotation.x += 0.001;

            // Pulse effect
            const scale = 1 + Math.sin(Date.now() * 0.001) * 0.1;
            sphere.scale.set(scale, scale, scale);

            renderer.render(scene, camera);
        };
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        });
    };
    
    initStories3D();

</script>

<?php include 'includes/footer.php'; ?>
