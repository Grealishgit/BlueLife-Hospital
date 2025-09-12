<?php
require_once 'app/contact-handler.php';

try {
    $contactHandler = new ContactMessageHandler();
    $messages = $contactHandler->getAllMessages(10, 0);

    echo "Number of messages found: " . count($messages) . "\n\n";

    foreach ($messages as $message) {
        echo "ID: " . $message['id'] . "\n";
        echo "Name: " . $message['first_name'] . " " . $message['last_name'] . "\n";
        echo "Email: " . $message['email'] . "\n";
        echo "Subject: " . $message['subject'] . "\n";
        echo "Message: " . substr($message['message'], 0, 50) . "...\n";
        echo "Status: " . $message['status'] . "\n";
        echo "Type: " . $message['message_type'] . "\n";
        echo "Created: " . $message['created_at'] . "\n";
        echo "---\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
