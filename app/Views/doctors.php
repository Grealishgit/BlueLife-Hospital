<div class='flex flex-col w-full mt-10 items-center'>
    <p class="text-3xl font-bold">Top <span class="text-blue-500">Doctors</span> to Book</p>
    <p class="text-center font-semibold text-gray-800">
        Simply browse through our extensive list of trusted doctors.
    </p>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8 w-full max-w-6xl flex px-4">
        <!-- Doctor Card 1 -->
        <div class="bg-white rounded-md shadow-md  shadow-gray-300 p-2 hover:border border-blue-500
         flex flex-col items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(1)">
            <img src="/storage/uploads/doctor1.png" alt="Dr. Jane Smith"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />

            <h3 class="text-xl font-bold text-blue-500">Dr. Jane Smith</h3>
            <p class="text-gray-700">Cardiologist</p>
            <p class="text-sm text-gray-500 mb-2">10+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(1)">View Profile</button>
        </div>
        <!-- Doctor Card 2 -->
        <div class="bg-white rounded-md shadow-md p-6 flex flex-col hover:border border-blue-500
         items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(2)">
            <img src="/storage/uploads/doctor2.png" alt="Dr. John Doe"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />
            <h3 class="text-xl font-bold text-blue-500">Dr. John Doe</h3>
            <p class="text-gray-700">Neurologist</p>
            <p class="text-sm text-gray-500 mb-2">8+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(2)">View Profile</button>
        </div>
        <!-- Doctor Card 3 -->
        <div class="bg-white rounded-md shadow-md p-6 flex flex-col hover:border border-blue-500
         items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(3)">
            <img src="/storage/uploads/doctor3.png" alt="Dr. Emily Lee"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />
            <h3 class="text-xl font-bold text-blue-500">Dr. Emily Lee</h3>
            <p class="text-gray-700">Pediatrician</p>
            <p class="text-sm text-gray-500 mb-2">5+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(3)">View Profile</button>
        </div>

        <div class="bg-white rounded-md shadow-md p-6 flex flex-col hover:border 
        border-blue-500 items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(2)">
            <img src="/storage/uploads/doctor2.png" alt="Dr. John Doe"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />
            <h3 class="text-xl font-bold text-blue-500">Dr. John Doe</h3>
            <p class="text-gray-700">Neurologist</p>
            <p class="text-sm text-gray-500 mb-2">8+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(2)">View Profile</button>
        </div>

        <div class="bg-white rounded-md shadow-md p-6 flex flex-col hover:border
         border-blue-500 items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(2)">
            <img src="/storage/uploads/doctor2.png" alt="Dr. John Doe"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />
            <h3 class="text-xl font-bold text-blue-500">Dr. John Doe</h3>
            <p class="text-gray-700">Neurologist</p>
            <p class="text-sm text-gray-500 mb-2">8+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(2)">View Profile</button>
        </div>

        <div class="bg-white rounded-md shadow-md p-6 flex flex-col hover:border border-blue-500
         items-center cursor-pointer hover:shadow-lg transition-shadow" onclick="openDoctorProfile(2)">
            <img src="/storage/uploads/doctor2.png" alt="Dr. John Doe"
                class="w-full h-30 object-contain border-b border-gray-200 mb-4" />
            <h3 class="text-xl font-bold text-blue-500">Dr. John Doe</h3>
            <p class="text-gray-700">Neurologist</p>
            <p class="text-sm text-gray-500 mb-2">8+ years experience</p>
            <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="event.stopPropagation(); bookAppointment(2)">View Profile</button>
        </div>

    </div>

    <div class="mt-5 flex flex-col items-center">
        <a href="all-doctors.php">
            <button
                class="mt-4 bg-blue-500 cursor-pointer rounded-md hover:border
             border-blue-500 hover:bg-white text-white font-bold  px-6 py-2 hover:text-blue-500 rounded hover:bg-blue-600">
                View More
            </button>
        </a>

    </div>
</div>

<script>
function openDoctorProfile(doctorId) {
    // You can replace this with actual navigation to doctor profile page
    window.location.href = `doctor-profile.php?id=${doctorId}`;
    // Or open in a modal:
    // openDoctorModal(doctorId);
}

function bookAppointment(doctorId) {
    // Handle appointment booking
    alert(`Booking appointment with doctor ID: ${doctorId}`);
    // You can add modal or redirect to booking page
}
</script>