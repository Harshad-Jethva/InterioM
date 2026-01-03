<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- Contact Hero -->
<section class="relative bg-canvas pt-32 pb-20 overflow-hidden">
    <!-- Three.js Canvas -->
    <div id="contact-canvas" class="absolute inset-0 z-0 opacity-20 pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-7xl font-sans font-medium text-primary mb-6 animate-slide-up">
            Let's start a <span class="italic font-serif text-accent font-light">dialogue.</span>
        </h1>
        <p class="text-xl text-primary/60 max-w-2xl mx-auto font-light animate-slide-up delay-100">
            Whether you have a vision in mind or just want to say hello, we're all ears.
        </p>
    </div>
</section>

<!-- Contact Container -->
<section class="pb-24 bg-canvas px-4 md:px-6">
    <div class="max-w-7xl mx-auto bg-white rounded-[3rem] shadow-2xl overflow-hidden flex flex-col lg:flex-row min-h-[700px]">
        
        <!-- Info Sidebar (Navy) -->
        <div class="lg:w-2/5 bg-primary text-white p-12 relative overflow-hidden flex flex-col justify-between">
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-80 h-80 bg-accent/20 rounded-full blur-[80px]"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 border border-white/10 rounded-full animate-pulse-slow"></div>

            <div class="relative z-10">
                <h3 class="text-3xl font-serif mb-8">Contact Information</h3>
                <p class="text-white/60 mb-12 leading-relaxed">
                    Fill up the form and our Team will get back to you within 24 hours.
                </p>
                
                <div class="space-y-8">
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mr-4 group-hover:bg-accent transition-colors">
                            <i class="fas fa-phone-alt text-white"></i>
                        </div>
                        <div>
                            <span class="block text-xs uppercase tracking-widest text-white/50 mb-1">Phone</span>
                            <p class="text-lg font-medium">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mr-4 group-hover:bg-accent transition-colors">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <span class="block text-xs uppercase tracking-widest text-white/50 mb-1">Email</span>
                            <p class="text-lg font-medium">hello@interiom.com</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start group">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center mr-4 group-hover:bg-accent transition-colors">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <span class="block text-xs uppercase tracking-widest text-white/50 mb-1">Office</span>
                            <p class="text-lg font-medium leading-tight">123 Design Avenue, Suite 101<br>New York, NY 10012</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 pt-12">
                <div class="flex space-x-4">
                     <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary transition-all"><i class="fab fa-facebook-f"></i></a>
                     <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary transition-all"><i class="fab fa-twitter"></i></a>
                     <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary transition-all"><i class="fab fa-instagram"></i></a>
                     <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center hover:bg-white hover:text-primary transition-all"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Form Section -->
        <div class="lg:w-3/5 p-10 md:p-16 bg-white relative">
             <div class="absolute top-0 right-0 w-32 h-32 bg-canvas rounded-bl-full -mr-16 -mt-16 z-0"></div>

            <div class="relative z-10 h-full flex flex-col justify-center">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    try {
                        if(!isset($conn)) {
                             $db_instance = new Database();
                             $conn = $db_instance->getConnection();
                        }

                        $fname = trim($_POST['first_name']);
                        $lname = trim($_POST['last_name']);
                        $fullname = $fname . ' ' . $lname;
                        $email = trim($_POST['email']);
                        $projectType = $_POST['project_type'];
                        $msg = trim($_POST['message']);
                        $full_message = "Project Type: $projectType\n\n" . $msg;

                        $stmt = $conn->prepare("INSERT INTO inquiries (name, contact_info, message, source, status) VALUES (:name, :contact, :msg, 'website_form', 'new')");
                        $stmt->bindParam(':name', $fullname);
                        $stmt->bindParam(':contact', $email);
                        $stmt->bindParam(':msg', $full_message);
                        
                        if ($stmt->execute()) {
                            echo '<div class="bg-green-50 text-green-700 p-4 mb-8 rounded-2xl flex items-center"><i class="fas fa-check-circle mr-3"></i> Message sent successfully.</div>';
                        } else {
                            echo '<div class="bg-red-50 text-red-700 p-4 mb-8 rounded-2xl flex items-center"><i class="fas fa-exclamation-circle mr-3"></i> Failed to send message.</div>';
                        }
                    } catch (Exception $e) {
                         echo '<div class="bg-red-50 text-red-700 p-4 mb-8 rounded-2xl">Error: ' . $e->getMessage() . '</div>';
                    }
                }
                ?>
                
                <form action="" method="POST" class="space-y-8">
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="group">
                            <label class="block text-xs font-bold text-primary/60 uppercase tracking-widest mb-2 group-focus-within:text-accent transition-colors">First Name</label>
                            <input type="text" name="first_name" required class="w-full bg-canvas border border-transparent focus:bg-white focus:border-accent focus:ring-0 outline-none py-4 px-6 rounded-full transition-all text-primary font-medium" placeholder="John">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-primary/60 uppercase tracking-widest mb-2 group-focus-within:text-accent transition-colors">Last Name</label>
                            <input type="text" name="last_name" required class="w-full bg-canvas border border-transparent focus:bg-white focus:border-accent focus:ring-0 outline-none py-4 px-6 rounded-full transition-all text-primary font-medium" placeholder="Doe">
                        </div>
                     </div>
                     
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                         <div class="group">
                            <label class="block text-xs font-bold text-primary/60 uppercase tracking-widest mb-2 group-focus-within:text-accent transition-colors">Email</label>
                            <input type="email" name="email" required class="w-full bg-canvas border border-transparent focus:bg-white focus:border-accent focus:ring-0 outline-none py-4 px-6 rounded-full transition-all text-primary font-medium" placeholder="john@example.com">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-primary/60 uppercase tracking-widest mb-2 group-focus-within:text-accent transition-colors">Project Type</label>
                            <div class="relative">
                                <select name="project_type" class="w-full bg-canvas border border-transparent focus:bg-white focus:border-accent focus:ring-0 outline-none py-4 px-6 rounded-full transition-all text-primary font-medium appearance-none cursor-pointer">
                                    <option>Residential Design</option>
                                    <option>Commercial Office</option>
                                    <option>Renovation</option>
                                    <option>Hospitality</option>
                                </select>
                                <div class="absolute right-6 top-1/2 transform -translate-y-1/2 pointer-events-none">
                                    <i class="fas fa-chevron-down text-primary/40"></i>
                                </div>
                            </div>
                        </div>
                     </div>
                     
                     <div class="group">
                        <label class="block text-xs font-bold text-primary/60 uppercase tracking-widest mb-2 group-focus-within:text-accent transition-colors">Message</label>
                        <textarea name="message" required rows="4" class="w-full bg-canvas border border-transparent focus:bg-white focus:border-accent focus:ring-0 outline-none py-4 px-6 rounded-[2rem] transition-all text-primary font-medium resize-none" placeholder="Tell us about your project..."></textarea>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-accent text-white font-bold rounded-full shadow-lg hover:bg-primary transition-all transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Simple & Clean) -->
<section class="h-[500px] w-full bg-gray-200 relative grayscale hover:grayscale-0 transition-all duration-700">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869402!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1684490000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

<script>
    gsap.registerPlugin(ScrollTrigger);
    
    // Animate Form Container
    gsap.from(".shadow-2xl", {
        scrollTrigger: { trigger: ".shadow-2xl", start: "top 85%" },
        y: 100, opacity: 0, duration: 1.2, ease: "power3.out"
    });
    
    // Stagger Inputs
    gsap.from("input, select, textarea", {
        scrollTrigger: { trigger: "form", start: "top 80%" },
        y: 20, opacity: 0, stagger: 0.05, duration: 0.6, ease: "power2.out", delay: 0.5
    });

    // --- Three.js for Contact Page (Network Lines) ---
    const initContact3D = () => {
        const container = document.getElementById('contact-canvas');
        if(!container) return;

        const scene = new THREE.Scene();
        scene.fog = new THREE.Fog(0xF9F8F6, 10, 60);

        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.z = 20;

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        container.appendChild(renderer.domElement);

        // Created "Network" of connection points
        const geometry = new THREE.BufferGeometry();
        const count = 50;
        const positions = new Float32Array(count * 3);
        const velocity = [];

        for(let i=0; i<count * 3; i++) {
            positions[i] = (Math.random() - 0.5) * 40;
            if(i % 3 === 0) velocity.push({
                x: (Math.random() - 0.5) * 0.02,
                y: (Math.random() - 0.5) * 0.02
            });
        }
        
        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        
        const material = new THREE.PointsMaterial({
            color: 0xE06C3E,
            size: 0.3,
            transparent: true,
            opacity: 0.6
        });
        
        const points = new THREE.Points(geometry, material);
        scene.add(points);

        // Lines connecting points
        const lineMaterial = new THREE.LineBasicMaterial({
            color: 0x1A3C54,
            transparent: true,
            opacity: 0.1
        });

        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            
            // Update positions
            const posAttr = points.geometry.attributes.position;
            for(let i=0; i<count; i++) {
                let x = posAttr.getX(i);
                let y = posAttr.getY(i);
                
                x += velocity[i].x;
                y += velocity[i].y;

                if(x > 20 || x < -20) velocity[i].x *= -1;
                if(y > 20 || y < -20) velocity[i].y *= -1;

                posAttr.setXY(i, x, y);
            }
            posAttr.needsUpdate = true;
            points.rotation.y += 0.001;

            renderer.render(scene, camera);
        };
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        });
    };

    initContact3D();
</script>
<?php include 'includes/footer.php'; ?>
