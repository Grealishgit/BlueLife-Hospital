<?php
// Simple test for contact handler
session_start();

// Simulate a contact form submission
$_POST = [
    'action' => 'send_message',
    'first_name' => 'Test',
    'last_name' => 'User',
    'email' => 'test@example.com',
    'phone' => '123-456-7890',
    'subject' => 'test',
    'message' => 'This is a test message',
    'access_key' => 'test-key'
];

$_SERVER['REQUEST_METHOD'] = 'POST';
$_SERVER['SCRIPT_NAME'] = '/test-contact-handler.php';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['HTTP_USER_AGENT'] = 'Test User Agent';

try {
    require_once 'app/contact-handler.php';
    echo "✅ Contact handler test completed successfully!\n";
} catch (Exception $e) {
    echo "❌ Contact handler test failed: " . $e->getMessage() . "\n";
}
