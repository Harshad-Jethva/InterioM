<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';
?>

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
            <!-- Dynamic Item -->
            <div class="portfolio-item group relative overflow-hidden rounded-xl shadow-lg cursor-pointer" data-category="<?php echo htmlspecialchars($p['category']); ?>">
                <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($p['title']); ?>" class="w-full h-[400px] object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center items-center text-center p-6">
                    <h3 class="text-2xl font-bold text-white mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-300"><?php echo htmlspecialchars($p['title']); ?></h3>
                    <p class="text-gray-300 mb-4 translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75 line-clamp-2"><?php echo htmlspecialchars($p['description']); ?></p>
                    <button class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition-colors translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-100">View Project</button>
                </div>
            </div>
            <?php endforeach; else: ?>
                <div class="col-span-3 text-center text-gray-500 py-10">No projects found. Please add some from the Admin Panel.</div>
            <?php endif; ?>

        </div>
    </div>
</section>

<script>
    gsap.registerPlugin(ScrollTrigger);

    // Initial Stagger
    gsap.from(".portfolio-item", {
        scrollTrigger: { trigger: "#portfolio-grid", start: "top 85%" },
        y: 60, opacity: 0, stagger: 0.1, duration: 0.8, ease: "back.out(1.2)"
    });

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
                const matches = value === 'all' || category === value;
                
                if (matches) {
                    if(item.style.display === 'none') {
                        item.style.display = 'block';
                        gsap.fromTo(item, {scale: 0.8, opacity: 0}, {scale: 1, opacity: 1, duration: 0.5, ease: "power2.out"});
                    }
                } else {
                    if(item.style.display !== 'none') {
                         gsap.to(item, {scale: 0.8, opacity: 0, duration: 0.3, onComplete: () => item.style.display = 'none'});
                    }
                }
            });
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
