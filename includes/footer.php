
<!-- Footer -->
<!-- Footer -->
<footer class="bg-primary text-secondary py-20 relative z-20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-12">
        
        <!-- Brand + Desc -->
        <div class="md:col-span-4 flex flex-col items-start">
            <div class="flex items-center space-x-2 mb-6">
                <!-- Use text logo if image not fits, or styled image -->
                 <span class="text-3xl font-serif font-bold text-white tracking-widest">SPACES.</span>
            </div>
            <p class="text-secondary/70 text-lg mb-8 leading-relaxed max-w-sm">
                Elevating spaces through thoughtful design, precision management, and artistic vision.
            </p>
            <div class="flex space-x-4">
                <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center hover:bg-accent hover:border-accent hover:text-white transition-all text-white/60"><i class="fab fa-instagram text-lg"></i></a>
                <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center hover:bg-accent hover:border-accent hover:text-white transition-all text-white/60"><i class="fab fa-linkedin text-lg"></i></a>
                <a href="#" class="w-12 h-12 rounded-full border border-white/20 flex items-center justify-center hover:bg-accent hover:border-accent hover:text-white transition-all text-white/60"><i class="fab fa-facebook text-lg"></i></a>
            </div>
        </div>
        
        <!-- Links Columns -->
        <div class="md:col-span-2">
            <h4 class="text-lg font-bold mb-6 text-white font-sans">Explore</h4>
            <ul class="space-y-4 text-secondary/60 text-base">
                <li><a href="about.php" class="hover:text-accent transition-colors">About Us</a></li>
                <li><a href="portfolio.php" class="hover:text-accent transition-colors">Portfolio</a></li>
                <li><a href="services.php" class="hover:text-accent transition-colors">Services</a></li>
                <li><a href="success_stories.php" class="hover:text-accent transition-colors">Stories</a></li>
            </ul>
        </div>
        
        <div class="md:col-span-3">
            <h4 class="text-lg font-bold mb-6 text-white font-sans">Expertise</h4>
            <ul class="space-y-4 text-secondary/60 text-base">
                <li>Residential Design</li>
                <li>Commercial Projects</li>
                <li>Project Management</li>
                <li>Turnkey Solutions</li>
            </ul>
        </div>

        <!-- Contact Box -->
        <div class="md:col-span-3">
             <h4 class="text-lg font-bold mb-6 text-white font-sans">Studio</h4>
             <ul class="space-y-4 text-secondary/60 text-base">
                <li class="flex items-start"><span class="mr-3 text-accent mt-1"><i class="fas fa-map-marker-alt"></i></span> 123 Design Avenue, Creative City, NY</li>
                <li class="flex items-center"><span class="mr-3 text-accent"><i class="fas fa-envelope"></i></span> contact@spacesbykd.com</li>
                <li class="flex items-center"><span class="mr-3 text-accent"><i class="fas fa-phone"></i></span> +1 (555) 123-4567</li>
             </ul>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 mt-20 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center text-sm text-secondary/40">
        <p>&copy; 2023 Spaces by KD. All rights reserved.</p>
        <p class="mt-4 md:mt-0 font-medium">Crafted with <i class="fas fa-heart text-accent mx-1"></i> by KD Team</p>
    </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/9327128042?text=Hi%20Spaces%20by%20KD,%20I%E2%80%99m%20interested%20in%20your%20interior%20services.%20Please%20guide%20me." target="_blank" class="fixed bottom-6 left-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-xl hover:bg-[#128C7E] transition-all hover:scale-110 flex items-center justify-center group ring-4 ring-white/10">
    <span class="absolute left-16 bg-white text-gray-800 px-4 py-2 rounded-xl shadow-lg text-sm font-bold opacity-0 group-hover:opacity-100 transition-all translate-x-[-10px] group-hover:translate-x-0 whitespace-nowrap hidden md:block">
        Chat on WhatsApp
        <div class="absolute left-[-6px] top-1/2 -translate-y-1/2 w-3 h-3 bg-white transform rotate-45"></div>
    </span>
    <i class="fab fa-whatsapp text-3xl"></i>
</a>

<!-- AI Chatbot Widget (Updated Style) -->
<div class="fixed bottom-6 right-6 z-[60] font-sans">
    <!-- Chat Window -->
    <div id="chatbot-window" class="hidden flex flex-col w-[350px] h-[500px] bg-canvas rounded-[2rem] shadow-2xl border border-white/50 overflow-hidden transform transition-all duration-300 origin-bottom-right mb-4">
        
        <!-- Header -->
        <div class="bg-primary p-5 flex justify-between items-center relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -top-10 -right-10 w-24 h-24 bg-accent/20 rounded-full blur-xl"></div>
            
            <div class="flex items-center space-x-4 relative z-10">
                <div class="relative">
                    <div class="w-11 h-11 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center border border-white/20">
                         <i class="fas fa-robot text-accent text-lg"></i>
                    </div>
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-primary rounded-full"></span>
                </div>
                <div>
                    <h4 class="font-bold text-white text-base tracking-wide">Assistant</h4>
                    <p class="text-[11px] text-secondary/60 flex items-center uppercase tracking-wider font-medium"><span class="w-1.5 h-1.5 bg-green-400 rounded-full mr-2 animate-pulse"></span> Online</p>
                </div>
            </div>
            <button onclick="toggleChat()" class="text-white/70 hover:text-white hover:bg-white/10 rounded-full p-2 transition-colors relative z-10">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 bg-white/50 p-5 overflow-y-auto space-y-4">
            <!-- Welcome Message -->
            <div class="flex flex-col space-y-1 items-start">
                <div class="bg-white border border-gray-100 p-4 rounded-2xl rounded-tl-none text-sm text-primary shadow-sm max-w-[90%] leading-relaxed">
                    Hello! 👋 I'm your design assistant. I can help with <span class="text-accent font-bold">estimates</span>, <span class="text-accent font-bold">styles</span>, or booking a <span class="text-accent font-bold">consultation</span>. What's on your mind?
                </div>
                <span class="text-[10px] text-primary/40 pl-2">Just now</span>
            </div>

            <!-- Quick Suggestions -->
            <div class="flex flex-wrap gap-2 mt-2" id="chat-suggestions">
                <button onclick="addUserMessage('Show me your portfolio')" class="bg-white border border-primary/5 text-primary/80 px-4 py-2 rounded-full text-xs font-medium hover:bg-accent hover:text-white hover:border-accent transition-all shadow-sm">🎨 Portfolio</button>
                <button onclick="addUserMessage('What are your services?')" class="bg-white border border-primary/5 text-primary/80 px-4 py-2 rounded-full text-xs font-medium hover:bg-accent hover:text-white hover:border-accent transition-all shadow-sm">🛠️ Services</button>
                <button onclick="addUserMessage('How much does it cost?')" class="bg-white border border-primary/5 text-primary/80 px-4 py-2 rounded-full text-xs font-medium hover:bg-accent hover:text-white hover:border-accent transition-all shadow-sm">💰 Pricing</button>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="hidden px-6 py-3 bg-white/80 border-t border-gray-100 flex items-center space-x-1">
            <div class="w-1.5 h-1.5 bg-accent rounded-full animate-bounce"></div>
            <div class="w-1.5 h-1.5 bg-accent rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
            <div class="w-1.5 h-1.5 bg-accent rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
        </div>

        <!-- Input Area -->
        <div class="p-4 bg-white border-t border-gray-100 shadow-[0_-5px_20px_rgba(0,0,0,0.02)]">
            <form class="flex items-center bg-canvas px-4 py-2 rounded-full border border-gray-200 focus-within:border-accent focus-within:ring-2 focus-within:ring-accent/10 transition-all" onsubmit="handleChatSubmit(event)">
                <input type="text" id="chat-input" placeholder="Ask me anything..." class="flex-1 bg-transparent border-none focus:ring-0 text-sm text-primary p-0 placeholder-primary/30" autocomplete="off">
                <button type="submit" class="text-accent hover:text-accent/80 transition-colors disabled:opacity-50 disabled:cursor-not-allowed ml-2">
                    <i class="fas fa-paper-plane text-lg"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Toggle Button -->
    <button onclick="toggleChat()" class="bg-primary border border-white/10 text-white w-16 h-16 rounded-full shadow-[0_10px_30px_rgba(26,60,84,0.4)] hover:scale-110 hover:shadow-[0_15px_40px_rgba(26,60,84,0.5)] transition-all duration-300 flex items-center justify-center group relative cursor-pointer ml-auto">
        <!-- Notification Dot -->
        <span class="absolute top-0 right-0 p-1.5">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-accent border-2 border-primary"></span>
        </span>
        
        <i class="fas fa-comment-dots text-2xl group-hover:hidden text-secondary"></i>
        <i class="fas fa-chevron-down text-xl hidden group-hover:block text-secondary"></i>
    </button>
</div>

<!-- Global Scripts -->
<script>
    // Mobile Menu Toggle
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if(mobileBtn){
        mobileBtn.addEventListener('click', () => {
             if(mobileMenu) mobileMenu.classList.toggle('hidden');
        });
    }

    // --- Chatbot Logic ---
    const chatWindow = document.getElementById('chatbot-window');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const typingIndicator = document.getElementById('typing-indicator');

    function toggleChat() {
        if (chatWindow.classList.contains('hidden')) {
            chatWindow.classList.remove('hidden');
            gsap.fromTo(chatWindow, {opacity: 0, scale: 0.9, y: 20}, {opacity: 1, scale: 1, y: 0, duration: 0.3, ease: "back.out(1.2)"});
            setTimeout(() => chatInput.focus(), 300);
        } else {
            gsap.to(chatWindow, {opacity: 0, scale: 0.9, y: 20, duration: 0.2, onComplete: () => chatWindow.classList.add('hidden')});
        }
    }

    function handleChatSubmit(e) {
        e.preventDefault();
        const msg = chatInput.value.trim();
        if(!msg) return;

        addUserMessage(msg);
        chatInput.value = '';
    }

    function addUserMessage(msg) {
        // Append User Message
        const msgDiv = document.createElement('div');
        msgDiv.className = "flex flex-col space-y-1 items-end";
        msgDiv.innerHTML = `
            <div class="bg-accent text-white p-3 rounded-2xl rounded-tr-none text-sm shadow-md max-w-[85%]">
                ${msg}
            </div>
            <span class="text-[10px] text-gray-400 pr-2">Just now</span>
        `;
        chatMessages.appendChild(msgDiv);
        scrollToBottom();

        // Simulate Bot Response
        showTyping();
        
        // Randomize delay slightly for realism (1s to 2s)
        const delay = Math.floor(Math.random() * 1000) + 1000;
        
        setTimeout(() => {
            const response = getBotResponse(msg.toLowerCase());
            addBotMessage(response);
            hideTyping();
        }, delay);
    }

    function addBotMessage(text) {
        const msgDiv = document.createElement('div');
        msgDiv.className = "flex flex-col space-y-1 items-start";
        msgDiv.innerHTML = `
            <div class="bg-white border border-gray-100 p-3 rounded-2xl rounded-tl-none text-sm text-gray-700 shadow-sm max-w-[85%]">
                ${text}
            </div>
            <span class="text-[10px] text-gray-400 pl-2">Just now</span>
        `;
        chatMessages.appendChild(msgDiv);
        scrollToBottom();
    }

    function showTyping() {
        if(typingIndicator) {
            typingIndicator.classList.remove('hidden');
            scrollToBottom();
        }
    }
    
    function hideTyping() {
        if(typingIndicator) typingIndicator.classList.add('hidden');
    }

    function scrollToBottom() {
        if(chatMessages) chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // --- ADVANCED AI LOGIC ENGINE ---
    
    // 1. Context Memory (Simulating conversation history)
    let chatContext = {
        lastTopic: '',
        userName: ''
    };

    // 2. Comprehensive Knowledge Base
    const knowledgeBase = {
        // --- CORE SERVICES ---
        "residential": [
            "We excel in residential projects! From cozy apartments to sprawling villas, we handle everything: <b>Layout Planning, 3D Visualization, Furniture Selection, and Final Styling</b>. Do you have a specific room in mind, like a Bedroom or Kitchen?",
            "Home interiors are our passion. We create spaces that reflect your personality. We can help with full home renovations or specific room makeovers. What are you looking to transform?"
        ],
        "commercial": [
            "For commercial spaces, we focus on functionality and brand identity. We design offices, retail stores, and restaurants that maximize productivity and customer appeal. 🏢",
            "We have extensive experience in workspace design. We ensure эргономика (ergonomics), lighting, and flow are optimized for your business needs."
        ],
        "turnkey": [
            "Our <b>Turnkey Solution</b> is our most popular service. We take full responsibility—from the first sketch to handing over the keys. You don't need to worry about contractors, materials, or timelines. We manage it all! ✨",
            "Turnkey means stress-free for you. We handle design, procurement, civil work, electrical, plumbing, and carpentry. You just move in!"
        ],

        // --- SPECIFIC ROOMS ---
        "bedroom": "For bedrooms, we prioritize tranquility and comfort. We recommend warm lighting, acoustic treatments, and calming color palettes. We can design custom wardrobes and space-saving beds. 🛏️",
        "kitchen": "The kitchen is the heart of the home! We specialize in modular kitchens with high-quality hardware (Hettich/Hafele), ergonomic 'work triangles', and durable countertops like Quartz or Granite. 🍳",
        "living": "Your living room sets the tone. We can design stunning TV units, false ceilings with cove lighting, and select the perfect sofa arrangements for hosting guests. 🛋️",

        // --- PRICING & PROCESS ---
        "price": [
            "Transparency is key. Our <b>Design-Only</b> packages start at $50/sqft. For <b>Turnkey Execution</b>, costs typically range from $1200 to $2500+ per sqft depending on material finishes (Standard, Premium, Luxury).",
            "It depends on the scope. A standard 2BHK interior project usually starts around $15k, while luxury projects can go higher. We recommend a free consultation to get an accurate estimate."
        ],
        "timeline": "A standard 3BHK turnkey project typically takes <b>45 to 60 days</b> for hand-over. Design-only projects take about 2-3 weeks. We value deadlines strictly! ⏱️",
        "process": "Our process is simple: 1. <b>Consultation</b> & Requirements 2. <b>2D/3D Design</b> & Approval 3. <b>Material Selection</b> 4. <b>Execution</b> & Installation 5. <b>Handover</b>.",

        // --- COMPANY ---
        "location": "Our design studio is located at <b>123 Design Avenue, Creative City, NY</b>. We also handle projects across the state. Using our MIS system, we can even manage projects remotely!",
        "contact": "You can call us directly at <b>+1 (555) 123-4567</b> or email <b>contact@spacesbykd.com</b>. Or just click the WhatsApp button on the screen to chat instantly!",
        
        // --- SMALL TALK ---
        "hello": ["Hello! 👋 Welcome to Spaces by KD. How can I transform your space today?", "Hi there! Ready to design your dream home?", "Greetings! I'm here to help with all your interior needs."],
        "thanks": ["You're very welcome! Let me know if you have more questions.", "Happy to help! ✨", "My pleasure!"],
        "bye": ["Goodbye! Hope to build your dream space soon.", "See you! Have a creative day! 👋"],
        "human": "I am an advanced AI assistant trained on Spaces by KD's portfolio and services. While I'm not human, I can connect you to our lead architect if you leave your contact info!"
    };

    function getBotResponse(input) {
        // Normalize input
        input = input.toLowerCase().trim();

        // Check for specific complex phrases first
        if (input.includes("bedroom") || input.includes("bed room")) return knowledgeBase.bedroom;
        if (input.includes("kitchen") || input.includes("cooking")) return knowledgeBase.kitchen;
        if (input.includes("living room") || input.includes("hall")) return knowledgeBase.living;
        
        // Check for Service Keywords
        if (input.includes("commercial") || input.includes("office") || input.includes("shop")) return getRandom(knowledgeBase.commercial);
        if (input.includes("turnkey") || input.includes("full") || input.includes("complete")) return getRandom(knowledgeBase.turnkey);
        if (input.includes("residential") || input.includes("home") || input.includes("house") || input.includes("flat") || input.includes("apartment")) return getRandom(knowledgeBase.residential);

        // Check for Pricing/Cost
        if (input.includes("price") || input.includes("cost") || input.includes("budget") || input.includes("quote") || input.includes("much")) return getRandom(knowledgeBase.price);
        
        // Check for Timeline
        if (input.includes("long") || input.includes("time") || input.includes("days") || input.includes("duration")) return knowledgeBase.timeline;
        
        // Check for Process
        if (input.includes("process") || input.includes("how it works") || input.includes("step")) return knowledgeBase.process;

        // Check for Contact/Location
        if (input.includes("where") || input.includes("location") || input.includes("address")) return knowledgeBase.location;
        if (input.includes("phone") || input.includes("call") || input.includes("number") || input.includes("email") || input.includes("contact")) return knowledgeBase.contact;

        // Small Talk
        if (input.includes("hello") || input.includes("hi") || input.includes("hey")) return getRandom(knowledgeBase.hello);
        if (input.includes("thank")) return getRandom(knowledgeBase.thanks);
        if (input.includes("bye") || input.includes("exit")) return getRandom(knowledgeBase.bye);
        if (input.includes("real person") || input.includes("human") || input.includes("robot") || input.includes("bot")) return knowledgeBase.human;

        // Smart Fallback (Simulating Gemini/AI uncertainty)
        return generateFallbackResponse(input);
    }

    function getRandom(arr) {
        if(Array.isArray(arr)) {
            return arr[Math.floor(Math.random() * arr.length)];
        }
        return arr;
    }

    function generateFallbackResponse(input) {
        // A "Generative-like" fallback that tries to pivot the conversation
        const fallbacks = [
            `I see you're asking about "${input}". While I don't have the specific details on that right now, I can tell you about our <b>Residential</b> or <b>Commercial</b> design services. Which interests you?`,
            "That's an interesting question! To give you the best answer, could you tell me if this is for a <b>new home</b> or a <b>renovation</b>?",
            "I'm tuned to answer questions about Interior Design, Architecture, and our Project Management. Could you rephrase that? For example, ask 'What is the cost for a kitchen?'"
        ];
        return getRandom(fallbacks);
    }
</script>
</body>
</html>
