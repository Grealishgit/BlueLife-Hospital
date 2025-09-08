<?php
// Include the doctors data
require_once '../config/doctors.php';

// Get orthopedics doctors
$orthopedicsDoctors = array_filter($doctorsData, function ($doctor) {
    return $doctor['department'] === 'Orthopedics';
});
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orthopedics - Sheywe Community Hospital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter bg-gradient-to-br from-blue-50 via-white to-purple-50 min-h-screen">

    <?php include '../components/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-orange-500 via-red-500 to-pink-600 text-white py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                        <span class="text-2xl mr-2">🦴</span>
                        <span class="text-sm font-medium">Movement & Mobility</span>
                    </div>
                    <h1 class="text-5xl font-bold mb-6">Orthopedic Care</h1>
                    <p class="text-xl mb-8 text-orange-100">Advanced treatment for bones, joints, muscles, and ligaments
                        to help you move freely and live actively.</p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="scrollToSection('services')"
                            class="bg-white text-orange-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            Our Services
                        </button>
                        <button onclick="scrollToSection('doctors')"
                            class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors">
                            Meet Our Surgeons
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold">97%</div>
                                <div class="text-orange-100">Success Rate</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">24/7</div>
                                <div class="text-orange-100">Trauma Care</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">20+</div>
                                <div class="text-orange-100">Specialists</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">10K+</div>
                                <div class="text-orange-100">Surgeries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section id="services" class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Comprehensive Orthopedic Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">From sports injuries to joint replacement, we provide
                    complete musculoskeletal care using the latest techniques and technology.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Joint Replacement -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Joint Replacement</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Total Hip Replacement</li>
                        <li>• Total Knee Replacement</li>
                        <li>• Shoulder Replacement</li>
                        <li>• Partial Joint Replacement</li>
                        <li>• Revision Surgery</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Sports Medicine -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Sports Medicine</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• ACL/MCL Reconstruction</li>
                        <li>• Rotator Cuff Repair</li>
                        <li>• Tennis/Golfer's Elbow</li>
                        <li>• Concussion Management</li>
                        <li>• Athletic Performance</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Spine Surgery -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Spine Surgery</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Minimally Invasive Spine</li>
                        <li>• Disc Replacement</li>
                        <li>• Spinal Fusion</li>
                        <li>• Scoliosis Treatment</li>
                        <li>• Herniated Disc Repair</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Trauma Surgery -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Trauma Surgery</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Fracture Repair</li>
                        <li>• Emergency Surgery</li>
                        <li>• Complex Trauma</li>
                        <li>• Polytrauma Care</li>
                        <li>• Limb Salvage</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Hand Surgery -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Hand & Wrist Surgery</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Carpal Tunnel Surgery</li>
                        <li>• Trigger Finger Release</li>
                        <li>• Tendon Repair</li>
                        <li>• Fracture Fixation</li>
                        <li>• Arthritis Treatment</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Foot & Ankle -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Foot & Ankle</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Ankle Replacement</li>
                        <li>• Bunion Surgery</li>
                        <li>• Achilles Repair</li>
                        <li>• Plantar Fasciitis</li>
                        <li>• Diabetic Foot Care</li>
                    </ul>
                    <button class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">Learn More
                        →</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Treatment Approaches -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Treatment Approach</h2>
                <p class="text-xl text-gray-600">We combine advanced surgical techniques with comprehensive
                    rehabilitation for optimal outcomes.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Minimally Invasive Techniques</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Arthroscopic Surgery</h4>
                                <p class="text-gray-600 text-sm">Small incision procedures for faster recovery</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Robotic-Assisted Surgery</h4>
                                <p class="text-gray-600 text-sm">Enhanced precision and reduced tissue damage</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Computer Navigation</h4>
                                <p class="text-gray-600 text-sm">Real-time guidance for accurate placement</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Same-Day Surgery</h4>
                                <p class="text-gray-600 text-sm">Outpatient procedures when appropriate</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Comprehensive Rehabilitation</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Physical Therapy</h4>
                                <p class="text-gray-600 text-sm">Customized programs for optimal recovery</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Occupational Therapy</h4>
                                <p class="text-gray-600 text-sm">Return to daily activities and work</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Pain Management</h4>
                                <p class="text-gray-600 text-sm">Multimodal approaches to comfort</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-orange-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Sports Conditioning</h4>
                                <p class="text-gray-600 text-sm">Return to athletic performance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Conditions We Treat -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Conditions We Treat</h2>
                <p class="text-xl text-gray-600">From common injuries to complex conditions, we provide expert
                    orthopedic care.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                $conditions = [
                    ['name' => 'Arthritis', 'icon' => '🦴'],
                    ['name' => 'Sports Injuries', 'icon' => '⚽'],
                    ['name' => 'Back Pain', 'icon' => '🔙'],
                    ['name' => 'Fractures', 'icon' => '💥'],
                    ['name' => 'Joint Pain', 'icon' => '🦵'],
                    ['name' => 'Tendon Injuries', 'icon' => '🔗'],
                    ['name' => 'Osteoporosis', 'icon' => '🧻'],
                    ['name' => 'Spinal Disorders', 'icon' => '🦴']
                ];

                foreach ($conditions as $condition): ?>
                    <div
                        class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow border border-gray-100">
                        <div class="text-3xl mb-3"><?php echo $condition['icon']; ?></div>
                        <h3 class="font-semibold text-gray-800"><?php echo $condition['name']; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section id="doctors" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Orthopedic Surgeons</h2>
                <p class="text-xl text-gray-600">Board-certified orthopedic surgeons with specialized expertise in all
                    areas of musculoskeletal care.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($orthopedicsDoctors as $doctor): ?>
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                        <div class="h-64 bg-gradient-to-br from-orange-100 to-red-100 flex items-center justify-center">
                            <div class="w-32 h-32 bg-orange-200 rounded-full flex items-center justify-center">
                                <span
                                    class="text-2xl font-bold text-orange-700"><?php echo strtoupper(substr($doctor['name'], 0, 2)); ?></span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $doctor['name']; ?></h3>
                            <p class="text-orange-600 font-medium mb-3"><?php echo $doctor['specialization']; ?></p>
                            <p class="text-gray-600 text-sm mb-4"><?php echo $doctor['experience']; ?> years of experience
                            </p>

                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Expertise:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach ($doctor['expertise'] as $skill): ?>
                                        <span
                                            class="bg-orange-100 text-orange-700 px-2 py-1 rounded-full text-xs"><?php echo $skill; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Available:</h4>
                                <p class="text-gray-600 text-sm"><?php echo implode(', ', $doctor['schedule']); ?></p>
                            </div>

                            <button
                                class="w-full bg-orange-600 text-white py-2 rounded-lg hover:bg-orange-700 transition-colors">
                                Book Consultation
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Technology & Equipment -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Advanced Technology</h2>
                <p class="text-xl text-gray-600">State-of-the-art equipment and innovative surgical techniques for
                    better outcomes.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">🤖</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Robotic Surgery</h3>
                    <p class="text-gray-600 mb-6">MAKO robotic-arm assisted surgery for joint replacement with enhanced
                        precision.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">📡</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">3D Imaging</h3>
                    <p class="text-gray-600 mb-6">Advanced imaging technology for precise surgical planning and
                        navigation.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">🔬</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Arthroscopy Suite</h3>
                    <p class="text-gray-600 mb-6">State-of-the-art arthroscopic equipment for minimally invasive
                        procedures.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Patient Journey -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Your Treatment Journey</h2>
                <p class="text-xl text-gray-600">From consultation to recovery, we guide you through every step.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-orange-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-xl">
                        1</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Consultation</h3>
                    <p class="text-gray-600 text-sm">Comprehensive evaluation and diagnosis with imaging studies if
                        needed.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-orange-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-xl">
                        2</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Treatment Plan</h3>
                    <p class="text-gray-600 text-sm">Personalized treatment plan with both surgical and non-surgical
                        options.</p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-orange-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-xl">
                        3</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Treatment</h3>
                    <p class="text-gray-600 text-sm">Expert surgical care using the latest techniques and technology.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-16 h-16 bg-orange-600 text-white rounded-full flex items-center justify-center mx-auto mb-4 font-bold text-xl">
                        4</div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Recovery</h3>
                    <p class="text-gray-600 text-sm">Comprehensive rehabilitation program to restore function and
                        mobility.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-orange-500 to-red-600 text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Get Back to What You Love</h2>
            <p class="text-xl mb-8 text-orange-100">Don't let pain or injury hold you back. Our orthopedic specialists
                are here to help you move freely again.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    class="bg-white text-orange-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Schedule Consultation
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors">
                    Sports Medicine: (555) 123-SPORT
                </button>
            </div>
        </div>
    </section>

    <?php include '../components/footer.php'; ?>
    <?php include '../components/live-chat.php'; ?>

    <script>
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</body>

</html>