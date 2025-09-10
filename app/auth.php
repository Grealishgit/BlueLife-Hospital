<?php
// Authentication handler for login and signup
require_once __DIR__ . '/models/User.php';
header('Content-Type: application/json');

$action = $_POST['action'] ?? '';
$response = ["success" => false, "message" => "Invalid request."];

$userModel = new User();

if ($action === 'login') {
    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';
    if (!$identifier || !$password) {
        $response['message'] = 'Missing credentials.';
    } else {
        $user = $userModel->verifyLogin($identifier, $password);
        if ($user) {
            // Generate a simple token (can be JWT or random string)
            session_start();
            $token = bin2hex(random_bytes(32));
            $_SESSION['user_token'] = $token;
            $_SESSION['user'] = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'gender' => $user['gender'],
                'dob' => $user['dob'],
                'role' => $user['role'],
                'token' => $token
            ];
            $response = ["success" => true, "message" => "Login successful.", "user" => $_SESSION['user'], "token" => $token];
        } else {
            $response['message'] = 'Invalid credentials.';
        }
    }
} elseif ($action === 'signup') {
    $data = [
        'first_name' => $_POST['first_name'] ?? '',
        'last_name' => $_POST['last_name'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'gender' => $_POST['gender'] ?? '',
        'dob' => $_POST['dob'] ?? '',
        'email' => $_POST['email'] ?? '',
        'password' => $_POST['password'] ?? ''
    ];
    // Basic validation
    if (in_array('', $data, true)) {
        $response['message'] = 'Please fill all fields.';
    } else {
        // Check if user exists
        if ($userModel->findByIdentifier($data['email']) || $userModel->findByIdentifier($data['phone'])) {
            $response['message'] = 'User already exists.';
        } else {
            $created = $userModel->create($data);
            if ($created) {
                $response = ["success" => true, "message" => "Signup successful."];
            } else {
                $response['message'] = 'Signup failed.';
            }
        }
    }
} elseif ($action === 'logout') {
    session_start();
    session_unset();
    session_destroy();
    echo json_encode(["success" => true, "message" => "Logged out."]);
    exit;
}

echo json_encode($response);