<?php
// Include the doctors data
require_once '../config/doctors.php';

// Get pediatrics doctors
$pediatricsDoctors = array_filter($doctorsData, function($doctor) {
    return $doctor['department'] === 'Pediatrics';
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pediatrics - BlueLife Hospital</title>
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
    <section class="relative bg-gradient-to-r from-green-400 via-blue-400 to-purple-500 text-white py-20">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                        <span class="text-2xl mr-2">👶</span>
                        <span class="text-sm font-medium">Caring for Little Ones</span>
                    </div>
                    <h1 class="text-5xl font-bold mb-6">Pediatric Care</h1>
                    <p class="text-xl mb-8 text-blue-100">Comprehensive healthcare for children from newborns to teenagers, with specialized care that puts your child's comfort first.</p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="scrollToSection('services')" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            Our Services
                        </button>
                        <button onclick="scrollToSection('doctors')" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                            Meet Our Team
                        </button>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold">98%</div>
                                <div class="text-blue-100">Parent Satisfaction</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">24/7</div>
                                <div class="text-blue-100">Emergency Care</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">12+</div>
                                <div class="text-blue-100">Specialists</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold">8000+</div>
                                <div class="text-blue-100">Children Served</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Age Groups -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Care for Every Stage</h2>
                <p class="text-xl text-gray-600">From newborns to teenagers, we provide age-appropriate care for every child.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center group hover:transform hover:scale-105 transition-all">
                    <div class="w-24 h-24 bg-gradient-to-br from-pink-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:shadow-lg transition-shadow">
                        <span class="text-4xl">👶</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Newborns</h3>
                    <p class="text-gray-600">0-2 months</p>
                    <ul class="text-sm text-gray-500 mt-3 space-y-1">
                        <li>• NICU Care</li>
                        <li>• Well-baby Visits</li>
                        <li>• Feeding Support</li>
                    </ul>
                </div>

                <div class="text-center group hover:transform hover:scale-105 transition-all">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:shadow-lg transition-shadow">
                        <span class="text-4xl">🧒</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Infants & Toddlers</h3>
                    <p class="text-gray-600">2 months - 3 years</p>
                    <ul class="text-sm text-gray-500 mt-3 space-y-1">
                        <li>• Vaccinations</li>
                        <li>• Development Checks</li>
                        <li>• Growth Monitoring</li>
                    </ul>
                </div>

                <div class="text-center group hover:transform hover:scale-105 transition-all">
                    <div class="w-24 h-24 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:shadow-lg transition-shadow">
                        <span class="text-4xl">👧</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Children</h3>
                    <p class="text-gray-600">3-12 years</p>
                    <ul class="text-sm text-gray-500 mt-3 space-y-1">
                        <li>• School Physicals</li>
                        <li>• Behavioral Health</li>
                        <li>• Chronic Conditions</li>
                    </ul>
                </div>

                <div class="text-center group hover:transform hover:scale-105 transition-all">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:shadow-lg transition-shadow">
                        <span class="text-4xl">🧑‍🎓</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Adolescents</h3>
                    <p class="text-gray-600">12-18 years</p>
                    <ul class="text-sm text-gray-500 mt-3 space-y-1">
                        <li>• Teen Health</li>
                        <li>• Mental Health</li>
                        <li>• Sports Medicine</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Pediatric Services</h2>
                <p class="text-xl text-gray-600">Comprehensive care designed specifically for children's unique healthcare needs.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- General Pediatrics -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">👩‍⚕️</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">General Pediatrics</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Well-child Visits</li>
                        <li>• Sick Child Care</li>
                        <li>• Immunizations</li>
                        <li>• Growth & Development</li>
                        <li>• Physical Exams</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>

                <!-- Neonatal Care -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-pink-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">👶</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Neonatal Care</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• NICU Services</li>
                        <li>• Premature Baby Care</li>
                        <li>• Birth Complications</li>
                        <li>• Breastfeeding Support</li>
                        <li>• Newborn Screening</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>

                <!-- Pediatric Surgery -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">🏥</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pediatric Surgery</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Minimally Invasive Surgery</li>
                        <li>• Congenital Anomalies</li>
                        <li>• Trauma Surgery</li>
                        <li>• Day Surgery</li>
                        <li>• Pre/Post-op Care</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>

                <!-- Pediatric Cardiology -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-red-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">❤️</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pediatric Cardiology</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• Congenital Heart Disease</li>
                        <li>• Heart Murmurs</li>
                        <li>• Arrhythmias</li>
                        <li>• Echocardiograms</li>
                        <li>• Cardiac Surgery</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>

                <!-- Behavioral Health -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">🧠</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Behavioral Health</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• ADHD Assessment</li>
                        <li>• Autism Spectrum</li>
                        <li>• Anxiety & Depression</li>
                        <li>• Developmental Delays</li>
                        <li>• Family Counseling</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>

                <!-- Emergency Care -->
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                    <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-2xl">🚨</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pediatric Emergency</h3>
                    <ul class="text-gray-600 space-y-2 mb-6">
                        <li>• 24/7 Emergency Care</li>
                        <li>• Trauma Center</li>
                        <li>• Critical Care Transport</li>
                        <li>• Urgent Care</li>
                        <li>• Child Life Services</li>
                    </ul>
                    <button class="text-blue-600 font-semibold hover:text-blue-700 transition-colors">Learn More →</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Specialties -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Pediatric Specialties</h2>
                <p class="text-xl text-gray-600">Specialized care for complex pediatric conditions.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php 
                $specialties = [
                    ['name' => 'Pediatric Cardiology', 'icon' => '❤️', 'color' => 'red'],
                    ['name' => 'Pediatric Neurology', 'icon' => '🧠', 'color' => 'purple'],
                    ['name' => 'Pediatric Orthopedics', 'icon' => '🦴', 'color' => 'blue'],
                    ['name' => 'Pediatric Oncology', 'icon' => '🎗️', 'color' => 'pink'],
                    ['name' => 'Pediatric Gastroenterology', 'icon' => '🔬', 'color' => 'green'],
                    ['name' => 'Pediatric Pulmonology', 'icon' => '🫁', 'color' => 'cyan'],
                    ['name' => 'Pediatric Endocrinology', 'icon' => '⚖️', 'color' => 'yellow'],
                    ['name' => 'Pediatric Urology', 'icon' => '🏥', 'color' => 'indigo']
                ];
                
                foreach ($specialties as $specialty): ?>
                    <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow border border-gray-100 group">
                        <div class="text-3xl mb-3"><?php echo $specialty['icon']; ?></div>
                        <h3 class="font-semibold text-gray-800 group-hover:text-<?php echo $specialty['color']; ?>-600 transition-colors"><?php echo $specialty['name']; ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section id="doctors" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Pediatric Team</h2>
                <p class="text-xl text-gray-600">Experienced pediatricians who understand children and make healthcare fun and comfortable.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($pediatricsDoctors as $doctor): ?>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-shadow border border-gray-100">
                        <div class="h-64 bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 flex items-center justify-center">
                            <div class="w-32 h-32 bg-gradient-to-br from-blue-200 to-purple-200 rounded-full flex items-center justify-center">
                                <span class="text-2xl font-bold text-blue-700"><?php echo strtoupper(substr($doctor['name'], 0, 2)); ?></span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-2"><?php echo $doctor['name']; ?></h3>
                            <p class="text-blue-600 font-medium mb-3"><?php echo $doctor['specialization']; ?></p>
                            <p class="text-gray-600 text-sm mb-4"><?php echo $doctor['experience']; ?> years of experience</p>
                            
                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Expertise:</h4>
                                <div class="flex flex-wrap gap-2">
                                    <?php foreach ($doctor['expertise'] as $skill): ?>
                                        <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs"><?php echo $skill; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="font-semibold text-gray-800 mb-2">Available:</h4>
                                <p class="text-gray-600 text-sm"><?php echo implode(', ', $doctor['schedule']); ?></p>
                            </div>

                            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Child-Friendly Environment -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Child-Friendly Environment</h2>
                <p class="text-xl text-gray-600">We've designed our spaces to be welcoming and comfortable for children and families.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Our Facilities</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🎨</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Colorful Play Areas</h4>
                                <p class="text-gray-600">Bright, engaging spaces that help children feel comfortable and entertained.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🧸</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Comfort Items</h4>
                                <p class="text-gray-600">Toys, books, and comfort items to help reduce anxiety during visits.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">👨‍👩‍👧‍👦</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Family-Centered Care</h4>
                                <p class="text-gray-600">Comfortable spaces for families to stay with their children during treatment.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">🎪</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800 mb-2">Child Life Services</h4>
                                <p class="text-gray-600">Specially trained staff to help children cope with medical procedures.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Making Healthcare Fun</h3>
                    <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl p-8">
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div class="text-center">
                                <div class="text-3xl mb-2">🎈</div>
                                <div class="font-semibold text-gray-800">Interactive Games</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl mb-2">📚</div>
                                <div class="font-semibold text-gray-800">Story Time</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl mb-2">🎭</div>
                                <div class="font-semibold text-gray-800">Art Therapy</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl mb-2">🎵</div>
                                <div class="font-semibold text-gray-800">Music Therapy</div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-center">
                            We use play therapy and entertainment to help children feel at ease during their medical visits.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Parent Resources -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Resources for Parents</h2>
                <p class="text-xl text-gray-600">Helpful information and tools to support your child's health and development.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">📊</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Growth Charts</h3>
                    <p class="text-gray-600 mb-6">Track your child's growth and development with our interactive charts and tools.</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        View Charts
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">💉</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Vaccination Schedule</h3>
                    <p class="text-gray-600 mb-6">Stay up-to-date with recommended vaccinations for your child's age group.</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        View Schedule
                    </button>
                </div>

                <div class="bg-white rounded-2xl p-8 shadow-xl border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl">🏠</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Home Care Tips</h3>
                    <p class="text-gray-600 mb-6">Practical advice for caring for sick children and managing common conditions at home.</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Get Tips
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Give Your Child the Best Care</h2>
            <p class="text-xl mb-8 text-blue-100">Schedule an appointment with our pediatric specialists who understand children's unique needs.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Book Appointment
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    24/7 Nurse Line: (555) 123-KIDS
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
