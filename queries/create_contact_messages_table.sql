-- Contact Messages Table
-- Stores messages from both logged-in users and guests

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- User identification (if logged in)
    user_id INT NULL,
    
    -- Personal information (required for guests, optional for logged-in users)
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NULL,
    
    -- Message details
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    
    -- Message status and type
    status ENUM('unread', 'read', 'replied', 'archived') NOT NULL DEFAULT 'unread',
    message_type ENUM('guest', 'user') NOT NULL DEFAULT 'guest',
    
    -- Web3Forms integration
    access_key VARCHAR(100) NULL COMMENT 'Web3Forms access key for email forwarding',
    web3forms_response TEXT NULL COMMENT 'Response from Web3Forms API',
    
    -- Metadata
    ip_address VARCHAR(45) NULL,
    user_agent TEXT NULL,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Foreign key constraint
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    
    -- Indexes for better performance
    INDEX idx_user_id (user_id),
    INDEX idx_email (email),
    INDEX idx_status (status),
    INDEX idx_created_at (created_at),
    INDEX idx_message_type (message_type)
);

-- Add comment to the table
ALTER TABLE contact_messages COMMENT = 'Stores contact messages from both logged-in users and guests with Web3Forms integration';