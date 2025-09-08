<?php
// Include the centralized doctors data
require_once dirname(__DIR__) . '/Data/doctors.php';

// Get top 6 doctors for the home page
$topDoctors = DoctorsData::getTopDoctors(6);
?>

<div class='flex flex-col w-full mt-10 items-center'>
    <p class="text-3xl font-bold">Top <span class="text-blue-500">Doctors</span> to Book</p>
    <p class="text-center font-semibold text-gray-800">
        Simply browse through our extensive list of trusted doctors.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8 w-full md:max-w-7xl flex px-4">
        <?php foreach ($topDoctors as $doctor): ?>
            <!-- Doctor Card for <?php echo htmlspecialchars($doctor['name']); ?> -->
            <div class="bg-white rounded-md shadow-md shadow-gray-300 p-2 hover:border border-blue-500
         flex flex-col items-center cursor-pointer hover:shadow-lg transition-shadow"
                onclick="openDoctorProfile(<?php echo $doctor['id']; ?>)">
                <img src="<?php echo htmlspecialchars($doctor['image']); ?>"
                    alt="<?php echo htmlspecialchars($doctor['name']); ?>"
                    class="w-full h-30 object-contain border-b border-gray-200 mb-4" />

                <h3 class="text-xl font-bold text-blue-500"><?php echo htmlspecialchars($doctor['name']); ?></h3>
                <p class="text-gray-700"><?php echo htmlspecialchars($doctor['specialtyDisplay']); ?></p>
                <p class="text-sm text-gray-500 mb-2"><?php echo htmlspecialchars($doctor['experience']); ?> experience</p>

                <!-- Rating Display -->
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500">⭐</span>
                    <span class="text-gray-600 ml-1 text-sm"><?php echo $doctor['rating']; ?></span>
                    <span class="text-gray-500 ml-2 text-sm">(Ksh <?php echo $doctor['consultation_fee']; ?>)</span>
                </div>

                <button class="mt-2 bg-blue-500 text-white px-4 font-bold py-2 cursor-pointer rounded hover:bg-blue-600"
                    onclick="openDoctorProfile(<?php echo $doctor['id']; ?>)">View Profile</button>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-5 flex flex-col items-center">
        <a href="all-doctors.php">
            <button
                class="mt-4 mb-8 bg-gray-400 cursor-pointer rounded-md hover:border
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