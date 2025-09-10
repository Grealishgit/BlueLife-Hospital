<?php
// Include the centralized doctors data
require_once 'app/Data/doctors.php';

// Get all doctors from centralized data
$allDoctors = DoctorsData::getAllDoctors();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>All Doctors - Sheywe Community Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #b2bceaff 0%, #71a4deff 100%);
        min-height: 100vh;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .doctor-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }

    .doctor-card:hover {
        transform: translateY(-10px) rotateX(5deg);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .search-glass {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    .slide-in {
        animation: slideIn 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes slideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .filter-button {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .filter-button:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: scale(1.05);
    }

    .filter-button.active {
        background: rgba(59, 130, 246, 0.8);
        color: white;
    }

    .specialty-badge {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    </style>
</head>

<body>
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'app/Views/loginModal.php'; ?>

    <!-- Hero Section with Glass Effect -->
    <section class="pt-24 pb-12">
        <div class="container mx-auto px-4">
            <div class="glass-effect rounded-2xl p-8 text-center text-white mb-8 floating-animation">
                <h1 class="text-5xl font-bold mb-4">Meet Our Expert Doctors</h1>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    Discover our team of highly qualified medical professionals dedicated to providing exceptional
                    healthcare services.
                </p>
            </div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="pb-8">
        <div class="container mx-auto px-4">
            <div class="search-glass rounded-xl p-6 mb-8">
                <div class="flex flex-col lg:flex-row gap-4 items-center">
                    <!-- Search Input -->
                    <div class="flex-1 relative">
                        <input type="text" id="doctorSearch" placeholder="Search doctors by name or specialty..."
                            class="w-full px-4 py-3 pl-12 rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white/70">
                            🔍
                        </div>
                    </div>

                    <!-- Sort Dropdown -->
                    <select id="sortSelect"
                        class="px-4 py-3 rounded-lg bg-sky-300 backdrop-blur-sm border border-white/30 text-white focus:outline-none focus:ring-2 focus:ring-white/50">
                        <option value="name">Sort by Name</option>
                        <option value="specialty">Sort by Specialty</option>
                        <option value="experience">Sort by Experience</option>
                        <option value="rating">Sort by Rating</option>
                    </select>
                </div>

                <!-- Specialty Filters -->
                <div class="mt-6 flex flex-col justify-center items-center">
                    <p class="text-white mb-3 font-semibold">Filter by Specialty:</p>
                    <div class="flex flex-wrap gap-3">
                        <button class="filter-button active rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="all">
                            All
                            Specialists</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="cardiology">Cardiology</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="neurology">Neurology</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="pediatrics">Pediatrics</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="orthopedics">Orthopedics</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="dermatology">Dermatology</button>
                        <button class="filter-button rounded-full cursor-pointer px-4 py-2 text-white"
                            data-specialty="psychiatry">Psychiatry</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Grid -->
    <section class="pb-16">
        <div class="container mx-auto px-4">
            <div id="doctorsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Doctor cards will be generated here -->
            </div>

            <!-- No Results Message -->
            <div id="noResults" class="hidden text-center py-12">
                <div class="glass-effect rounded-xl p-8 text-white">
                    <div class="text-6xl mb-4">👨‍⚕️</div>
                    <h3 class="text-2xl font-bold mb-2">No doctors found</h3>
                    <p class="opacity-80">Try adjusting your search criteria or filters.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'app/Views/footer.php'; ?>

    <script>
    // Get doctors data from PHP
    const doctors = <?php echo json_encode(array_values($allDoctors)); ?>;

    let filteredDoctors = [...doctors];
    let currentFilter = 'all';
    let currentSort = 'name';

    // Generate doctor card HTML
    function createDoctorCard(doctor) {
        return `
                <div class="doctor-card rounded-md border-2 hover:border-blue-500 hover:shadow-2xl shadow-white p-6 slide-in cursor-pointer"
                 data-doctor-id="${doctor.id}">
                    <div class="relative mb-4">
                        <img src="${doctor.image}" alt="${doctor.name}"
                         class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-white shadow-lg">
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                            <span class="specialty-badge">${doctor.specialtyDisplay}</span>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">${doctor.name}</h3>
                        <p class="text-gray-600 mb-2">${doctor.education}</p>
                        <div class="flex items-center justify-center mb-2">
                            <span class="text-yellow-500">⭐</span>
                            <span class="text-gray-700 ml-1 font-semibold">${doctor.rating}</span>
                            <span class="text-gray-500 ml-2">${doctor.experience_years} years exp.</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                        <div class="flex items-center justify-between">
                            <span>💬 Languages:</span>
                            <span class="font-medium">${doctor.languages.join(', ')}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>📅 Available:</span>
                            <span class="font-medium">${doctor.availability}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>💰 Consultation:</span>
                            <span class="font-medium text-blue-600"> <span>Ksh</span> ${doctor.consultation_fee}</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-700 text-sm mb-4 line-clamp-2">${doctor.bio}</p>
                    
                    <div class="flex md:flex-row flex-col gap-2">
                        <a href="appointment.php"
                                class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                            Book Now
                        </a>
                        <button onclick="event.stopPropagation(); viewProfile(${doctor.id})" 
                                class="flex-1 bg-gray-200 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                            View Profile
                        </button>
                    </div>
                </div>
            `;
    }

    // Render doctors grid
    function renderDoctors() {
        const grid = document.getElementById('doctorsGrid');
        const noResults = document.getElementById('noResults');

        if (filteredDoctors.length === 0) {
            grid.innerHTML = '';
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
            grid.innerHTML = filteredDoctors.map(createDoctorCard).join('');

            // Add staggered animation
            const cards = grid.querySelectorAll('.doctor-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        }
    }

    // Filter doctors by specialty
    function filterDoctors(specialty) {
        currentFilter = specialty;

        if (specialty === 'all') {
            filteredDoctors = [...doctors];
        } else {
            filteredDoctors = doctors.filter(doctor => doctor.specialty === specialty);
        }

        applySearch();
        sortDoctors(currentSort);
        renderDoctors();
    }

    // Search functionality
    function applySearch() {
        const searchTerm = document.getElementById('doctorSearch').value.toLowerCase();

        if (searchTerm) {
            filteredDoctors = filteredDoctors.filter(doctor =>
                doctor.name.toLowerCase().includes(searchTerm) ||
                doctor.specialtyDisplay.toLowerCase().includes(searchTerm) ||
                doctor.education.toLowerCase().includes(searchTerm)
            );
        }
    }

    // Sort doctors
    function sortDoctors(sortBy) {
        currentSort = sortBy;

        filteredDoctors.sort((a, b) => {
            switch (sortBy) {
                case 'name':
                    return a.name.localeCompare(b.name);
                case 'specialty':
                    return a.specialtyDisplay.localeCompare(b.specialtyDisplay);
                case 'experience':
                    return b.experience_years - a.experience_years;
                case 'rating':
                    return b.rating - a.rating;
                default:
                    return 0;
            }
        });
    }

    // Event listeners
    document.getElementById('doctorSearch').addEventListener('input', () => {
        filteredDoctors = currentFilter === 'all' ? [...doctors] : doctors.filter(doctor => doctor.specialty ===
            currentFilter);
        applySearch();
        sortDoctors(currentSort);
        renderDoctors();
    });

    document.getElementById('sortSelect').addEventListener('change', (e) => {
        sortDoctors(e.target.value);
        renderDoctors();
    });

    // Filter button functionality
    document.querySelectorAll('.filter-button').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.filter-button').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            filterDoctors(button.dataset.specialty);
        });
    });

    // Doctor interaction functions
    // function openDoctorModal(doctorId) {
    //     const doctor = doctors.find(d => d.id === doctorId);
    //     alert(
    //         `Opening profile for ${doctor.name}\n\nSpecialty: ${doctor.specialtyDisplay}\nExperience: ${doctor.experience} years\nRating: ${doctor.rating}⭐\n\n${doctor.about}`
    //     );
    // }

    function bookAppointment(doctorId) {
        const doctor = doctors.find(d => d.id === doctorId);
        alert(
            `Booking appointment with ${doctor.name}\nConsultation Fee: $Ksh${doctor.consultationFee}\n\nRedirecting to booking form...`
        );
        // Here you can open the booking modal or redirect to booking page
    }

    function viewProfile(doctorId) {
        window.location.href = `doctor-profile.php?id=${doctorId}`;
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
        renderDoctors();
    });
    </script>
</body>

</html>