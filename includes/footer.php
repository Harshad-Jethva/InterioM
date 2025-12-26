
<!-- Footer -->
<footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="md:col-span-1">
            <h3 class="text-2xl font-bold font-serif mb-4">Interio<span class="text-accent">M</span></h3>
            <p class="text-gray-400 text-sm mb-4">Elevating spaces through thoughtful design, precision management, and artistic vision.</p>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-instagram text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-linkedin text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-facebook text-xl"></i></a>
            </div>
        </div>
        
        <div>
            <h4 class="text-lg font-bold mb-4 text-accent">Quick Links</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="about.php" class="hover:text-white transition-colors">About Us</a></li>
                <li><a href="portfolio.php" class="hover:text-white transition-colors">Our Portfolio</a></li>
                <li><a href="services.php" class="hover:text-white transition-colors">Services</a></li>
                <li><a href="success_stories.php" class="hover:text-white transition-colors">Success Stories</a></li>
                <li><a href="contact.php" class="hover:text-white transition-colors">Contact</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="text-lg font-bold mb-4 text-accent">Services</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li>Residential Design</li>
                <li>Commercial Projects</li>
                <li>Project Management (PMC)</li>
                <li>Renovation Consultancy</li>
                <li>Turnkey Solutions</li>
            </ul>
        </div>

        <div>
            <h4 class="text-lg font-bold mb-4 text-accent">Contact Info</h4>
            <ul class="space-y-3 text-sm text-gray-400">
                <li class="flex items-start"><span class="mr-2 text-accent">📍</span> 123 Design Avenue, Creative City, NY 10012</li>
                <li class="flex items-center"><span class="mr-2 text-accent">📧</span> contact@interiom.com</li>
                <li class="flex items-center"><span class="mr-2 text-accent">📞</span> +1 (555) 123-4567</li>
            </ul>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 mt-12 pt-8 border-t border-gray-800 text-center text-gray-500 text-xs flex flex-col md:flex-row justify-between items-center">
        <p>&copy; 2023 InterioM Consultancy. All rights reserved.</p>
        <p class="mt-2 md:mt-0">Designed by InterioM Tech Team</p>
    </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/15551234567?text=Hi%20InterioM,%20I%E2%80%99m%20interested%20in%20your%20interior%20services.%20Please%20guide%20me." target="_blank" class="fixed bottom-6 left-6 z-50 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-transform hover:scale-110 flex items-center justify-center group">
    <span class="absolute left-14 bg-white text-gray-800 px-3 py-1 rounded shadow-md text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap hidden md:block">Chat on WhatsApp</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
    </svg>
</a>

<!-- Static Chatbot Mockup -->
<div class="fixed bottom-6 right-6 z-50">
    <div id="chatbot-window" class="hidden bg-white w-80 rounded-lg shadow-2xl border border-gray-100 flex flex-col mb-4 overflow-hidden transform transition-all duration-300 origin-bottom-right">
        <div class="bg-primary text-white p-4 flex justify-between items-center">
            <div>
                <h4 class="font-bold">Chat with InterioM</h4>
                <p class="text-xs text-gray-300">Typically replies immediately</p>
            </div>
            <button onclick="toggleChat()" class="text-gray-300 hover:text-white text-xl">&times;</button>
        </div>
        <div class="p-4 h-64 overflow-y-auto bg-gray-50 text-sm space-y-3" id="chat-messages">
            <div class="bg-gray-200 p-2 rounded-lg rounded-tl-none self-start max-w-[80%] shadow-sm">
                Hello! 👋 Welcome to InterioM. How can we help you create your dream space today?
            </div>
            <div class="flex flex-col space-y-2 mt-4">
                <button class="bg-white border border-accent text-accent py-1 px-3 rounded-full text-xs hover:bg-accent hover:text-white transition-colors text-left shadow-sm" onclick="sendAutoReply('pricing')">What is your pricing?</button>
                <button class="bg-white border border-accent text-accent py-1 px-3 rounded-full text-xs hover:bg-accent hover:text-white transition-colors text-left shadow-sm" onclick="sendAutoReply('manage')">How do you manage projects?</button>
                <button class="bg-white border border-accent text-accent py-1 px-3 rounded-full text-xs hover:bg-accent hover:text-white transition-colors text-left shadow-sm" onclick="sendAutoReply('consult')">Book a consultation</button>
            </div>
        </div>
        <div class="p-3 border-t border-gray-100 bg-white">
            <form id="chat-form" class="flex" onsubmit="event.preventDefault(); alert('In a real app, this would connect to an agent!');">
                <input type="text" placeholder="Type..." class="flex-1 w-full border-none focus:ring-0 text-sm bg-gray-50 rounded-l px-3 py-2 focus:outline-none">
                <button type="submit" class="bg-accent text-white px-3 py-2 rounded-r hover:bg-amber-600 transition-colors">Send</button>
            </form>
        </div>
    </div>
    <button onclick="toggleChat()" class="bg-primary text-white p-4 rounded-full shadow-lg hover:bg-gray-800 transition-transform hover:scale-110 flex items-center justify-center float-right relative group">
        <span class="hidden group-hover:block absolute right-16 bg-black text-white px-2 py-1 rounded text-xs whitespace-nowrap">Need help?</span>
        <span class="absolute -top-1 -right-1 flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
    </button>
</div>

<!-- Global Scripts -->
<script>
    // Mobile Menu Toggle
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if(mobileBtn){
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Chatbot Logic
    function toggleChat() {
        const chat = document.getElementById('chatbot-window');
        if (chat.classList.contains('hidden')) {
            chat.classList.remove('hidden');
            gsap.fromTo(chat, {opacity: 0, scale: 0.8, y: 20}, {opacity: 1, scale: 1, y: 0, duration: 0.3});
        } else {
            gsap.to(chat, {opacity: 0, scale: 0.8, y: 20, duration: 0.2, onComplete: () => chat.classList.add('hidden')});
        }
    }

    function sendAutoReply(type) {
        const chatMsgs = document.getElementById('chat-messages');
        const userMsg = document.createElement('div');
        userMsg.className = "bg-primary text-white p-2 rounded-lg rounded-tr-none self-end max-w-[80%] ml-auto my-2 text-right shadow-sm text-sm";
        
        // Remove button container after selection to clean up UI (optional, kept for now)
        
        let reply = "";
        if(type === 'pricing') {
            userMsg.innerText = "What is your pricing?";
            reply = "Our design packages start from $50/sqft for basic consultation. For turnkey projects, we offer a custom quote after site visit. Would you like to schedule one?";
        } else if(type === 'manage') {
            userMsg.innerText = "How do you manage projects?";
            reply = "We use a proprietary MIS system to track deadlines, budget, and material selection. You'll receive weekly WhatsApp and valid email updates!";
        } else if (type === 'consult') {
            userMsg.innerText = "I want to book a consultation.";
            reply = "Great! Please fill out the contact form on our Contact page or call us directly at +1 (555) 123-4567.";
        }
        
        chatMsgs.appendChild(userMsg);
        chatMsgs.scrollTop = chatMsgs.scrollHeight;
        
        setTimeout(() => {
            const botMsg = document.createElement('div');
            botMsg.className = "bg-gray-200 p-2 rounded-lg rounded-tl-none self-start max-w-[80%] animate-pulse text-sm";
            botMsg.innerText = "Typing...";
            chatMsgs.appendChild(botMsg);
            chatMsgs.scrollTop = chatMsgs.scrollHeight;
            
            setTimeout(() => {
                botMsg.classList.remove('animate-pulse');
                botMsg.innerText = reply;
                chatMsgs.scrollTop = chatMsgs.scrollHeight;
            }, 1000); 
        }, 500);
    }
</script>
</body>
</html>
