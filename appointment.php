<?php
session_start();
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
    <title>Book Appointment - Sheywe Community Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
    }

    .step-indicator {
        transition: all 0.3s ease;
    }

    .step-indicator.active {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        transform: scale(1.1);
    }

    .step-indicator.completed {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .form-step {
        display: none;
        animation: slideIn 0.3s ease-in-out;
    }

    .form-step.active {
        display: block;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 0.5rem;
    }

    .calendar-day {
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .calendar-day:hover {
        background: rgba(59, 130, 246, 0.1);
    }

    .calendar-day.available {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
    }

    .calendar-day.selected {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
    }

    .time-slot {
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .time-slot:hover {
        background: rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    .time-slot.selected {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .doctor-card.selected {
        border-color: #3b82f6;
        background: rgba(59, 130, 246, 0.05);
    }

    .department-btn.selected {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        border-color: transparent;
    }

    /* Print styles */
    @media print {
        body {
            background: white !important;
        }

        /* Hide everything except the modal content when printing */
        .min-h-screen,
        nav,
        footer,
        .step-indicator,
        .glass-card {
            display: none !important;
        }

        /* Show only the success modal content */
        #successModal {
            position: static !important;
            background: transparent !important;
            display: block !important;
        }

        #successModal .bg-white {
            border: none !important;
            box-shadow: none !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 20px !important;
        }

        /* Optimize QR code for print */
        #qrCodeContainer {
            display: flex !important;
            justify-content: center !important;
            margin: 20px 0 !important;
        }

        /* Hide modal buttons in print */
        #successModal button {
            display: none !important;
        }

        /* Print-specific styles */
        h3 {
            font-size: 18px !important;
            margin-bottom: 10px !important;
        }

        p {
            font-size: 14px !important;
            margin-bottom: 5px !important;
        }
    }
    </style>
</head>

<body>
    <?php include 'app/Views/navbar.php'; ?>

    <div class="min-h-screen pt-20 pb-12">
        <div class="container mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Book Your Appointment</h1>
                <p class="text-white/80 text-lg max-w-2xl mx-auto">Schedule your visit with our expert medical team in
                    just a few simple steps</p>
            </div>

            <!-- Step Indicator -->
            <div class="flex justify-center mb-12">
                <div class="flex items-center space-x-4">
                    <div class="step-indicator active w-12 h-12 rounded-full flex items-center justify-center text-white font-bold"
                        data-step="1">1</div>
                    <div class="w-16 h-1 bg-white/30 rounded"></div>
                    <div class="step-indicator w-12 h-12 rounded-full flex items-center justify-center text-white/50 font-bold bg-white/20"
                        data-step="2">2</div>
                    <div class="w-16 h-1 bg-white/30 rounded"></div>
                    <div class="step-indicator w-12 h-12 rounded-full flex items-center justify-center text-white/50 font-bold bg-white/20"
                        data-step="3">3</div>
                    <div class="w-16 h-1 bg-white/30 rounded"></div>
                    <div class="step-indicator w-12 h-12 rounded-full flex items-center justify-center text-white/50 font-bold bg-white/20"
                        data-step="4">4</div>
                </div>
            </div>

            <!-- Main Form -->
            <div class="max-w-4xl mx-auto glass-card p-8">
                <form id="appointmentForm">

                    <!-- Step 1: Department & Doctor Selection -->
                    <div class="form-step active" data-step="1">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Select Department & Doctor</h2>

                        <!-- Department Filter -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-3">Choose Department</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                <button type="button"
                                    class="department-btn selected p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 transition-colors"
                                    data-specialty="all">
                                    <div class="text-2xl mb-1">🏥</div>
                                    <div class="text-sm font-medium">All Departments</div>
                                </button>
                                <?php foreach ($specialties as $specialty): ?>
                                <button type="button"
                                    class="department-btn cursor-pointer p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 transition-colors"
                                    data-specialty="<?php echo strtolower($specialty); ?>">
                                    <div class="text-2xl mb-1">
                                        <?php
                                            $icons = [
                                                'cardiology' => '❤️',
                                                'neurology' => '🧠',
                                                'pediatrics' => '👶',
                                                'orthopedics' => '🦴',
                                                'dermatology' => '🧴',
                                                'general medicine' => '👨‍⚕️'
                                            ];
                                            echo $icons[strtolower($specialty)] ?? '🏥';
                                            ?>
                                    </div>
                                    <div class="text-sm font-medium"><?php echo $specialty; ?></div>
                                </button>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Doctor Selection -->
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-3">Select Doctor</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="doctorsList">
                                <?php foreach ($doctors as $doctor): ?>
                                <div class="doctor-card border border-gray-200 rounded-lg p-4 cursor-pointer hover:border-blue-500 transition-colors"
                                    data-doctor-id="<?php echo $doctor['id']; ?>"
                                    data-specialty="<?php echo strtolower($doctor['specialty']); ?>">
                                    <div class="flex items-center space-x-4">
                                        <img src="<?php echo $doctor['image']; ?>" alt="<?php echo $doctor['name']; ?>"
                                            class="w-16 h-16 rounded-full object-cover">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-800"><?php echo $doctor['name']; ?></h3>
                                            <p class="text-blue-600 font-medium"><?php echo $doctor['specialty']; ?></p>
                                            <p class="text-gray-600 text-sm"><?php echo $doctor['experience']; ?></p>
                                            <p class="text-green-600 font-medium">
                                                Ksh <?php echo $doctor['consultation_fee']; ?></p>
                                        </div>
                                        <div class="text-yellow-500">
                                            ⭐ <?php echo $doctor['rating']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button"
                                class="next-btn px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg cursor-pointer
                                font-medium hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 disabled:opacity-50"
                                disabled>Next: Select Date & Time</button>
                        </div>
                    </div>

                    <!-- Step 2: Date & Time Selection -->
                    <div class="form-step" data-step="2">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Select Date & Time</h2>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Calendar -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Choose Date</h3>
                                <div class="bg-white border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <button type="button" id="prevMonth"
                                            class="p-2 hover:bg-gray-100 rounded">&lt;</button>
                                        <h4 class="text-lg font-semibold" id="currentMonth"></h4>
                                        <button type="button" id="nextMonth"
                                            class="p-2 hover:bg-gray-100 rounded">&gt;</button>
                                    </div>
                                    <div class="calendar-grid text-center text-sm">
                                        <div class="font-medium text-gray-500">Sun</div>
                                        <div class="font-medium text-gray-500">Mon</div>
                                        <div class="font-medium text-gray-500">Tue</div>
                                        <div class="font-medium text-gray-500">Wed</div>
                                        <div class="font-medium text-gray-500">Thu</div>
                                        <div class="font-medium text-gray-500">Fri</div>
                                        <div class="font-medium text-gray-500">Sat</div>
                                    </div>
                                    <div class="calendar-grid mt-2" id="calendarDays"></div>
                                </div>
                            </div>

                            <!-- Time Slots -->
                            <div>
                                <h3 class="text-lg font-medium text-gray-800 mb-4">Available Time Slots</h3>
                                <div class="space-y-3" id="timeSlots">
                                    <p class="text-gray-500">Please select a date first</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="prev-btn px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">Previous</button>
                            <button type="button"
                                class="next-btn px-6 py-3 bg-gradient-to-r cursor-pointer from-blue-500 to-purple-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105 disabled:opacity-50"
                                disabled>Next: Patient Information</button>
                        </div>
                    </div>

                    <!-- Step 3: Patient Information -->
                    <div class="form-step" data-step="3">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Patient Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">First Name *</label>
                                <input type="text" name="firstName" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Last Name *</label>
                                <input type="text" name="lastName" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Email *</label>
                                <input type="email" name="email" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Phone Number *</label>
                                <input type="tel" name="phone" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Date of Birth *</label>
                                <input type="date" name="dob" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Gender *</label>
                                <select name="gender" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 font-medium mb-2">Insurance Provider</label>
                            <select name="insurance"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors">
                                <option value="">Select Insurance (Optional)</option>
                                <option value="blue-cross">Blue Cross Blue Shield</option>
                                <option value="aetna">Aetna</option>
                                <option value="cigna">Cigna</option>
                                <option value="united">United Healthcare</option>
                                <option value="medicare">Medicare</option>
                                <option value="medicaid">Medicaid</option>
                                <option value="other">Other</option>
                                <option value="self-pay">Self Pay</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 font-medium mb-2">Reason for Visit</label>
                            <textarea name="reason" rows="3"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                                placeholder="Please describe the reason for your visit..."></textarea>
                        </div>

                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="prev-btn px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">Previous</button>
                            <button type="button"
                                class="next-btn px-6 py-3 cursor-pointer bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105">Next:
                                Review & Confirm</button>
                        </div>
                    </div>

                    <!-- Step 4: Confirmation -->
                    <div class="form-step" data-step="4">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Review & Confirm</h2>

                        <div class="bg-gray-50 rounded-lg p-6 space-y-4" id="appointmentSummary">
                            <!-- Summary will be populated by JavaScript -->
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                            <h3 class="font-medium text-blue-800 mb-2">Important Information:</h3>
                            <ul class="text-blue-700 text-sm space-y-1">
                                <li>• Please arrive 15 minutes before your appointment</li>
                                <li>• Bring a valid ID and insurance card</li>
                                <li>• Bring a list of current medications</li>
                                <li>• You can reschedule up to 24 hours in advance</li>
                            </ul>
                        </div>

                        <div class="flex items-center mt-6">
                            <input type="checkbox" id="terms" required
                                class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500">
                            <label for="terms" class="ml-2 text-gray-700">I agree to the <a href="#"
                                    class="text-blue-600 hover:underline">terms and conditions</a> and <a href="#"
                                    class="text-blue-600 hover:underline">privacy policy</a></label>
                        </div>

                        <div class="flex justify-between mt-8">
                            <button type="button"
                                class="prev-btn px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">Previous</button>
                            <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105">Confirm
                                Appointment</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-md border border-blue-500 p-8 max-w-md mx-4 text-center">
            <div class="text-6xl mb-4">✅</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Appointment Confirmed!</h3>
            <p class="text-gray-600 mb-6">Your appointment has been successfully booked. You will receive a confirmation
                email shortly.</p>

            <!-- QR Code Section -->
            <div class="flex flex-col items-center justify-center mb-6">
                <div id="qrCodeContainer" class="mb-2"></div>
                <p class="text-xs text-gray-500">Scan to view appointment details</p>
            </div>

            <div class="space-y-2">
                <button onclick="window.location.href='index.php'"
                    class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition-all">Return
                    Home</button>
                <button onclick="window.print()"
                    class="w-full px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                    Print
                    Confirmation</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    <script>
    // Appointment booking state
    let appointmentData = {
        doctor: null,
        date: null,
        time: null,
        patient: {}
    };

    let currentStep = 1;
    let selectedDate = null;
    let selectedTime = null;
    let selectedDoctor = null;

    // Show QR code in success modal
    function showQRCode() {
        // Gather appointment info
        const form = document.getElementById('appointmentForm');
        const formData = new FormData(form);
        const info = {
            doctor: selectedDoctor ? selectedDoctor.name : '',
            specialty: selectedDoctor ? selectedDoctor.specialty : '',
            date: selectedDate,
            time: selectedTime,
            name: formData.get('firstName') + ' ' + formData.get('lastName'),
            email: formData.get('email'),
            phone: formData.get('phone'),
            insurance: formData.get('insurance'),
            reason: formData.get('reason')
        };
        const qrText = JSON.stringify(info);
        const qrContainer = document.getElementById('qrCodeContainer');
        qrContainer.innerHTML = '';
        new QRCode(qrContainer, {
            text: qrText,
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }

    // Form submission
    document.getElementById('appointmentForm').addEventListener('submit', (e) => {
        e.preventDefault();
        document.getElementById('successModal').classList.remove('hidden');
        showQRCode();
    });

    // Initialize calendar
    let currentDate = new Date();

    function initializeCalendar() {
        updateCalendarDisplay();
    }

    function updateCalendarDisplay() {
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        document.getElementById('currentMonth').textContent =
            `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

        generateCalendarDays();
    }

    function generateCalendarDays() {
        const calendarDays = document.getElementById('calendarDays');
        calendarDays.innerHTML = '';

        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        const today = new Date();

        // Add empty cells for days before the first day of the month
        for (let i = 0; i < firstDay.getDay(); i++) {
            calendarDays.appendChild(document.createElement('div'));
        }

        // Add days of the month
        for (let day = 1; day <= lastDay.getDate(); day++) {
            const dayElement = document.createElement('div');
            const date = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

            dayElement.textContent = day;
            dayElement.className = 'calendar-day';

            // Disable past dates
            if (date < today.setHours(0, 0, 0, 0)) {
                dayElement.className += ' text-gray-300 cursor-not-allowed';
            } else {
                dayElement.className += ' available';
                dayElement.addEventListener('click', () => selectDate(date));
            }

            calendarDays.appendChild(dayElement);
        }
    }

    function selectDate(date) {
        // Remove previous selection
        document.querySelectorAll('.calendar-day.selected').forEach(el => {
            el.classList.remove('selected');
        });

        // Add selection to clicked date
        event.target.classList.add('selected');
        selectedDate = date;

        // Generate time slots for selected date
        generateTimeSlots(date);

        // Update step 2 next button
        updateStep2NextButton();
    }

    function generateTimeSlots(date) {
        const timeSlots = document.getElementById('timeSlots');
        const slots = ['09:00 AM', '09:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM',
            '02:00 PM', '02:30 PM', '03:00 PM', '03:30 PM', '04:00 PM', '04:30 PM'
        ];

        timeSlots.innerHTML = '<h4 class="font-medium text-gray-800 mb-3">Morning</h4>';

        // Morning slots
        const morningSlots = slots.slice(0, 6);
        morningSlots.forEach(time => {
            const slotElement = document.createElement('div');
            slotElement.className = 'time-slot p-3 border border-gray-200 rounded-lg text-center';
            slotElement.textContent = time;
            slotElement.addEventListener('click', () => selectTime(time, slotElement));
            timeSlots.appendChild(slotElement);
        });

        // Afternoon header
        const afternoonHeader = document.createElement('h4');
        afternoonHeader.className = 'font-medium text-gray-800 mb-3 mt-6';
        afternoonHeader.textContent = 'Afternoon';
        timeSlots.appendChild(afternoonHeader);

        // Afternoon slots
        const afternoonSlots = slots.slice(6);
        afternoonSlots.forEach(time => {
            const slotElement = document.createElement('div');
            slotElement.className = 'time-slot p-3 border border-gray-200 rounded-lg text-center';
            slotElement.textContent = time;
            slotElement.addEventListener('click', () => selectTime(time, slotElement));
            timeSlots.appendChild(slotElement);
        });
    }

    function selectTime(time, element) {
        // Remove previous selection
        document.querySelectorAll('.time-slot.selected').forEach(el => {
            el.classList.remove('selected');
        });

        // Add selection to clicked time
        element.classList.add('selected');
        selectedTime = time;

        // Update step 2 next button
        updateStep2NextButton();
    }

    function updateStep2NextButton() {
        const nextBtn = document.querySelector('[data-step="2"] .next-btn');
        nextBtn.disabled = !(selectedDate && selectedTime);
    }

    // Department filtering
    document.querySelectorAll('.department-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove previous selection
            document.querySelectorAll('.department-btn.selected').forEach(el => {
                el.classList.remove('selected');
            });

            // Add selection to clicked department
            btn.classList.add('selected');

            const specialty = btn.dataset.specialty;
            filterDoctors(specialty);
        });
    });

    function filterDoctors(specialty) {
        const doctorCards = document.querySelectorAll('.doctor-card');

        doctorCards.forEach(card => {
            if (specialty === 'all' || card.dataset.specialty === specialty) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Doctor selection
    document.querySelectorAll('.doctor-card').forEach(card => {
        card.addEventListener('click', () => {
            // Remove previous selection
            document.querySelectorAll('.doctor-card.selected').forEach(el => {
                el.classList.remove('selected');
            });

            // Add selection to clicked doctor
            card.classList.add('selected');
            selectedDoctor = {
                id: card.dataset.doctorId,
                name: card.querySelector('h3').textContent,
                specialty: card.querySelector('p').textContent,
                image: card.querySelector('img').src
            };

            // Enable next button
            document.querySelector('[data-step="1"] .next-btn').disabled = false;
        });
    });

    // Step navigation
    document.querySelectorAll('.next-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep < 4) {
                goToStep(currentStep + 1);
            }
        });
    });

    document.querySelectorAll('.prev-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 1) {
                goToStep(currentStep - 1);
            }
        });
    });

    function goToStep(step) {
        // Hide current step
        document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.remove('active');

        // Show new step
        document.querySelector(`.form-step[data-step="${step}"]`).classList.add('active');

        // Update step indicators
        updateStepIndicators(step);

        // Update current step
        currentStep = step;

        // Special handling for step 4 (summary)
        if (step === 4) {
            generateSummary();
        }
    }

    function updateStepIndicators(activeStep) {
        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            const stepNumber = index + 1;
            indicator.classList.remove('active', 'completed');

            if (stepNumber < activeStep) {
                indicator.classList.add('completed');
            } else if (stepNumber === activeStep) {
                indicator.classList.add('active');
            }
        });
    }

    function generateSummary() {
        const formData = new FormData(document.getElementById('appointmentForm'));
        const summary = document.getElementById('appointmentSummary');

        const formatDate = (date) => {
            return date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        };

        summary.innerHTML = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-medium text-gray-800 mb-2">Doctor Information</h3>
                        <div class="flex items-center space-x-3 mb-4">
                            <img src="${selectedDoctor.image}" alt="${selectedDoctor.name}" class="w-12 h-12 rounded-full object-cover">
                            <div>
                                <p class="font-medium">${selectedDoctor.name}</p>
                                <p class="text-blue-600 text-sm">${selectedDoctor.specialty}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-800 mb-2">Appointment Details</h3>
                        <p><strong>Date:</strong> ${formatDate(selectedDate)}</p>
                        <p><strong>Time:</strong> ${selectedTime}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-800 mb-2">Patient Information</h3>
                        <p><strong>Name:</strong> ${formData.get('firstName')} ${formData.get('lastName')}</p>
                        <p><strong>Email:</strong> ${formData.get('email')}</p>
                        <p><strong>Phone:</strong> ${formData.get('phone')}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-gray-800 mb-2">Additional Information</h3>
                        <p><strong>Insurance:</strong> ${formData.get('insurance') || 'Self Pay'}</p>
                        <p><strong>Reason:</strong> ${formData.get('reason') || 'General consultation'}</p>
                    </div>
                </div>
            `;
    }

    // Calendar navigation
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendarDisplay();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendarDisplay();
    });

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
        initializeCalendar();
    });
    </script>

    <?php include 'app/Views/footer.php'; ?>

</body>

</html>
</body>

</html>