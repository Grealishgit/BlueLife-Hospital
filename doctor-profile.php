<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Doctor Profile - BlueLife Hospital</title>
</head>

<body class="bg-gray-50">
    <?php include 'app/Views/navbar.php'; ?>

    <div class="container mx-auto px-2 py-8 mt-20">
        <?php
        // Get doctor ID from URL parameter
        $doctorId = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        // Sample doctor data (in a real application, this would come from a database)
        $doctors = [
            1 => [
                'name' => 'Dr. Jane Smith',
                'specialty' => 'Cardiologist',
                'experience' => '10+ years',
                'image' => '/storage/uploads/doctor1.png',
                'education' => 'MD from Harvard Medical School',
                'bio' => 'Dr. Jane Smith is a board-certified cardiologist with over 10 years of experience in treating cardiovascular diseases. She specializes in preventive cardiology and heart disease management.',
                'qualifications' => ['MD - Harvard Medical School', 'Residency - Johns Hopkins Hospital', 'Fellowship - Mayo Clinic'],
                'specializations' => ['Heart Disease', 'Hypertension', 'Preventive Cardiology', 'Echocardiography'],
                'schedule' => ['Monday: 9:00 AM - 5:00 PM', 'Tuesday: 9:00 AM - 5:00 PM', 'Wednesday: 9:00 AM - 3:00 PM', 'Friday: 9:00 AM - 5:00 PM'],
                'phone' => '+1 (555) 123-4567',
                'email' => 'jane.smith@bluelife.com'
            ],
            2 => [
                'name' => 'Dr. John Doe',
                'specialty' => 'Neurologist',
                'experience' => '8+ years',
                'image' => '/storage/uploads/doctor2.png',
                'education' => 'MD from Stanford University',
                'bio' => 'Dr. John Doe is a skilled neurologist specializing in brain and nervous system disorders. He has extensive experience in treating stroke, epilepsy, and neurodegenerative diseases.',
                'qualifications' => ['MD - Stanford University', 'Residency - UCSF Medical Center', 'Fellowship - Cleveland Clinic'],
                'specializations' => ['Stroke Treatment', 'Epilepsy', 'Parkinson\'s Disease', 'Multiple Sclerosis'],
                'schedule' => ['Monday: 8:00 AM - 4:00 PM', 'Wednesday: 8:00 AM - 4:00 PM', 'Thursday: 8:00 AM - 4:00 PM', 'Friday: 8:00 AM - 2:00 PM'],
                'phone' => '+1 (555) 234-5678',
                'email' => 'john.doe@bluelife.com'
            ],
            3 => [
                'name' => 'Dr. Emily Lee',
                'specialty' => 'Pediatrician',
                'experience' => '5+ years',
                'image' => '/storage/uploads/doctor3.png',
                'education' => 'MD from UCLA School of Medicine',
                'bio' => 'Dr. Emily Lee is a compassionate pediatrician dedicated to providing comprehensive healthcare for children from infancy through adolescence.',
                'qualifications' => ['MD - UCLA School of Medicine', 'Residency - Children\'s Hospital Los Angeles', 'Board Certified Pediatrician'],
                'specializations' => ['General Pediatrics', 'Vaccinations', 'Growth & Development', 'Adolescent Medicine'],
                'schedule' => ['Monday: 9:00 AM - 6:00 PM', 'Tuesday: 9:00 AM - 6:00 PM', 'Thursday: 9:00 AM - 6:00 PM', 'Saturday: 9:00 AM - 1:00 PM'],
                'phone' => '+1 (555) 345-6789',
                'email' => 'emily.lee@bluelife.com'
            ]
        ];

        $doctor = isset($doctors[$doctorId]) ? $doctors[$doctorId] : $doctors[1];
        ?>

        <div class="bg-white rounded-lg shadow-lg p-8 max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Doctor Image and Basic Info -->
                <div class="md:w-1/3">
                    <img src="<?php echo $doctor['image']; ?>" alt="<?php echo $doctor['name']; ?>"
                        class="w-full max-w-xs mx-auto rounded-lg shadow-md" />
                    <div class="mt-6 text-center md:text-left">
                        <h1 class="text-3xl font-bold text-blue-600"><?php echo $doctor['name']; ?></h1>
                        <p class="text-xl text-gray-700 mt-2"><?php echo $doctor['specialty']; ?></p>
                        <p class="text-gray-600 mt-1"><?php echo $doctor['experience']; ?> experience</p>
                        <div class="mt-4">
                            <button onclick="bookAppointment(<?php echo $doctorId; ?>)"
                                class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                    <!-- Schedule -->
                    <div>
                        <h2 class="text-2xl mt-2 font-semibold text-blue-500 text-center text-gray-800 mb-3">Schedule
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <?php foreach ($doctor['schedule'] as $schedule): ?>
                            <div class="bg-gray-50 p-2 rounded text-gray-700"><?php echo $schedule; ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Doctor Details -->
                <div class="md:w-2/3">
                    <div class="space-y-6">
                        <!-- About -->
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">About</h2>
                            <p class="text-gray-700 leading-relaxed"><?php echo $doctor['bio']; ?></p>
                        </div>

                        <!-- Education -->
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Education</h2>
                            <p class="text-gray-700"><?php echo $doctor['education']; ?></p>
                        </div>

                        <!-- Qualifications -->
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Qualifications</h2>
                            <ul class="list-disc list-inside text-gray-700 space-y-1">
                                <?php foreach ($doctor['qualifications'] as $qualification): ?>
                                <li><?php echo $qualification; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Specializations -->
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Specializations</h2>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($doctor['specializations'] as $specialization): ?>
                                <span
                                    class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"><?php echo $specialization; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>



                        <!-- Contact -->
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Contact Information</h2>
                            <div class="space-y-2">
                                <p class="text-gray-700"><strong>Phone:</strong> <?php echo $doctor['phone']; ?></p>
                                <p class="text-gray-700"><strong>Email:</strong> <?php echo $doctor['email']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Doctors Button -->
        <div class="text-center mt-8">
            <a href="index.php"
                class="inline-block bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition-colors">
                Back to Doctors
            </a>
        </div>
    </div>

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