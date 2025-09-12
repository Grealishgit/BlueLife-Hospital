<?php
session_start();
require_once __DIR__ . '/../config/database.php';

// Consultation Handler Class
class ConsultationHandler
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function createConsultation($data)
    {
        try {
            // Validate required fields
            $requiredFields = ['first_name', 'last_name', 'email', 'phone', 'gender', 'year_of_birth', 'consultation_type'];
            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    throw new Exception("Field '{$field}' is required.");
                }
            }

            // Validate email format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }

            // Validate year of birth
            $currentYear = date('Y');
            if ($data['year_of_birth'] < 1900 || $data['year_of_birth'] > $currentYear) {
                throw new Exception("Invalid year of birth.");
            }

            // Validate consultation type
            $validTypes = ['emergency', 'cardiology', 'neurology', 'pediatrics', 'orthopedics', 'obgyn', 'general'];
            if (!in_array($data['consultation_type'], $validTypes)) {
                throw new Exception("Invalid consultation type.");
            }

            // Prepare SQL statement
            $sql = "INSERT INTO consultations (
                first_name, last_name, email, phone, gender, year_of_birth,
                consultation_type, reason_for_visit, preferred_date, preferred_time,
                additional_notes, user_id
            ) VALUES (
                :first_name, :last_name, :email, :phone, :gender, :year_of_birth,
                :consultation_type, :reason_for_visit, :preferred_date, :preferred_time,
                :additional_notes, :user_id
            )";

            $stmt = $this->db->prepare($sql);

            // Get user ID if logged in
            $userId = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

            // Bind parameters
            $stmt->bindParam(':first_name', $data['first_name']);
            $stmt->bindParam(':last_name', $data['last_name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':phone', $data['phone']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':year_of_birth', $data['year_of_birth']);
            $stmt->bindParam(':consultation_type', $data['consultation_type']);
            $stmt->bindParam(':reason_for_visit', $data['reason_for_visit']);
            $stmt->bindParam(':preferred_date', $data['preferred_date']);
            $stmt->bindParam(':preferred_time', $data['preferred_time']);
            $stmt->bindParam(':additional_notes', $data['additional_notes']);
            $stmt->bindParam(':user_id', $userId);

            // Execute the statement
            if ($stmt->execute()) {
                $consultationId = $this->db->lastInsertId();
                return [
                    'success' => true,
                    'message' => 'Consultation request submitted successfully!',
                    'consultation_id' => $consultationId
                ];
            } else {
                throw new Exception("Failed to create consultation request.");
            }
        } catch (Exception $e) {
            error_log("Consultation creation error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getConsultationsByUser($userId)
    {
        try {
            $sql = "SELECT * FROM consultations WHERE user_id = :user_id ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching user consultations: " . $e->getMessage());
            return [];
        }
    }

    public function getAllConsultations($limit = 50, $offset = 0)
    {
        try {
            $sql = "SELECT * FROM consultations ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error fetching consultations: " . $e->getMessage());
            return [];
        }
    }

    public function updateConsultationStatus($consultationId, $status)
    {
        try {
            $validStatuses = ['pending', 'confirmed', 'completed', 'cancelled'];
            if (!in_array($status, $validStatuses)) {
                throw new Exception("Invalid status.");
            }

            $sql = "UPDATE consultations SET status = :status, updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $consultationId);

            if ($stmt->execute()) {
                return [
                    'success' => true,
                    'message' => 'Consultation status updated successfully!'
                ];
            } else {
                throw new Exception("Failed to update consultation status.");
            }
        } catch (Exception $e) {
            error_log("Consultation status update error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $consultationHandler = new ConsultationHandler();

    switch ($action) {
        case 'create_consultation':
            $response = $consultationHandler->createConsultation($_POST);
            break;

        case 'update_status':
            $consultationId = $_POST['consultation_id'] ?? '';
            $status = $_POST['status'] ?? '';
            $response = $consultationHandler->updateConsultationStatus($consultationId, $status);
            break;

        default:
            $response = [
                'success' => false,
                'message' => 'Invalid action specified.'
            ];
            break;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Handle GET requests for fetching consultations
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    $consultationHandler = new ConsultationHandler();

    switch ($action) {
        case 'get_user_consultations':
            if (isset($_SESSION['user'])) {
                $consultations = $consultationHandler->getConsultationsByUser($_SESSION['user']['id']);
                $response = [
                    'success' => true,
                    'consultations' => $consultations
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'User not logged in.'
                ];
            }
            break;

        case 'get_all_consultations':
            $limit = $_GET['limit'] ?? 50;
            $offset = $_GET['offset'] ?? 0;
            $consultations = $consultationHandler->getAllConsultations($limit, $offset);
            $response = [
                'success' => true,
                'consultations' => $consultations
            ];
            break;

        default:
            $response = [
                'success' => false,
                'message' => 'Invalid action specified.'
            ];
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
