<?php

/**
 * Setup script to create the consultations table
 * Run this file once to create the consultations table in your database
 */

require_once __DIR__ . '/config/database.php';

try {
    $database = new Database();
    $pdo = $database->connect();

    // Read the SQL file
    $sqlFile = __DIR__ . '/queries/create_consultations_table.sql';
    if (!file_exists($sqlFile)) {
        throw new Exception("SQL file not found: " . $sqlFile);
    }

    $sql = file_get_contents($sqlFile);

    // Remove comments and empty lines for cleaner execution
    $sqlLines = explode("\n", $sql);
    $cleanSql = '';

    foreach ($sqlLines as $line) {
        $line = trim($line);
        // Skip comments and empty lines
        if (!empty($line) && !str_starts_with($line, '--')) {
            $cleanSql .= $line . "\n";
        }
    }

    // Execute the SQL
    $pdo->exec($cleanSql);

    echo "✅ Consultations table created successfully!\n";
    echo "📋 Table structure:\n";
    echo "   - Patient information (name, email, phone, gender, year of birth)\n";
    echo "   - Consultation details (type, date, time, reason)\n";
    echo "   - Status tracking (pending, confirmed, completed, cancelled)\n";
    echo "   - User association (for logged-in users)\n";
    echo "   - Timestamps (created_at, updated_at)\n\n";
    echo "🎉 You can now start accepting consultation requests!\n";
} catch (Exception $e) {
    echo "❌ Error creating consultations table: " . $e->getMessage() . "\n";
    echo "Please check your database connection and try again.\n";
}
