<?php
require_once __DIR__ . '/../../config/database.php';

class DoctorQueries
{
    private $pdo;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->pdo = $database->connect();
        } catch (Exception $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Get all doctors from database
     */
    public function getAllDoctors($status = 'active')
    {
        try {
            $sql = "SELECT * FROM doctors WHERE status = :status ORDER BY name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctors: " . $e->getMessage());
        }
    }

    /**
     * Get doctor by ID
     */
    public function getDoctorById($id)
    {
        try {
            $sql = "SELECT * FROM doctors WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($doctor) {
                $doctors = $this->formatDoctorResults([$doctor]);
                return $doctors[0];
            }

            return null;
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctor: " . $e->getMessage());
        }
    }

    /**
     * Get doctors by specialty
     */
    public function getDoctorsBySpecialty($specialty, $status = 'active')
    {
        try {
            $sql = "SELECT * FROM doctors WHERE specialty = :specialty AND status = :status ORDER BY rating DESC, name";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['specialty' => $specialty, 'status' => $status]);
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctors by specialty: " . $e->getMessage());
        }
    }

    /**
     * Get top doctors
     */
    public function getTopDoctors($limit = null, $status = 'active')
    {
        try {
            $sql = "SELECT * FROM doctors WHERE is_top_doctor = 1 AND status = :status ORDER BY rating DESC, name";
            if ($limit) {
                $sql .= " LIMIT :limit";
            }

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('status', $status);
            if ($limit) {
                $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
            }
            $stmt->execute();
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching top doctors: " . $e->getMessage());
        }
    }

    /**
     * Search doctors
     */
    public function searchDoctors($searchTerm, $status = 'active')
    {
        try {
            $sql = "SELECT * FROM doctors 
                    WHERE (name LIKE :search 
                           OR specialty_display LIKE :search 
                           OR education LIKE :search 
                           OR bio LIKE :search) 
                    AND status = :status 
                    ORDER BY rating DESC, name";

            $stmt = $this->pdo->prepare($sql);
            $searchPattern = '%' . $searchTerm . '%';
            $stmt->execute([
                'search' => $searchPattern,
                'status' => $status
            ]);
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error searching doctors: " . $e->getMessage());
        }
    }

    /**
     * Update doctor information
     */
    public function updateDoctor($id, $doctorData)
    {
        try {
            // Prepare update fields
            $updateFields = [];
            $params = ['id' => $id];

            $allowedFields = [
                'name',
                'specialty',
                'specialty_display',
                'experience',
                'experience_years',
                'image',
                'education',
                'bio',
                'phone',
                'rating',
                'consultation_fee',
                'availability',
                'is_top_doctor',
                'status'
            ];

            foreach ($allowedFields as $field) {
                if (isset($doctorData[$field])) {
                    $updateFields[] = "$field = :$field";
                    $params[$field] = $doctorData[$field];
                }
            }

            // Handle JSON fields
            if (isset($doctorData['qualifications'])) {
                $updateFields[] = "qualifications = :qualifications";
                $params['qualifications'] = json_encode($doctorData['qualifications']);
            }

            if (isset($doctorData['specializations'])) {
                $updateFields[] = "specializations = :specializations";
                $params['specializations'] = json_encode($doctorData['specializations']);
            }

            if (isset($doctorData['schedule'])) {
                $updateFields[] = "schedule = :schedule";
                $params['schedule'] = json_encode($doctorData['schedule']);
            }

            if (empty($updateFields)) {
                return ['success' => false, 'message' => 'No fields to update'];
            }

            $sql = "UPDATE doctors SET " . implode(', ', $updateFields) . ", updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($params);

            if ($result && $stmt->rowCount() > 0) {
                return ['success' => true, 'message' => 'Doctor updated successfully'];
            } else {
                return ['success' => false, 'message' => 'No changes made or doctor not found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Delete doctor (soft delete by setting status to inactive)
     */
    public function deleteDoctor($id, $hardDelete = false)
    {
        try {
            if ($hardDelete) {
                $sql = "DELETE FROM doctors WHERE id = :id";
            } else {
                $sql = "UPDATE doctors SET status = 'inactive', updated_at = CURRENT_TIMESTAMP WHERE id = :id";
            }

            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute(['id' => $id]);

            if ($result && $stmt->rowCount() > 0) {
                $action = $hardDelete ? 'deleted' : 'deactivated';
                return ['success' => true, 'message' => "Doctor $action successfully"];
            } else {
                return ['success' => false, 'message' => 'Doctor not found'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get unique specialties
     */
    public function getSpecialties()
    {
        try {
            $sql = "SELECT DISTINCT specialty, specialty_display FROM doctors WHERE status = 'active' ORDER BY specialty_display";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching specialties: " . $e->getMessage());
        }
    }

    /**
     * Get doctors with pagination
     */
    public function getDoctorsWithPagination($page = 1, $perPage = 6, $status = 'active')
    {
        try {
            $offset = ($page - 1) * $perPage;

            $sql = "SELECT * FROM doctors WHERE status = :status ORDER BY rating DESC, name LIMIT :offset, :perPage";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue('status', $status);
            $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue('perPage', $perPage, PDO::PARAM_INT);
            $stmt->execute();
            $doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($doctors as &$doctor) {
                $doctor['qualifications'] = json_decode($doctor['qualifications'], true);
                $doctor['specializations'] = json_decode($doctor['specializations'], true);
                $doctor['schedule'] = json_decode($doctor['schedule'], true);
                $doctor['is_top_doctor'] = (bool)$doctor['is_top_doctor'];
            }

            return $doctors;
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctors with pagination: " . $e->getMessage());
        }
    }

    /**
     * Get total count of doctors
     */
    /**
     * Get total count of doctors
     */
    public function getTotalDoctorsCount($status = 'active')
    {
        try {
            $sql = "SELECT COUNT(*) FROM doctors WHERE status = :status";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            throw new Exception("Error counting doctors: " . $e->getMessage());
        }
    }

    /**
     * Get doctors sorted by rating
     */
    public function getDoctorsByRating($order = 'desc', $status = 'active')
    {
        try {
            $orderClause = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';
            $sql = "SELECT * FROM doctors WHERE status = :status ORDER BY rating $orderClause, name ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctors by rating: " . $e->getMessage());
        }
    }

    /**
     * Get doctors sorted by experience
     */
    public function getDoctorsByExperience($order = 'desc', $status = 'active')
    {
        try {
            $orderClause = strtoupper($order) === 'ASC' ? 'ASC' : 'DESC';
            $sql = "SELECT * FROM doctors WHERE status = :status ORDER BY experience_years $orderClause, name ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching doctors by experience: " . $e->getMessage());
        }
    }

    /**
     * Get random doctors
     */
    public function getRandomDoctors($limit = 3, $status = 'active')
    {
        try {
            $sql = "SELECT * FROM doctors WHERE status = :status ORDER BY RAND() LIMIT :limit";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':status', $status, PDO::PARAM_STR);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            throw new Exception("Error fetching random doctors: " . $e->getMessage());
        }
    }

    /**
     * Get doctors with pagination
     */
    public function getDoctorsPaginated($limit = 10, $offset = 0, $specialty = null, $status = 'active')
    {
        try {
            // Base query
            $sql = "SELECT * FROM doctors WHERE status = :status";
            $params = ['status' => $status];

            // Add specialty filter if provided
            if ($specialty) {
                $sql .= " AND specialty = :specialty";
                $params['specialty'] = $specialty;
            }

            // Add ordering and pagination
            $sql .= " ORDER BY rating DESC, name ASC LIMIT :limit OFFSET :offset";

            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();

            $doctors = $this->formatDoctorResults($stmt->fetchAll(PDO::FETCH_ASSOC));

            // Get total count for pagination
            $countSql = "SELECT COUNT(*) FROM doctors WHERE status = :status";
            $countParams = ['status' => $status];

            if ($specialty) {
                $countSql .= " AND specialty = :specialty";
                $countParams['specialty'] = $specialty;
            }

            $countStmt = $this->pdo->prepare($countSql);
            $countStmt->execute($countParams);
            $total = $countStmt->fetchColumn();

            return [
                'doctors' => $doctors,
                'total' => $total,
                'limit' => $limit,
                'offset' => $offset
            ];
        } catch (PDOException $e) {
            throw new Exception("Error fetching paginated doctors: " . $e->getMessage());
        }
    }

    /**
     * Get available specialties
     */
    public function getAvailableSpecialties($status = 'active')
    {
        try {
            $sql = "SELECT DISTINCT specialty FROM doctors WHERE status = :status ORDER BY specialty";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['status' => $status]);
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            throw new Exception("Error fetching available specialties: " . $e->getMessage());
        }
    }

    /**
     * Format doctor results to decode JSON fields
     */
    private function formatDoctorResults($doctors)
    {
        foreach ($doctors as &$doctor) {
            // Decode JSON fields
            if (isset($doctor['qualifications']) && $doctor['qualifications']) {
                $doctor['qualifications'] = json_decode($doctor['qualifications'], true) ?: [];
            } else {
                $doctor['qualifications'] = [];
            }

            if (isset($doctor['specializations']) && $doctor['specializations']) {
                $doctor['specializations'] = json_decode($doctor['specializations'], true) ?: [];
            } else {
                $doctor['specializations'] = [];
            }

            if (isset($doctor['schedule']) && $doctor['schedule']) {
                $doctor['schedule'] = json_decode($doctor['schedule'], true) ?: [];
            } else {
                $doctor['schedule'] = [];
            }

            // Ensure numeric fields are properly typed
            if (isset($doctor['rating'])) {
                $doctor['rating'] = (float)$doctor['rating'];
            }
            if (isset($doctor['consultation_fee'])) {
                $doctor['consultation_fee'] = (float)$doctor['consultation_fee'];
            }
            if (isset($doctor['experience_years'])) {
                $doctor['experience_years'] = (int)$doctor['experience_years'];
            }
            if (isset($doctor['is_top_doctor'])) {
                $doctor['is_top_doctor'] = (bool)$doctor['is_top_doctor'];
            }
        }
        return $doctors;
    }
}

// Example usage if running directly
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    try {
        $doctorQueries = new DoctorQueries();

        echo "Doctor Queries Class loaded successfully!\n";
        echo "Available methods:\n";
        echo "- getAllDoctors()\n";
        echo "- getDoctorById(\$id)\n";
        echo "- getDoctorsBySpecialty(\$specialty)\n";
        echo "- getTopDoctors(\$limit)\n";
        echo "- searchDoctors(\$searchTerm)\n";
        echo "- updateDoctor(\$id, \$data)\n";
        echo "- deleteDoctor(\$id, \$hardDelete)\n";
        echo "- getSpecialties()\n";
        echo "- getDoctorsWithPagination(\$page, \$perPage)\n";
        echo "- getDoctorsCount()\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
