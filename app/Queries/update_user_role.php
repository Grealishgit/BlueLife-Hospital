<?php
// Run this script to update a user's role to admin
require_once __DIR__ . '/../../config/database.php';

$db = (new Database())->connect();

// Update Eugene Hunter to admin role
$email = 'eugene@gmail.com'; // Change this to your email
$role = 'admin'; // Change this to 'patient', 'doctor', or 'admin'

$sql = "UPDATE users SET role = ? WHERE email = ?";

try {
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([$role, $email]);

    if ($result) {
        echo "User role updated successfully!\n";
        echo "Email: $email\n";
        echo "New Role: $role\n";
    } else {
        echo "Failed to update user role.\n";
    }
} catch (PDOException $e) {
    echo "Error updating user role: " . $e->getMessage() . "\n";
}