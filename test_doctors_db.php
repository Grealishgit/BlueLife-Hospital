<?php
// Test script to verify that DoctorsData class is working with database

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the DoctorsData class
require_once 'app/Data/doctors.php';

echo "<h1>Testing Database-driven DoctorsData Class</h1>\n";

try {
    echo "<h2>1. Testing getAllDoctors()</h2>\n";
    $allDoctors = DoctorsData::getAllDoctors();
    echo "Found " . count($allDoctors) . " doctors in the database.\n";

    if (!empty($allDoctors)) {
        $firstDoctor = reset($allDoctors);
        echo "<h3>Sample Doctor Data:</h3>\n";
        echo "<pre>" . print_r($firstDoctor, true) . "</pre>\n";
    }

    echo "<h2>2. Testing getTopDoctors()</h2>\n";
    $topDoctors = DoctorsData::getTopDoctors(3);
    echo "Found " . count($topDoctors) . " top doctors.\n";

    echo "<h2>3. Testing getDoctorsBySpecialty('cardiology')</h2>\n";
    $cardiologists = DoctorsData::getDoctorsBySpecialty('cardiology');
    echo "Found " . count($cardiologists) . " cardiologists.\n";

    echo "<h2>4. Testing searchDoctors('heart')</h2>\n";
    $searchResults = DoctorsData::searchDoctors('heart');
    echo "Found " . count($searchResults) . " doctors matching 'heart'.\n";

    echo "<h2>5. Testing getSpecialties()</h2>\n";
    $specialties = DoctorsData::getSpecialties();
    echo "Available specialties: " . implode(', ', $specialties) . "\n";

    echo "<h2>6. Testing getDoctorsCount()</h2>\n";
    $count = DoctorsData::getDoctorsCount();
    echo "Total doctors count: " . $count . "\n";

    if (!empty($allDoctors)) {
        $firstDoctorId = key($allDoctors);
        echo "<h2>7. Testing getDoctorById($firstDoctorId)</h2>\n";
        $doctor = DoctorsData::getDoctorById($firstDoctorId);
        if ($doctor) {
            echo "Successfully retrieved doctor: " . $doctor['name'] . "\n";
        } else {
            echo "Failed to retrieve doctor by ID.\n";
        }
    }

    echo "<h2>✅ All tests completed successfully!</h2>\n";
} catch (Exception $e) {
    echo "<h2>❌ Error occurred:</h2>\n";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>\n";
    echo "<h3>Stack trace:</h3>\n";
    echo "<pre>" . $e->getTraceAsString() . "</pre>\n";
}
