<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Data/doctors.php';

try {
    // Initialize database connection using the Database class
    $database = new Database();
    $pdo = $database->connect();

    echo "Database connected!\n";

    // Get all doctors from the data file
    $doctorsData = DoctorsData::getAllDoctors();

    // Prepare the insert statement
    $sql = "INSERT INTO doctors (
        name, specialty, specialty_display, experience, experience_years, 
        image, education, bio, qualifications, specializations, schedule, 
        phone, email, rating, consultation_fee, availability, is_top_doctor
    ) VALUES (
        :name, :specialty, :specialty_display, :experience, :experience_years,
        :image, :education, :bio, :qualifications, :specializations, :schedule,
        :phone, :email, :rating, :consultation_fee, :availability, :is_top_doctor
    ) ON DUPLICATE KEY UPDATE
        name = VALUES(name),
        specialty = VALUES(specialty),
        specialty_display = VALUES(specialty_display),
        experience = VALUES(experience),
        experience_years = VALUES(experience_years),
        image = VALUES(image),
        education = VALUES(education),
        bio = VALUES(bio),
        qualifications = VALUES(qualifications),
        specializations = VALUES(specializations),
        schedule = VALUES(schedule),
        phone = VALUES(phone),
        rating = VALUES(rating),
        consultation_fee = VALUES(consultation_fee),
        availability = VALUES(availability),
        is_top_doctor = VALUES(is_top_doctor),
        updated_at = CURRENT_TIMESTAMP";

    $stmt = $pdo->prepare($sql);

    $insertedCount = 0;
    $updatedCount = 0;

    foreach ($doctorsData as $doctor) {
        try {
            // Convert arrays to JSON for database storage
            $qualifications = json_encode($doctor['qualifications']);
            $specializations = json_encode($doctor['specializations']);
            $schedule = json_encode($doctor['schedule']);

            // Check if doctor already exists
            $checkStmt = $pdo->prepare("SELECT id FROM doctors WHERE email = :email");
            $checkStmt->execute(['email' => $doctor['email']]);
            $exists = $checkStmt->fetch();

            $result = $stmt->execute([
                'name' => $doctor['name'],
                'specialty' => $doctor['specialty'],
                'specialty_display' => $doctor['specialtyDisplay'],
                'experience' => $doctor['experience'],
                'experience_years' => $doctor['experience_years'],
                'image' => $doctor['image'],
                'education' => $doctor['education'],
                'bio' => $doctor['bio'],
                'qualifications' => $qualifications,
                'specializations' => $specializations,
                'schedule' => $schedule,
                'phone' => $doctor['phone'],
                'email' => $doctor['email'],
                'rating' => $doctor['rating'],
                'consultation_fee' => $doctor['consultation_fee'],
                'availability' => $doctor['availability'],
                'is_top_doctor' => $doctor['is_top_doctor'] ? 1 : 0
            ]);

            if ($result) {
                if ($exists) {
                    $updatedCount++;
                    echo "Updated doctor: " . $doctor['name'] . "\n";
                } else {
                    $insertedCount++;
                    echo "Inserted doctor: " . $doctor['name'] . "\n";
                }
            }
        } catch (PDOException $e) {
            echo "Error processing doctor " . $doctor['name'] . ": " . $e->getMessage() . "\n";
        }
    }

    echo "\n=== Summary ===\n";
    echo "Doctors inserted: $insertedCount\n";
    echo "Doctors updated: $updatedCount\n";
    echo "Total processed: " . ($insertedCount + $updatedCount) . "\n";
    echo "Database population completed successfully!\n";
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "General error: " . $e->getMessage() . "\n";
}
