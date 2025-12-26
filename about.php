<?php include 'includes/header.php'; ?>

<!-- Page Header with Parallax -->
<div class="relative bg-primary py-32 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="About Hero" class="w-full h-full object-cover opacity-20 parallax-effect">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-5xl md:text-6xl font-bold font-serif mb-6 tracking-tight animate-slide-up">Who We Are</h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light animate-slide-up delay-100">Architects of dreams. Curators of style. Builders of trust.</p>
    </div>
</div>

<!-- Philosophy Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-accent/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-4 bg-accent/20 rounded-lg transform rotate-2 transition-transform group-hover:rotate-1"></div>
                <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Philosophy" class="relative rounded-lg shadow-2xl w-full transform transition-transform group-hover:-translate-y-2 duration-500">
            </div>
            
            <div class="gsap-reveal">
                <h4 class="text-accent font-bold uppercase tracking-widest mb-2">Our Philosophy</h4>
                <h2 class="text-4xl font-bold text-primary mb-6 font-serif">Design that Speechless, <br>Engineering that Endures.</h2>
                <div class="space-y-6 text-gray-600 leading-relaxed">
                    <p>
                        We believe that an interior is not just an arrangement of furniture; it is the soul of the building. Our philosophy is rooted in the belief that "Form follows Fiction"—every space has a story to tell, and we are the narrators.
                    </p>
                    <p>
                        From the initial sketch to the final polish, we maintain an obsession with quality. We don't cut corners; we polish them. Our team integrates biophilic design principles, smart home technology, and sustainable materials to create spaces that are future-proof.
                    </p>
                </div>
                
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center space-x-4 p-4 border border-gray-100 rounded-lg bg-gray-50 hover:shadow-md transition-shadow">
                        <i class="fas fa-leaf text-2xl text-green-600"></i>
                        <span class="font-semibold text-gray-800">Eco-Friendly</span>
                    </div>
                    <div class="flex items-center space-x-4 p-4 border border-gray-100 rounded-lg bg-gray-50 hover:shadow-md transition-shadow">
                        <i class="fas fa-layer-group text-2xl text-accent"></i>
                        <span class="font-semibold text-gray-800">Premium Materials</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Journey -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20 gsap-reveal">
            <h2 class="text-4xl font-bold text-primary font-serif mb-4">Our Journey</h2>
            <div class="w-24 h-1 bg-accent mx-auto"></div>
            <p class="mt-4 text-gray-500">A timeline of excellence.</p>
        </div>

        <div class="relative">
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-gray-300"></div>

            <div class="space-y-24">
                <!-- 2015 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between timeline-item opacity-0">
                    <div class="order-1 w-full md:w-5/12 text-center md:text-right px-4">
                        <span class="text-6xl font-bold text-gray-200 absolute -top-10 right-4 z-0">2015</span>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-primary">The Inception</h3>
                            <p class="text-gray-600 mt-2">Founded by James Smith in a small garage with a big vision for minimalist interiors.</p>
                        </div>
                    </div>
                    <div class="z-10 flex items-center order-1 w-12 h-12 bg-white border-4 border-accent rounded-full shadow-xl justify-center">
                        <div class="w-4 h-4 bg-primary rounded-full"></div>
                    </div>
                    <div class="order-1 w-full md:w-5/12 px-4"></div>
                </div>

                <!-- 2018 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between timeline-item opacity-0">
                    <div class="order-1 w-full md:w-5/12 px-4"></div>
                     <div class="z-10 flex items-center order-1 w-12 h-12 bg-white border-4 border-accent rounded-full shadow-xl justify-center">
                        <div class="w-4 h-4 bg-primary rounded-full"></div>
                    </div>
                    <div class="order-1 w-full md:w-5/12 text-center md:text-left px-4">
                        <span class="text-6xl font-bold text-gray-200 absolute -top-10 left-4 z-0">2018</span>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-primary">Commercial Leap</h3>
                            <p class="text-gray-600 mt-2">Partnered with Tech Giants to design modern workspaces in Silicon Valley.</p>
                        </div>
                    </div>
                </div>
                
                <!-- 2021 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between timeline-item opacity-0">
                    <div class="order-1 w-full md:w-5/12 text-center md:text-right px-4">
                         <span class="text-6xl font-bold text-gray-200 absolute -top-10 right-4 z-0">2021</span>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-primary">Global Award</h3>
                            <p class="text-gray-600 mt-2">Won the prestigious "International Design Excellence Award" for sustainable luxury.</p>
                        </div>
                    </div>
                     <div class="z-10 flex items-center order-1 w-12 h-12 bg-white border-4 border-accent rounded-full shadow-xl justify-center">
                        <div class="w-4 h-4 bg-primary rounded-full"></div>
                    </div>
                    <div class="order-1 w-full md:w-5/12 px-4"></div>
                </div>
                
                 <!-- 2024 -->
                <div class="relative flex flex-col md:flex-row items-center justify-between timeline-item opacity-0">
                    <div class="order-1 w-full md:w-5/12 px-4"></div>
                     <div class="z-10 flex items-center order-1 w-12 h-12 bg-white border-4 border-accent rounded-full shadow-xl justify-center">
                        <div class="w-4 h-4 bg-primary rounded-full"></div>
                    </div>
                    <div class="order-1 w-full md:w-5/12 text-center md:text-left px-4">
                         <span class="text-6xl font-bold text-gray-200 absolute -top-10 left-4 z-0">2024</span>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-bold text-primary">Digital Era</h3>
                            <p class="text-gray-600 mt-2">Launched our proprietary Project Management System (MIS) for client transparency.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section (Enhanced) -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 gsap-reveal">
            <h2 class="text-4xl font-bold text-primary font-serif mb-4">The Visionaries</h2>
            <div class="w-24 h-1 bg-accent mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
             <!-- Member 1 -->
             <div class="group relative bg-gray-100 rounded-xl overflow-hidden cursor-pointer">
                 <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Team 1" class="w-full h-96 object-cover object-top filter grayscale group-hover:grayscale-0 transition-all duration-500">
                 <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent flex flex-col justify-end p-8 translate-y-10 group-hover:translate-y-0 transition-transform duration-300">
                     <h3 class="text-2xl font-bold text-white mb-1">James Smith</h3>
                     <p class="text-accent text-sm uppercase tracking-widest mb-4">Principal Architect</p>
                     <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">"Architecture is frozen music."</p>
                 </div>
             </div>
             <!-- Member 2 -->
             <div class="group relative bg-gray-100 rounded-xl overflow-hidden cursor-pointer">
                 <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Team 2" class="w-full h-96 object-cover object-top filter grayscale group-hover:grayscale-0 transition-all duration-500">
                 <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent flex flex-col justify-end p-8 translate-y-10 group-hover:translate-y-0 transition-transform duration-300">
                     <h3 class="text-2xl font-bold text-white mb-1">Elena Rodriguez</h3>
                     <p class="text-accent text-sm uppercase tracking-widest mb-4">Design Director</p>
                     <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">"Colors speak louder than words."</p>
                 </div>
             </div>
             <!-- Member 3 -->
             <div class="group relative bg-gray-100 rounded-xl overflow-hidden cursor-pointer">
                 <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Team 3" class="w-full h-96 object-cover object-top filter grayscale group-hover:grayscale-0 transition-all duration-500">
                 <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent flex flex-col justify-end p-8 translate-y-10 group-hover:translate-y-0 transition-transform duration-300">
                     <h3 class="text-2xl font-bold text-white mb-1">Michael Chang</h3>
                     <p class="text-accent text-sm uppercase tracking-widest mb-4">Head of Projects</p>
                     <p class="text-gray-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">"Execution is the key to brilliance."</p>
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

    // Reveal Text
    gsap.utils.toArray('.gsap-reveal').forEach(element => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: "top 80%",
            },
            y: 50,
            opacity: 0,
            duration: 1,
            ease: "power3.out"
        });
    });

    // Timeline Animation
    gsap.utils.toArray('.timeline-item').forEach(item => {
        gsap.fromTo(item, 
            { opacity: 0, y: 50 },
            {
                scrollTrigger: {
                    trigger: item,
                    start: "top 75%",
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power3.out"
            }
        );
    });
</script>

<?php include 'includes/footer.php'; ?>
