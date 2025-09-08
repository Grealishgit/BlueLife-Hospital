<!-- Live Chat Component -->
<div id="chatWidget" class="fixed bottom-6 right-6 z-50">
    <!-- Chat Toggle Button -->
    <button id="chatToggle"
        class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white rounded-full p-4 shadow-lg transition-all transform hover:scale-110 flex items-center justify-center">
        <svg id="chatIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
            </path>
        </svg>
        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span id="chatBadge"
            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center hidden">1</span>
    </button>

    <!-- Chat Window -->
    <div id="chatWindow"
        class="hidden absolute bottom-16 right-0 w-80 h-96 bg-white rounded-lg shadow-2xl border border-gray-200 flex flex-col overflow-hidden">

        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                    <span class="text-sm font-bold">BL</span>
                </div>
                <div>
                    <h3 class="font-semibold">Sheywe Community Support</h3>
                    <p class="text-xs text-white/80">
                        <span id="statusIndicator" class="inline-block w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                        Online now
                    </p>
                </div>
            </div>
            <button id="minimizeChat" class="text-white hover:text-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>

        <!-- Chat Content Area -->
        <div class="flex-1 flex flex-col">

            <!-- Quick Actions -->
            <div id="quickActions" class="p-4 border-b border-gray-200">
                <p class="text-gray-600 text-sm mb-3">How can we help you today?</p>
                <div class="space-y-2">
                    <button onclick="selectQuickAction('appointment')"
                        class="w-full text-left p-2 hover:bg-gray-100 rounded-lg text-sm transition-colors">
                        📅 Book an Appointment
                    </button>
                    <button onclick="selectQuickAction('emergency')"
                        class="w-full text-left p-2 hover:bg-gray-100 rounded-lg text-sm transition-colors">
                        🚨 Emergency Information
                    </button>
                    <button onclick="selectQuickAction('billing')"
                        class="w-full text-left p-2 hover:bg-gray-100 rounded-lg text-sm transition-colors">
                        💳 Billing Questions
                    </button>
                    <button onclick="selectQuickAction('insurance')"
                        class="w-full text-left p-2 hover:bg-gray-100 rounded-lg text-sm transition-colors">
                        🏥 Insurance Coverage
                    </button>
                    <button onclick="selectQuickAction('general')"
                        class="w-full text-left p-2 hover:bg-gray-100 rounded-lg text-sm transition-colors">
                        💬 General Questions
                    </button>
                </div>
            </div>

            <!-- Chat Messages -->
            <div id="chatMessages" class="flex-1 p-4 overflow-y-auto space-y-3" style="display: none;">
                <!-- Messages will be dynamically added here -->
            </div>

            <!-- Typing Indicator -->
            <div id="typingIndicator" class="px-4 py-2 hidden">
                <div class="flex items-center space-x-2 text-gray-500 text-sm">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s">
                        </div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s">
                        </div>
                    </div>
                    <span>Support is typing...</span>
                </div>
            </div>

        </div>

        <!-- Chat Input -->
        <div id="chatInput" class="p-4 border-t border-gray-200" style="display: none;">
            <div class="flex space-x-2">
                <input type="text" id="messageInput" placeholder="Type your message..."
                    class="flex-1 p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                    onkeypress="handleKeyPress(event)">
                <button onclick="sendMessage()"
                    class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Chat Styles -->
<style>
    .chat-message {
        max-width: 80%;
        padding: 8px 12px;
        border-radius: 12px;
        margin-bottom: 8px;
        animation: slideInMessage 0.3s ease-out;
    }

    .chat-message.user {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        margin-left: auto;
        border-bottom-right-radius: 4px;
    }

    .chat-message.bot {
        background: #f3f4f6;
        color: #374151;
        margin-right: auto;
        border-bottom-left-radius: 4px;
    }

    .chat-message.system {
        background: #fef3c7;
        color: #92400e;
        text-align: center;
        margin: 0 auto;
        font-size: 0.875rem;
        border-radius: 16px;
    }

    @keyframes slideInMessage {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .chat-notification {
        animation: pulse 2s infinite;
    }

    #chatWidget {
        font-family: 'Inter', sans-serif;
    }

    /* Custom scrollbar for chat messages */
    #chatMessages::-webkit-scrollbar {
        width: 4px;
    }

    #chatMessages::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    #chatMessages::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }

    #chatMessages::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>

<!-- Chat JavaScript -->
<script>
    class ChatWidget {
        constructor() {
            this.isOpen = false;
            this.conversationStarted = false;
            this.messages = [];
            this.currentContext = null;

            this.init();
            this.setupAutoGreeting();
        }

        init() {
            const toggle = document.getElementById('chatToggle');
            const minimize = document.getElementById('minimizeChat');

            toggle.addEventListener('click', () => this.toggleChat());
            minimize.addEventListener('click', () => this.toggleChat());

            // Close chat when clicking outside
            document.addEventListener('click', (e) => {
                const widget = document.getElementById('chatWidget');
                if (!widget.contains(e.target) && this.isOpen) {
                    // Don't close if clicking on the toggle button
                    if (!e.target.closest('#chatToggle')) {
                        this.closeChat();
                    }
                }
            });
        }

        toggleChat() {
            this.isOpen = !this.isOpen;
            const window = document.getElementById('chatWindow');
            const chatIcon = document.getElementById('chatIcon');
            const closeIcon = document.getElementById('closeIcon');
            const badge = document.getElementById('chatBadge');

            if (this.isOpen) {
                window.classList.remove('hidden');
                chatIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                badge.classList.add('hidden');
            } else {
                window.classList.add('hidden');
                chatIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        closeChat() {
            if (this.isOpen) {
                this.isOpen = false;
                const window = document.getElementById('chatWindow');
                const chatIcon = document.getElementById('chatIcon');
                const closeIcon = document.getElementById('closeIcon');

                window.classList.add('hidden');
                chatIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        setupAutoGreeting() {
            // Show notification after 30 seconds if user hasn't interacted
            setTimeout(() => {
                if (!this.conversationStarted && !this.isOpen) {
                    this.showNotification();
                }
            }, 30000);
        }

        showNotification() {
            const badge = document.getElementById('chatBadge');
            const toggle = document.getElementById('chatToggle');

            badge.classList.remove('hidden');
            toggle.classList.add('chat-notification');

            // Auto-remove notification after 10 seconds
            setTimeout(() => {
                badge.classList.add('hidden');
                toggle.classList.remove('chat-notification');
            }, 10000);
        }

        startConversation(context = null) {
            this.conversationStarted = true;
            this.currentContext = context;

            // Hide quick actions, show chat
            document.getElementById('quickActions').style.display = 'none';
            document.getElementById('chatMessages').style.display = 'block';
            document.getElementById('chatInput').style.display = 'block';

            // Add welcome message
            this.addMessage('bot', this.getWelcomeMessage(context));

            // Add context-specific suggestions
            if (context) {
                setTimeout(() => {
                    this.addMessage('bot', this.getContextSuggestions(context));
                }, 1000);
            }
        }

        getWelcomeMessage(context) {
            const messages = {
                'appointment': "I'd be happy to help you book an appointment! What type of appointment are you looking for?",
                'emergency': "For immediate life-threatening emergencies, please call 911. For other urgent needs, how can I assist you?",
                'billing': "I can help you with billing questions. Do you have a specific question about your bill or payment options?",
                'insurance': "I can help you understand your insurance coverage. Which insurance provider do you have?",
                'general': "Hello! I'm here to help with any questions about Sheywe Community Hospital. What would you like to know?"
            };

            return messages[context] ||
                "Hello! I'm here to help you with any questions about Sheywe Community Hospital. How can I assist you today?";
        }

        getContextSuggestions(context) {
            const suggestions = {
                'appointment': "You can also book appointments online at Sheywe Communityhospital.com/appointment or call (555) 123-APPT.",
                'emergency': "Our Emergency Department is open 24/7. Current wait time is approximately 15 minutes for non-critical cases.",
                'billing': "You can view and pay bills online through our patient portal, or call our billing department at (555) 123-BILL.",
                'insurance': "We accept most major insurance plans including Blue Cross, Aetna, Cigna, and United Healthcare.",
                'general': "Feel free to ask about our services, doctors, facilities, or anything else you'd like to know!"
            };

            return suggestions[context] || "Is there anything specific you'd like to know about our hospital services?";
        }

        addMessage(type, content, timestamp = null) {
            const container = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');

            messageDiv.className = `chat-message ${type}`;

            if (type === 'user') {
                messageDiv.innerHTML = content;
            } else {
                messageDiv.innerHTML = `
                <div>${content}</div>
                ${timestamp ? `<div class="text-xs opacity-70 mt-1">${timestamp}</div>` : ''}
            `;
            }

            container.appendChild(messageDiv);
            container.scrollTop = container.scrollHeight;

            this.messages.push({
                type,
                content,
                timestamp: new Date()
            });
        }

        showTyping() {
            document.getElementById('typingIndicator').classList.remove('hidden');
            const container = document.getElementById('chatMessages');
            container.scrollTop = container.scrollHeight;
        }

        hideTyping() {
            document.getElementById('typingIndicator').classList.add('hidden');
        }

        async sendMessage(message) {
            if (!message.trim()) return;

            // Add user message
            this.addMessage('user', message);

            // Clear input
            document.getElementById('messageInput').value = '';

            // Show typing indicator
            this.showTyping();

            // Simulate processing delay
            setTimeout(() => {
                this.hideTyping();
                const response = this.generateResponse(message);
                this.addMessage('bot', response, new Date().toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                }));
            }, 1000 + Math.random() * 2000);
        }

        generateResponse(message) {
            const lowerMessage = message.toLowerCase();

            // Emergency keywords
            if (lowerMessage.includes('emergency') || lowerMessage.includes('urgent') || lowerMessage.includes(
                    'pain')) {
                return "If this is a medical emergency, please call 911 immediately. Our Emergency Department is open 24/7 at (555) 123-EMRG. For non-emergency urgent care, you can visit our walk-in clinic.";
            }

            // Appointment keywords
            if (lowerMessage.includes('appointment') || lowerMessage.includes('book') || lowerMessage.includes(
                    'schedule')) {
                return "I can help you book an appointment! You can book online at our website, call (555) 123-APPT, or I can transfer you to our scheduling team. What type of appointment do you need?";
            }

            // Doctor-related queries
            if (lowerMessage.includes('doctor') || lowerMessage.includes('physician') || lowerMessage.includes(
                    'specialist')) {
                return "We have excellent specialists in all major medical fields. You can view our doctors and their specialties on our website. Is there a specific type of specialist you're looking for?";
            }

            // Insurance queries
            if (lowerMessage.includes('insurance') || lowerMessage.includes('coverage') || lowerMessage.includes(
                    'cost')) {
                return "We accept most major insurance plans. You can verify your coverage by calling (555) 123-BILL or checking our insurance page. Would you like me to connect you with our insurance verification team?";
            }

            // Location/directions
            if (lowerMessage.includes('location') || lowerMessage.includes('address') || lowerMessage.includes(
                    'directions')) {
                return "Sheywe Community Hospital is located at 123 Healthcare Drive, Medical City. We're easily accessible by car with free parking, and public transportation stops right outside. Would you like detailed directions?";
            }

            // Hours
            if (lowerMessage.includes('hours') || lowerMessage.includes('open') || lowerMessage.includes('time')) {
                return "Our Emergency Department is open 24/7. Regular clinic hours are Monday-Friday 7:00 AM - 6:00 PM, Saturday 8:00 AM - 4:00 PM. Specific department hours may vary. Which department are you interested in?";
            }

            // Billing
            if (lowerMessage.includes('bill') || lowerMessage.includes('payment') || lowerMessage.includes('pay')) {
                return "You can view and pay your bills online through our patient portal, by phone at (555) 123-BILL, or in person at our billing office. We also offer payment plans. Do you need help with a specific billing issue?";
            }

            // Default responses
            const defaultResponses = [
                "I'd be happy to help you with that! Could you provide a bit more detail about what you're looking for?",
                "That's a great question! Let me help you find the right information. Can you tell me more about your specific needs?",
                "I want to make sure I give you the most accurate information. Could you clarify what specific service or information you need?",
                "I'm here to help! For the most detailed information about that topic, I can connect you with the right department. Would that be helpful?"
            ];

            return defaultResponses[Math.floor(Math.random() * defaultResponses.length)];
        }
    }

    // Global functions for HTML onclick handlers
    function selectQuickAction(action) {
        window.chatWidget.startConversation(action);
    }

    function sendMessage() {
        const input = document.getElementById('messageInput');
        const message = input.value.trim();
        if (message) {
            window.chatWidget.sendMessage(message);
        }
    }

    function handleKeyPress(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    }

    // Initialize chat widget when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        window.chatWidget = new ChatWidget();
    });

    // Make functions globally available
    window.selectQuickAction = selectQuickAction;
    window.sendMessage = sendMessage;
    window.handleKeyPress = handleKeyPress;
</script>