<?php
// Include database configuration
require_once __DIR__ . '/../../config/database.php';

// Patients Data Class
class PatientsData
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function getAllPatients()
    {
        try {
            $stmt = $this->db->prepare("
                SELECT id, first_name, last_name, phone, gender, 
                       dob, email, created_at 
                FROM users 
                WHERE role = 'patient' 
                ORDER BY created_at DESC
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching patients: " . $e->getMessage());
            return [];
        }
    }

    public function getPatientsStats()
    {
        try {
            $stats = [];

            // Total patients
            $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM users WHERE role = 'patient'");
            $stmt->execute();
            $stats['total'] = $stmt->fetch()['total'];

            // New patients this month
            $stmt = $this->db->prepare("
                SELECT COUNT(*) as new_this_month 
                FROM users 
                WHERE role = 'patient' 
                AND MONTH(created_at) = MONTH(CURRENT_DATE()) 
                AND YEAR(created_at) = YEAR(CURRENT_DATE())
            ");
            $stmt->execute();
            $stats['new_this_month'] = $stmt->fetch()['new_this_month'];

            // Gender distribution
            $stmt = $this->db->prepare("
                SELECT gender, COUNT(*) as count 
                FROM users 
                WHERE role = 'patient' 
                GROUP BY gender
            ");
            $stmt->execute();
            $genderData = $stmt->fetchAll();
            $stats['male'] = 0;
            $stats['female'] = 0;
            foreach ($genderData as $data) {
                $stats[$data['gender']] = $data['count'];
            }

            // Age groups
            $stmt = $this->db->prepare("
                SELECT 
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) < 18 THEN 1 ELSE 0 END) as minors,
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN 18 AND 64 THEN 1 ELSE 0 END) as adults,
                    SUM(CASE WHEN TIMESTAMPDIFF(YEAR, dob, CURDATE()) >= 65 THEN 1 ELSE 0 END) as seniors
                FROM users 
                WHERE role = 'patient' AND dob IS NOT NULL
            ");
            $stmt->execute();
            $ageStats = $stmt->fetch();
            $stats['minors'] = $ageStats['minors'] ?? 0;
            $stats['adults'] = $ageStats['adults'] ?? 0;
            $stats['seniors'] = $ageStats['seniors'] ?? 0;

            return $stats;
        } catch (PDOException $e) {
            error_log("Error fetching patient stats: " . $e->getMessage());
            return [
                'total' => 0,
                'new_this_month' => 0,
                'male' => 0,
                'female' => 0,
                'minors' => 0,
                'adults' => 0,
                'seniors' => 0
            ];
        }
    }

    public function calculateAge($dateOfBirth)
    {
        if (!$dateOfBirth) return 'N/A';
        $birthDate = new DateTime($dateOfBirth);
        $today = new DateTime();
        return $today->diff($birthDate)->y;
    }
}

// Initialize data
$patientsData = new PatientsData();
$allPatients = $patientsData->getAllPatients();
$patientsStats = $patientsData->getPatientsStats();
?>

<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Patients Overview</h2>
    <p class="text-gray-600 mt-2">Manage and view all patients registered in the system.</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Patients -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Patients</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo number_format($patientsStats['total']); ?></p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <!-- New This Month -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">New This Month</p>
                <p class="text-3xl font-bold text-gray-900">
                    <?php echo number_format($patientsStats['new_this_month']); ?></p>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Male Patients -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Male Patients</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo number_format($patientsStats['male']); ?></p>
            </div>
            <div class="p-3 bg-purple-100 rounded-full">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Female Patients -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-pink-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Female Patients</p>
                <p class="text-3xl font-bold text-gray-900"><?php echo number_format($patientsStats['female']); ?></p>
            </div>
            <div class="p-3 bg-pink-100 rounded-full">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Age Distribution Cards -->
<div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
    <!-- Minors -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Minors (Under 18)</p>
                <p class="text-2xl font-bold text-gray-900"><?php echo number_format($patientsStats['minors']); ?></p>
            </div>
            <div class="p-3 bg-yellow-100 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.5a2.5 2.5 0 002.5-2.5V6a2.5 2.5 0 00-2.5-2.5H9m12 0H3">
                    </path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Adults -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Adults (18-64)</p>
                <p class="text-2xl font-bold text-gray-900"><?php echo number_format($patientsStats['adults']); ?></p>
            </div>
            <div class="p-3 bg-indigo-100 rounded-full">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Seniors -->
    <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-gray-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Seniors (65+)</p>
                <p class="text-2xl font-bold text-gray-900"><?php echo number_format($patientsStats['seniors']); ?></p>
            </div>
            <div class="p-3 bg-gray-100 rounded-full">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filter Controls -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Search -->
        <div class="flex-1">
            <label for="searchPatients" class="block text-sm font-medium text-gray-700 mb-2">Search Patients</label>
            <input type="text" id="searchPatients" placeholder="Search by name, email, or phone..."
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Gender Filter -->
        <div class="md:w-48">
            <label for="genderFilter" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
            <select id="genderFilter"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Genders</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <!-- Age Group Filter -->
        <div class="md:w-48">
            <label for="ageFilter" class="block text-sm font-medium text-gray-700 mb-2">Age Group</label>
            <select id="ageFilter"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Ages</option>
                <option value="minor">Minors (Under 18)</option>
                <option value="adult">Adults (18-64)</option>
                <option value="senior">Seniors (65+)</option>
            </select>
        </div>
    </div>
</div>

<!-- Patients Table -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">All Patients</h3>
        <p class="mt-1 text-sm text-gray-600">A list of all patients in the system</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Age</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Registered</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                    </th>
                </tr>
            </thead>
            <tbody id="patientsTableBody" class="bg-white divide-y divide-gray-200">
                <?php if (empty($allPatients)): ?>
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                            <p class="text-lg font-medium">No patients found</p>
                            <p class="text-sm">No patients are currently registered in the system.</p>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($allPatients as $patient): ?>
                <tr class="patient-row hover:bg-gray-50" data-gender="<?php echo strtolower($patient['gender']); ?>"
                    data-age="<?php echo $patientsData->calculateAge($patient['dob']); ?>"
                    data-search="<?php echo strtolower($patient['first_name'] . ' ' . $patient['last_name'] . ' ' . $patient['email'] . ' ' . $patient['phone']); ?>">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-700">
                                        <?php echo strtoupper(substr($patient['first_name'], 0, 1) . substr($patient['last_name'], 0, 1)); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <?php echo htmlspecialchars($patient['first_name'] . ' ' . $patient['last_name']); ?>
                                </div>
                                <div class="text-sm text-gray-500">ID: <?php echo $patient['id']; ?></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($patient['email']); ?></div>
                        <div class="text-sm text-gray-500"><?php echo htmlspecialchars($patient['phone']); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    <?php echo $patient['gender'] === 'male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800'; ?>">
                            <?php echo ucfirst($patient['gender']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <?php echo $patientsData->calculateAge($patient['dob']); ?> years
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo date('M j, Y', strtotime($patient['created_at'])); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="viewPatient(<?php echo $patient['id']; ?>)"
                            class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                        <button onclick="editPatient(<?php echo $patient['id']; ?>)"
                            class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                        <button onclick="deletePatient(<?php echo $patient['id']; ?>)"
                            class="text-red-600 hover:text-red-900">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript for Filtering and Search -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchPatients');
    const genderFilter = document.getElementById('genderFilter');
    const ageFilter = document.getElementById('ageFilter');
    const patientRows = document.querySelectorAll('.patient-row');

    function filterPatients() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedGender = genderFilter.value.toLowerCase();
        const selectedAgeGroup = ageFilter.value;

        patientRows.forEach(row => {
            const searchData = row.getAttribute('data-search');
            const gender = row.getAttribute('data-gender');
            const age = parseInt(row.getAttribute('data-age'));

            // Check search term
            const matchesSearch = !searchTerm || searchData.includes(searchTerm);

            // Check gender filter
            const matchesGender = !selectedGender || gender === selectedGender;

            // Check age group filter
            let matchesAge = true;
            if (selectedAgeGroup) {
                switch (selectedAgeGroup) {
                    case 'minor':
                        matchesAge = age < 18;
                        break;
                    case 'adult':
                        matchesAge = age >= 18 && age <= 64;
                        break;
                    case 'senior':
                        matchesAge = age >= 65;
                        break;
                }
            }

            // Show/hide row based on all conditions
            if (matchesSearch && matchesGender && matchesAge) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Add event listeners
    searchInput.addEventListener('input', filterPatients);
    genderFilter.addEventListener('change', filterPatients);
    ageFilter.addEventListener('change', filterPatients);
});

// Patient action functions
function viewPatient(patientId) {
    alert(`View patient details for ID: ${patientId}`);
    // Implement view patient modal/page here
}

function editPatient(patientId) {
    alert(`Edit patient with ID: ${patientId}`);
    // Implement edit patient modal/form here
}

function deletePatient(patientId) {
    if (confirm('Are you sure you want to delete this patient?')) {
        alert(`Delete patient with ID: ${patientId}`);
        // Implement delete patient functionality here
    }
}
</script>

<style>
.patient-row {
    transition: background-color 0.2s ease;
}
</style>