<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="tel:+15551234567" class="text-blue-600 font-semibold hover:text-blue-800">+1 (555)
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
                        class="text-blue-600 font-semibold hover:text-blue-800">info@Sheywe Communityhospital.com</a>
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
                    <form id="contactForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name
                                    *</label>
                                <input type="text" id="firstName" name="firstName" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name
                                    *</label>
                                <input type="text" id="lastName" name="lastName" required
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

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Send Message
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
                        <button onclick="openModal()"
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
        function scrollToContact() {
            document.getElementById('contact').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function callHospital() {
            window.location.href = 'tel:+15551234567';
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

        // Handle contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);

            // Simple validation
            if (!data.firstName || !data.lastName || !data.email || !data.subject || !data.message) {
                alert('Please fill in all required fields.');
                return;
            }

            // Simulate form submission
            alert('Thank you for your message! We will get back to you within 24 hours.');
            this.reset();
        });

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
    </script>
</body>

</html>