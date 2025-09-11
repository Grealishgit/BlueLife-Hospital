<?php
require_once __DIR__ . '/../../config/database.php';

/**
 * Add a new doctor to the database
 * 
 * @param array $doctorData Array containing doctor information
 * @return array Result with success status and message
 */
function addDoctor($doctorData)
{
    // Initialize database connection
    $database = new Database();
    $pdo = $database->connect();

    try {
        // Validate required fields
        $requiredFields = [
            'name',
            'specialty',
            'specialty_display',
            'experience',
            'experience_years',
            'education',
            'bio',
            'phone',
            'email',
            'consultation_fee',
            'availability'
        ];

        foreach ($requiredFields as $field) {
            if (empty($doctorData[$field])) {
                return [
                    'success' => false,
                    'message' => "Required field '$field' is missing or empty"
                ];
            }
        }

        // Validate email format
        if (!filter_var($doctorData['email'], FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Invalid email format'
            ];
        }

        // Check if email already exists
        $checkStmt = $pdo->prepare("SELECT id FROM doctors WHERE email = :email");
        $checkStmt->execute(['email' => $doctorData['email']]);
        if ($checkStmt->fetch()) {
            return [
                'success' => false,
                'message' => 'A doctor with this email already exists'
            ];
        }

        // Prepare data with defaults
        $data = [
            'name' => trim($doctorData['name']),
            'specialty' => strtolower(trim($doctorData['specialty'])),
            'specialty_display' => trim($doctorData['specialty_display']),
            'experience' => trim($doctorData['experience']),
            'experience_years' => (int)$doctorData['experience_years'],
            'image' => $doctorData['image'] ?? null,
            'education' => trim($doctorData['education']),
            'bio' => trim($doctorData['bio']),
            'qualifications' => json_encode($doctorData['qualifications'] ?? []),
            'specializations' => json_encode($doctorData['specializations'] ?? []),
            'schedule' => json_encode($doctorData['schedule'] ?? []),
            'phone' => trim($doctorData['phone']),
            'email' => strtolower(trim($doctorData['email'])),
            'rating' => isset($doctorData['rating']) ? (float)$doctorData['rating'] : 0.0,
            'consultation_fee' => (float)$doctorData['consultation_fee'],
            'availability' => trim($doctorData['availability']),
            'is_top_doctor' => isset($doctorData['is_top_doctor']) ? (bool)$doctorData['is_top_doctor'] : false,
            'status' => $doctorData['status'] ?? 'active'
        ];

        // Insert into database
        $sql = "INSERT INTO doctors (
            name, specialty, specialty_display, experience, experience_years,
            image, education, bio, qualifications, specializations, schedule,
            phone, email, rating, consultation_fee, availability, is_top_doctor, status
        ) VALUES (
            :name, :specialty, :specialty_display, :experience, :experience_years,
            :image, :education, :bio, :qualifications, :specializations, :schedule,
            :phone, :email, :rating, :consultation_fee, :availability, :is_top_doctor, :status
        )";

        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute($data);

        if ($result) {
            $doctorId = $pdo->lastInsertId();
            return [
                'success' => true,
                'message' => 'Doctor added successfully',
                'doctor_id' => $doctorId
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to add doctor to database'
            ];
        }
    } catch (PDOException $e) {
        return [
            'success' => false,
            'message' => 'Database error: ' . $e->getMessage()
        ];
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ];
    }
}

// Example usage if running directly
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {

    // Initialize PDO connection
    try {
        $database = new Database();
        $pdo = $database->connect();
        echo "Database connected!\n";
    } catch (Exception $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Example doctor data
    $exampleDoctor = [
        'name' => 'Dr. John Smith',
        'specialty' => 'general_medicine',
        'specialty_display' => 'General Practitioner',
        'experience' => '5+ years',
        'experience_years' => 5,
        'image' => '/storage/uploads/doctor-placeholder.png',
        'education' => 'MD from University of Medicine',
        'bio' => 'Dr. John Smith is a dedicated general practitioner with a passion for preventive care and family medicine.',
        'qualifications' => [
            'MD - University of Medicine',
            'Residency - General Hospital',
            'Board Certified Family Medicine'
        ],
        'specializations' => [
            'Family Medicine',
            'Preventive Care',
            'Health Screenings',
            'Chronic Disease Management'
        ],
        'schedule' => [
            'Monday: 9:00 AM - 5:00 PM',
            'Tuesday: 9:00 AM - 5:00 PM',
            'Wednesday: 9:00 AM - 5:00 PM',
            'Thursday: 9:00 AM - 5:00 PM',
            'Friday: 9:00 AM - 3:00 PM'
        ],
        'phone' => '+1 (555) 999-0000',
        'email' => 'john.smith@sheywe.com',
        'rating' => 4.5,
        'consultation_fee' => 100.00,
        'availability' => 'Mon-Fri',
        'is_top_doctor' => false,
        'status' => 'active'
    ];

    // Add the example doctor
    $result = addDoctor($exampleDoctor);

    if ($result['success']) {
        echo "Success: " . $result['message'] . "\n";
        echo "Doctor ID: " . $result['doctor_id'] . "\n";
    } else {
        echo "Error: " . $result['message'] . "\n";
    }
}
