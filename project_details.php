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
    echo "<div class='h-screen flex items-center justify-center text-primary bg-canvas'><div class='text-center'> <h1 class='text-4xl font-sans font-medium mb-4'>Project Not Found</h1> <a href='portfolio.php' class='text-accent hover:underline'>Back to Portfolio</a> </div></div>";
    include 'includes/footer.php';
    exit();
}

$imgSrc = !empty($project['image_path']) ? 'uploads/' . $project['image_path'] : 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
?>

<!-- Project Hero -->
<section class="relative h-[80vh] w-full overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="w-full h-full object-cover parallax-img">
        <div class="absolute inset-0 bg-primary/40"></div>
    </div>
    
    <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-16 z-10 max-w-7xl mx-auto w-full">
        <div class="opacity-0 animate-fade-in-up">
            <span class="inline-block py-2 px-4 border border-white/30 text-white text-xs font-bold uppercase tracking-widest mb-6 rounded-full backdrop-blur-md"><?php echo htmlspecialchars($project['category']); ?></span>
            <h1 class="text-6xl md:text-8xl font-medium font-sans text-white mb-6 leading-none"><?php echo htmlspecialchars($project['title']); ?></h1>
            <p class="text-2xl text-white/80 max-w-2xl font-light font-serif italic"><?php echo htmlspecialchars($project['location']); ?></p>
        </div>
    </div>
</section>

<!-- Project Details Content -->
<section class="py-24 bg-canvas relative rounded-t-[4rem] -mt-16 z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row gap-20">
            
            <!-- Details Sidebar -->
            <div class="md:w-1/3 order-2 md:order-1">
                <div class="bg-surface p-10 rounded-[3rem] sticky top-32 shadow-xl">
                    <h3 class="text-2xl font-medium text-primary font-sans mb-8 border-b border-primary/10 pb-4">Project Data</h3>
                    
                    <div class="space-y-8">
                        <div>
                            <span class="block text-xs uppercase text-primary/40 font-bold tracking-widest mb-2">Client</span>
                            <span class="block text-xl font-medium text-primary"><?php echo !empty($project['client']) ? htmlspecialchars($project['client']) : 'Private Client'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-primary/40 font-bold tracking-widest mb-2">Location</span>
                            <span class="block text-xl font-medium text-primary"><?php echo !empty($project['location']) ? htmlspecialchars($project['location']) : 'N/A'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-primary/40 font-bold tracking-widest mb-2">Area</span>
                            <span class="block text-xl font-medium text-primary"><?php echo !empty($project['area']) ? htmlspecialchars($project['area']) . ' sq ft' : 'N/A'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-primary/40 font-bold tracking-widest mb-2">Year</span>
                            <span class="block text-xl font-medium text-primary"><?php echo !empty($project['project_year']) ? htmlspecialchars($project['project_year']) : '2023'; ?></span>
                        </div>
                        
                        <div>
                            <span class="block text-xs uppercase text-primary/40 font-bold tracking-widest mb-2">Architect</span>
                            <span class="block text-xl font-medium text-primary"><?php echo !empty($project['architect']) ? htmlspecialchars($project['architect']) : 'Spaces by KD Team'; ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-12 pt-8 border-t border-primary/10">
                        <a href="contact.php" class="block w-full py-4 bg-primary text-white text-center font-bold rounded-full hover:bg-accent hover:scale-105 transition-all shadow-lg hover:shadow-2xl">Start Similar Project</a>
                    </div>
                </div>
            </div>
            
            <!-- Description & Narrative -->
            <div class="md:w-2/3 order-1 md:order-2">
                <h2 class="text-4xl font-medium text-primary mb-10 font-sans">The Narrative</h2>
                <div class="prose prose-xl text-primary/70 leading-relaxed font-light mb-20">
                    <?php 
                        // Preserve line breaks
                        echo nl2br(htmlspecialchars($project['description'])); 
                    ?>
                </div>
                
                <!-- Project Gallery -->
                <div class="space-y-4">
                     <!-- Gallery Grid -->
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                // Variation for layout
                                $span = ($index % 3 == 0) ? 'md:col-span-2 aspect-video' : 'aspect-[3/4]';
                        ?>
                            <div class="<?php echo $span; ?> relative group rounded-[2rem] overflow-hidden shadow-lg cursor-pointer transform transition-all duration-500 hover:shadow-2xl" onclick="openLightbox(<?php echo $index; ?>)">
                                <img src="<?php echo htmlspecialchars($src); ?>" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center border border-white/20">
                                        <i class="fas fa-plus text-white text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                     </div>
                </div>

                <div class="mt-20 border-t border-primary/10 pt-10 flex justify-between items-center">
                    <a href="portfolio.php" class="text-primary font-bold hover:text-accent transition-colors flex items-center text-lg"><i class="fas fa-arrow-left mr-3"></i> Back to Portfolio</a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Advanced Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-[100] bg-primary/95 hidden flex flex-col items-center justify-center p-4 opacity-0 transition-opacity duration-300">
    <!-- Controls -->
    <button class="absolute top-8 right-8 text-white/50 hover:text-white text-4xl focus:outline-none z-50 transition-colors" onclick="closeLightbox()">&times;</button>
    
    <button class="absolute left-4 top-1/2 -translate-y-1/2 text-white/20 hover:text-white text-6xl p-4 focus:outline-none transition-all hover:scale-110 z-50 hidden md:block" onclick="changeImage(-1)">&#8249;</button>
    <button class="absolute right-4 top-1/2 -translate-y-1/2 text-white/20 hover:text-white text-6xl p-4 focus:outline-none transition-all hover:scale-110 z-50 hidden md:block" onclick="changeImage(1)">&#8250;</button>

    <!-- Image Container -->
    <div class="relative max-w-[90vw] max-h-[85vh]">
        <img id="lightbox-img" src="" class="max-w-full max-h-[85vh] rounded-lg shadow-2xl object-contain">
        <div class="absolute -bottom-12 left-1/2 -translate-x-1/2 text-white/50 text-sm font-medium tracking-widest">
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
            gsap.fromTo(lbImg, {scale: 0.95, opacity: 0}, {scale: 1, opacity: 1, duration: 0.5, ease: "power2.out"});
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
        gsap.to(lbImg, {x: -20 * direction, opacity: 0, duration: 0.2, onComplete: () => {
             currentIndex += direction;
            if (currentIndex >= galleryImages.length) currentIndex = 0;
            if (currentIndex < 0) currentIndex = galleryImages.length - 1;
            
            updateLightboxImage();
            
            // Animate in from opposite side
            gsap.fromTo(lbImg, {x: 20 * direction, opacity: 0}, {x: 0, opacity: 1, duration: 0.2});
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

    gsap.registerPlugin(ScrollTrigger);

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
    
    // Animate Content
    gsap.from(".animate-fade-in-up", {
        y: 50,
        opacity: 0,
        duration: 1,
        ease: "power2.out",
        delay: 0.5
    });
</script>

<?php include 'includes/footer.php'; ?>
