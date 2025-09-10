<?php
session_start();
require_once '../config/database.php';
require_once '../app/models/User.php';

header('Content-Type: application/json');

$user = $_SESSION['user'] ?? null;
if (!$user) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit;
}

$userModel = new User();
$dbUser = $userModel->findByIdentifier($user['email']);

if (!$dbUser) {
    echo json_encode(['success' => false, 'message' => 'User not found']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'edit_profile') {
        $first_name = trim($_POST['first_name'] ?? '');
        $last_name = trim($_POST['last_name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $password = $_POST['edit_password'] ?? '';

        // Validation
        if (empty($first_name) || empty($last_name) || empty($phone) || empty($gender) || empty($dob) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'All fields are required']);
            exit;
        }

        // Validate gender
        if (!in_array($gender, ['male', 'female', 'other'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid gender selection']);
            exit;
        }

        // Validate phone (basic validation)
        if (!preg_match('/^[\+]?[\d\s\-\(\)]{10,}$/', $phone)) {
            echo json_encode(['success' => false, 'message' => 'Invalid phone number format']);
            exit;
        }

        // Verify password
        if (password_verify($password, $dbUser['password'])) {
            try {
                $stmt = $userModel->getPdo()->prepare("UPDATE users SET first_name=?, last_name=?, phone=?, gender=?, dob=? WHERE id=?");
                $result = $stmt->execute([$first_name, $last_name, $phone, $gender, $dob, $dbUser['id']]);

                if ($result) {
                    // Update session data
                    $_SESSION['user']['first_name'] = $first_name;
                    $_SESSION['user']['last_name'] = $last_name;

                    echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to update profile']);
                }
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Database error occurred']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Incorrect password']);
        }
    } elseif ($action === 'change_password') {
        $old_password = $_POST['old_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';

        // Validation
        if (empty($old_password) || empty($new_password)) {
            echo json_encode(['success' => false, 'message' => 'Both old and new passwords are required']);
            exit;
        }

        if (strlen($new_password) < 6) {
            echo json_encode(['success' => false, 'message' => 'New password must be at least 6 characters long']);
            exit;
        }

        // Verify old password
        if (password_verify($old_password, $dbUser['password'])) {
            try {
                $stmt = $userModel->getPdo()->prepare("UPDATE users SET password=? WHERE id=?");
                $result = $stmt->execute([password_hash($new_password, PASSWORD_DEFAULT), $dbUser['id']]);

                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Password changed successfully']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to change password']);
                }
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Database error occurred']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Incorrect old password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
