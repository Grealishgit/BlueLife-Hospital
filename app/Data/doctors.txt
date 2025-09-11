<?php

class DoctorsData
{

    public static function getAllDoctors()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Dr. Sarah Johnson',
                'specialty' => 'cardiology',
                'specialtyDisplay' => 'Cardiologist',
                'experience' => '15+ years',
                'experience_years' => 15,
                'image' => '/storage/uploads/doctor1.png',
                'education' => 'MD from Harvard Medical School',
                'bio' => 'Dr. Sarah Johnson is a board-certified cardiologist with over 15 years of experience in treating cardiovascular diseases. She specializes in preventive cardiology and heart disease management with a focus on patient-centered care.',
                'qualifications' => ['MD - Harvard Medical School', 'Residency - Johns Hopkins Hospital', 'Fellowship - Mayo Clinic', 'Board Certified Cardiologist'],
                'specializations' => ['Heart Disease', 'Hypertension', 'Preventive Cardiology', 'Echocardiography', 'Cardiac Catheterization'],
                'schedule' => ['Monday: 9:00 AM - 5:00 PM', 'Tuesday: 9:00 AM - 5:00 PM', 'Wednesday: 9:00 AM - 3:00 PM', 'Friday: 9:00 AM - 5:00 PM'],
                'phone' => '+1 (555) 123-4567',
                'email' => 'sarah.johnson@Sheywe Community.com',
                'rating' => 4.9,
                'consultation_fee' => 150,
                'availability' => 'Mon-Fri',
                'is_top_doctor' => true
            ],
            2 => [
                'id' => 2,
                'name' => 'Dr. Michael Chen',
                'specialty' => 'neurology',
                'specialtyDisplay' => 'Neurologist',
                'experience' => '12+ years',
                'experience_years' => 12,
                'image' => '/storage/uploads/doctor2.png',
                'education' => 'MD from Stanford University',
                'bio' => 'Dr. Michael Chen is a skilled neurologist specializing in brain and nervous system disorders. He has extensive experience in treating stroke, epilepsy, and neurodegenerative diseases with cutting-edge treatment methods.',
                'qualifications' => ['MD - Stanford University', 'Residency - UCSF Medical Center', 'Fellowship - Cleveland Clinic', 'Board Certified Neurologist'],
                'specializations' => ['Stroke Treatment', 'Epilepsy', 'Parkinson\'s Disease', 'Multiple Sclerosis', 'Alzheimer\'s Disease'],
                'schedule' => ['Monday: 8:00 AM - 4:00 PM', 'Wednesday: 8:00 AM - 4:00 PM', 'Thursday: 8:00 AM - 4:00 PM', 'Friday: 8:00 AM - 2:00 PM'],
                'phone' => '+1 (555) 234-5678',
                'email' => 'michael.chen@Sheywe Community.com',
                'rating' => 4.8,
                'consultation_fee' => 180,
                'availability' => 'Mon-Thu',
                'is_top_doctor' => true
            ],
            3 => [
                'id' => 3,
                'name' => 'Dr. Emily Rodriguez',
                'specialty' => 'pediatrics',
                'specialtyDisplay' => 'Pediatrician',
                'experience' => '8+ years',
                'experience_years' => 8,
                'image' => '/storage/uploads/doctor3.png',
                'education' => 'MD from UCLA School of Medicine',
                'bio' => 'Dr. Emily Rodriguez is a compassionate pediatrician dedicated to providing comprehensive healthcare for children from infancy through adolescence. She believes in building strong relationships with families.',
                'qualifications' => ['MD - UCLA School of Medicine', 'Residency - Children\'s Hospital Los Angeles', 'Board Certified Pediatrician', 'Adolescent Medicine Fellowship'],
                'specializations' => ['General Pediatrics', 'Vaccinations', 'Growth & Development', 'Adolescent Medicine', 'Behavioral Health'],
                'schedule' => ['Monday: 9:00 AM - 6:00 PM', 'Tuesday: 9:00 AM - 6:00 PM', 'Thursday: 9:00 AM - 6:00 PM', 'Saturday: 9:00 AM - 1:00 PM'],
                'phone' => '+1 (555) 345-6789',
                'email' => 'emily.rodriguez@Sheywe Community.com',
                'rating' => 4.9,
                'consultation_fee' => 120,
                'availability' => 'Tue-Sat',
                'is_top_doctor' => true
            ],
            4 => [
                'id' => 4,
                'name' => 'Dr. James Wilson',
                'specialty' => 'orthopedics',
                'specialtyDisplay' => 'Orthopedic Surgeon',
                'experience' => '20+ years',
                'experience_years' => 20,
                'image' => '/storage/uploads/doctor2.png',
                'education' => 'MD from Johns Hopkins University',
                'bio' => 'Dr. James Wilson is a renowned orthopedic surgeon specializing in joint replacement surgery and sports medicine. He has performed over 2,000 successful surgeries with excellent patient outcomes.',
                'qualifications' => ['MD - Johns Hopkins University', 'Residency - Mayo Clinic', 'Fellowship - Hospital for Special Surgery', 'Board Certified Orthopedic Surgeon'],
                'specializations' => ['Joint Replacement', 'Sports Medicine', 'Arthroscopic Surgery', 'Spine Surgery', 'Trauma Surgery'],
                'schedule' => ['Monday: 7:00 AM - 5:00 PM', 'Wednesday: 7:00 AM - 5:00 PM', 'Friday: 7:00 AM - 3:00 PM'],
                'phone' => '+1 (555) 456-7890',
                'email' => 'james.wilson@Sheywe Community.com',
                'rating' => 4.7,
                'consultation_fee' => 200,
                'availability' => 'Mon-Wed, Fri',
                'is_top_doctor' => true
            ],
            5 => [
                'id' => 5,
                'name' => 'Dr. Lisa Thompson',
                'specialty' => 'dermatology',
                'specialtyDisplay' => 'Dermatologist',
                'experience' => '10+ years',
                'experience_years' => 10,
                'image' => '/storage/uploads/doctor1.png',
                'education' => 'MD from University of Pennsylvania',
                'bio' => 'Dr. Lisa Thompson is an expert dermatologist specializing in both medical and cosmetic dermatology. She is passionate about helping patients achieve healthy, beautiful skin through evidence-based treatments.',
                'qualifications' => ['MD - University of Pennsylvania', 'Residency - NYU Langone Health', 'Fellowship - Mount Sinai', 'Board Certified Dermatologist'],
                'specializations' => ['Medical Dermatology', 'Cosmetic Dermatology', 'Skin Cancer Treatment', 'Psoriasis', 'Acne Treatment'],
                'schedule' => ['Monday: 9:00 AM - 5:00 PM', 'Tuesday: 9:00 AM - 5:00 PM', 'Wednesday: 9:00 AM - 5:00 PM', 'Thursday: 9:00 AM - 5:00 PM', 'Friday: 9:00 AM - 3:00 PM'],
                'phone' => '+1 (555) 567-8901',
                'email' => 'lisa.thompson@Sheywe Community.com',
                'rating' => 4.8,
                'consultation_fee' => 140,
                'availability' => 'Mon-Fri',
                'is_top_doctor' => false
            ],
            6 => [
                'id' => 6,
                'name' => 'Dr. Robert Kumar',
                'specialty' => 'psychiatry',
                'specialtyDisplay' => 'Psychiatrist',
                'experience' => '14+ years',
                'experience_years' => 14,
                'image' => '/storage/uploads/doctor3.png',
                'education' => 'MD from Yale School of Medicine',
                'bio' => 'Dr. Robert Kumar is a compassionate psychiatrist specializing in anxiety disorders, depression, and cognitive behavioral therapy. He takes a holistic approach to mental health treatment.',
                'qualifications' => ['MD - Yale School of Medicine', 'Residency - McLean Hospital', 'Fellowship - Massachusetts General Hospital', 'Board Certified Psychiatrist'],
                'specializations' => ['Anxiety Disorders', 'Depression', 'Cognitive Behavioral Therapy', 'PTSD', 'Bipolar Disorder'],
                'schedule' => ['Tuesday: 10:00 AM - 6:00 PM', 'Wednesday: 10:00 AM - 6:00 PM', 'Thursday: 10:00 AM - 6:00 PM'],
                'phone' => '+1 (555) 678-9012',
                'email' => 'robert.kumar@Sheywe Community.com',
                'rating' => 4.6,
                'consultation_fee' => 160,
                'availability' => 'Tue-Thu',
                'is_top_doctor' => false
            ],
            7 => [
                'id' => 7,
                'name' => 'Dr. Maria Garcia',
                'specialty' => 'cardiology',
                'specialtyDisplay' => 'Interventional Cardiologist',
                'experience' => '18+ years',
                'experience_years' => 18,
                'image' => '/storage/uploads/doctor2.png',
                'education' => 'MD from Mayo Clinic',
                'bio' => 'Dr. Maria Garcia is a pioneer in minimally invasive cardiac procedures and heart catheterization. She has revolutionized cardiac care with her innovative techniques and patient-first approach.',
                'qualifications' => ['MD - Mayo Clinic', 'Residency - Cleveland Clinic', 'Fellowship - Cedars-Sinai', 'Board Certified Interventional Cardiologist'],
                'specializations' => ['Interventional Cardiology', 'Heart Catheterization', 'Angioplasty', 'Stent Placement', 'Structural Heart Disease'],
                'schedule' => ['Monday: 8:00 AM - 5:00 PM', 'Tuesday: 8:00 AM - 5:00 PM', 'Wednesday: 8:00 AM - 5:00 PM', 'Thursday: 8:00 AM - 5:00 PM', 'Friday: 8:00 AM - 3:00 PM'],
                'phone' => '+1 (555) 789-0123',
                'email' => 'maria.garcia@Sheywe Community.com',
                'rating' => 4.9,
                'consultation_fee' => 220,
                'availability' => 'Mon-Fri',
                'is_top_doctor' => true
            ],
            8 => [
                'id' => 8,
                'name' => 'Dr. David Lee',
                'specialty' => 'neurology',
                'specialtyDisplay' => 'Neurosurgeon',
                'experience' => '16+ years',
                'experience_years' => 16,
                'image' => '/storage/uploads/doctor1.png',
                'education' => 'MD from Cleveland Clinic',
                'bio' => 'Dr. David Lee is a renowned neurosurgeon specializing in brain tumor removal and spinal surgery. His precision and expertise have saved countless lives and improved patient outcomes.',
                'qualifications' => ['MD - Cleveland Clinic', 'Residency - Johns Hopkins', 'Fellowship - Barrow Neurological Institute', 'Board Certified Neurosurgeon'],
                'specializations' => ['Brain Surgery', 'Spinal Surgery', 'Tumor Removal', 'Minimally Invasive Surgery', 'Epilepsy Surgery'],
                'schedule' => ['Monday: 6:00 AM - 4:00 PM', 'Tuesday: 6:00 AM - 4:00 PM', 'Wednesday: 6:00 AM - 4:00 PM'],
                'phone' => '+1 (555) 890-1234',
                'email' => 'david.lee@Sheywe Community.com',
                'rating' => 4.8,
                'consultation_fee' => 250,
                'availability' => 'Mon-Wed',
                'is_top_doctor' => true
            ]
        ];
    }

    // Helper function to get a single doctor by ID
    public static function getDoctorById($id)
    {
        $doctors = self::getAllDoctors();
        return isset($doctors[$id]) ? $doctors[$id] : null;
    }

    // Get top doctors only
    public static function getTopDoctors($limit = null)
    {
        $doctors = self::getAllDoctors();
        $topDoctors = array_filter($doctors, function ($doctor) {
            return $doctor['is_top_doctor'];
        });

        if ($limit) {
            return array_slice($topDoctors, 0, $limit, true);
        }

        return $topDoctors;
    }

    // Get doctors by specialty
    public static function getDoctorsBySpecialty($specialty)
    {
        $doctors = self::getAllDoctors();
        return array_filter($doctors, function ($doctor) use ($specialty) {
            return $doctor['specialty'] === $specialty;
        });
    }

    // Search doctors by name or specialty
    public static function searchDoctors($searchTerm)
    {
        $doctors = self::getAllDoctors();
        $searchTerm = strtolower($searchTerm);

        return array_filter($doctors, function ($doctor) use ($searchTerm) {
            return strpos(strtolower($doctor['name']), $searchTerm) !== false ||
                strpos(strtolower($doctor['specialtyDisplay']), $searchTerm) !== false ||
                strpos(strtolower($doctor['education']), $searchTerm) !== false;
        });
    }

    // Get doctors sorted by rating
    public static function getDoctorsByRating($order = 'desc')
    {
        $doctors = self::getAllDoctors();
        uasort($doctors, function ($a, $b) use ($order) {
            if ($order === 'desc') {
                return $b['rating'] <=> $a['rating'];
            } else {
                return $a['rating'] <=> $b['rating'];
            }
        });
        return $doctors;
    }

    // Get doctors sorted by experience
    public static function getDoctorsByExperience($order = 'desc')
    {
        $doctors = self::getAllDoctors();
        uasort($doctors, function ($a, $b) use ($order) {
            if ($order === 'desc') {
                return $b['experience_years'] <=> $a['experience_years'];
            } else {
                return $a['experience_years'] <=> $b['experience_years'];
            }
        });
        return $doctors;
    }

    // Get random doctors for featured section
    public static function getRandomDoctors($limit = 3)
    {
        $doctors = self::getAllDoctors();
        $randomKeys = array_rand($doctors, min($limit, count($doctors)));

        if (!is_array($randomKeys)) {
            $randomKeys = [$randomKeys];
        }

        $randomDoctors = [];
        foreach ($randomKeys as $key) {
            $randomDoctors[$key] = $doctors[$key];
        }

        return $randomDoctors;
    }

    // Get available specialties
    public static function getSpecialties()
    {
        $doctors = self::getAllDoctors();
        $specialties = array_unique(array_column($doctors, 'specialty'));
        return $specialties;
    }

    // Get doctors with pagination
    public static function getDoctorsWithPagination($page = 1, $perPage = 6)
    {
        $doctors = self::getAllDoctors();
        $offset = ($page - 1) * $perPage;
        return array_slice($doctors, $offset, $perPage, true);
    }

    // Get total count of doctors
    public static function getDoctorsCount()
    {
        return count(self::getAllDoctors());
    }
}