<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- Services Hero with Three.js -->
<section class="relative min-h-[50vh] w-full bg-canvas flex items-center justify-center overflow-hidden pt-20">
    <div id="services-canvas" class="absolute inset-0 z-0 opacity-30"></div>
    
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <div class="flex flex-col items-center mb-6">
             <div class="w-12 h-12 border border-primary/20 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-layer-group text-primary"></i>
             </div>
             <span class="text-accent font-bold uppercase tracking-[0.2em] text-xs">What We Do</span>
        </div>
        
        <h1 class="text-5xl md:text-7xl font-sans font-medium text-primary mb-6 leading-tight">
            Curated solutions for <br> <span class="italic font-serif text-accent font-light">every dimension.</span>
        </h1>
    </div>
</section>

<!-- Detailed Services Grid -->
<section class="py-24 bg-surface rounded-t-[4rem] relative z-20 -mt-10">
    <div class="max-w-7xl mx-auto px-6 space-y-24">
        
        <!-- Service 1: Residential -->
        <div class="flex flex-col lg:flex-row items-center gap-16 group">
            <div class="w-full lg:w-1/2 order-2 lg:order-1">
                <div class="relative rounded-[3rem] overflow-hidden shadow-2xl aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Residential" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors"></div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 order-1 lg:order-2">
                <span class="text-9xl font-serif text-canvas absolute -ml-20 -mt-20 z-0 pointer-events-none select-none drop-shadow-sm">01</span>
                <div class="relative z-10">
                    <h2 class="text-4xl font-medium font-sans text-primary mb-6">Residential Design</h2>
                    <p class="text-lg text-primary/60 leading-relaxed mb-8">
                        Your home is your sanctuary. We specialize in creating high-end residential interiors that blend comfort with sophisticated aesthetics. Whether it's a cozy apartment or a sprawling villa, we tailor every inch to your lifestyle.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Space Planning</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Custom Furniture</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Lighting Design</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Smart Integration</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Service 2: Commercial -->
        <div class="flex flex-col lg:flex-row items-center gap-16 group">
            <div class="w-full lg:w-1/2 order-1">
                 <span class="text-9xl font-serif text-canvas absolute -ml-10 -mt-20 z-0 pointer-events-none select-none drop-shadow-sm">02</span>
                <div class="relative z-10">
                    <h2 class="text-4xl font-medium font-sans text-primary mb-6">Commercial Offices</h2>
                    <p class="text-lg text-primary/60 leading-relaxed mb-8">
                        Productivity starts with environment. We design offices, retail stores, and hospitality spaces that not only look stunning but also optimize workflow and enhance brand identity.
                    </p>
                     <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Brand Integration</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Ergonomics</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Acoustics</div>
                        <div class="flex items-center text-primary/80 font-medium"><span class="w-2 h-2 bg-accent rounded-full mr-3"></span>Reception Areas</div>
                    </div>
                </div>
            </div>
             <div class="w-full lg:w-1/2 order-2">
                <div class="relative rounded-[3rem] overflow-hidden shadow-2xl aspect-[4/3]">
                    <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Commercial" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                     <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors"></div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Pricing / Packages -->
<section class="py-24 bg-canvas">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl font-medium font-sans text-primary mb-4">Invest in Excellence</h2>
            <p class="text-primary/60">Transparent pricing for every stage of your journey.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Basic -->
            <div class="bg-white p-10 rounded-[2.5rem] border border-gray-100 hover:border-accent/30 transition-all hover:shadow-xl group relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
                <h3 class="text-2xl font-bold text-primary mb-2">Consultation</h3>
                <p class="text-primary/50 text-sm mb-8">Perfect for DIY enthusiasts</p>
                <div class="text-5xl font-sans font-medium text-primary mb-8">$199<span class="text-base text-primary/40 font-normal">/room</span></div>
                
                <ul class="space-y-4 mb-10 text-primary/70 text-sm">
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> 2 Hour Consultation</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Color Palette Selection</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Furniture Advice</li>
                </ul>
                <a href="contact.php" class="block w-full py-4 rounded-full border border-primary text-primary font-bold text-center group-hover:bg-primary group-hover:text-white transition-all">Get Started</a>
            </div>

             <!-- Design Suite -->
             <div class="bg-primary p-10 rounded-[2.5rem] shadow-2xl transform scale-105 relative z-10 text-white">
                 <div class="absolute top-6 right-6 bg-accent px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest text-white">Popular</div>
                <h3 class="text-2xl font-bold mb-2">Design Suite</h3>
                <p class="text-white/50 text-sm mb-8">Complete visual blueprint</p>
                <div class="text-5xl font-sans font-medium mb-8">$899<span class="text-base text-white/30 font-normal">/room</span></div>
                
                <ul class="space-y-4 mb-10 text-white/80 text-sm">
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Includes Consultation</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> 3D Renderings (2 views)</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Detailed Floor Plans</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Material Samples</li>
                </ul>
                <a href="contact.php" class="block w-full py-4 rounded-full bg-accent text-white font-bold text-center hover:bg-white hover:text-primary transition-all">Choose Plan</a>
            </div>

             <!-- Turnkey -->
             <div class="bg-white p-10 rounded-[2.5rem] border border-gray-100 hover:border-accent/30 transition-all hover:shadow-xl group relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary/20 to-transparent"></div>
                <h3 class="text-2xl font-bold text-primary mb-2">Turnkey</h3>
                <p class="text-primary/50 text-sm mb-8">We handle everything</p>
                <div class="text-5xl font-sans font-medium text-primary mb-8">Custom</div>
                
                <ul class="space-y-4 mb-10 text-primary/70 text-sm">
                     <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> End-to-End Mgmt</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Procurement</li>
                    <li class="flex items-center"><i class="fas fa-check-circle text-accent mr-3"></i> Site Supervision</li>
                </ul>
                <a href="contact.php" class="block w-full py-4 rounded-full border border-primary text-primary font-bold text-center group-hover:bg-primary group-hover:text-white transition-all">Contact Us</a>
            </div>

        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="py-24 bg-surface rounded-t-[4rem] relative z-20">
    <div class="max-w-3xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-medium font-sans text-primary mb-4">Common Enquiries</h2>
        </div>
        
        <div class="space-y-6">
            <!-- FAQ 1 -->
            <div class="bg-canvas rounded-[2rem] p-1 transition-all">
                <button class="w-full px-8 py-6 text-left font-bold text-primary flex justify-between items-center focus:outline-none" onclick="toggleFaq('faq1')">
                    What is the typical timeline?
                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm">
                        <i class="fas fa-plus text-xs text-accent transition-transform duration-300" id="icon-faq1"></i>
                    </div>
                </button>
                <div id="faq1" class="hidden px-8 pb-6 text-primary/60 text-sm leading-relaxed">
                    A typical single-room project takes 2-4 weeks for design and 4-8 weeks for execution. Full home renovations can take 3-6 months depending on the scope.
                </div>
            </div>
             <!-- FAQ 2 -->
             <div class="bg-canvas rounded-[2rem] p-1 transition-all">
                <button class="w-full px-8 py-6 text-left font-bold text-primary flex justify-between items-center focus:outline-none" onclick="toggleFaq('faq2')">
                    Do you work with existing furniture?
                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm">
                         <i class="fas fa-plus text-xs text-accent transition-transform duration-300" id="icon-faq2"></i>
                    </div>
                </button>
                <div id="faq2" class="hidden px-8 pb-6 text-primary/60 text-sm leading-relaxed">
                    Absolutely. We believe in sustainable design and will happily integrate your cherished pieces into the new layout, refinishing them if necessary to match the new aesthetic.
                </div>
            </div>
             <!-- FAQ 3 -->
             <div class="bg-canvas rounded-[2rem] p-1 transition-all">
                <button class="w-full px-8 py-6 text-left font-bold text-primary flex justify-between items-center focus:outline-none" onclick="toggleFaq('faq3')">
                    How are costs determined?
                    <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm">
                         <i class="fas fa-plus text-xs text-accent transition-transform duration-300" id="icon-faq3"></i>
                    </div>
                </button>
                <div id="faq3" class="hidden px-8 pb-6 text-primary/60 text-sm leading-relaxed">
                    We offer both fixed-fee packages and percentage-based project management fees. We prioritize transparency and provide a detailed BOQ (Bill of Quantities) before starting execution.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // --- Three.js for Services Page ---
    const initServices3D = () => {
        const container = document.getElementById('services-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        scene.fog = new THREE.Fog(0xF9F8F6, 5, 25);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 12;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Abstract Shape - Icosahedron
        const geometry = new THREE.IcosahedronGeometry(5, 1);
        const material = new THREE.MeshBasicMaterial({ 
            color: 0xE06C3E, // Accent color
            wireframe: true, 
            transparent: true, 
            opacity: 0.1
        });
        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);
        
        // Add subtle particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 200;
        const posArray = new Float32Array(particlesCount * 3);
        for(let i = 0; i < particlesCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 30;
        }
        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.05,
            color: 0x1A3C54,
            transparent: true,
            opacity: 0.4
        });
        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);

        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            mesh.rotation.y += 0.002;
            mesh.rotation.x += 0.001;
            particlesMesh.rotation.y -= 0.001;
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
        initServices3D();
        gsap.registerPlugin(ScrollTrigger);

        // Animate Service Groups
        gsap.utils.toArray('.group').forEach((item, i) => {
            gsap.from(item, {
                scrollTrigger: {
                    trigger: item,
                    start: "top 80%"
                },
                y: 50,
                opacity: 0,
                duration: 1,
                ease: "power2.out"
            });
        });
    });

    // FAQ Toggle Logic
    function toggleFaq(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            gsap.fromTo(content, {height: 0, opacity: 0}, {height: "auto", opacity: 1, duration: 0.3});
            gsap.to(icon, {rotation: 45, duration: 0.3}); // Rotate plus to x
        } else {
            gsap.to(content, {height: 0, opacity: 0, duration: 0.3, onComplete: () => content.classList.add('hidden')});
            gsap.to(icon, {rotation: 0, duration: 0.3});
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
