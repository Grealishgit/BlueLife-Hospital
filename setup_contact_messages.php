<?php
require_once 'config/database.php';

try {
    // Create database connection
    $database = new Database();
    $db = $database->connect();

    // Read and execute the SQL file
    $sqlFile = 'queries/create_contact_messages_table.sql';

    if (!file_exists($sqlFile)) {
        throw new Exception("SQL file not found: $sqlFile");
    }

    $sql = file_get_contents($sqlFile);

    // Execute the SQL commands
    $db->exec($sql);

    echo "✅ Contact messages table created successfully!\n";
    echo "📋 Table structure:\n";
    echo "   - User and guest message support\n";
    echo "   - Web3Forms integration\n";
    echo "   - Status tracking (unread, read, replied, archived)\n";
    echo "   - IP address and user agent logging\n";
    echo "   - Foreign key relationship to users table\n";
    echo "🎉 You can now start receiving contact messages!\n";
} catch (Exception $e) {
    echo "❌ Error setting up contact messages table: " . $e->getMessage() . "\n";
    exit(1);
}
