<?php include 'includes/header.php'; ?>

<!-- Header -->
<div class="bg-primary text-white py-20 text-center">
    <h1 class="text-4xl md:text-5xl font-bold font-serif mb-4">Success Stories</h1>
    <p class="text-gray-300 max-w-2xl mx-auto px-4">See the transformation. Real homes, real results.</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    
    <!-- Story 1 -->
    <div class="mb-20">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary">The Thompson Residence</h2>
            <p class="text-gray-500">Living Room Revamp</p>
        </div>
        
        <div class="relative h-[400px] w-full max-w-5xl mx-auto rounded-lg overflow-hidden shadow-2xl group cursor-e-resize" id="slider-1">
            <!-- After Image (Background) -->
            <div class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover">
                <span class="absolute top-4 right-4 bg-accent text-white px-3 py-1 text-sm font-bold rounded">AFTER</span>
            </div>
            
            <!-- Before Image (Clipped on top) -->
            <div class="absolute inset-0 w-1/2 h-full overflow-hidden border-r-4 border-white" id="before-img-1">
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="w-[200%] max-w-none h-full object-cover">
                <span class="absolute top-4 left-4 bg-gray-800 text-white px-3 py-1 text-sm font-bold rounded">BEFORE</span>
            </div>
            
             <!-- Slider Handle -->
             <div class="absolute inset-y-0 left-1/2 w-10 -ml-5 flex items-center justify-center pointer-events-none" id="handle-1">
                <div class="w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" transform="rotate(90 12 12)" />
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="max-w-3xl mx-auto mt-8 text-center text-gray-600">
            <p>"The space was dark and cluttered. InterioM opened it up, brought in natural light, and used a palette that makes the room feel twice as big."</p>
        </div>
    </div>
    
     <!-- Story 2 -->
     <div class="mb-20">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-primary">TechStart Office</h2>
            <p class="text-gray-500">Commercial Renovation</p>
        </div>
        
        <div class="relative h-[400px] w-full max-w-5xl mx-auto rounded-lg overflow-hidden shadow-2xl group cursor-e-resize" id="slider-2">
            <!-- After Image (Background) -->
            <div class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover">
                <span class="absolute top-4 right-4 bg-accent text-white px-3 py-1 text-sm font-bold rounded">AFTER</span>
            </div>
            
            <!-- Before Image (Clipped on top) -->
            <div class="absolute inset-0 w-1/2 h-full overflow-hidden border-r-4 border-white" id="before-img-2">
                <img src="https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" class="w-[200%] max-w-none h-full object-cover">
                <span class="absolute top-4 left-4 bg-gray-800 text-white px-3 py-1 text-sm font-bold rounded">BEFORE</span>
            </div>
             <!-- Slider Handle -->
             <div class="absolute inset-y-0 left-1/2 w-10 -ml-5 flex items-center justify-center pointer-events-none" id="handle-2">
                <div class="w-10 h-10 bg-white rounded-full shadow-lg flex items-center justify-center text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" transform="rotate(90 12 12)" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Simple Before/After Slider Logic
    document.querySelectorAll('[id^="slider-"]').forEach(slider => {
        const id = slider.id.split('-')[1];
        const beforeImg = document.getElementById(`before-img-${id}`);
        const handle = document.getElementById(`handle-1`); // Corrected logic below to dynamic handle
        
        slider.addEventListener('mousemove', (e) => {
            const rect = slider.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const width = rect.width;
            let percent = (x / width) * 100;
            
            // Clamp
            if (percent < 0) percent = 0;
            if (percent > 100) percent = 100;
            
            beforeImg.style.width = `${percent}%`;
            // Handle position logic would typically move the handle div too
            // For simplicity in this demo, we just move the clip path div
            // The handle can be absolutely positioned based on percent
             const handleDynamic = slider.querySelector('[id^="handle-"]');
             handleDynamic.style.left = `${percent}%`;
        });
    });
</script>

<!-- Footer from index (simplified) -->
<footer class="bg-gray-900 text-white py-8 text-center mt-12">
    <p>&copy; 2023 InterioM Consultancy.</p>
</footer>
</body>
</html>
