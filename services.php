<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Our Services - BlueLife Hospital</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        body {
            font-family: 'Quicksand', sans-serif;
        }

        .service-card {
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
        }
    </style>
</head>

<body class="bg-gray-50">
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'app/Views/bookingModal.php'; ?>
    <?php include 'app/Views/loginModal.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 mt-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">Our Medical Services</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Comprehensive healthcare solutions with state-of-the-art technology and compassionate care.
                Your health and well-being are our top priorities.
            </p>
            <button onclick="scrollToServices()"
                class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                Explore Services
            </button>
        </div>
    </section>

    <!-- Services Grid -->
    <section id="services" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Specialized Medical Care</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Our team of expert physicians and modern facilities ensure you receive the highest quality
                    healthcare services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Emergency Care -->
                <div
                    class="service-card bg-white rounded-xl cursor-pointer shadow-lg hover:shadow-red-300 p-8 hover:shadow-2xl">
                    <div class="service-icon bg-red-100 text-red-600">🚨</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Emergency Care</h3>
                    <p class="text-gray-600 mb-6 text-center">24/7 emergency medical services with rapid response team
                        and advanced life support.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• Trauma care and surgery</li>
                        <li>• Critical care units</li>
                        <li>• Ambulance services</li>
                        <li>• Emergency diagnostics</li>
                    </ul>
                    <button onclick="openBookingModal('emergency')"
                        class="w-full bg-red-500 cursor-pointer text-white py-3 rounded-lg hover:bg-red-600 transition-colors">
                        Emergency Contact
                    </button>
                </div>

                <!-- Cardiology -->
                <div
                    class="service-card bg-white rounded-xl shadow-lg cursor-pointer p-8 hover:shadow-blue-400 hover:shadow-2xl">
                    <div class="service-icon bg-blue-100 text-blue-600">❤️</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Cardiology</h3>
                    <p class="text-gray-600 mb-6 text-center">Comprehensive heart care with advanced cardiac procedures
                        and preventive treatments.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• ECG and stress testing</li>
                        <li>• Cardiac catheterization</li>
                        <li>• Heart surgery</li>
                        <li>• Preventive cardiology</li>
                    </ul>
                    <button onclick="openBookingModal('cardiology')"
                        class="w-full bg-blue-500 cursor-pointer text-white py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        Book Consultation
                    </button>
                </div>

                <!-- Neurology -->
                <div
                    class="service-card bg-white rounded-xl shadow-lg p-8 hover:shadow-purple-500 cursor-pointer hover:shadow-2xl">
                    <div class="service-icon bg-purple-100 text-purple-600">🧠</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Neurology</h3>
                    <p class="text-gray-600 mb-6 text-center">Expert neurological care for brain, spine, and nervous
                        system disorders.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• Brain imaging (MRI, CT)</li>
                        <li>• Stroke treatment</li>
                        <li>• Epilepsy management</li>
                        <li>• Neurosurgery</li>
                    </ul>
                    <button onclick="openBookingModal('neurology')"
                        class="w-full bg-purple-500 cursor-pointer text-white py-3 rounded-lg hover:bg-purple-600 transition-colors">
                        Book Consultation
                    </button>
                </div>

                <!-- Pediatrics -->
                <div
                    class="service-card bg-white rounded-xl hover:shadow-green-300 cursor-pointer  shadow-lg p-8 hover:shadow-2xl">
                    <div class="service-icon bg-green-100 text-green-600">👶</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Pediatrics</h3>
                    <p class="text-gray-600 mb-6 text-center">Specialized healthcare for infants, children, and
                        adolescents up to 18 years.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• Routine check-ups</li>
                        <li>• Vaccinations</li>
                        <li>• Growth monitoring</li>
                        <li>• Pediatric surgery</li>
                    </ul>
                    <button onclick="openBookingModal('pediatrics')"
                        class="w-full bg-green-500 cursor-pointer text-white py-3 rounded-lg hover:bg-green-600 transition-colors">
                        Book Consultation
                    </button>
                </div>

                <!-- Orthopedics -->
                <div
                    class="service-card bg-white rounded-xl hover:shadow-orange-300 cursor-pointer  shadow-lg p-8 hover:shadow-2xl">
                    <div class="service-icon bg-orange-100 text-orange-600">🦴</div>
                    <h3 class="text-2xl font-semibold  text-gray-800 mb-4 text-center">Orthopedics</h3>
                    <p class="text-gray-600 mb-6 text-center">Complete bone, joint, and muscle care including sports
                        medicine and rehabilitation.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• Joint replacement</li>
                        <li>• Sports injuries</li>
                        <li>• Fracture treatment</li>
                        <li>• Physical therapy</li>
                    </ul>
                    <button onclick="openBookingModal('orthopedics')"
                        class="w-full bg-orange-500 cursor-pointer text-white py-3 rounded-lg hover:bg-orange-600 transition-colors">
                        Book Consultation
                    </button>
                </div>

                <!-- Obstetrics & Gynecology -->
                <div
                    class="service-card bg-white rounded-xl hover:shadow-pink-300 cursor-pointer  shadow-lg p-8 hover:shadow-2xl">
                    <div class="service-icon bg-pink-100 text-pink-600">👩‍⚕️</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">OB/GYN</h3>
                    <p class="text-gray-600 mb-6 text-center">Women's health services including pregnancy care and
                        gynecological treatments.</p>
                    <ul class="text-sm text-gray-700 mb-6 space-y-2">
                        <li>• Prenatal care</li>
                        <li>• Delivery services</li>
                        <li>• Gynecological exams</li>
                        <li>• Family planning</li>
                    </ul>
                    <button onclick="openBookingModal('obgyn')"
                        class="w-full bg-pink-500 cursor-pointer text-white py-3 rounded-lg hover:bg-pink-600 transition-colors">
                        Book Consultation
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Diagnostic Services -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Advanced Diagnostic Services</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    State-of-the-art diagnostic equipment for accurate and timely medical assessments.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-gray-50 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="text-4xl mb-4">🔬</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Laboratory Tests</h4>
                    <p class="text-sm text-gray-600">Blood tests, urine analysis, and genetic testing</p>
                </div>
                <div class="text-center p-6 bg-gray-50 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="text-4xl mb-4">📷</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Medical Imaging</h4>
                    <p class="text-sm text-gray-600">MRI, CT scans, X-rays, and ultrasound</p>
                </div>
                <div class="text-center p-6 bg-gray-50 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="text-4xl mb-4">📈</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Cardiac Testing</h4>
                    <p class="text-sm text-gray-600">ECG, stress tests, and echocardiography</p>
                </div>
                <div class="text-center p-6 bg-gray-50 cursor-pointer rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="text-4xl mb-4">🩺</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Health Screenings</h4>
                    <p class="text-sm text-gray-600">Preventive health checkups and cancer screening</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Why Choose BlueLife Hospital?</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">✓</div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Expert Medical Team</h4>
                                <p class="text-gray-600">Board-certified physicians with years of specialized experience
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">✓</div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Advanced Technology</h4>
                                <p class="text-gray-600">Latest medical equipment and cutting-edge treatment methods</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">✓</div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">24/7 Availability</h4>
                                <p class="text-gray-600">Round-the-clock emergency services and patient care</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-blue-100 text-blue-600 p-3 rounded-full mr-4">✓</div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Patient-Centered Care</h4>
                                <p class="text-gray-600">Personalized treatment plans focused on your unique needs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img src="/storage/uploads/bg (3).jpg" alt="Hospital Facility"
                        class="rounded-lg shadow-lg w-full" />
                    <div class="absolute inset-0  rounded-lg"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="gradient-bg text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Take the first step towards better health. Schedule your appointment with our expert medical team today.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="openModal()"
                    class="bg-white text-blue-600 cursor-pointer px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    Book Appointment
                </button>
                <button onclick="contactUs()"
                    class="border-2 border-white cursor-pointer text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Contact Us
                </button>
            </div>
        </div>
    </section>

    <?php include 'app/Views/footer.php'; ?>

    <script>
        function scrollToServices() {
            document.getElementById('services').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function bookService(service) {
            // You can customize this based on your booking system
            alert(`Booking ${service} consultation. Redirecting to appointment booking...`);
            // Example: window.location.href = `book-appointment.php?service=${service}`;
            openModal(); // For now, open the login modal
        }

        function contactUs() {
            // Redirect to contact page or open contact modal
            window.location.href = 'contact.php';
        }

        // Add smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe service cards for animation
        document.querySelectorAll('.service-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>


</html>