<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- About Hero with Three.js -->
<section class="relative min-h-[60vh] w-full bg-canvas flex items-center justify-center overflow-hidden pt-20">
    <div id="about-canvas" class="absolute inset-0 z-0 opacity-40"></div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <div class="flex flex-col items-center mb-8">
             <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm mb-6 animate-float">
                <i class="fas fa-users text-2xl text-accent"></i>
             </div>
             <span class="text-accent font-bold uppercase tracking-[0.2em] text-xs mb-4">Who This Is</span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-sans font-medium text-primary mb-6 leading-tight">
            Architects of <span class="italic font-serif text-accent font-light">dreams</span> & <br> builders of trust.
        </h1>
        <p class="text-xl text-primary/60 max-w-2xl mx-auto font-light leading-relaxed">
            We are a collective of visionaries, engineers, and artists dedicated to redefining the way you experience space.
        </p>
    </div>
</section>

<!-- Values / Philosophy Section -->
<section class="py-24 bg-surface rounded-t-[4rem] relative z-20 -mt-10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            
            <div data-aos="fade-right">
                <div class="relative">
                    <!-- Abstract Shape -->
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-accent/20 rounded-full blur-3xl"></div>
                    
                    <div class="rounded-[3rem] overflow-hidden shadow-2xl relative aspect-[4/3] group">
                         <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                         <div class="absolute inset-0 bg-primary/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-left">
                <span class="inline-block px-4 py-1 rounded-full bg-canvas text-primary/60 font-medium text-xs uppercase tracking-wider mb-6 border border-gray-100">Our Philosophy</span>
                <h2 class="text-4xl md:text-5xl font-sans font-medium text-primary mb-8 leading-tight">
                    Form follows <span class="text-accent">fiction.</span>
                </h2>
                <div class="space-y-6 text-lg text-primary/70 leading-relaxed font-light">
                    <p>
                        We believe that an interior is not just an arrangement of furniture—it’s a narrative. Our philosophy is rooted in the idea that every space should tell a story, your story.
                    </p>
                    <p>
                        From biophilic principles to smart functionality, we obsess over details that often go unnoticed but are deeply felt. We don't just build rooms; we craft feelings.
                    </p>
                </div>

                <div class="mt-10 flex gap-4">
                    <div class="bg-canvas px-6 py-3 rounded-full flex items-center space-x-3 border border-gray-100">
                        <i class="fas fa-leaf text-accent"></i>
                        <span class="text-primary font-medium text-sm">Eco-Conscious</span>
                    </div>
                    <div class="bg-canvas px-6 py-3 rounded-full flex items-center space-x-3 border border-gray-100">
                        <i class="fas fa-gem text-accent"></i>
                        <span class="text-primary font-medium text-sm">Premium Materials</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Timeline Section (Organic Path) -->
<section class="py-32 bg-canvas">
    <div class="max-w-4xl mx-auto px-6 relative">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-sans font-medium text-primary">Our Evolution</h2>
        </div>

        <!-- Central Line -->
        <div class="absolute left-1/2 top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-primary/20 to-transparent hidden md:block"></div>

        <div class="space-y-24">
            <!-- 2015 -->
            <div class="flex flex-col md:flex-row items-center justify-between group timeline-item">
                <div class="w-full md:w-5/12 text-center md:text-right pr-0 md:pr-10">
                    <span class="text-6xl font-bold text-gray-200 block mb-2 transition-colors group-hover:text-accent/20">2015</span>
                    <h3 class="text-2xl font-bold text-primary mb-2">The Spark</h3>
                    <p class="text-primary/60 text-sm">Founded in a small garage with a big vision for minimalist living.</p>
                </div>
                <div class="w-4 h-4 bg-accent rounded-full relative z-10 shadow-[0_0_0_8px_rgba(246,174,45,0.2)] my-6 md:my-0"></div>
                <div class="w-full md:w-5/12 pl-0 md:pl-10"></div>
            </div>

            <!-- 2018 -->
            <div class="flex flex-col md:flex-row items-center justify-between group timeline-item">
                <div class="w-full md:w-5/12 pr-0 md:pr-10"></div>
                <div class="w-4 h-4 bg-primary rounded-full relative z-10 shadow-[0_0_0_8px_rgba(26,60,84,0.1)] my-6 md:my-0"></div>
                <div class="w-full md:w-5/12 text-center md:text-left pl-0 md:pl-10">
                    <span class="text-6xl font-bold text-gray-200 block mb-2 transition-colors group-hover:text-primary/20">2018</span>
                    <h3 class="text-2xl font-bold text-primary mb-2">Commercial Leap</h3>
                    <p class="text-primary/60 text-sm">Partnered with tech giants in Silicon Valley to redefine workspaces.</p>
                </div>
            </div>

            <!-- 2023 -->
            <div class="flex flex-col md:flex-row items-center justify-between group timeline-item">
                <div class="w-full md:w-5/12 text-center md:text-right pr-0 md:pr-10">
                    <span class="text-6xl font-bold text-gray-200 block mb-2 transition-colors group-hover:text-accent/20">2023</span>
                    <h3 class="text-2xl font-bold text-primary mb-2">Global Impact</h3>
                    <p class="text-primary/60 text-sm">Expanding our footprint and launching the proprietary MIS platform.</p>
                </div>
                <div class="w-4 h-4 bg-accent rounded-full relative z-10 shadow-[0_0_0_8px_rgba(246,174,45,0.2)] my-6 md:my-0"></div>
                <div class="w-full md:w-5/12 pl-0 md:pl-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section (Circles) -->
<section class="py-24 bg-surface rounded-t-[4rem] relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-accent font-bold uppercase tracking-wider text-xs">The Visionaries</span>
            <h2 class="text-4xl font-sans font-medium text-primary mt-4">Meet the minds.</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Member 1 -->
            <div class="group text-center">
                <div class="relative w-64 h-64 mx-auto mb-6 rounded-full overflow-hidden shadow-xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <h3 class="text-2xl font-bold text-primary">James Smith</h3>
                <p class="text-accent text-sm uppercase tracking-widest mb-3">Principal Architect</p>
                <div class="w-10 h-1 bg-gray-100 mx-auto rounded-full group-hover:bg-accent transition-colors"></div>
            </div>

             <!-- Member 2 -->
             <div class="group text-center">
                <div class="relative w-64 h-64 mx-auto mb-6 rounded-full overflow-hidden shadow-xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <h3 class="text-2xl font-bold text-primary">Elena Rodriguez</h3>
                <p class="text-accent text-sm uppercase tracking-widest mb-3">Design Director</p>
                <div class="w-10 h-1 bg-gray-100 mx-auto rounded-full group-hover:bg-accent transition-colors"></div>
            </div>

             <!-- Member 3 -->
             <div class="group text-center">
                <div class="relative w-64 h-64 mx-auto mb-6 rounded-full overflow-hidden shadow-xl border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 grayscale group-hover:grayscale-0">
                </div>
                <h3 class="text-2xl font-bold text-primary">Michael Chang</h3>
                <p class="text-accent text-sm uppercase tracking-widest mb-3">Head of Projects</p>
                <div class="w-10 h-1 bg-gray-100 mx-auto rounded-full group-hover:bg-accent transition-colors"></div>
            </div>
        </div>
    </div>
</section>

<script>
    // --- Three.js for About Page ---
    const initAbout3D = () => {
        const container = document.getElementById('about-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        scene.fog = new THREE.Fog(0xF9F8F6, 5, 30);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 15;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Abstract Shape - TorusKnot
        const geometry = new THREE.TorusKnotGeometry(4, 1.2, 100, 16);
        const material = new THREE.MeshNormalMaterial({ 
            wireframe: true, 
            transparent: true, 
            opacity: 0.15 
        });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);

        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            mesh.rotation.x += 0.003;
            mesh.rotation.y += 0.005;
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

    document.addEventListener('DOMContentLoaded', () => {
        initAbout3D();
        gsap.registerPlugin(ScrollTrigger);

        // Timeline Stagger
        gsap.utils.toArray('.timeline-item').forEach(item => {
            gsap.fromTo(item, 
                { opacity: 0, y: 50 }, 
                {
                    scrollTrigger: { trigger: item, start: "top 85%" },
                    opacity: 1, 
                    y: 0, 
                    duration: 1, 
                    ease: "power2.out"
                }
            );
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
