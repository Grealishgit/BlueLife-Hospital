<!-- Booking Modal -->
<style>
.hide-scrollbar {
    /* Hide scrollbar for IE, Edge and Firefox */
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}

/* Hide scrollbar for Chrome, Safari and Opera */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>

<div id="bookingModal"
    class="fixed inset-0 z-50 flex items-center  mt-19 justify-center bg-black/20 backdrop-blur-md bg-opacity-50 hidden">
    <div
        class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative mx-4 max-h-[90vh] overflow-y-auto hide-scrollbar">
        <button onclick="closeBookingModal()"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Book Consultation</h2>
            <p id="serviceTitle" class="text-blue-600 font-semibold text-lg"></p>
        </div>

        <form id="bookingForm" class="space-y-6" onsubmit="return checkLoginStatus(event)">
            <input type="hidden" id="selectedService" name="service">

            <!-- Patient Information -->
            <!-- <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Patient Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name
                            *</label>
                        <input type="text" id="firstName" name="firstName" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name
                            *</label>
                        <input type="text" id="lastName" name="lastName" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address
                            *</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number
                            *</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="dateOfBirth" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth
                            *</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender *</label>
                        <select id="gender" name="gender" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer-not-to-say">Prefer not to say</option>
                        </select>
                    </div>
                </div>
            </div> -->

            <!-- Appointment Details -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Appointment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="preferredDate" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                            Date
                            *</label>
                        <input type="date" id="preferredDate" name="preferredDate" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="preferredTime" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                            Time
                            *</label>
                        <select id="preferredTime" name="preferredTime" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="09:30">9:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="16:30">4:30 PM</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="appointmentType" class="block text-sm font-medium text-gray-700 mb-1">Appointment
                            Type *</label>
                        <select id="appointmentType" name="appointmentType" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Type</option>
                            <option value="consultation">Initial Consultation</option>
                            <option value="follow-up">Follow-up Visit</option>
                            <option value="routine-checkup">Routine Check-up</option>
                            <option value="urgent">Urgent Care</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Medical Information -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Medical Information</h3>
                <div class="space-y-4">
                    <div>
                        <label for="reasonForVisit" class="block text-sm font-medium text-gray-700 mb-1">Reason for
                            Visit *</label>
                        <textarea id="reasonForVisit" name="reasonForVisit" rows="3" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Please describe your symptoms or reason for the consultation"></textarea>
                    </div>
                    <div>
                        <label for="currentMedications" class="block text-sm font-medium text-gray-700 mb-1">Current
                            Medications</label>
                        <textarea id="currentMedications" name="currentMedications" rows="2"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="List any medications you are currently taking"></textarea>
                    </div>
                    <div>
                        <label for="allergies" class="block text-sm font-medium text-gray-700 mb-1">Allergies</label>
                        <input type="text" id="allergies" name="allergies"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="List any known allergies">
                    </div>
                    <div>
                        <label for="medicalHistory" class="block text-sm font-medium text-gray-700 mb-1">Medical
                            History</label>
                        <textarea id="medicalHistory" name="medicalHistory" rows="2"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Brief medical history or previous conditions"></textarea>
                    </div>
                </div>
            </div>

            <!-- Insurance Information -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Insurance Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="insuranceProvider" class="block text-sm font-medium text-gray-700 mb-1">Insurance
                            Provider</label>
                        <input type="text" id="insuranceProvider" name="insuranceProvider"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Blue Cross Blue Shield">
                    </div>
                    <div>
                        <label for="policyNumber" class="block text-sm font-medium text-gray-700 mb-1">Policy
                            Number</label>
                        <input type="text" id="policyNumber" name="policyNumber"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Your insurance policy number">
                    </div>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="space-y-4">
                <div class="flex items-start">
                    <input type="checkbox" id="termsAccepted" name="termsAccepted" required
                        class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="termsAccepted" class="ml-2 text-sm text-gray-700">
                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-800">Terms and
                            Conditions</a>
                        and <a href="#" class="text-blue-600 hover:text-blue-800">Privacy Policy</a> *
                    </label>
                </div>
                <div class="flex items-start">
                    <input type="checkbox" id="consentTreatment" name="consentTreatment" required
                        class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="consentTreatment" class="ml-2 text-sm text-gray-700">
                        I consent to receive medical treatment and understand that no guarantee has been made
                        regarding
                        the outcome *
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4">
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Book Appointment
                </button>
                <button type="button" onclick="closeBookingModal()"
                    class="flex-1 bg-gray-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-600 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Service details for different specialties
const serviceDetails = {
    'emergency': {
        title: 'Emergency Care Consultation',
        description: '24/7 emergency medical services'
    },
    'cardiology': {
        title: 'Cardiology Consultation',
        description: 'Heart and cardiovascular care'
    },
    'neurology': {
        title: 'Neurology Consultation',
        description: 'Brain and nervous system care'
    },
    'pediatrics': {
        title: 'Pediatrics Consultation',
        description: 'Healthcare for children and adolescents'
    },
    'orthopedics': {
        title: 'Orthopedics Consultation',
        description: 'Bone, joint, and muscle care'
    },
    'obgyn': {
        title: 'OB/GYN Consultation',
        description: 'Women\'s health and reproductive care'
    }
};

function openBookingModal(service) {
    const modal = document.getElementById('bookingModal');
    const serviceTitle = document.getElementById('serviceTitle');
    const selectedService = document.getElementById('selectedService');

    // Set service details
    if (serviceDetails[service]) {
        serviceTitle.textContent = serviceDetails[service].title;
        selectedService.value = service;
    }

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('preferredDate').min = today;

    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden'; // Prevent background scrolling
}

function checkLoginStatus(e) {
    <?php if (!isset($_SESSION['user'])): ?>
    var modal = document.getElementById('loginModal');
    if (modal) {
        modal.classList.remove('hidden');
    } else {
        alert('Login modal not found.');
    }
    if (e) e.preventDefault();
    return false;
    <?php endif; ?>
    return true;
}

function closeBookingModal() {
    const modal = document.getElementById('bookingModal');
    modal.classList.add('hidden');
    document.body.style.overflow = ''; // Restore scrolling

    // Reset form
    document.getElementById('bookingForm').reset();
}

// Handle form submission
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form data
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);

    // Basic validation
    const requiredFields = ['preferredDate', 'preferredTime', 'appointmentType', 'reasonForVisit'];
    const missingFields = requiredFields.filter(field => !data[field]);

    if (missingFields.length > 0) {
        alert('Please fill in all required fields.');
        return;
    }

    if (!data.termsAccepted || !data.consentTreatment) {
        alert('Please accept the terms and conditions and consent to treatment.');
        return;
    }

    // Simulate booking submission
    const serviceName = serviceDetails[data.service]?.title || 'Medical Consultation';

    alert(
        `Appointment booked successfully!\n\nService: ${serviceName}\nDate: ${data.preferredDate}\nTime: ${data.preferredTime}\n\nYou will receive a confirmation email shortly.`
    );

    closeBookingModal();

    // Here you would typically send the data to your backend
    console.log('Booking data:', data);
});

// Close modal when clicking outside
document.getElementById('bookingModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeBookingModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !document.getElementById('bookingModal').classList.contains('hidden')) {
        closeBookingModal();
    }
});
</script>
</body>

</html>