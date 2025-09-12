<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/database.php';

// Contact Message Handler Class
class ContactMessageHandler
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function createMessage($data)
    {
        try {
            // Validate required fields
            $requiredFields = ['subject', 'message'];
            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    throw new Exception("Field '{$field}' is required.");
                }
            }

            // Determine if user is logged in or guest
            $isLoggedIn = isset($_SESSION['user']) && !empty($_SESSION['user']);
            $messageType = $isLoggedIn ? 'user' : 'guest';

            // For guests, validate personal information
            if (!$isLoggedIn) {
                $guestFields = ['first_name', 'last_name', 'email'];
                foreach ($guestFields as $field) {
                    if (empty($data[$field])) {
                        throw new Exception("Field '{$field}' is required for guest messages.");
                    }
                }

                // Validate email format
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("Invalid email format.");
                }
            }

            // Get user information
            if ($isLoggedIn) {
                $userId = $_SESSION['user']['id'];
                $firstName = $_SESSION['user']['first_name'];
                $lastName = $_SESSION['user']['last_name'];
                $email = $_SESSION['user']['email'];
                $phone = $_SESSION['user']['phone'] ?? null;
            } else {
                $userId = null;
                $firstName = $data['first_name'];
                $lastName = $data['last_name'];
                $email = $data['email'];
                $phone = $data['phone'] ?? null;
            }

            // Prepare SQL statement
            $sql = "INSERT INTO contact_messages (
                user_id, first_name, last_name, email, phone,
                subject, message, message_type, access_key,
                ip_address, user_agent
            ) VALUES (
                :user_id, :first_name, :last_name, :email, :phone,
                :subject, :message, :message_type, :access_key,
                :ip_address, :user_agent
            )";

            $stmt = $this->db->prepare($sql);

            // Prepare variables for binding (bindParam requires variables, not expressions)
            $accessKey = $data['access_key'] ?? null;
            $ipAddress = $_SERVER['REMOTE_ADDR'] ?? null;
            $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
            $subject = $data['subject'];
            $message = $data['message'];

            // Bind parameters
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            $stmt->bindParam(':message_type', $messageType);
            $stmt->bindParam(':access_key', $accessKey);
            $stmt->bindParam(':ip_address', $ipAddress);
            $stmt->bindParam(':user_agent', $userAgent);

            if ($stmt->execute()) {
                $messageId = $this->db->lastInsertId();

                return [
                    'success' => true,
                    'message' => 'Your message has been sent successfully! We will get back to you within 24 hours.',
                    'message_id' => $messageId,
                    'is_logged_in' => $isLoggedIn
                ];
            } else {
                throw new Exception("Failed to save your message. Please try again.");
            }
        } catch (Exception $e) {
            error_log("Contact message creation error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getMessagesByUser($userId, $limit = 20, $offset = 0)
    {
        try {
            $sql = "SELECT * FROM contact_messages 
                    WHERE user_id = :user_id 
                    ORDER BY created_at DESC 
                    LIMIT :limit OFFSET :offset";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching user messages: " . $e->getMessage());
            return [];
        }
    }

    public function getAllMessages($limit = 50, $offset = 0)
    {
        try {
            $sql = "SELECT * FROM contact_messages 
                    ORDER BY created_at DESC 
                    LIMIT :limit OFFSET :offset";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching all messages: " . $e->getMessage());
            return [];
        }
    }

    public function getMessageById($messageId)
    {
        try {
            $sql = "SELECT * FROM contact_messages WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $messageId);
            $stmt->execute();

            $message = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($message) {
                return [
                    'success' => true,
                    'message' => $message
                ];
            } else {
                throw new Exception("Message not found.");
            }
        } catch (Exception $e) {
            error_log("Error fetching message details: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateMessageStatus($messageId, $status)
    {
        try {
            $validStatuses = ['unread', 'read', 'replied', 'archived'];
            if (!in_array($status, $validStatuses)) {
                throw new Exception("Invalid status.");
            }

            $sql = "UPDATE contact_messages SET status = :status, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $messageId);

            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'Message status updated successfully!'
                ];
            } else {
                throw new Exception("Failed to update message status.");
            }
        } catch (Exception $e) {
            error_log("Message status update error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteMessage($messageId)
    {
        try {
            $sql = "DELETE FROM contact_messages WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $messageId);

            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'Message deleted successfully!'
                ];
            } else {
                throw new Exception("Failed to delete message.");
            }
        } catch (Exception $e) {
            error_log("Message deletion error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateWeb3FormsResponse($messageId, $response)
    {
        try {
            $sql = "UPDATE contact_messages SET web3forms_response = :response, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':response', $response);
            $stmt->bindParam(':id', $messageId);

            return $stmt->execute();
        } catch (Exception $e) {
            error_log("Web3Forms response update error: " . $e->getMessage());
            return false;
        }
    }
}

// Handle AJAX requests only when this file is accessed directly
if (basename($_SERVER['SCRIPT_NAME']) === 'contact-handler.php') {
    // Handle POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        $contactHandler = new ContactMessageHandler();

        switch ($action) {
            case 'send_message':
                $response = $contactHandler->createMessage($_POST);
                break;

            case 'update_status':
                $messageId = $_POST['message_id'] ?? '';
                $status = $_POST['status'] ?? '';
                $response = $contactHandler->updateMessageStatus($messageId, $status);
                break;

            case 'delete_message':
                $messageId = $_POST['message_id'] ?? '';
                $response = $contactHandler->deleteMessage($messageId);
                break;

            case 'update_web3forms_response':
                $messageId = $_POST['message_id'] ?? '';
                $web3formsResponse = $_POST['web3forms_response'] ?? '';
                $success = $contactHandler->updateWeb3FormsResponse($messageId, $web3formsResponse);
                $response = [
                    'success' => $success,
                    'message' => $success ? 'Web3Forms response updated' : 'Failed to update response'
                ];
                break;

            default:
                $response = [
                    'success' => false,
                    'message' => 'Invalid action specified.'
                ];
                break;
        }

        // Return JSON response
        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        echo json_encode($response);
        exit;
    }

    // Handle GET requests for fetching messages
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $action = $_GET['action'] ?? '';
        $contactHandler = new ContactMessageHandler();

        switch ($action) {
            case 'get_user_messages':
                if (isset($_SESSION['user'])) {
                    $messages = $contactHandler->getMessagesByUser($_SESSION['user']['id']);
                    $response = [
                        'success' => true,
                        'messages' => $messages
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'User not logged in.'
                    ];
                }
                break;

            case 'get_all_messages':
                $limit = $_GET['limit'] ?? 50;
                $offset = $_GET['offset'] ?? 0;
                $messages = $contactHandler->getAllMessages($limit, $offset);
                $response = [
                    'success' => true,
                    'messages' => $messages
                ];
                break;

            case 'get_message_details':
                $messageId = $_GET['id'] ?? '';
                $response = $contactHandler->getMessageById($messageId);
                break;

            default:
                $response = [
                    'success' => false,
                    'message' => 'Invalid action specified.'
                ];
                break;
        }

        if (!headers_sent()) {
            header('Content-Type: application/json');
        }
        echo json_encode($response);
        exit;
    }
}
