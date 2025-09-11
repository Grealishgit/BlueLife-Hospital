<?php
require_once __DIR__ . '/../Queries/doctor_queries.php';
require_once __DIR__ . '/../Data/doctors.php';

header('Content-Type: application/json');

// Handle CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

try {
    $doctorQueries = new DoctorQueries();
    $method = $_SERVER['REQUEST_METHOD'];
    $action = $_GET['action'] ?? '';

    switch ($method) {
        case 'GET':
            handleGetRequest($action, $doctorQueries);
            break;

        case 'POST':
            handlePostRequest($action, $doctorQueries);
            break;

        case 'PUT':
            handlePutRequest($action, $doctorQueries);
            break;

        case 'DELETE':
            handleDeleteRequest($action, $doctorQueries);
            break;

        default:
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Method not allowed']);
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Server error: ' . $e->getMessage()
    ]);
}

function handleGetRequest($action, $doctorQueries)
{
    switch ($action) {
        case 'get_doctor_details':
            $doctorId = $_GET['id'] ?? null;
            if (!$doctorId) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Doctor ID is required']);
                return;
            }

            try {
                $doctor = $doctorQueries->getDoctorById($doctorId);
                if ($doctor) {
                    echo json_encode([
                        'success' => true,
                        'data' => $doctor
                    ]);
                } else {
                    http_response_code(404);
                    echo json_encode(['success' => false, 'message' => 'Doctor not found']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error fetching doctor details: ' . $e->getMessage()]);
            }
            break;

        case 'get_all_doctors':
            try {
                $doctors = DoctorsData::getAllDoctors();
                echo json_encode([
                    'success' => true,
                    'data' => array_values($doctors)
                ]);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error fetching doctors: ' . $e->getMessage()]);
            }
            break;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}

function handlePostRequest($action, $doctorQueries)
{
    switch ($action) {
        case 'update_doctor':
            $input = json_decode(file_get_contents('php://input'), true);

            if (!$input || !isset($input['id'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Invalid input data']);
                return;
            }

            try {
                // Prepare update data
                $updateData = [];

                // Map form fields to database fields
                $fieldMapping = [
                    'name' => 'name',
                    'specialtyDisplay' => 'specialty_display',
                    'experience' => 'experience',
                    'experienceYears' => 'experience_years',
                    'email' => 'email',
                    'phone' => 'phone',
                    'consultationFee' => 'consultation_fee',
                    'rating' => 'rating',
                    'availability' => 'availability',
                    'education' => 'education',
                    'bio' => 'bio',
                    'isTopDoctor' => 'is_top_doctor'
                ];

                foreach ($fieldMapping as $formField => $dbField) {
                    if (isset($input[$formField])) {
                        $updateData[$dbField] = $input[$formField];
                    }
                }

                // Handle boolean conversion
                if (isset($updateData['is_top_doctor'])) {
                    $updateData['is_top_doctor'] = (bool)$updateData['is_top_doctor'];
                }

                // Handle numeric conversions
                if (isset($updateData['experience_years'])) {
                    $updateData['experience_years'] = (int)$updateData['experience_years'];
                }
                if (isset($updateData['consultation_fee'])) {
                    $updateData['consultation_fee'] = (float)$updateData['consultation_fee'];
                }
                if (isset($updateData['rating'])) {
                    $updateData['rating'] = (float)$updateData['rating'];
                }

                $result = $doctorQueries->updateDoctor($input['id'], $updateData);

                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Doctor updated successfully'
                    ]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Failed to update doctor']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error updating doctor: ' . $e->getMessage()]);
            }
            break;

        case 'delete_doctor':
            $input = json_decode(file_get_contents('php://input'), true);

            if (!$input || !isset($input['id'])) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Doctor ID is required']);
                return;
            }

            try {
                $result = $doctorQueries->deleteDoctor($input['id'], false); // Soft delete

                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Doctor deleted successfully'
                    ]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Failed to delete doctor']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error deleting doctor: ' . $e->getMessage()]);
            }
            break;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}

function handlePutRequest($action, $doctorQueries)
{
    // For now, PUT requests are handled the same as POST
    handlePostRequest($action, $doctorQueries);
}

function handleDeleteRequest($action, $doctorQueries)
{
    switch ($action) {
        case 'delete_doctor':
            $doctorId = $_GET['id'] ?? null;
            if (!$doctorId) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Doctor ID is required']);
                return;
            }

            try {
                $result = $doctorQueries->deleteDoctor($doctorId, false); // Soft delete

                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Doctor deleted successfully'
                    ]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Failed to delete doctor']);
                }
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error deleting doctor: ' . $e->getMessage()]);
            }
            break;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}
