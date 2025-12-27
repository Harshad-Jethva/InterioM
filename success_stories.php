<?php include 'includes/header.php'; ?>

<!-- Header -->
<div class="bg-primary text-white py-20 text-center">
    <h1 class="text-4xl md:text-5xl font-bold font-serif mb-4">Success Stories</h1>
    <p class="text-gray-300 max-w-2xl mx-auto px-4">See the transformation. Real homes, real results.</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    
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
    <div class="mb-20">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary"><?php echo htmlspecialchars($s['title']); ?></h2>
            <p class="text-gray-500">Transformation</p>
        </div>
        
        <div class="relative h-[400px] w-full max-w-5xl mx-auto rounded-lg overflow-hidden shadow-2xl group cursor-e-resize" id="slider-<?php echo $sliderId; ?>">
            <!-- After Image (Background) -->
            <div class="absolute inset-0 w-full h-full">
                <img src="<?php echo htmlspecialchars($afterSrc); ?>" class="w-full h-full object-cover">
                <span class="absolute top-4 right-4 bg-accent text-white px-3 py-1 text-sm font-bold rounded">AFTER</span>
            </div>
            
            <!-- Before Image (Clipped on top) -->
            <div class="absolute inset-0 w-1/2 h-full overflow-hidden border-r-4 border-white" id="before-img-<?php echo $sliderId; ?>">
                <img src="<?php echo htmlspecialchars($beforeSrc); ?>" class="w-[200%] max-w-none h-full object-cover">
                <span class="absolute top-4 left-4 bg-gray-800 text-white px-3 py-1 text-sm font-bold rounded">BEFORE</span>
            </div>
            
             <!-- Slider Handle -->
             <div class="absolute inset-y-0 left-1/2 w-10 -ml-5 flex items-center justify-center pointer-events-none" id="handle-<?php echo $sliderId; ?>">
                <div class="w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" transform="rotate(90 12 12)" />
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="max-w-3xl mx-auto mt-8 text-center text-gray-600">
            <p>"<?php echo htmlspecialchars($s['description']); ?>"</p>
        </div>
    </div>
    <?php endforeach; else: ?>
        <p class="text-center text-xl text-gray-500">No success stories uploaded yet.</p>
    <?php endif; ?>
    
</div>

<script>
    // Simple Before/After Slider Logic
    document.querySelectorAll('[id^="slider-"]').forEach(slider => {
        const id = slider.id.split('-')[1];
        const beforeImg = document.getElementById(`before-img-${id}`);
        // Dynamic handle selection
        const handle = document.getElementById(`handle-${id}`);
        
        slider.addEventListener('mousemove', (e) => {
            const rect = slider.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const width = rect.width;
            let percent = (x / width) * 100;
            
            // Clamp
            if (percent < 0) percent = 0;
            if (percent > 100) percent = 100;
            
            beforeImg.style.width = `${percent}%`;
            // Move Handle
            if(handle) handle.style.left = `${percent}%`;
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
