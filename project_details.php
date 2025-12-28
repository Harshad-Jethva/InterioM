<?php
require_once 'includes/db_connect.php';
include 'includes/header.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$project = null;

if ($id > 0) {
    try {
        $db_obj = new Database();
        $db = $db_obj->getConnection();
        $stmt = $db->prepare("SELECT * FROM projects WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $project = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        // Handle error safely
    }
}

if (!$project) {
    echo "<div class='h-screen flex items-center justify-center text-white bg-onyx'><div class='text-center'> <h1 class='text-4xl font-bold mb-4'>Project Not Found</h1> <a href='portfolio.php' class='text-accent hover:underline'>Back to Portfolio</a> </div></div>";
    include 'includes/footer.php';
    exit();
}

$imgSrc = !empty($project['image_path']) ? 'uploads/' . $project['image_path'] : 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
?>

<!-- Project Hero -->
<section class="relative h-[60vh] md:h-[80vh] bg-onyx overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-full object-cover opacity-60 parallax-img">
        <div class="absolute inset-0 bg-gradient-to-t from-onyx via-transparent to-transparent"></div>
    </div>
    
    <div class="absolute bottom-0 left-0 w-full p-8 md:p-16 z-10">
        <div class="max-w-7xl mx-auto">
            <span class="inline-block py-1 px-3 border border-accent text-accent text-sm font-bold uppercase tracking-widest mb-4 bg-black/30 backdrop-blur-md rounded-sm"><?php echo htmlspecialchars($project['category']); ?></span>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-4 animate-slide-up"><?php echo htmlspecialchars($project['title']); ?></h1>
            <p class="text-xl text-gray-300 max-w-2xl font-light animate-slide-up delay-100"><?php echo htmlspecialchars($project['location']); ?></p>
        </div>
    </div>
</section>

<!-- Project Details Content -->
<section class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-16">
            
            <!-- Details Sidebar -->
            <div class="md:w-1/3 order-2 md:order-1">
                <div class="bg-gray-50 p-8 rounded-lg border border-gray-100 sticky top-24">
                    <h3 class="text-2xl font-bold text-primary font-serif mb-6 border-b border-gray-200 pb-4">Project Info</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Client</span>
                            <span class="block text-lg font-medium text-gray-800"><?php echo !empty($project['client']) ? htmlspecialchars($project['client']) : 'Private Client'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Location</span>
                            <span class="block text-lg font-medium text-gray-800"><?php echo !empty($project['location']) ? htmlspecialchars($project['location']) : 'N/A'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Area</span>
                            <span class="block text-lg font-medium text-gray-800"><?php echo !empty($project['area']) ? htmlspecialchars($project['area']) . ' sq ft' : 'N/A'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Year</span>
                            <span class="block text-lg font-medium text-gray-800"><?php echo !empty($project['project_year']) ? htmlspecialchars($project['project_year']) : '2023'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-gray-400 font-bold tracking-widest mb-1">Architect</span>
                            <span class="block text-lg font-medium text-gray-800"><?php echo !empty($project['architect']) ? htmlspecialchars($project['architect']) : 'Spaces by KD Team'; ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <a href="contact.php" class="block w-full text-center bg-primary text-white font-bold py-3 rounded-sm hover:bg-accent hover:text-white transition-colors">Start Similar Project</a>
                    </div>
                </div>
            </div>
            
            <!-- Description & Narrative -->
            <div class="md:w-2/3 order-1 md:order-2">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 font-serif">The Concept</h2>
                <div class="prose prose-lg text-gray-600 leading-relaxed space-y-6">
                    <?php 
                        // Preserve line breaks
                        echo nl2br(htmlspecialchars($project['description'])); 
                    ?>
                </div>
                
                <!-- Project Gallery -->
                <div class="mt-16">
                     <h2 class="text-3xl font-bold text-gray-800 mb-8 font-serif">Visual Gallery</h2>
                     <!-- Masonry Grid -->
                     <div class="columns-1 md:columns-2 gap-4 space-y-4">
                        <?php
                            // Fetch Gallery Images
                            $gallery = [];
                            try {
                                $g_stmt = $db->prepare("SELECT * FROM project_images WHERE project_id = :pid");
                                $g_stmt->bindParam(':pid', $id);
                                $g_stmt->execute();
                                $gallery = $g_stmt->fetchAll(PDO::FETCH_ASSOC);
                            } catch(PDOException $e) {}

                            // If no gallery images, use main image as single item
                            if(count($gallery) == 0 && !empty($imgSrc)) {
                                $gallery[] = ['image_path' => $project['image_path']]; 
                            }

                            // Pass mapped array to JS for lightbox navigation
                            $jsGallery = array_map(function($img) { return 'uploads/' . $img['image_path']; }, $gallery);
                            $jsonGallery = json_encode($jsGallery);

                            foreach($gallery as $index => $img):
                                $src = 'uploads/' . $img['image_path'];
                        ?>
                            <div class="break-inside-avoid relative group rounded-lg overflow-hidden shadow-md cursor-pointer mb-4" onclick="openLightbox(<?php echo $index; ?>)">
                                <img src="<?php echo htmlspecialchars($src); ?>" class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <i class="fas fa-expand text-white text-2xl transform scale-50 group-hover:scale-100 transition-transform duration-300"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                     </div>
                </div>
            </div>
            
        </div>
        
        <div class="mt-16 border-t border-gray-200 pt-8 flex justify-between items-center">
            <a href="portfolio.php" class="text-primary font-bold hover:text-accent transition-colors flex items-center"><i class="fas fa-arrow-left mr-2"></i> Back to Portfolio</a>
        </div>
    </div>
</section>

<!-- Advanced Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-[100] bg-black/95 hidden flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-300">
    <!-- Controls -->
    <button class="absolute top-5 right-5 text-gray-400 hover:text-white text-3xl focus:outline-none z-50 transition-colors" onclick="closeLightbox()">&times;</button>
    
    <button class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 hover:text-white text-5xl p-4 focus:outline-none transition-all hover:scale-110 z-50 hidden md:block" onclick="changeImage(-1)">&#10094;</button>
    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-white/50 hover:text-white text-5xl p-4 focus:outline-none transition-all hover:scale-110 z-50 hidden md:block" onclick="changeImage(1)">&#10095;</button>

    <!-- Image Container -->
    <div class="relative max-w-full max-h-[85vh]">
        <img id="lightbox-img" src="" class="max-w-full max-h-[85vh] rounded shadow-2xl object-contain">
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/80 bg-black/50 px-3 py-1 rounded-full text-sm font-light tracking-wide backdrop-blur-sm">
            <span id="current-index">1</span> / <span id="total-images">1</span>
        </div>
    </div>
</div>

<script>
    // Data passed from PHP
    const galleryImages = <?php echo $jsonGallery; ?>;
    let currentIndex = 0;

    // Lightbox Logic
    const lb = document.getElementById('lightbox');
    const lbImg = document.getElementById('lightbox-img');
    const indexSpan = document.getElementById('current-index');
    const totalSpan = document.getElementById('total-images');

    function openLightbox(index) {
        if(galleryImages.length === 0) return;
        
        currentIndex = index;
        updateLightboxImage();
        
        lb.classList.remove('hidden');
        // Small delay to allow display:block to apply before opacity transition
        setTimeout(() => {
            lb.classList.remove('opacity-0');
            gsap.fromTo(lbImg, {scale: 0.9, opacity: 0}, {scale: 1, opacity: 1, duration: 0.4, ease: "back.out(1.2)"});
        }, 10);
        
        totalSpan.innerText = galleryImages.length;
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        lb.classList.add('opacity-0');
        setTimeout(() => {
            lb.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    function changeImage(direction) {
        // Animate out
        gsap.to(lbImg, {x: -50 * direction, opacity: 0, duration: 0.2, onComplete: () => {
             currentIndex += direction;
            if (currentIndex >= galleryImages.length) currentIndex = 0;
            if (currentIndex < 0) currentIndex = galleryImages.length - 1;
            
            updateLightboxImage();
            
            // Animate in from opposite side
            gsap.fromTo(lbImg, {x: 50 * direction, opacity: 0}, {x: 0, opacity: 1, duration: 0.2});
        }});
    }

    function updateLightboxImage() {
        lbImg.src = galleryImages[currentIndex];
        indexSpan.innerText = currentIndex + 1;
    }

    // Keyboard Navigation
    document.addEventListener('keydown', function(e) {
        if (lb.classList.contains('hidden')) return;
        
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') changeImage(-1);
        if (e.key === 'ArrowRight') changeImage(1);
    });

    // Hero Parallax
    gsap.to(".parallax-img", {
        yPercent: 30,
        ease: "none",
        scrollTrigger: {
            trigger: ".relative",
            start: "top top",
            end: "bottom top",
            scrub: true
        }
    });
</script>

<?php include 'includes/footer.php'; ?>
