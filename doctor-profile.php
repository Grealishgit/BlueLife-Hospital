<?php
session_start();
// Include the centralized doctors data
require_once 'app/Data/doctors.php';

// Get doctor ID from URL parameter
$doctorId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Get doctor data from centralized source
$doctor = DoctorsData::getDoctorById($doctorId);

// If doctor not found, redirect to all doctors page or show default
if (!$doctor) {
    header('Location: all-doctors.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title><?php echo htmlspecialchars($doctor['name']); ?> - Sheywe Community Hospital</title>
</head>

<body class="bg-gray-50">
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'app/Views/loginModal.php'; ?>

    <!-- Hero Section -->
    <section class="pt-24 pb-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg mb-8 p-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Doctor Image and Basic Info -->
                    <div class="md:w-1/3">
                        <img src="<?php echo htmlspecialchars($doctor['image']); ?>"
                            alt="<?php echo htmlspecialchars($doctor['name']); ?>"
                            class="w-full max-w-xs mx-auto rounded-lg shadow-md" />
                        <div class="mt-6 text-center md:text-left">
                            <h1 class="text-3xl font-bold text-blue-600">
                                <?php echo htmlspecialchars($doctor['name']); ?></h1>
                            <p class="text-xl text-gray-700 mt-2">
                                <?php echo htmlspecialchars($doctor['specialtyDisplay']); ?></p>
                            <p class="text-gray-600 mt-1"><?php echo htmlspecialchars($doctor['experience']); ?>
                                experience</p>
                            <div class="flex items-center justify-center md:justify-start mt-2">
                                <span class="text-yellow-500 text-xl">⭐</span>
                                <span class="text-gray-700 ml-1 font-semibold"><?php echo $doctor['rating']; ?></span>
                                <span class="text-gray-500 ml-2">Rating</span>
                            </div>
                            <div class="mt-4">
                                <a href="appointment.php"
                                    class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                    Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Details -->
                    <div class="md:w-2/3">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">About</h2>
                            <p class="text-gray-600 leading-relaxed"><?php echo htmlspecialchars($doctor['bio']); ?></p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Education -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Education</h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($doctor['education']); ?></p>
                            </div>

                            <!-- Languages -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Languages</h3>
                                <p class="text-gray-600"><?php echo implode(', ', $doctor['languages']); ?></p>
                            </div>

                            <!-- Contact -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact</h3>
                                <p class="text-gray-600">Phone: <?php echo htmlspecialchars($doctor['phone']); ?></p>
                                <p class="text-gray-600">Email: <?php echo htmlspecialchars($doctor['email']); ?></p>
                            </div>

                            <!-- Availability -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Availability</h3>
                                <p class="text-gray-600"><?php echo htmlspecialchars($doctor['availability']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Qualifications Section -->
    <section class="pb-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Qualifications</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($doctor['qualifications'] as $qualification): ?>
                        <div class="flex items-center space-x-3">
                            <span class="text-blue-500">🎓</span>
                            <span class="text-gray-700"><?php echo htmlspecialchars($qualification); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Specializations Section -->
    <section class="pb-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Specializations</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($doctor['specializations'] as $specialization): ?>
                        <div class="bg-blue-50 rounded-lg p-4 text-center">
                            <span class="text-blue-600 font-medium"><?php echo htmlspecialchars($specialization); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="pb-8">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Schedule</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($doctor['schedule'] as $scheduleItem): ?>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="font-medium text-gray-700"><?php echo htmlspecialchars($scheduleItem); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-6 text-center">
                    <button onclick="bookAppointment(<?php echo $doctorId; ?>)"
                        class="bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                        Book an Appointment
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Doctors Section -->
    <section class="pb-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <a href="all-doctors.php"
                    class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                    ← Back to All Doctors
                </a>
            </div>
        </div>
    </section>

    <?php include 'app/Views/footer.php'; ?>

    <script>
        function bookAppointment(doctorId) {
            alert(`Booking appointment with doctor ID: ${doctorId}`);
            // You can redirect to appointment booking page or open a modal
            // window.location.href = `book-appointment.php?doctor_id=${doctorId}`;
        }
    </script>
</body>

</html>