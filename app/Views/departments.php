<?php
require_once 'app/Data/doctors.php';
$doctors = DoctorsData::getAllDoctors();
$specialties = DoctorsData::getSpecialties();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Medical Departments - BlueLife Hospital</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 50%, #581c87 100%);
            min-height: 100vh;
        }

        .department-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .department-card:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
        }

        .department-icon {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
            transition: all 0.3s ease;
        }

        .department-card:hover .department-icon {
            transform: scale(1.1) rotate(10deg);
        }

        .stats-counter {
            font-weight: bold;
            font-size: 2rem;
            color: #3b82f6;
        }

        .service-item {
            transition: all 0.2s ease;
            padding: 0.5rem;
            border-radius: 0.5rem;
        }

        .service-item:hover {
            background: rgba(59, 130, 246, 0.1);
            transform: translateX(5px);
        }

        .equipment-tag {
            background: linear-gradient(45deg, #10b981, #059669);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .contact-button {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .contact-button:hover {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .tab-button {
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tab-button.active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-color: transparent;
            transform: translateY(-2px);
        }

        .tab-button:hover:not(.active) {
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="min-h-screen pt-20 pb-12">
        <div class="container mx-auto px-4">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">Medical Departments</h1>
                <p class="text-white/90 text-lg max-w-3xl mx-auto">
                    Discover our comprehensive range of medical specialties and world-class healthcare services
                </p>
            </div>

            <!-- Department Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="text-center text-white">
                    <div class="stats-counter" data-target="12">0</div>
                    <p class="text-white/80">Departments</p>
                </div>
                <div class="text-center text-white">
                    <div class="stats-counter" data-target="150">0</div>
                    <p class="text-white/80">Specialists</p>
                </div>
                <div class="text-center text-white">
                    <div class="stats-counter" data-target="50000">0</div>
                    <p class="text-white/80">Patients/Year</p>
                </div>
                <div class="text-center text-white">
                    <div class="stats-counter" data-target="24">0</div>
                    <p class="text-white/80">Hours Service</p>
                </div>
            </div>

            <!-- Department Navigation Tabs -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="tab-button active" data-tab="overview">Overview</button>
                <button class="tab-button" data-tab="specialties">Specialties</button>
                <button class="tab-button" data-tab="services">Services</button>
                <button class="tab-button" data-tab="staff">Our Team</button>
            </div>

            <!-- Overview Tab -->
            <div class="tab-content active" id="overview">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- Cardiology Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">❤️</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Cardiology</h3>
                        <p class="text-gray-600 mb-6 text-center">Comprehensive heart care with advanced cardiac procedures and preventive treatments.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Cardiac catheterization</li>
                                <li>• Echocardiography</li>
                                <li>• Heart surgery</li>
                                <li>• Preventive cardiology</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">Advanced Equipment</div>
                            <p class="text-gray-600 text-sm">State-of-the-art cardiac imaging and intervention tools</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('cardiology')">Learn More</button>
                        </div>
                    </div>

                    <!-- Neurology Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">🧠</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Neurology</h3>
                        <p class="text-gray-600 mb-6 text-center">Expert care for neurological conditions with cutting-edge diagnostic technology.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Stroke treatment</li>
                                <li>• Epilepsy management</li>
                                <li>• Movement disorders</li>
                                <li>• Memory disorders</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">MRI & CT Scans</div>
                            <p class="text-gray-600 text-sm">Advanced neuroimaging and monitoring systems</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('neurology')">Learn More</button>
                        </div>
                    </div>

                    <!-- Pediatrics Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">👶</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Pediatrics</h3>
                        <p class="text-gray-600 mb-6 text-center">Specialized care for infants, children, and adolescents in a child-friendly environment.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Well-child checkups</li>
                                <li>• Immunizations</li>
                                <li>• Developmental assessments</li>
                                <li>• Pediatric emergencies</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">Child-Friendly</div>
                            <p class="text-gray-600 text-sm">Specially designed equipment and environment for children</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('pediatrics')">Learn More</button>
                        </div>
                    </div>

                    <!-- Orthopedics Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">🦴</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Orthopedics</h3>
                        <p class="text-gray-600 mb-6 text-center">Complete bone, joint, and muscle care with surgical and non-surgical treatments.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Joint replacement</li>
                                <li>• Sports medicine</li>
                                <li>• Spine surgery</li>
                                <li>• Trauma care</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">Robotic Surgery</div>
                            <p class="text-gray-600 text-sm">Minimally invasive surgical techniques</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('orthopedics')">Learn More</button>
                        </div>
                    </div>

                    <!-- Dermatology Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">🧴</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Dermatology</h3>
                        <p class="text-gray-600 mb-6 text-center">Comprehensive skin, hair, and nail care with cosmetic and medical treatments.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Skin cancer screening</li>
                                <li>• Acne treatment</li>
                                <li>• Cosmetic procedures</li>
                                <li>• Dermatologic surgery</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">Laser Technology</div>
                            <p class="text-gray-600 text-sm">Advanced laser and light-based treatments</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('dermatology')">Learn More</button>
                        </div>
                    </div>

                    <!-- General Medicine Department -->
                    <div class="department-card p-8">
                        <div class="department-icon">👨‍⚕️</div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">General Medicine</h3>
                        <p class="text-gray-600 mb-6 text-center">Primary care and internal medicine for comprehensive health management.</p>

                        <div class="space-y-3 mb-6">
                            <h4 class="font-semibold text-gray-800">Key Services:</h4>
                            <ul class="space-y-1 text-gray-600 text-sm">
                                <li>• Annual physical exams</li>
                                <li>• Chronic disease management</li>
                                <li>• Preventive care</li>
                                <li>• Health screenings</li>
                            </ul>
                        </div>

                        <div class="mb-6">
                            <div class="equipment-tag mb-2">Comprehensive Care</div>
                            <p class="text-gray-600 text-sm">Full-service primary care facilities</p>
                        </div>

                        <div class="text-center">
                            <button class="contact-button" onclick="openDepartmentModal('general-medicine')">Learn More</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Specialties Tab -->
            <div class="tab-content" id="specialties">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $specialtyDetails = [
                        'Cardiology' => ['Interventional Cardiology', 'Cardiac Surgery', 'Heart Failure', 'Arrhythmia'],
                        'Neurology' => ['Stroke Care', 'Epilepsy', 'Movement Disorders', 'Neurocritical Care'],
                        'Pediatrics' => ['Neonatology', 'Pediatric Surgery', 'Child Development', 'Pediatric Emergency'],
                        'Orthopedics' => ['Joint Replacement', 'Sports Medicine', 'Spine Surgery', 'Hand Surgery'],
                        'Dermatology' => ['Medical Dermatology', 'Cosmetic Dermatology', 'Dermatopathology', 'Pediatric Dermatology'],
                        'General Medicine' => ['Internal Medicine', 'Family Medicine', 'Geriatrics', 'Preventive Medicine']
                    ];

                    foreach ($specialtyDetails as $specialty => $subspecialties):
                    ?>
                        <div class="department-card p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4"><?php echo $specialty; ?></h3>
                            <div class="space-y-2">
                                <?php foreach ($subspecialties as $sub): ?>
                                    <div class="service-item">
                                        <span class="text-gray-700">• <?php echo $sub; ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Services Tab -->
            <div class="tab-content" id="services">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="department-card p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Diagnostic Services</h3>
                        <div class="space-y-3">
                            <div class="service-item">🏥 Laboratory Services</div>
                            <div class="service-item">📸 Medical Imaging (MRI, CT, X-Ray)</div>
                            <div class="service-item">🔬 Pathology Services</div>
                            <div class="service-item">❤️ Cardiac Testing</div>
                            <div class="service-item">🧪 Blood Bank</div>
                            <div class="service-item">🔍 Endoscopy Services</div>
                        </div>
                    </div>

                    <div class="department-card p-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Treatment Services</h3>
                        <div class="space-y-3">
                            <div class="service-item">🏥 Inpatient Care</div>
                            <div class="service-item">🚑 Emergency Services</div>
                            <div class="service-item">⚕️ Surgical Services</div>
                            <div class="service-item">💊 Pharmacy Services</div>
                            <div class="service-item">🏃‍♂️ Rehabilitation Services</div>
                            <div class="service-item">🧘‍♀️ Mental Health Services</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Staff Tab -->
            <div class="tab-content" id="staff">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $departmentHeads = array_slice($doctors, 0, 6);
                    foreach ($departmentHeads as $doctor):
                    ?>
                        <div class="department-card p-6">
                            <div class="text-center">
                                <img src="<?php echo $doctor['image']; ?>" alt="<?php echo $doctor['name']; ?>" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-lg font-bold text-gray-800"><?php echo $doctor['name']; ?></h3>
                                <p class="text-blue-600 font-medium mb-2">Head of <?php echo $doctor['specialty']; ?></p>
                                <p class="text-gray-600 text-sm mb-3"><?php echo $doctor['experience']; ?></p>
                                <div class="text-yellow-500 mb-4">⭐ <?php echo $doctor['rating']; ?></div>
                                <button onclick="window.location.href='doctor-profile.php?id=<?php echo $doctor['id']; ?>'" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg text-sm hover:from-blue-600 hover:to-purple-700 transition-all">
                                    View Profile
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Department Detail Modal -->
    <div id="departmentModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold text-gray-800" id="modalTitle">Department Details</h3>
                <button onclick="closeDepartmentModal()" class="text-gray-500 hover:text-gray-700 text-2xl">✕</button>
            </div>
            <div id="modalContent">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Counter animation
        function animateCounters() {
            const counters = document.querySelectorAll('.stats-counter');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.textContent = Math.floor(current).toLocaleString();
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target.toLocaleString();
                    }
                };

                updateCounter();
            });
        }

        // Tab functionality
        function initializeTabs() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetTab = button.getAttribute('data-tab');

                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Add active class to clicked button and corresponding content
                    button.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        }

        // Department modal
        function openDepartmentModal(department) {
            const modal = document.getElementById('departmentModal');
            const title = document.getElementById('modalTitle');
            const content = document.getElementById('modalContent');

            const departmentData = {
                'cardiology': {
                    title: 'Cardiology Department',
                    description: 'Our Cardiology Department provides comprehensive heart care with state-of-the-art technology and experienced cardiologists.',
                    services: [
                        'Cardiac Catheterization',
                        'Echocardiography',
                        'Stress Testing',
                        'Heart Surgery',
                        'Preventive Cardiology',
                        'Interventional Cardiology'
                    ],
                    equipment: [
                        'Advanced Cardiac Imaging',
                        'Catheterization Labs',
                        'Cardiac Monitors',
                        'Defibrillators',
                        'Pacemaker Programming'
                    ],
                    contact: 'Cardiology: (555) 123-HEART'
                },
                'neurology': {
                    title: 'Neurology Department',
                    description: 'Expert neurological care with advanced diagnostic and treatment capabilities for all neurological conditions.',
                    services: [
                        'Stroke Treatment',
                        'Epilepsy Management',
                        'Movement Disorders',
                        'Memory Disorders',
                        'Neurological Surgery',
                        'Pain Management'
                    ],
                    equipment: [
                        'MRI & CT Scans',
                        'EEG Monitoring',
                        'Neurological Testing',
                        'Surgical Navigation',
                        'Deep Brain Stimulation'
                    ],
                    contact: 'Neurology: (555) 123-BRAIN'
                }
                // Add more departments as needed
            };

            const dept = departmentData[department];
            if (dept) {
                title.textContent = dept.title;
                content.innerHTML = `
                    <div class="space-y-6">
                        <p class="text-gray-700 text-lg">${dept.description}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">Services Offered</h4>
                                <ul class="space-y-2">
                                    ${dept.services.map(service => `<li class="flex items-center space-x-2"><span class="text-blue-500">✓</span><span>${service}</span></li>`).join('')}
                                </ul>
                            </div>
                            
                            <div>
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">Equipment & Technology</h4>
                                <ul class="space-y-2">
                                    ${dept.equipment.map(equipment => `<li class="flex items-center space-x-2"><span class="text-green-500">⚡</span><span>${equipment}</span></li>`).join('')}
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h4 class="font-semibold text-blue-800 mb-2">Contact Information</h4>
                            <p class="text-blue-700">${dept.contact}</p>
                        </div>
                        
                        <div class="text-center">
                            <button onclick="window.location.href='appointment.php'" class="px-8 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition-all">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                `;
            }

            modal.classList.remove('hidden');
        }

        function closeDepartmentModal() {
            document.getElementById('departmentModal').classList.add('hidden');
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', () => {
            animateCounters();
            initializeTabs();
        });
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>