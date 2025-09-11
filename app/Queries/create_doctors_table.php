<?php
require_once __DIR__ . '/../../config/database.php';

try {
    // Initialize database connection using the Database class
    $database = new Database();
    $pdo = $database->connect();

    echo "Database connected!\n";

    // Create doctors table
    $sql = "CREATE TABLE IF NOT EXISTS doctors (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        specialty VARCHAR(100) NOT NULL,
        specialty_display VARCHAR(100) NOT NULL,
        experience VARCHAR(50) NOT NULL,
        experience_years INT NOT NULL,
        image VARCHAR(500) DEFAULT NULL,
        education TEXT NOT NULL,
        bio TEXT NOT NULL,
        qualifications JSON NOT NULL,
        specializations JSON NOT NULL,
        schedule JSON NOT NULL,
        phone VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        rating DECIMAL(2,1) DEFAULT 0.0,
        consultation_fee DECIMAL(10,2) NOT NULL,
        availability VARCHAR(100) NOT NULL,
        is_top_doctor BOOLEAN DEFAULT FALSE,
        status ENUM('active', 'inactive', 'on_leave') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    $pdo->exec($sql);

    echo "Doctors table created successfully!\n";

    // Create indexes for better performance
    $indexes = [
        "CREATE INDEX idx_doctors_specialty ON doctors(specialty)",
        "CREATE INDEX idx_doctors_rating ON doctors(rating)",
        "CREATE INDEX idx_doctors_is_top ON doctors(is_top_doctor)",
        "CREATE INDEX idx_doctors_status ON doctors(status)",
        "CREATE INDEX idx_doctors_experience ON doctors(experience_years)"
    ];

    foreach ($indexes as $index) {
        try {
            $pdo->exec($index);
        } catch (PDOException $e) {
            // Index might already exist, continue
            if (strpos($e->getMessage(), 'Duplicate key name') === false) {
                echo "Warning: " . $e->getMessage() . "\n";
            }
        }
    }

    echo "Database indexes created successfully!\n";
} catch (PDOException $e) {
    echo "Error creating doctors table: " . $e->getMessage() . "\n";
}
