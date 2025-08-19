<?php
// Include the doctors data
require_once '../config/doctors.php';

// Get cardiology doctors
$cardiologyDoctors = array_filter($doctorsData, function($doctor) {
    return $doctor['department'] === 'Cardiology';
});
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardiology Services - BlueLife Hospital</title>
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
    <section class="relative bg-gradient-to-r from-red-500 via-pink-500 to-red-600 text-white py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                        </svg>
                        <span class="text-sm font-medium">Heart Care Excellence</span>
                    </div>
                    <h1 class="text-5xl font-bold mb-6">Cardiology Services</h1>
                    <p class="text-xl mb-8 text-red-100">Comprehensive heart care with advanced treatments and
                        compassionate expertise for all cardiovascular conditions.</p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="scrollToSection('services')"
                            class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            View Services
                        </button>
                        <button onclick="scrollToSection('doctors')"
                            class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-red-600 transition-colors">
                            Meet Our Doctors
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold">95%</div>
                                <div class="text-red-100">Success Rate</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">24/7</div>
                                <div class="text-red-100">Emergency Care</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">15+</div>
                                <div class="text-red-100">Specialists</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">5000+</div>
                                <div class="text-red-100">Procedures</div>
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
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Cardiology Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">From preventive care to complex procedures, we offer
                    comprehensive cardiovascular services using the latest technology and techniques.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Diagnostic Services -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Diagnostic Testing</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Echocardiograms</li>
                        <li>• Stress Testing</li>
                        <li>• Cardiac Catheterization</li>
                        <li>• Nuclear Imaging</li>
                        <li>• CT Angiography</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Interventional Cardiology -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Interventional Procedures</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Angioplasty & Stenting</li>
                        <li>• Balloon Valvuloplasty</li>
                        <li>• Peripheral Interventions</li>
                        <li>• Structural Heart Procedures</li>
                        <li>• Emergency PCI</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Electrophysiology -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Electrophysiology</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Arrhythmia Treatment</li>
                        <li>• Pacemaker Implantation</li>
                        <li>• Defibrillator Placement</li>
                        <li>• Ablation Procedures</li>
                        <li>• Heart Rhythm Monitoring</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Heart Surgery -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Cardiac Surgery</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Bypass Surgery</li>
                        <li>• Valve Repair/Replacement</li>
                        <li>• Minimally Invasive Surgery</li>
                        <li>• Aortic Surgery</li>
                        <li>• Congenital Heart Surgery</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Heart Failure -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Heart Failure Care</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Advanced Heart Failure Program</li>
                        <li>• Heart Transplant Evaluation</li>
                        <li>• Mechanical Circulatory Support</li>
                        <li>• Cardiac Rehabilitation</li>
                        <li>• Disease Management</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>

                <!-- Preventive Care -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Preventive Cardiology</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Risk Assessment</li>
                        <li>• Cholesterol Management</li>
                        <li>• Blood Pressure Control</li>
                        <li>• Lifestyle Counseling</li>
                        <li>• Cardiac Screening</li>
                    </ul>
                    <button class="text-red-600 font-semibold hover:text-red-700 transition-colors">Learn More
                        →</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Conditions We Treat -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Conditions We Treat</h2>
                <p class="text-xl text-gray-600">Our specialists treat a wide range of cardiovascular conditions with
                    expert care.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php 
                $conditions = [
                    ['name' => 'Coronary Artery Disease', 'icon' => '❤️'],
                    ['name' => 'Heart Arrhythmias', 'icon' => '⚡'],
                    ['name' => 'Heart Failure', 'icon' => '💔'],
                    ['name' => 'Valvular Heart Disease', 'icon' => '🔄'],
                    ['name' => 'Hypertension', 'icon' => '📈'],
                    ['name' => 'Peripheral Artery Disease', 'icon' => '🩸'],
                    ['name' => 'Congenital Heart Disease', 'icon' => '👶'],
                    ['name' => 'Aortic Aneurysms', 'icon' => '🫀']
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

    <!-- Our Doctors -->
    <section id="doctors" class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Cardiology Team</h2>
                <p class="text-xl text-gray-600">Meet our experienced cardiologists and cardiac surgeons dedicated to
                    your heart health.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($cardiologyDoctors as $doctor): ?>
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="h-64 bg-gradient-to-br from-red-100 to-pink-100 flex items-center justify-center">
                        <div class="w-32 h-32 bg-red-200 rounded-full flex items-center justify-center">
                            <span
                                class="text-2xl font-bold text-red-700"><?php echo strtoupper(substr($doctor['name'], 0, 2)); ?></span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $doctor['name']; ?></h3>
                        <p class="text-red-600 font-medium mb-3"><?php echo $doctor['specialization']; ?></p>
                        <p class="text-gray-600 text-sm mb-4"><?php echo $doctor['experience']; ?> years of experience
                        </p>

                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Expertise:</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($doctor['expertise'] as $skill): ?>
                                <span
                                    class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs"><?php echo $skill; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Available:</h4>
                            <p class="text-gray-600 text-sm"><?php echo implode(', ', $doctor['schedule']); ?></p>
                        </div>

                        <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition-colors">
                            Book Appointment
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Technology & Equipment -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Advanced Technology</h2>
                <p class="text-xl text-gray-600">State-of-the-art equipment and innovative techniques for the best
                    cardiac care.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Cutting-Edge Equipment</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Cardiac Catheterization Labs</h4>
                                <p class="text-gray-600 text-sm">Latest generation imaging systems for precise
                                    procedures</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">3D Echocardiography</h4>
                                <p class="text-gray-600 text-sm">Advanced imaging for detailed heart visualization</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Robotic Surgery System</h4>
                                <p class="text-gray-600 text-sm">Minimally invasive cardiac procedures</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Advanced CT Scanners</h4>
                                <p class="text-gray-600 text-sm">High-resolution cardiac imaging</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Innovative Procedures</h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Transcatheter Valve Replacement</h4>
                                <p class="text-gray-600 text-sm">Minimally invasive valve procedures</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Leadless Pacemakers</h4>
                                <p class="text-gray-600 text-sm">Next-generation cardiac rhythm devices</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Hybrid Operating Rooms</h4>
                                <p class="text-gray-600 text-sm">Combined surgery and catheterization capabilities</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-2 h-2 bg-red-600 rounded-full mt-2"></div>
                            <div>
                                <h4 class="font-semibold text-gray-800">AI-Powered Diagnostics</h4>
                                <p class="text-gray-600 text-sm">Machine learning enhanced diagnosis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Patient Resources -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Patient Resources</h2>
                <p class="text-xl text-gray-600">Everything you need for your cardiac care journey.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pre-Procedure Instructions</h3>
                    <p class="text-gray-600 mb-6">Detailed guidelines for preparing for your cardiac procedure or
                        surgery.</p>
                    <button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Download Guide
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Heart-Healthy Living</h3>
                    <p class="text-gray-600 mb-6">Tips and resources for maintaining cardiovascular health and
                        preventing disease.</p>
                    <button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Learn More
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Support Groups</h3>
                    <p class="text-gray-600 mb-6">Connect with others and get support during your cardiac care journey.
                    </p>
                    <button class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Join Group
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-red-500 to-pink-600 text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Take Care of Your Heart Today</h2>
            <p class="text-xl mb-8 text-red-100">Don't wait when it comes to your cardiovascular health. Schedule a
                consultation with our expert team.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Schedule Appointment
                </button>
                <button
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-red-600 transition-colors">
                    Emergency: (555) 123-EMRG
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