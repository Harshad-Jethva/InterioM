<?php include 'includes/header.php'; ?>

<!-- Page Header (Short) -->
<div class="bg-primary py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-bold font-serif mb-4">Portfolio</h1>
        <p class="text-gray-400">Where vision meets reality.</p>
    </div>
</div>

<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filters (Styled) -->
        <div class="flex justify-center flex-wrap gap-4 mb-16">
            <button class="filter-btn active px-8 py-3 rounded-full border border-gray-200 text-gray-600 font-medium hover:border-accent hover:text-accent transition-all duration-300 focus:outline-none" data-filter="all">All Works</button>
            <button class="filter-btn px-8 py-3 rounded-full border border-gray-200 text-gray-600 font-medium hover:border-accent hover:text-accent transition-all duration-300 focus:outline-none" data-filter="residential">Residential</button>
            <button class="filter-btn px-8 py-3 rounded-full border border-gray-200 text-gray-600 font-medium hover:border-accent hover:text-accent transition-all duration-300 focus:outline-none" data-filter="commercial">Commercial</button>
            <button class="filter-btn px-8 py-3 rounded-full border border-gray-200 text-gray-600 font-medium hover:border-accent hover:text-accent transition-all duration-300 focus:outline-none" data-filter="hospitality">Hospitality</button>
        </div>

        <!-- Masonry-like Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            
            <!-- Item 1: Residential -->
            <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="residential">
                <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Modern Villa</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Beverly Hills</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>

            <!-- Item 2: Commercial -->
             <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="commercial">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Tech HQ</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">San Francisco</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>

            <!-- Item 3: Hospitality -->
             <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="hospitality">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[450px] object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">The Grand Cafe</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Paris</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>

             <!-- Item 4: Residential -->
             <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="residential">
                <img src="https://images.unsplash.com/photo-1616137466211-f939a420be84?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Minimalist Apt</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Tokyo</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>

            <!-- Item 5: Commercial -->
             <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="commercial">
                <img src="https://images.unsplash.com/photo-1504384308090-c54be3852f33?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[480px] object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Creative Hub</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">London</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>
            
             <!-- Item 6: Residential (Detailed) -->
             <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="residential">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Project" class="w-full h-[420px] object-cover transition-transform duration-700 group-hover:scale-105">
                 <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Dining Hall Renovation</h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">New York</p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Details</button>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // Filter Logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Style Active Button
            filterBtns.forEach(b => {
                b.classList.remove('bg-accent', 'text-white', 'border-accent');
                b.classList.add('text-gray-600', 'border-gray-200');
            });
            btn.classList.remove('text-gray-600', 'border-gray-200');
            btn.classList.add('bg-accent', 'text-white', 'border-accent');

            const value = btn.getAttribute('data-filter');
            
            portfolioItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (value === 'all' || category === value) {
                    item.style.display = 'block';
                    gsap.to(item, {opacity: 1, scale: 1, duration: 0.4, ease: "power2.out"});
                } else {
                    gsap.to(item, {opacity: 0, scale: 0.8, duration: 0.4, ease: "power2.in", onComplete: () => {
                        item.style.display = 'none';
                    }});
                }
            });
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
