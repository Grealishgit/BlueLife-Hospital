<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Contact Us - Sheywe Comunity Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

    body {
        font-family: 'Quicksand', sans-serif;
    }

    .contact-card {
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .map-container {
        filter: grayscale(30%);
        transition: filter 0.3s ease;
    }

    .map-container:hover {
        filter: grayscale(0%);
    }
    </style>
</head>

<body class="bg-gray-50">
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'app/Views/loginModal.php'; ?>
    <?php include 'components/toast.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 mt-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">Contact Sheywe Community Hospital</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                We're here to help with all your healthcare needs. Reach out to us anytime for appointments,
                inquiries, or emergency assistance.
            </p>
            <button onclick="scrollToContact()"
                class="bg-white text-blue-600 px-8 py-3 cursor-pointer rounded-full font-semibold hover:bg-gray-100 transition-colors">
                Get In Touch
            </button>
        </div>
    </section>

    <!-- Emergency Contact Banner -->
    <section class="bg-red-600 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-xl font-bold mb-2">🚨 Emergency Hotline: <a href="tel:911"
                    class="underline hover:text-red-200">911</a></h3>
            <p class="text-sm">For life-threatening emergencies, call 911 immediately or visit our Emergency Department
            </p>
        </div>
    </section>

    <!-- Contact Information Cards -->
    <section id="contact" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">How to Reach Us</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Multiple ways to connect with our healthcare team for appointments, questions, and support.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <!-- Phone -->
                <div
                    class="contact-card bg-white rounded-xl border-l-4 cursor-pointer border-blue-500 shadow-lg hover:shadow-blue-400 p-8 text-center hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                        📞</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Phone</h3>
                    <p class="text-gray-600 mb-4">Call us for appointments and inquiries</p>
                    <a href="tel:+15551234567" class="text-blue-600 font-semibold hover:text-blue-800">+254 (011)
                        123-4567</a>
                    <p class="text-sm text-gray-500 mt-2">Mon-Fri: 8AM-6PM<br>Sat-Sun: 9AM-4PM</p>
                </div>

                <!-- Email -->
                <div
                    class="contact-card bg-white rounded-xl border-b-4 border-red-500 cursor-pointer shadow-lg hover:shadow-red-400 p-8 text-center hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                        📧</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">Send us your questions anytime</p>
                    <a href="mailto:info@Sheywe Communityhospital.com"
                        class="text-blue-600 font-semibold hover:text-blue-800">info@sheywecommunityhospital.com</a>
                    <p class="text-sm text-gray-500 mt-2">Response within 24 hours</p>
                </div>

                <!-- Location -->
                <div
                    class="contact-card bg-white rounded-xl shadow-lg hover:shadow-green-400 border-t-4 cursor-pointer border-green-500 p-8 text-center hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                        📍</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Visit Us</h3>
                    <p class="text-gray-600 mb-4">Come to our main facility</p>
                    <address class="text-blue-600 font-semibold not-italic">
                        123 Healthcare Blvd<br>
                        Medical District<br>
                        City, State 12345
                    </address>
                    <p class="text-sm text-gray-500 mt-2">Free parking available</p>
                </div>

                <!-- Emergency -->
                <div
                    class="contact-card bg-white cursor-pointer rounded-xl cursor-pointer shadow-lg hover:shadow-red-400 p-8 text-center hover:shadow-2xl border-r-4 border-red-500">
                    <div
                        class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">
                        🚨</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Emergency</h3>
                    <p class="text-gray-600 mb-4">24/7 emergency services</p>
                    <a href="tel:911" class="text-red-600 font-bold text-xl hover:text-red-800">911</a>
                    <p class="text-sm text-gray-500 mt-2">Always available</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Send Us a Message</h2>

                    <!-- Result/Status Display -->
                    <div id="messageResult" class="hidden mb-6 p-4 rounded-lg"></div>

                    <form method="POST" id="contactForm" class="space-y-6" onsubmit="return false;">
                        <!-- Web3Forms Access Key -->
                        <input type="hidden" name="access_key" value="0326c4fa-e73d-4a16-bb46-1ccfac7efb03">
                        <input type="hidden" name="action" value="send_message">

                        <?php if (!isset($_SESSION['user'])): ?>
                        <!-- Personal Information - Only show for guests -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name
                                    *</label>
                                <input type="text" id="first_name" name="first_name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name
                                    *</label>
                                <input type="text" id="last_name" name="last_name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address
                                *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <?php else: ?>
                        <!-- User is logged in - Personal info will be fetched from session -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                            <p class="text-blue-800 font-medium">
                                Contacting as:
                                <?php echo htmlspecialchars($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']); ?>
                            </p>
                            <p class="text-blue-600 text-sm">
                                Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?>
                            </p>
                        </div>
                        <!-- Hidden fields for logged-in users -->
                        <input type="hidden" name="first_name"
                            value="<?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>">
                        <input type="hidden" name="last_name"
                            value="<?php echo htmlspecialchars($_SESSION['user']['last_name']); ?>">
                        <input type="hidden" name="email"
                            value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>">
                        <input type="hidden" name="phone"
                            value="<?php echo htmlspecialchars($_SESSION['user']['phone'] ?? ''); ?>">

                        <!-- Name field for Web3Forms -->
                        <input type="hidden" name="name"
                            value="<?php echo htmlspecialchars($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']); ?>">
                        <?php endif; ?>

                        <!-- Add name field for Web3Forms for guests -->
                        <?php if (!isset($_SESSION['user'])): ?>
                        <input type="hidden" id="full_name" name="name">
                        <?php endif; ?>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject *</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a subject</option>
                                <option value="appointment">Schedule Appointment</option>
                                <option value="billing">Billing Question</option>
                                <option value="medical">Medical Inquiry</option>
                                <option value="insurance">Insurance Information</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message *</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Please describe your inquiry..."></textarea>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
                            <span id="submitText">Send Message</span>
                            <span id="submitLoading" class="hidden">
                                <svg class="animate-spin w-5 h-5 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                    </path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Map & Additional Info -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Find Our Location</h2>

                    <!-- Interactive Map Placeholder -->
                    <div class="map-container bg-gray-200 rounded-lg h-64 mb-6 flex items-center justify-center">
                        <div class="text-center text-gray-600">
                            <div class="text-4xl mb-2">🗺️</div>
                            <p class="font-semibold">Interactive Map</p>
                            <p class="text-sm">Click to view in Google Maps</p>
                        </div>
                    </div>

                    <!-- Hospital Information -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="font-bold text-gray-800 mb-4">Hospital Information</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-center">
                                <span class="w-6 text-blue-600">🏥</span>
                                <span class="ml-2 font-semibold">Sheywe Community Hospital - Main Campus</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-6 text-blue-600">🚗</span>
                                <span class="ml-2 font-semibold">Free parking - 500+ spaces</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-6 text-blue-600">🚌</span>
                                <span class="ml-2 font-semibold">Public transport: Bus lines 12, 45, 67</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-6 text-blue-600">♿</span>
                                <span class="ml-2 font-semibold">Wheelchair accessible</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="space-y-3">
                        <button onclick="checkLoginAndNavigate()"
                            class="w-full bg-green-600 cursor-pointer text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                            Book Appointment Online
                        </button>
                        <button onclick="callHospital()"
                            class="w-full border-2 border-blue-600 cursor-pointer text-blue-600 py-3 px-6 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition-colors">
                            Call Hospital
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Quick answers to common questions about our services and facilities.
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="bg-white rounded-lg shadow-md">
                    <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(1)">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">What are your visiting hours?</h3>
                            <span id="faq1-icon" class="text-blue-600">+</span>
                        </div>
                    </button>
                    <div id="faq1" class="hidden px-6 pb-6">
                        <p class="text-gray-600">General visiting hours are 8:00 AM to 8:00 PM daily. ICU visiting hours
                            are 10:00 AM to 12:00 PM and 6:00 PM to 8:00 PM. Emergency department allows one visitor at
                            a time.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md">
                    <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(2)">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">Do you accept insurance?</h3>
                            <span id="faq2-icon" class="text-blue-600">+</span>
                        </div>
                    </button>
                    <div id="faq2" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Yes, we accept most major insurance plans including Medicare and
                            Medicaid. Please contact our billing department at (555) 123-4567 to verify your specific
                            coverage.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md">
                    <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(3)">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">How do I schedule an appointment?</h3>
                            <span id="faq3-icon" class="text-blue-600">+</span>
                        </div>
                    </button>
                    <div id="faq3" class="hidden px-6 pb-6">
                        <p class="text-gray-600">You can schedule appointments online through our website, call us at
                            (555) 123-4567, or visit our registration desk. We recommend booking in advance for
                            non-emergency appointments.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md">
                    <button class="w-full text-left p-6 focus:outline-none" onclick="toggleFAQ(4)">
                        <div class="flex justify-between items-center">
                            <h3 class="font-semibold text-gray-800">What should I bring to my appointment?</h3>
                            <span id="faq4-icon" class="text-blue-600">+</span>
                        </div>
                    </button>
                    <div id="faq4" class="hidden px-6 pb-6">
                        <p class="text-gray-600">Please bring a valid ID, insurance card, list of current medications,
                            and any relevant medical records. Arrive 15 minutes early for check-in.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'app/Views/footer.php'; ?>

    <script>
    // Contact form JavaScript - v2.0
    console.log('Contact form script loading...');

    function scrollToContact() {
        document.getElementById('contact').scrollIntoView({
            behavior: 'smooth'
        });
    }

    function callHospital() {
        window.location.href = 'tel:+15551234567';
    }

    function checkLoginAndNavigate() {
        <?php if (isset($_SESSION['user'])): ?>
        // User is logged in, navigate to appointment page
        window.location.href = 'appointment.php';
        <?php else: ?>
        // User is not logged in, show login modal
        var modal = document.getElementById('loginModal');
        if (modal) {
            modal.classList.remove('hidden');
        } else {
            alert('Please log in to book an appointment.');
        }
        <?php endif; ?>
    }

    function toggleFAQ(faqNumber) {
        const faqContent = document.getElementById(`faq${faqNumber}`);
        const faqIcon = document.getElementById(`faq${faqNumber}-icon`);

        if (faqContent.classList.contains('hidden')) {
            faqContent.classList.remove('hidden');
            faqIcon.textContent = '-';
        } else {
            faqContent.classList.add('hidden');
            faqIcon.textContent = '+';
        }
    }

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing contact form...');

        // Get form elements
        const form = document.getElementById('contactForm');
        const result = document.getElementById('messageResult');
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitLoading = document.getElementById('submitLoading');

        // Check if all elements exist
        if (!form || !result || !submitBtn || !submitText || !submitLoading) {
            console.error('Missing form elements:', {
                form: !!form,
                result: !!result,
                submitBtn: !!submitBtn,
                submitText: !!submitText,
                submitLoading: !!submitLoading
            });
            return;
        }

        // Initialize toast manager (already defined in toast.php)
        let contactToastManager;
        try {
            contactToastManager = new ToastManager();
            console.log('Toast manager initialized successfully');
        } catch (error) {
            console.error('Toast manager initialization failed:', error);
            // Fallback toast manager
            contactToastManager = {
                show: function(message, type, duration) {
                    console.log(`Toast: ${message} (${type})`);
                    alert(message);
                }
            };
        }

        // Add form submission handler
        form.addEventListener('submit', function(e) {
            console.log('Form submission intercepted!');

            // Prevent all default form submission behavior
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();

            // Disable submit button and show loading state
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            submitLoading.classList.remove('hidden');

            result.innerHTML = "Please wait while we process your message...";
            result.className = "mb-6 p-4 rounded-lg bg-blue-100 text-blue-800";
            result.classList.remove('hidden');

            // Show loading toast
            contactToastManager.show('📤 Processing your message...', 'info', 3000);

            // Get form data
            const formData = new FormData(form);

            // Update the name field for guests for Web3Forms
            <?php if (!isset($_SESSION['user'])): ?>
            const firstName = formData.get('first_name');
            const lastName = formData.get('last_name');
            formData.set('name', firstName + ' ' + lastName);
            <?php endif; ?>

            // Store message ID for Web3Forms callback
            let messageId = null;

            // First, save to database
            fetch('app/contact-handler.php', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.text().then(text => {
                        console.log('Response text:', text);
                        try {
                            return JSON.parse(text);
                        } catch (e) {
                            console.error('Failed to parse JSON:', text);
                            throw new Error('Invalid JSON response from server');
                        }
                    });
                })
                .then(data => {
                    console.log('Parsed response data:', data);

                    if (data.success) {
                        messageId = data.message_id;

                        // Show success message
                        result.innerHTML = `
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>✅ ${data.message}</span>
                            </div>
                        `;
                        result.className = "mb-6 p-4 rounded-lg bg-green-100 text-green-800";
                        contactToastManager.show('✅ Message saved to our system!', 'success', 4000);

                        // Now send to Web3Forms for email notification
                        const web3FormsData = Object.fromEntries(formData);
                        delete web3FormsData.action; // Remove our custom action

                        return fetch('https://api.web3forms.com/submit', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(web3FormsData)
                        });
                    } else {
                        throw new Error(data.message || 'Failed to save message to database');
                    }
                })
                .then(async (web3Response) => {
                    if (web3Response) {
                        let web3Json = await web3Response.json();

                        // Update Web3Forms response in database
                        if (messageId) {
                            const updateData = new FormData();
                            updateData.append('action', 'update_web3forms_response');
                            updateData.append('message_id', messageId);
                            updateData.append('web3forms_response', JSON.stringify(web3Json));

                            fetch('app/contact-handler.php', {
                                method: 'POST',
                                body: updateData
                            });
                        }

                        if (web3Response.status === 200) {
                            result.innerHTML = `
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>✅ Message sent successfully! We'll get back to you within 24 hours.</span>
                            </div>
                            <p class="text-sm mt-2">Your message has been saved and a copy has been sent to our team.</p>
                        `;
                            result.className =
                                "mb-6 p-4 rounded-lg bg-green-100 text-green-800";
                            contactToastManager.show('✅ Email notification sent successfully!',
                                'success', 5000);

                            // Clear form on full success
                            form.reset();
                            // Update full name for guests after reset
                            <?php if (!isset($_SESSION['user'])): ?>
                            document.getElementById('full_name').value = '';
                            <?php endif; ?>
                            contactToastManager.show(
                                '📝 Form cleared! Ready for a new message.', 'info', 3000);

                        } else {
                            result.innerHTML = `
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                <span>⚠️ Message saved but email notification failed. Our team will still see your message.</span>
                            </div>
                        `;
                            result.className =
                                "mb-6 p-4 rounded-lg bg-yellow-100 text-yellow-800";
                            contactToastManager.show(
                                '⚠️ Email notification failed, but message was saved',
                                'warning', 5000);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    result.innerHTML = `
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        <span>❌ Error: ${error.message}</span>
                    </div>
                `;
                    result.className = "mb-6 p-4 rounded-lg bg-red-100 text-red-800";
                    contactToastManager.show('❌ Failed to send message: ' + error.message, 'error',
                        6000);
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitText.classList.remove('hidden');
                    submitLoading.classList.add('hidden');

                    // Hide result after 8 seconds
                    setTimeout(() => {
                        result.classList.add('hidden');
                    }, 8000);
                });
        });

        // Update full name field for guests when first/last name changes
        <?php if (!isset($_SESSION['user'])): ?>
        const firstNameInput = document.getElementById('first_name');
        const lastNameInput = document.getElementById('last_name');

        if (firstNameInput && lastNameInput) {
            firstNameInput.addEventListener('input', updateFullName);
            lastNameInput.addEventListener('input', updateFullName);
        }

        function updateFullName() {
            const firstName = firstNameInput.value;
            const lastName = lastNameInput.value;
            const fullNameInput = document.getElementById('full_name');
            if (fullNameInput) {
                fullNameInput.value = firstName + ' ' + lastName;
            }
        }
        <?php endif; ?>

        // Add form field animations
        const formInputs = document.querySelectorAll('input, select, textarea');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });

        console.log('Contact form initialization complete!');
    });
    </script>
</body>

</html>