<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>About Us - Sheywe Community Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

    body {
        font-family: 'Quicksand', sans-serif;
    }

    .font-value {
        font-family: 'Courier New', Courier, monospace;
    }

    .about-card {
        transition: all 0.3s ease;
    }

    .about-card:hover {
        transform: translateY(-5px);
    }

    .gradient-bg {
        background: linear-gradient(135deg, #4f63bdff 0%, #6c8aefff 100%);
    }

    .specialty-card {
        transition: all 0.3s ease;
    }

    .specialty-card:hover {
        transform: scale(1.05);
    }

    .stats-counter {
        font-size: 3rem;
        font-weight: bold;
        font-family: 'Courier New', Courier, monospace, Arial, sans-serif;
    }

    .about-leader-card {
        transition: box-shadow 0.3s, transform 0.3s;
        box-shadow: 0 2px 8px rgba(186, 202, 227, 0.08);
        border-radius: 8px;
        background: #afc1e5ff;
    }

    .about-leader-card:hover {
        box-shadow: 0 8px 32px rgba(155, 188, 242, 0.18);
        transform: translateY(-6px) scale(1.03);
        background: #6fb2f1ff;
    }
    </style>
</head>

<body class="bg-gray-50">
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'app/Views/loginModal.php'; ?>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 mt-10">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">About Sheywe Hospital</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">
                Your trusted partner in healthcare excellence. We're committed to providing compassionate,
                innovative medical care that puts your health and well-being first.
            </p>
            <button onclick="scrollToStory()"
                class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                Our Story
            </button>
        </div>
    </section>

    <!-- Hospital Stats -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="about-card p-6">
                    <p class="stats-counter  text-blue-600 mb-2">25+</p>
                    <h3 class="text-lg font-semibold text-gray-800">Years of Excellence</h3>
                    <p class="text-gray-600 text-sm">Serving our community</p>
                </div>
                <div class="about-card p-6">
                    <div class="stats-counter text-green-600 mb-2">500+</div>
                    <h3 class="text-lg font-semibold text-gray-800">Medical Professionals</h3>
                    <p class="text-gray-600 text-sm">Expert healthcare team</p>
                </div>
                <div class="about-card p-6">
                    <div class="stats-counter text-purple-600 mb-2">50,000+</div>
                    <h3 class="text-lg font-semibold text-gray-800">Patients Served</h3>
                    <p class="text-gray-600 text-sm">Annual patient care</p>
                </div>
                <div class="about-card p-6">
                    <div class="stats-counter text-red-600 mb-2">24/7</div>
                    <h3 class="text-lg font-semibold text-gray-800">Emergency Care</h3>
                    <p class="text-gray-600 text-sm">Always here for you</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section id="story" class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Story & Mission</h2>
                    <div class="space-y-2 text-gray-700">
                        <div class="text-lg bg-teal-50 p-6 rounded-md shadow-lg border-r-4 border-b-4 border-blue-500">
                            <p class="leading-relaxed">
                                Welcome to Sheywe Community Hospital, your trusted partner in managing your healthcare
                                needs
                                conveniently and efficiently. For over 25 years, we have been dedicated to providing
                                exceptional medical care to our community.
                            </p>

                        </div>
                        <div class="bg-blue-50 p-6 rounded-lg shadow-lg border-l-4 border-b-4 border-blue-500">
                            <p class="leading-relaxed">
                                At Sheywe, we understand the challenges individuals face when it comes to scheduling
                                doctor appointments and managing their health records. That's why we've built a
                                comprehensive healthcare system that prioritizes your convenience and well-being.
                            </p>
                        </div>
                        <div class="text-lg bg-teal-50 p-6 rounded-md shadow-lg border-r-4 border-b-4 border-blue-500">
                            <p class="leading-relaxed">
                                Sheywe is committed to excellence in healthcare technology. We continuously strive
                                to enhance our services, integrating the latest medical advancements to improve
                                patient experience and deliver superior care.
                            </p>
                        </div>
                        <div class="bg-blue-50 shadow-lg p-6 rounded-lg border-l-4 border-b-4 border-blue-500">
                            <h4 class="font-semibold text-blue-800 mb-2">Our Mission</h4>
                            <p class="text-blue-700">
                                To provide compassionate, innovative healthcare that exceeds expectations while
                                making medical services accessible and convenient for everyone in our community.
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" flex flex-col gap-4 md:mt-12">
                    <img src="/storage/uploads/bg%20(6).jpg" alt="Sheywe Hospital Building"
                        class="rounded-lg shadow-lg h-80 w-full" />
                    <img src="/storage/uploads/bg%20(7).jpg" alt="Sheywe Hospital Building"
                        class="rounded-lg shadow-lg h-80 w-full" />
                </div>
            </div>
        </div>
    </section>

    <!-- Medical Specialties -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Medical Specialties</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    We offer comprehensive healthcare services across multiple specializations
                    with state-of-the-art facilities and expert medical professionals.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="specialty-card bg-blue-50 rounded-lg p-6 text-center hover:bg-blue-100 cursor-pointer">
                    <div class="text-3xl mb-3">👨‍⚕️</div>
                    <h4 class="font-semibold text-gray-800 text-sm">General Physician</h4>
                </div>
                <div class="specialty-card bg-pink-50 rounded-lg p-6 text-center hover:bg-pink-100 cursor-pointer">
                    <div class="text-3xl mb-3">👩‍⚕️</div>
                    <h4 class="font-semibold text-gray-800 text-sm">Gynecologist</h4>
                </div>
                <div class="specialty-card bg-orange-50 rounded-lg p-6 text-center hover:bg-orange-100 cursor-pointer">
                    <div class="text-3xl mb-3">🧴</div>
                    <h4 class="font-semibold text-gray-800 text-sm">Dermatologist</h4>
                </div>
                <div class="specialty-card bg-green-50 rounded-lg p-6 text-center hover:bg-green-100 cursor-pointer">
                    <div class="text-3xl mb-3">👶</div>
                    <h4 class="font-semibold text-gray-800 text-sm">Pediatrician</h4>
                </div>
                <div class="specialty-card bg-purple-50 rounded-lg p-6 text-center hover:bg-purple-100 cursor-pointer">
                    <div class="text-3xl mb-3">🧠</div>
                    <h4 class="font-semibold text-gray-800 text-sm">Neurologist</h4>
                </div>
                <div class="specialty-card bg-red-50 rounded-lg p-6 text-center hover:bg-red-100 cursor-pointer">
                    <div class="text-3xl mb-3">🫀</div>
                    <h4 class="font-semibold text-gray-800 text-sm">Gastroenterologist</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose Sheywe Hospital?</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    We're committed to providing exceptional healthcare through innovation,
                    compassion, and unwavering dedication to patient care.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Efficiency Card -->
                <div class="about-card bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                        ⚡</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Efficiency</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Streamlined appointment scheduling and efficient medical processes that fit into your busy
                        lifestyle.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li>• Online appointment booking</li>
                        <li>• Digital health records</li>
                        <li>• Minimal waiting times</li>
                        <li>• Express check-in services</li>
                    </ul>
                </div>

                <!-- Convenience Card -->
                <div class="about-card bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                        🏥</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Convenience</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Access to a comprehensive network of trusted healthcare professionals and modern facilities.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li>• Multiple locations</li>
                        <li>• Extended operating hours</li>
                        <li>• Free parking</li>
                        <li>• Pharmacy on-site</li>
                    </ul>
                </div>

                <!-- Personalization Card -->
                <div class="about-card bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl">
                    <div
                        class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-6">
                        👤</div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Personalization</h3>
                    <p class="text-gray-600 text-center mb-6">
                        Tailored healthcare recommendations and personalized treatment plans for optimal health
                        outcomes.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li>• Personalized care plans</li>
                        <li>• Health reminders</li>
                        <li>• Dedicated care coordinators</li>
                        <li>• Follow-up services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Leadership Team</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Meet the experienced professionals who guide Sheywe Hospital's vision and commitment to
                    excellence.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center about-leader-card p-3 cursor-pointer"
                    onclick="showLeaderModal('Dr. Sarah Johnson', 'Chief Executive Officer', '25+ years in healthcare administration', '/storage/uploads/doctor1.png')">
                    <img src="/storage/uploads/doctor1.png" alt="CEO"
                        class="w-32 h-32 rounded-full mx-auto  mb-4 object-cover" />
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dr. Sarah Johnson</h3>
                    <p class="text-blue-600 font-medium mb-2">Chief Executive Officer</p>
                    <p class="text-gray-600 text-sm">25+ years in healthcare administration</p>
                </div>
                <div class="text-center about-leader-card p-3 cursor-pointer"
                    onclick="showLeaderModal('Dr. Michael Chen', 'Chief Medical Officer', 'Board-certified in Internal Medicine', '/storage/uploads/doctor2.png')">
                    <img src="/storage/uploads/doctor2.png" alt="CMO"
                        class="w-32 h-32 rounded-full mx-auto  mb-4 object-cover" />
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dr. Michael Chen</h3>
                    <p class="text-blue-600 font-medium mb-2">Chief Medical Officer</p>
                    <p class="text-gray-600 text-sm">Board-certified in Internal Medicine</p>
                </div>
                <div class="text-center about-leader-card p-3 cursor-pointer"
                    onclick="showLeaderModal('Nancy Williams, RN', 'Chief Nursing Officer', 'Expert in patient care excellence', '/storage/uploads/doctor3.png')">
                    <img src="/storage/uploads/doctor3.png" alt="CNO"
                        class="w-32 h-32 rounded-full mx-auto  mb-4 object-cover" />
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Nancy Williams, RN</h3>
                    <p class="text-blue-600 font-medium mb-2">Chief Nursing Officer</p>
                    <p class="text-gray-600 text-sm">Expert in patient care excellence</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Modal -->
    <div id="leaderModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-md bg-opacity-50 hidden">
        <div class="bg-white rounded-md shadow-lg w-full max-w-md p-8 relative">
            <button onclick="closeLeaderModal()"
                class="absolute top-2 right-4 cursor-pointer text-2xl text-red-500 hover:text-red-700">&times;</button>
            <div class="flex flex-col items-center">
                <img id="leaderModalImg" src="" alt="Leader"
                    class="w-32 h-32 rounded-full border-4 border-blue-500 mb-4 object-cover" />
                <h3 id="leaderModalName" class="text-2xl font-bold text-gray-800 mb-2"></h3>
                <p id="leaderModalRole" class="text-blue-600 font-medium mb-2"></p>
                <p id="leaderModalInfo" class="text-gray-600 text-center"></p>
            </div>
        </div>
    </div>

    <?php include 'app/Views/footer.php'; ?>

    <script>
    function scrollToStory() {
        document.getElementById('story').scrollIntoView({
            behavior: 'smooth'
        });
    }

    function contactUs() {
        window.location.href = 'contact.php';
    }

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

    // Observe cards for animation
    document.querySelectorAll('.about-card, .specialty-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Animate stats counters
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + (target >= 1000 ? '+' : '');
        }, 20);
    }

    // Trigger counter animation when stats section is visible
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.stats-counter');
                counters.forEach(counter => {
                    const target = parseInt(counter.textContent);
                    animateCounter(counter, target);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    });

    const statsSection = document.querySelector('.stats-counter').closest('section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    function showLeaderModal(name, role, info, img) {
        document.getElementById('leaderModalName').textContent = name;
        document.getElementById('leaderModalRole').textContent = role;
        document.getElementById('leaderModalInfo').textContent = info;
        document.getElementById('leaderModalImg').src = img;
        document.getElementById('leaderModal').classList.remove('hidden');
    }

    function closeLeaderModal() {
        document.getElementById('leaderModal').classList.add('hidden');
    }
    </script>



</body>

</html>