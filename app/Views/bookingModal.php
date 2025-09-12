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
            class="absolute top-4 right-4 text-gray-500 hover:text-red-500 mr-4 cursor-pointer text-4xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Book Consultation</h2>
            <p id="serviceTitle" class="text-blue-600 font-semibold text-lg"></p>
        </div>

        <form id="bookingForm" class="space-y-6" onsubmit="return submitConsultation(event)">
            <input type="hidden" id="selectedService" name="consultation_type">

            <!-- Patient Information -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Patient Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name
                            *</label>
                        <input type="text" id="firstName" name="first_name" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name
                            *</label>
                        <input type="text" id="lastName" name="last_name" required
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
                        <label for="yearOfBirth" class="block text-sm font-medium text-gray-700 mb-1">Year of Birth
                            *</label>
                        <select id="yearOfBirth" name="year_of_birth" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Year</option>
                        </select>
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender *</label>
                        <select id="gender" name="gender" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Appointment Details -->
            <div class="border-b pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Appointment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="preferredDate" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                            Date
                            *</label>
                        <input type="date" id="preferredDate" name="preferred_date" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="preferredTime" class="block text-sm font-medium text-gray-700 mb-1">Preferred
                            Time
                            *</label>
                        <select id="preferredTime" name="preferred_time" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select Time</option>
                            <option value="09:00:00">9:00 AM</option>
                            <option value="09:30:00">9:30 AM</option>
                            <option value="10:00:00">10:00 AM</option>
                            <option value="10:30:00">10:30 AM</option>
                            <option value="11:00:00">11:00 AM</option>
                            <option value="11:30:00">11:30 AM</option>
                            <option value="14:00:00">2:00 PM</option>
                            <option value="14:30:00">2:30 PM</option>
                            <option value="15:00:00">3:00 PM</option>
                            <option value="15:30:00">3:30 PM</option>
                            <option value="16:00:00">4:00 PM</option>
                            <option value="16:30:00">4:30 PM</option>
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
                        <textarea id="reasonForVisit" name="reason_for_visit" rows="3" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Please describe your symptoms or reason for the consultation"></textarea>
                    </div>
                    <div>
                        <label for="additionalNotes" class="block text-sm font-medium text-gray-700 mb-1">Additional
                            Notes</label>
                        <textarea id="additionalNotes" name="additional_notes" rows="2"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Any additional information you'd like to share"></textarea>
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
                    class="flex-1 bg-blue-600 cursor-pointer text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Book Consultation
                </button>
                <button type="button" onclick="closeBookingModal()"
                    class="flex-1 bg-gray-500 text-white py-3 px-6 cursor-pointer rounded-lg font-semibold hover:bg-gray-600 transition-colors">
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
        },
        'general': {
            title: 'General Medical Consultation',
            description: 'General healthcare and medical consultation'
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

        // Populate year of birth dropdown
        populateYearDropdown();

        // Pre-fill user data if logged in
        <?php if (isset($_SESSION['user'])): ?>
            const userData = <?php echo json_encode($_SESSION['user']); ?>;
            if (userData) {
                document.getElementById('firstName').value = userData.first_name || '';
                document.getElementById('lastName').value = userData.last_name || '';
                document.getElementById('email').value = userData.email || '';
                document.getElementById('phone').value = userData.phone || '';
                if (userData.gender) {
                    document.getElementById('gender').value = userData.gender;
                }
                if (userData.dob) {
                    const birthYear = new Date(userData.dob).getFullYear();
                    document.getElementById('yearOfBirth').value = birthYear;
                }
            }
        <?php endif; ?>

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function populateYearDropdown() {
        const yearSelect = document.getElementById('yearOfBirth');
        const currentYear = new Date().getFullYear();
        const startYear = currentYear - 100; // 100 years ago

        // Clear existing options except the first one
        yearSelect.innerHTML = '<option value="">Select Year</option>';

        // Add years from current year back to 100 years ago
        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
    }

    function submitConsultation(e) {
        e.preventDefault();

        const form = document.getElementById('bookingForm');
        const formData = new FormData(form);

        // Add action for the consultation handler
        formData.append('action', 'create_consultation');

        // Basic client-side validation
        const requiredFields = ['first_name', 'last_name', 'email', 'phone', 'gender', 'year_of_birth', 'consultation_type',
            'preferred_date', 'preferred_time', 'reason_for_visit'
        ];
        const missingFields = [];

        requiredFields.forEach(field => {
            if (!formData.get(field)) {
                missingFields.push(field);
            }
        });

        if (missingFields.length > 0) {
            if (typeof showToast !== 'undefined') {
                showToast.error('Please fill in all required fields.');
            } else {
                alert('Please fill in all required fields.');
            }
            return false;
        }

        if (!formData.get('termsAccepted') || !formData.get('consentTreatment')) {
            if (typeof showToast !== 'undefined') {
                showToast.warning('Please accept the terms and conditions and consent to treatment.');
            } else {
                alert('Please accept the terms and conditions and consent to treatment.');
            }
            return false;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Submitting...';
        submitBtn.disabled = true;

        // Submit to consultation handler
        fetch('app/consultation-handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (typeof showToast !== 'undefined') {
                        showToast.success('Consultation request submitted successfully! We will contact you shortly to confirm your appointment.');
                    } else {
                        alert('Consultation request submitted successfully! We will contact you shortly to confirm your appointment.');
                    }
                    closeBookingModal();
                    form.reset();
                } else {
                    if (typeof showToast !== 'undefined') {
                        showToast.error('Error: ' + data.message);
                    } else {
                        alert('Error: ' + data.message);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (typeof showToast !== 'undefined') {
                    showToast.error('An error occurred while submitting your request. Please try again.');
                } else {
                    alert('An error occurred while submitting your request. Please try again.');
                }
            })
            .finally(() => {
                // Reset button state
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });

        return false;
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
    document.addEventListener('DOMContentLoaded', function() {
        // The form submission is now handled by the submitConsultation function
        // which is called from the form's onsubmit attribute

        // Populate year dropdown when page loads
        populateYearDropdown();
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