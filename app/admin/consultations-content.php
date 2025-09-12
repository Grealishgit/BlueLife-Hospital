<?php
require_once __DIR__ . '/../consultation-handler.php';

// Initialize consultation handler
$consultationHandler = new ConsultationHandler();

// Fetch consultations data for admin
try {
    $allConsultations = $consultationHandler->getAllConsultations(100, 0); // Get up to 100 consultations

    // Calculate statistics
    $totalConsultations = count($allConsultations);
    $pendingCount = count(array_filter($allConsultations, fn($c) => $c['status'] === 'pending'));
    $confirmedCount = count(array_filter($allConsultations, fn($c) => $c['status'] === 'confirmed'));
    $completedCount = count(array_filter($allConsultations, fn($c) => $c['status'] === 'completed'));
    $cancelledCount = count(array_filter($allConsultations, fn($c) => $c['status'] === 'cancelled'));

    // Today's consultations
    $today = date('Y-m-d');
    $todaysConsultations = array_filter($allConsultations, fn($c) => $c['preferred_date'] === $today);
    $todaysCount = count($todaysConsultations);

    // Group by consultation type
    $consultationTypes = [];
    foreach ($allConsultations as $consultation) {
        $type = $consultation['consultation_type'];
        if (!isset($consultationTypes[$type])) {
            $consultationTypes[$type] = 0;
        }
        $consultationTypes[$type]++;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    $allConsultations = [];
    $totalConsultations = 0;
    $pendingCount = 0;
    $confirmedCount = 0;
    $completedCount = 0;
    $cancelledCount = 0;
    $todaysCount = 0;
    $consultationTypes = [];
}

// Helper function to format consultation type display
function formatConsultationType($type)
{
    $types = [
        'emergency' => 'Emergency Care',
        'cardiology' => 'Cardiology',
        'neurology' => 'Neurology',
        'pediatrics' => 'Pediatrics',
        'orthopedics' => 'Orthopedics',
        'obgyn' => 'OB/GYN',
        'general' => 'General Medicine'
    ];
    return $types[$type] ?? ucfirst($type);
}

// Helper function to get status badge class
function getStatusBadgeClass($status)
{
    switch ($status) {
        case 'pending':
            return 'bg-yellow-100 text-yellow-800';
        case 'confirmed':
            return 'bg-blue-100 text-blue-800';
        case 'completed':
            return 'bg-green-100 text-green-800';
        case 'cancelled':
            return 'bg-red-100 text-red-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
}

// Helper function to calculate age from year of birth
function calculateAgeFromYear($yearOfBirth)
{
    if (!$yearOfBirth) return 'N/A';
    return date('Y') - $yearOfBirth;
}
?>

<div class="consultations-admin-content">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Consultations Management</h2>
        <p class="text-gray-600 mt-2">Manage and view all consultation requests with comprehensive administrative controls.</p>
    </div>

    <!-- Error Display -->
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Consultations -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Consultations</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($totalConsultations); ?></p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Pending Consultations -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pending</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($pendingCount); ?></p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-full">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Confirmed Consultations -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Confirmed</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($confirmedCount); ?></p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Today's Consultations -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Today's Schedule</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($todaysCount); ?></p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Completed -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-emerald-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($completedCount); ?></p>
                </div>
                <div class="p-3 bg-emerald-100 rounded-full">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Cancelled -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Cancelled</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($cancelledCount); ?></p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Completion Rate -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Completion Rate</p>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo $totalConsultations > 0 ? number_format(($completedCount / $totalConsultations) * 100, 1) : 0; ?>%
                    </p>
                </div>
                <div class="p-3 bg-indigo-100 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Controls -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <label for="searchConsultations" class="block text-sm font-medium text-gray-700 mb-2">Search Consultations</label>
                <input type="text" id="searchConsultations" placeholder="Search by patient name, email, or phone..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status Filter -->
            <div class="lg:w-48">
                <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="statusFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Type Filter -->
            <div class="lg:w-48">
                <label for="typeFilter" class="block text-sm font-medium text-gray-700 mb-2">Consultation Type</label>
                <select id="typeFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Types</option>
                    <option value="emergency">Emergency</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="neurology">Neurology</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="orthopedics">Orthopedics</option>
                    <option value="obgyn">OB/GYN</option>
                    <option value="general">General</option>
                </select>
            </div>

            <!-- Date Filter -->
            <div class="lg:w-48">
                <label for="dateFilter" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                <input type="date" id="dateFilter"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <!-- Consultations Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">All Consultations</h3>
            <p class="mt-1 text-sm text-gray-600">Manage consultation requests and their statuses</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Patient</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Schedule</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="consultationsTableBody" class="bg-white divide-y divide-gray-200">
                    <?php if (empty($allConsultations)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <p class="text-lg font-medium">No consultations found</p>
                                    <p class="text-sm">No consultation requests have been submitted yet.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($allConsultations as $consultation): ?>
                            <tr class="consultation-row hover:bg-gray-50"
                                data-status="<?php echo $consultation['status']; ?>"
                                data-type="<?php echo $consultation['consultation_type']; ?>"
                                data-date="<?php echo $consultation['preferred_date']; ?>"
                                data-search="<?php echo strtolower($consultation['first_name'] . ' ' . $consultation['last_name'] . ' ' . $consultation['email'] . ' ' . $consultation['phone']); ?>">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                <span class="text-sm font-medium text-gray-700">
                                                    <?php echo strtoupper(substr($consultation['first_name'], 0, 1) . substr($consultation['last_name'], 0, 1)); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?php echo htmlspecialchars($consultation['first_name'] . ' ' . $consultation['last_name']); ?>
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <?php echo ucfirst($consultation['gender']); ?>,
                                                <?php echo calculateAgeFromYear($consultation['year_of_birth']); ?> years
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?php echo htmlspecialchars($consultation['email']); ?></div>
                                    <div class="text-sm text-gray-500"><?php echo htmlspecialchars($consultation['phone']); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <?php echo formatConsultationType($consultation['consultation_type']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <div><?php echo date('M j, Y', strtotime($consultation['preferred_date'])); ?></div>
                                    <div class="text-gray-500"><?php echo date('g:i A', strtotime($consultation['preferred_time'])); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusBadgeClass($consultation['status']); ?>">
                                        <?php echo ucfirst($consultation['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo date('M j, Y g:i A', strtotime($consultation['created_at'])); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="viewConsultation(<?php echo $consultation['id']; ?>)"
                                        class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                    <button onclick="updateStatus(<?php echo $consultation['id']; ?>, '<?php echo $consultation['status']; ?>')"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Update</button>
                                    <button onclick="deleteConsultation(<?php echo $consultation['id']; ?>)"
                                        class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- View Consultation Modal -->
<div id="viewConsultationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative mx-4 max-h-[90vh] overflow-y-auto">
        <button onclick="closeViewModal()" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Consultation Details</h2>
        </div>

        <div id="consultationDetails" class="space-y-4">
            <!-- Details will be loaded here -->
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div id="updateStatusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative mx-4">
        <button onclick="closeUpdateModal()" class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Update Consultation Status</h2>
        </div>

        <form id="updateStatusForm" onsubmit="submitStatusUpdate(event)">
            <input type="hidden" id="consultationId" name="consultation_id">

            <div class="mb-4">
                <label for="newStatus" class="block text-sm font-medium text-gray-700 mb-2">New Status</label>
                <select id="newStatus" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Status</option>
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                    Update Status
                </button>
                <button type="button" onclick="closeUpdateModal()" class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Consultations Management -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchConsultations');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const dateFilter = document.getElementById('dateFilter');
        const consultationRows = document.querySelectorAll('.consultation-row');

        function filterConsultations() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedStatus = statusFilter.value.toLowerCase();
            const selectedType = typeFilter.value.toLowerCase();
            const selectedDate = dateFilter.value;

            consultationRows.forEach(row => {
                const searchData = row.getAttribute('data-search');
                const status = row.getAttribute('data-status');
                const type = row.getAttribute('data-type');
                const date = row.getAttribute('data-date');

                // Check all filter conditions
                const matchesSearch = !searchTerm || searchData.includes(searchTerm);
                const matchesStatus = !selectedStatus || status === selectedStatus;
                const matchesType = !selectedType || type === selectedType;
                const matchesDate = !selectedDate || date === selectedDate;

                // Show/hide row based on all conditions
                if (matchesSearch && matchesStatus && matchesType && matchesDate) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Add event listeners for real-time filtering
        searchInput.addEventListener('input', filterConsultations);
        statusFilter.addEventListener('change', filterConsultations);
        typeFilter.addEventListener('change', filterConsultations);
        dateFilter.addEventListener('change', filterConsultations);
    });

    // View consultation details
    function viewConsultation(consultationId) {
        fetch(`../consultation-handler.php?action=get_consultation_details&id=${consultationId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const consultation = data.consultation;
                    const detailsDiv = document.getElementById('consultationDetails');

                    detailsDiv.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="font-semibold text-gray-700">Patient Information</h3>
                            <p><strong>Name:</strong> ${consultation.first_name} ${consultation.last_name}</p>
                            <p><strong>Email:</strong> ${consultation.email}</p>
                            <p><strong>Phone:</strong> ${consultation.phone}</p>
                            <p><strong>Gender:</strong> ${consultation.gender}</p>
                            <p><strong>Age:</strong> ${new Date().getFullYear() - consultation.year_of_birth} years</p>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700">Consultation Details</h3>
                            <p><strong>Type:</strong> ${consultation.consultation_type}</p>
                            <p><strong>Date:</strong> ${new Date(consultation.preferred_date).toLocaleDateString()}</p>
                            <p><strong>Time:</strong> ${consultation.preferred_time}</p>
                            <p><strong>Status:</strong> <span class="px-2 py-1 text-xs rounded-full ${getStatusClass(consultation.status)}">${consultation.status}</span></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-700">Reason for Visit</h3>
                        <p class="mt-2 p-3 bg-gray-50 rounded">${consultation.reason_for_visit || 'No reason provided'}</p>
                    </div>
                    ${consultation.additional_notes ? `
                        <div class="mt-4">
                            <h3 class="font-semibold text-gray-700">Additional Notes</h3>
                            <p class="mt-2 p-3 bg-gray-50 rounded">${consultation.additional_notes}</p>
                        </div>
                    ` : ''}
                    <div class="mt-4 text-sm text-gray-500">
                        <p><strong>Created:</strong> ${new Date(consultation.created_at).toLocaleString()}</p>
                        <p><strong>Last Updated:</strong> ${new Date(consultation.updated_at).toLocaleString()}</p>
                    </div>
                `;

                    document.getElementById('viewConsultationModal').classList.remove('hidden');
                } else {
                    alert('Error loading consultation details: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while loading consultation details.');
            });
    }

    // Update consultation status
    function updateStatus(consultationId, currentStatus) {
        document.getElementById('consultationId').value = consultationId;
        document.getElementById('newStatus').value = currentStatus;
        document.getElementById('updateStatusModal').classList.remove('hidden');
    }

    // Submit status update
    function submitStatusUpdate(event) {
        event.preventDefault();

        const formData = new FormData(document.getElementById('updateStatusForm'));
        formData.append('action', 'update_status');

        const submitBtn = event.target.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Updating...';
        submitBtn.disabled = true;

        fetch('../consultation-handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Status updated successfully!');
                    location.reload(); // Refresh the page to show updated data
                } else {
                    alert('Error updating status: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the status.');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                closeUpdateModal();
            });
    }

    // Delete consultation
    function deleteConsultation(consultationId) {
        if (confirm('Are you sure you want to delete this consultation? This action cannot be undone.')) {
            fetch('../consultation-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=delete_consultation&consultation_id=${consultationId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Consultation deleted successfully!');
                        location.reload();
                    } else {
                        alert('Error deleting consultation: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the consultation.');
                });
        }
    }

    // Modal functions
    function closeViewModal() {
        document.getElementById('viewConsultationModal').classList.add('hidden');
    }

    function closeUpdateModal() {
        document.getElementById('updateStatusModal').classList.add('hidden');
    }

    // Helper function for status styling
    function getStatusClass(status) {
        switch (status) {
            case 'pending':
                return 'bg-yellow-100 text-yellow-800';
            case 'confirmed':
                return 'bg-blue-100 text-blue-800';
            case 'completed':
                return 'bg-green-100 text-green-800';
            case 'cancelled':
                return 'bg-red-100 text-red-800';
            default:
                return 'bg-gray-100 text-gray-800';
        }
    }

    // Close modals when clicking outside
    document.addEventListener('click', function(event) {
        const viewModal = document.getElementById('viewConsultationModal');
        const updateModal = document.getElementById('updateStatusModal');

        if (event.target === viewModal) {
            closeViewModal();
        }
        if (event.target === updateModal) {
            closeUpdateModal();
        }
    });
</script>

<style>
    .consultation-row {
        transition: background-color 0.2s ease;
    }
</style>