-- Create consultations table for Sheywe Community Hospital
-- This table stores consultation requests from patients

CREATE TABLE IF NOT EXISTS consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Patient Information
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    gender ENUM('male', 'female', 'other') NOT NULL,
    year_of_birth YEAR NOT NULL,
    
    -- Consultation Details
    consultation_type ENUM(
        'emergency', 
        'cardiology', 
        'neurology', 
        'pediatrics', 
        'orthopedics', 
        'obgyn',
        'general'
    ) NOT NULL,
    
    -- Additional Information
    reason_for_visit TEXT,
    preferred_date DATE,
    preferred_time TIME,
    additional_notes TEXT,
    
    -- Status Tracking
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    
    -- User Association (if logged in)
    user_id INT NULL,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Indexes for better performance
    INDEX idx_consultation_type (consultation_type),
    INDEX idx_status (status),
    INDEX idx_user_id (user_id),
    INDEX idx_email (email),
    INDEX idx_created_at (created_at),
    
    -- Foreign key constraint (optional, depends on your users table structure)
    CONSTRAINT fk_consultations_user_id 
        FOREIGN KEY (user_id) 
        REFERENCES users(id) 
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- Add some sample data for testing (optional)
-- INSERT INTO consultations (
--     first_name, last_name, email, phone, gender, year_of_birth,
--     consultation_type, reason_for_visit, preferred_date, preferred_time
-- ) VALUES (
--     'John', 'Doe', 'john.doe@example.com', '0712345678', 'male', 1985,
--     'cardiology', 'Chest pain and irregular heartbeat', '2025-09-15', '10:00:00'
-- );