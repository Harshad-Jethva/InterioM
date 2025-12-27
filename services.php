<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

<!-- Page Header -->
<div class="relative bg-primary py-32 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4f9d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Services Hero" class="w-full h-full object-cover opacity-20 parallax-effect">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-5xl md:text-6xl font-bold font-serif mb-6 animate-slide-up">Our Services</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light animate-slide-up delay-100">Comprehensive design solutions tailored to your unique needs.</p>
    </div>
</div>

<!-- Detailed Services -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32">
        
        <!-- Service 1: Residential -->
        <div class="flex flex-col lg:flex-row items-center gap-16 service-row">
            <div class="w-full lg:w-1/2 relative group">
                <div class="absolute inset-0 bg-accent transform -translate-x-4 -translate-y-4 rounded-lg -z-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>
                <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Residential" class="rounded-lg shadow-xl w-full">
            </div>
            <div class="w-full lg:w-1/2">
                <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center text-accent mb-6">
                    <i class="fas fa-home text-2xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-primary font-serif mb-6">Residential Design</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Your home is your sanctuary. We specialize in creating high-end residential interiors that blend comfort with sophisticated aesthetics. Whether it's a cozy apartment or a sprawling villa, we tailor every inch to your lifestyle.
                </p>
                <h4 class="font-bold text-primary mb-4">What we cover:</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Space Planning</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Custom Furniture</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Lighting Design</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Smart Home Integration</div>
                </div>
            </div>
        </div>

        <!-- Service 2: Commercial -->
        <div class="flex flex-col lg:flex-row-reverse items-center gap-16 service-row">
             <div class="w-full lg:w-1/2 relative group">
                <div class="absolute inset-0 bg-primary transform translate-x-4 translate-y-4 rounded-lg -z-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform duration-500"></div>
                <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Commercial" class="rounded-lg shadow-xl w-full">
            </div>
            <div class="w-full lg:w-1/2">
                 <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center text-accent mb-6">
                    <i class="fas fa-building text-2xl"></i>
                </div>
                <h2 class="text-4xl font-bold text-primary font-serif mb-6">Commercial Offices</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    Productivity starts with environment. We design offices, retail stores, and hospitality spaces that not only look stunning but also optimize workflow and enhance brand identity.
                </p>
                 <h4 class="font-bold text-primary mb-4">What we cover:</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Brand Integration</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Ergonomic Workstations</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Acoustic Solutions</div>
                    <div class="flex items-center text-gray-600"><i class="fas fa-check text-accent mr-3"></i>Reception Areas</div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Pricing / Packages (New Addition) -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-primary font-serif mb-4">Transparent Pricing</h2>
             <div class="w-24 h-1 bg-accent mx-auto mb-6"></div>
            <p class="text-gray-500">Choose a package that fits your needs.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            
            <!-- Basic -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Consultation</h3>
                <p class="text-gray-500 mb-6">For DIY enthusiasts</p>
                <div class="text-4xl font-bold text-accent mb-6">$199<span class="text-sm text-gray-400 font-normal">/room</span></div>
                <ul class="space-y-4 mb-8 text-left text-gray-600 text-sm px-4">
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> 2 Hour Consultation</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Color Palette Selection</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Furniture Placement Advice</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Shopping List</li>
                </ul>
                <a href="contact.php" class="block w-full py-3 border border-primary text-primary font-bold rounded-sm hover:bg-primary hover:text-white transition-colors">Select Plan</a>
            </div>

             <!-- Design Only -->
             <div class="bg-white p-8 rounded-xl shadow-xl border-t-4 border-accent relative transform scale-105 z-10">
                 <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-accent text-white px-3 py-1 rounded text-xs font-bold uppercase tracking-wide">Most Popular</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Design Suite</h3>
                <p class="text-gray-500 mb-6">Complete visual plan</p>
                <div class="text-4xl font-bold text-accent mb-6">$899<span class="text-sm text-gray-400 font-normal">/room</span></div>
                <ul class="space-y-4 mb-8 text-left text-gray-600 text-sm px-4">
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Everything in Consultation</li>
                     <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> 3D Renderings (2 views)</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Detailed Floor Plans</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Fabric & Material Samples</li>
                </ul>
                <a href="contact.php" class="block w-full py-3 bg-accent text-white font-bold rounded-sm hover:bg-yellow-600 transition-colors">Select Plan</a>
            </div>

             <!-- Turnkey -->
             <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Turnkey</h3>
                <p class="text-gray-500 mb-6">We handle everything</p>
                <div class="text-4xl font-bold text-accent mb-6">Custom</div>
                <ul class="space-y-4 mb-8 text-left text-gray-600 text-sm px-4">
                     <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> End-to-End Management</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Contractor Procurement</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Daily Site Supervision</li>
                    <li class="flex items-start"><i class="fas fa-check text-green-500 mt-1 mr-3"></i> Final Styling & Handover</li>
                </ul>
                <a href="contact.php" class="block w-full py-3 border border-primary text-primary font-bold rounded-sm hover:bg-primary hover:text-white transition-colors">Contact Us</a>
            </div>

        </div>
    </div>
</section>

<!-- FAQ Accordion -->
<section class="py-24 bg-white">
    <div class="max-w-3xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-primary mb-4">Frequently Asked Questions</h2>
        </div>
        
        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center bg-gray-50 focus:outline-none" onclick="toggleFaq('faq1')">
                    What is the typical timeline for a project?
                    <i class="fas fa-chevron-down px-2" id="icon-faq1"></i>
                </button>
                <div id="faq1" class="hidden px-6 py-4 text-gray-600 bg-white border-t">
                    A typical single-room project takes 2-4 weeks for design and 4-8 weeks for execution. Full home renovations can take 3-6 months depending on the scope.
                </div>
            </div>
             <!-- FAQ 2 -->
             <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center bg-gray-50 focus:outline-none" onclick="toggleFaq('faq2')">
                    Do you have your own contractors?
                    <i class="fas fa-chevron-down px-2" id="icon-faq2"></i>
                </button>
                <div id="faq2" class="hidden px-6 py-4 text-gray-600 bg-white border-t">
                    Yes, we have a trusted network of carpenters, electricians, and painters we've worked with for years. However, we are also happy to work with your preferred vendors.
                </div>
            </div>
             <!-- FAQ 3 -->
             <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left font-semibold flex justify-between items-center bg-gray-50 focus:outline-none" onclick="toggleFaq('faq3')">
                    How do you charge for your services?
                    <i class="fas fa-chevron-down px-2" id="icon-faq3"></i>
                </button>
                <div id="faq3" class="hidden px-6 py-4 text-gray-600 bg-white border-t">
                    We offer both fixed-fee packages and percentage-based project management fees. We determine which structure works best for you during the initial consultation.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    gsap.registerPlugin(ScrollTrigger);

     // Parallax
     gsap.to(".parallax-effect", {
        scrollTrigger: {
            trigger: "body",
            start: "top top",
            end: "bottom top",
            scrub: true
        },
        y: 200,
        ease: "none"
    });

    // Animate Service Rows
    gsap.utils.toArray('.service-row').forEach((row, i) => {
        gsap.from(row.children, {
            scrollTrigger: {
                trigger: row,
                start: "top 80%"
            },
            y: 100,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: "power3.out"
        });
    });

    // FAQ Toggle Logic
    function toggleFaq(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            gsap.fromTo(content, {height: 0, opacity: 0}, {height: "auto", opacity: 1, duration: 0.3});
            gsap.to(icon, {rotation: 180, duration: 0.3});
        } else {
            gsap.to(content, {height: 0, opacity: 0, duration: 0.3, onComplete: () => content.classList.add('hidden')});
            gsap.to(icon, {rotation: 0, duration: 0.3});
        }
    }
</script>

<?php include 'includes/footer.php'; ?>
