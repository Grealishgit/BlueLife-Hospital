<?php
require_once __DIR__ . '/../Queries/doctor_queries.php';

class DoctorsData
{
    private static $doctorQueries = null;

    /**
     * Get DoctorQueries instance
     */
    private static function getDoctorQueries()
    {
        if (self::$doctorQueries === null) {
            self::$doctorQueries = new DoctorQueries();
        }
        return self::$doctorQueries;
    }

    /**
     * Format doctor data from database to match expected format
     */
    private static function formatDoctorData($doctor)
    {
        if (!$doctor) return null;

        return [
            'id' => (int)$doctor['id'],
            'name' => $doctor['name'],
            'specialty' => $doctor['specialty'],
            'specialtyDisplay' => $doctor['specialty_display'],
            'experience' => $doctor['experience'],
            'experience_years' => (int)$doctor['experience_years'],
            'image' => $doctor['image'],
            'education' => $doctor['education'],
            'bio' => $doctor['bio'],
            'qualifications' => $doctor['qualifications'] ?? [],
            'specializations' => $doctor['specializations'] ?? [],
            'schedule' => $doctor['schedule'] ?? [],
            'phone' => $doctor['phone'],
            'email' => $doctor['email'],
            'rating' => (float)$doctor['rating'],
            'consultation_fee' => (float)$doctor['consultation_fee'],
            'availability' => $doctor['availability'],
            'is_top_doctor' => (bool)$doctor['is_top_doctor']
        ];
    }

    public static function getAllDoctors()
    {
        try {
            $doctors = self::getDoctorQueries()->getAllDoctors();
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[$doctor['id']] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            // Fallback: return empty array or handle error as needed
            error_log("Error fetching doctors: " . $e->getMessage());
            return [];
        }
    }
    public static function getDoctorById($id)
    {
        try {
            $doctor = self::getDoctorQueries()->getDoctorById($id);
            return self::formatDoctorData($doctor);
        } catch (Exception $e) {
            error_log("Error fetching doctor by ID $id: " . $e->getMessage());
            return null;
        }
    }

    public static function getDoctorsBySpecialty($specialty)
    {
        try {
            $doctors = self::getDoctorQueries()->getDoctorsBySpecialty($specialty);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching doctors by specialty $specialty: " . $e->getMessage());
            return [];
        }
    }

    public static function getTopDoctors($limit = null)
    {
        try {
            $doctors = self::getDoctorQueries()->getTopDoctors($limit ?: 10);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching top doctors: " . $e->getMessage());
            return [];
        }
    }

    public static function searchDoctors($searchTerm)
    {
        try {
            $doctors = self::getDoctorQueries()->searchDoctors($searchTerm);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error searching doctors with term '$searchTerm': " . $e->getMessage());
            return [];
        }
    }

    public static function getDoctorsByRating($order = 'desc')
    {
        try {
            $doctors = self::getDoctorQueries()->getDoctorsByRating($order);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching doctors by rating: " . $e->getMessage());
            return [];
        }
    }

    public static function getDoctorsByExperience($order = 'desc')
    {
        try {
            $doctors = self::getDoctorQueries()->getDoctorsByExperience($order);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching doctors by experience: " . $e->getMessage());
            return [];
        }
    }

    public static function getRandomDoctors($limit = 3)
    {
        try {
            $doctors = self::getDoctorQueries()->getRandomDoctors($limit);
            $formattedDoctors = [];

            foreach ($doctors as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching random doctors: " . $e->getMessage());
            return [];
        }
    }

    public static function getSpecialties()
    {
        try {
            return self::getDoctorQueries()->getAvailableSpecialties();
        } catch (Exception $e) {
            error_log("Error fetching available specialties: " . $e->getMessage());
            return [];
        }
    }

    // Alias for backward compatibility
    public static function getAvailableSpecialties()
    {
        return self::getSpecialties();
    }

    public static function getDoctorsWithPagination($page = 1, $perPage = 6)
    {
        try {
            $offset = ($page - 1) * $perPage;
            $result = self::getDoctorQueries()->getDoctorsPaginated($perPage, $offset);

            $formattedDoctors = [];
            foreach ($result['doctors'] as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return $formattedDoctors;
        } catch (Exception $e) {
            error_log("Error fetching paginated doctors: " . $e->getMessage());
            return [];
        }
    }

    public static function getDoctorsCount()
    {
        try {
            return self::getDoctorQueries()->getTotalDoctorsCount();
        } catch (Exception $e) {
            error_log("Error fetching doctors count: " . $e->getMessage());
            return 0;
        }
    }

    // Utility method to get doctors for pagination with full details
    public static function getDoctorsPaginated($page = 1, $perPage = 10, $specialty = null)
    {
        try {
            $offset = ($page - 1) * $perPage;
            $result = self::getDoctorQueries()->getDoctorsPaginated($perPage, $offset, $specialty);

            $formattedDoctors = [];
            foreach ($result['doctors'] as $doctor) {
                $formattedDoctors[] = self::formatDoctorData($doctor);
            }

            return [
                'doctors' => $formattedDoctors,
                'total' => $result['total'],
                'page' => $page,
                'perPage' => $perPage,
                'totalPages' => ceil($result['total'] / $perPage)
            ];
        } catch (Exception $e) {
            error_log("Error fetching paginated doctors: " . $e->getMessage());
            return [
                'doctors' => [],
                'total' => 0,
                'page' => $page,
                'perPage' => $perPage,
                'totalPages' => 0
            ];
        }
    }
}