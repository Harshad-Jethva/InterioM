<?php include 'includes/header.php'; ?>

<!-- Page Header (Split Layout) -->
<div class="relative bg-white pt-32 pb-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
             <h5 class="text-accent font-bold uppercase tracking-widest mb-2">Get In Touch</h5>
            <h1 class="text-5xl md:text-6xl font-bold font-serif text-primary mb-6">Let's Create Together</h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto">Have a project in mind? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>
    </div>
</div>

<section class="py-12 bg-white pb-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row">
            
            <!-- Contact Info Sidebar -->
            <div class="lg:w-1/3 bg-primary text-white p-12 relative overflow-hidden">
                <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-accent rounded-full opacity-20"></div>
                <div class="relative z-10 space-y-12">
                    <div>
                        <h3 class="text-2xl font-bold mb-6 font-serif">Contact Information</h3>
                        <p class="text-gray-300">Fill up the form and our Team will get back to you within 24 hours.</p>
                    </div>
                    
                    <div class="space-y-6">
                        <div class="flex items-start cursor-pointer hover:text-accent transition-colors">
                            <i class="fas fa-phone-alt mt-1 text-accent mr-4"></i>
                            <div>
                                <h5 class="font-bold">Phone</h5>
                                <p class="text-gray-300">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="flex items-start cursor-pointer hover:text-accent transition-colors">
                            <i class="fas fa-envelope mt-1 text-accent mr-4"></i>
                            <div>
                                <h5 class="font-bold">Email</h5>
                                <p class="text-gray-300">hello@interiom.com</p>
                            </div>
                        </div>
                        <div class="flex items-start cursor-pointer hover:text-accent transition-colors">
                            <i class="fas fa-map-marker-alt mt-1 text-accent mr-4"></i>
                            <div>
                                <h5 class="font-bold">Address</h5>
                                <p class="text-gray-300">123 Design Avenue, Suite 101<br>New York, NY 10012</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-12">
                         <h5 class="font-bold mb-4">Follow Us</h5>
                         <div class="flex space-x-4">
                             <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent transition-colors"><i class="fab fa-facebook-f"></i></a>
                             <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent transition-colors"><i class="fab fa-twitter"></i></a>
                             <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent transition-colors"><i class="fab fa-instagram"></i></a>
                             <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-accent transition-colors"><i class="fab fa-linkedin-in"></i></a>
                         </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Section -->
            <div class="lg:w-2/3 p-12 bg-white">
                <form action="#" method="POST" class="space-y-8">
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">First Name</label>
                            <input type="text" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-accent outline-none py-3 px-4 transition-colors rounded-t-md" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Last Name</label>
                            <input type="text" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-accent outline-none py-3 px-4 transition-colors rounded-t-md" placeholder="Doe">
                        </div>
                     </div>
                     
                     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                         <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-accent outline-none py-3 px-4 transition-colors rounded-t-md" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Project Type</label>
                            <select class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-accent outline-none py-3 px-4 transition-colors rounded-t-md">
                                <option>Residential Design</option>
                                <option>Commercial Office</option>
                                <option>Renovation</option>
                                <option>Hospitality</option>
                            </select>
                        </div>
                     </div>
                     
                     <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Message</label>
                        <textarea rows="4" class="w-full bg-gray-50 border-b-2 border-gray-200 focus:border-accent outline-none py-3 px-4 transition-colors rounded-t-md" placeholder="Tell us about your project..."></textarea>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="button" class="px-10 py-4 bg-primary text-white font-bold rounded-sm shadow-xl hover:bg-accent transition-colors transform hover:-translate-y-1" onclick="alert('Message Sent!')">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="h-96 w-full bg-gray-200 relative">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869402!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1684490000000!5m2!1sen!2sin" width="100%" height="100%" style="border:0; filter: grayscale(100%);" allowfullscreen="" loading="lazy"></iframe>
</section>

<?php include 'includes/footer.php'; ?>
