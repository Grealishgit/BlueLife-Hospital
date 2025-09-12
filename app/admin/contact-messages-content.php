<?php
require_once __DIR__ . '/../contact-handler.php';

// Initialize contact message handler
$contactHandler = new ContactMessageHandler();

// Fetch messages data for admin
try {
    $allMessages = $contactHandler->getAllMessages(100, 0); // Get up to 100 messages

    // Calculate statistics
    $totalMessages = count($allMessages);
    $unreadCount = count(array_filter($allMessages, fn($m) => $m['status'] === 'unread'));
    $readCount = count(array_filter($allMessages, fn($m) => $m['status'] === 'read'));
    $repliedCount = count(array_filter($allMessages, fn($m) => $m['status'] === 'replied'));
    $archivedCount = count(array_filter($allMessages, fn($m) => $m['status'] === 'archived'));

    // Today's messages
    $today = date('Y-m-d');
    $todaysMessages = array_filter($allMessages, fn($m) => date('Y-m-d', strtotime($m['created_at'])) === $today);
    $todaysCount = count($todaysMessages);

    // User vs Guest messages
    $userMessages = count(array_filter($allMessages, fn($m) => $m['message_type'] === 'user'));
    $guestMessages = count(array_filter($allMessages, fn($m) => $m['message_type'] === 'guest'));

    // Group by subject
    $messageSubjects = [];
    foreach ($allMessages as $message) {
        $subject = $message['subject'];
        if (!isset($messageSubjects[$subject])) {
            $messageSubjects[$subject] = 0;
        }
        $messageSubjects[$subject]++;
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    $allMessages = [];
    $totalMessages = 0;
    $unreadCount = 0;
    $readCount = 0;
    $repliedCount = 0;
    $archivedCount = 0;
    $todaysCount = 0;
    $userMessages = 0;
    $guestMessages = 0;
    $messageSubjects = [];
}

// Helper function to format subject display
function formatSubject($subject)
{
    $subjects = [
        'appointment' => 'Schedule Appointment',
        'billing' => 'Billing Question',
        'medical' => 'Medical Inquiry',
        'insurance' => 'Insurance Information',
        'feedback' => 'Feedback',
        'other' => 'Other'
    ];
    return $subjects[$subject] ?? ucfirst($subject);
}

// Helper function to get status badge class
function getStatusBadgeClass($status)
{
    switch ($status) {
        case 'unread':
            return 'bg-red-100 text-red-800';
        case 'read':
            return 'bg-yellow-100 text-yellow-800';
        case 'replied':
            return 'bg-green-100 text-green-800';
        case 'archived':
            return 'bg-gray-100 text-gray-800';
        default:
            return 'bg-blue-100 text-blue-800';
    }
}

// Helper function to get message type badge class
function getMessageTypeBadgeClass($type)
{
    switch ($type) {
        case 'user':
            return 'bg-blue-100 text-blue-800';
        case 'guest':
            return 'bg-purple-100 text-purple-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
}
?>

<div class="contact-messages-admin-content">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Contact Messages Management</h2>
        <p class="text-gray-600 mt-2">Manage and respond to contact messages from users and guests.</p>
    </div>

    <!-- Error Display -->
    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Messages</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($totalMessages); ?></p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Unread Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Unread</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($unreadCount); ?></p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Replied Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Replied</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($repliedCount); ?></p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Today's Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Today's Messages</p>
                    <p class="text-3xl font-bold text-gray-900"><?php echo number_format($todaysCount); ?></p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Type Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- User Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">User Messages</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($userMessages); ?></p>
                </div>
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Guest Messages -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Guest Messages</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($guestMessages); ?></p>
                </div>
                <div class="p-3 bg-purple-100 rounded-full">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Response Rate -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Response Rate</p>
                    <p class="text-2xl font-bold text-gray-900">
                        <?php echo $totalMessages > 0 ? number_format(($repliedCount / $totalMessages) * 100, 1) : 0; ?>%
                    </p>
                </div>
                <div class="p-3 bg-indigo-100 rounded-full">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v4">
                        </path>
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
                <label for="searchMessages" class="block text-sm font-medium text-gray-700 mb-2">Search Messages</label>
                <input type="text" id="searchMessages" placeholder="Search by name, email, or message content..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status Filter -->
            <div class="lg:w-48">
                <label for="statusFilter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="statusFilter"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Statuses</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
                    <option value="archived">Archived</option>
                </select>
            </div>

            <!-- Type Filter -->
            <div class="lg:w-48">
                <label for="typeFilter" class="block text-sm font-medium text-gray-700 mb-2">Message Type</label>
                <select id="typeFilter"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Types</option>
                    <option value="user">User Messages</option>
                    <option value="guest">Guest Messages</option>
                </select>
            </div>

            <!-- Subject Filter -->
            <div class="lg:w-48">
                <label for="subjectFilter" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                <select id="subjectFilter"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Subjects</option>
                    <option value="appointment">Appointment</option>
                    <option value="billing">Billing</option>
                    <option value="medical">Medical</option>
                    <option value="insurance">Insurance</option>
                    <option value="feedback">Feedback</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">All Contact Messages</h3>
            <p class="mt-1 text-sm text-gray-600">Manage contact messages and their statuses</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Sender</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subject</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody id="messagesTableBody" class="bg-white divide-y divide-gray-200">
                    <?php if (empty($allMessages)): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg>
                                    <p class="text-lg font-medium">No messages found</p>
                                    <p class="text-sm">No contact messages have been submitted yet.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($allMessages as $message): ?>
                            <tr class="message-row hover:bg-gray-50" data-status="<?php echo $message['status']; ?>"
                                data-type="<?php echo $message['message_type']; ?>"
                                data-subject="<?php echo $message['subject']; ?>"
                                data-search="<?php echo strtolower($message['first_name'] . ' ' . $message['last_name'] . ' ' . $message['email'] . ' ' . $message['message']); ?>">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                <span class="text-sm font-medium text-gray-700">
                                                    <?php echo strtoupper(substr($message['first_name'], 0, 1) . substr($message['last_name'], 0, 1)); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?php echo htmlspecialchars($message['first_name'] . ' ' . $message['last_name']); ?>
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <?php echo $message['user_id'] ? 'Registered User' : 'Guest'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"><?php echo htmlspecialchars($message['email']); ?></div>
                                    <div class="text-sm text-gray-500">
                                        <?php echo htmlspecialchars($message['phone'] ?: 'No phone'); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        <?php echo formatSubject($message['subject']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getMessageTypeBadgeClass($message['message_type']); ?>">
                                        <?php echo ucfirst($message['message_type']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo getStatusBadgeClass($message['status']); ?>">
                                        <?php echo ucfirst($message['status']); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?php echo date('M j, Y g:i A', strtotime($message['created_at'])); ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="viewMessage(<?php echo $message['id']; ?>)"
                                        class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                    <button
                                        onclick="updateStatus(<?php echo $message['id']; ?>, '<?php echo $message['status']; ?>')"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Update</button>
                                    <button onclick="deleteMessage(<?php echo $message['id']; ?>)"
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

<!-- View Message Modal -->
<div id="viewMessageModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative mx-4 max-h-[90vh] overflow-y-auto">
        <button onclick="closeViewModal()"
            class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Message Details</h2>
        </div>

        <div id="messageDetails" class="space-y-4">
            <!-- Details will be loaded here -->
        </div>
    </div>
</div>

<!-- Update Status Modal -->
<div id="updateStatusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative mx-4">
        <button onclick="closeUpdateModal()"
            class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>

        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Update Message Status</h2>
        </div>

        <form id="updateStatusForm" onsubmit="submitStatusUpdate(event)">
            <input type="hidden" id="messageId" name="message_id">

            <div class="mb-4">
                <label for="newStatus" class="block text-sm font-medium text-gray-700 mb-2">New Status</label>
                <select id="newStatus" name="status" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Status</option>
                    <option value="unread">Unread</option>
                    <option value="read">Read</option>
                    <option value="replied">Replied</option>
                    <option value="archived">Archived</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">
                    Update Status
                </button>
                <button type="button" onclick="closeUpdateModal()"
                    class="flex-1 bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Contact Messages Management -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchMessages');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const subjectFilter = document.getElementById('subjectFilter');
        const messageRows = document.querySelectorAll('.message-row');

        function filterMessages() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedStatus = statusFilter.value.toLowerCase();
            const selectedType = typeFilter.value.toLowerCase();
            const selectedSubject = subjectFilter.value.toLowerCase();

            messageRows.forEach(row => {
                const searchData = row.getAttribute('data-search');
                const status = row.getAttribute('data-status');
                const type = row.getAttribute('data-type');
                const subject = row.getAttribute('data-subject');

                // Check all filter conditions
                const matchesSearch = !searchTerm || searchData.includes(searchTerm);
                const matchesStatus = !selectedStatus || status === selectedStatus;
                const matchesType = !selectedType || type === selectedType;
                const matchesSubject = !selectedSubject || subject === selectedSubject;

                // Show/hide row based on all conditions
                if (matchesSearch && matchesStatus && matchesType && matchesSubject) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Add event listeners for real-time filtering
        searchInput.addEventListener('input', filterMessages);
        statusFilter.addEventListener('change', filterMessages);
        typeFilter.addEventListener('change', filterMessages);
        subjectFilter.addEventListener('change', filterMessages);
    });

    // View message details
    function viewMessage(messageId) {
        fetch(`../contact-handler.php?action=get_message_details&id=${messageId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const message = data.message;
                    const detailsDiv = document.getElementById('messageDetails');

                    detailsDiv.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="font-semibold text-gray-700">Sender Information</h3>
                            <p><strong>Name:</strong> ${message.first_name} ${message.last_name}</p>
                            <p><strong>Email:</strong> ${message.email}</p>
                            <p><strong>Phone:</strong> ${message.phone || 'Not provided'}</p>
                            <p><strong>Type:</strong> ${message.message_type === 'user' ? 'Registered User' : 'Guest'}</p>
                            ${message.user_id ? `<p><strong>User ID:</strong> ${message.user_id}</p>` : ''}
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-700">Message Details</h3>
                            <p><strong>Subject:</strong> ${message.subject}</p>
                            <p><strong>Status:</strong> <span class="px-2 py-1 text-xs rounded-full ${getStatusClass(message.status)}">${message.status}</span></p>
                            <p><strong>IP Address:</strong> ${message.ip_address || 'Not recorded'}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-700">Message Content</h3>
                        <div class="mt-2 p-3 bg-gray-50 rounded max-h-40 overflow-y-auto">${message.message}</div>
                    </div>
                    ${message.web3forms_response ? `
                        <div class="mt-4">
                            <h3 class="font-semibold text-gray-700">Email Delivery Status</h3>
                            <div class="mt-2 p-3 bg-blue-50 rounded text-sm">
                                <span class="text-green-600">✅ Email notification sent successfully</span>
                            </div>
                        </div>
                    ` : ''}
                    <div class="mt-4 text-sm text-gray-500">
                        <p><strong>Received:</strong> ${new Date(message.created_at).toLocaleString()}</p>
                        <p><strong>Last Updated:</strong> ${new Date(message.updated_at).toLocaleString()}</p>
                    </div>
                `;

                    document.getElementById('viewMessageModal').classList.remove('hidden');
                } else {
                    alert('Error loading message details: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while loading message details.');
            });
    }

    // Update message status
    function updateStatus(messageId, currentStatus) {
        document.getElementById('messageId').value = messageId;
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

        fetch('../contact-handler.php', {
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

    // Delete message
    function deleteMessage(messageId) {
        if (confirm('Are you sure you want to delete this message? This action cannot be undone.')) {
            fetch('../contact-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=delete_message&message_id=${messageId}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Message deleted successfully!');
                        location.reload();
                    } else {
                        alert('Error deleting message: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the message.');
                });
        }
    }

    // Modal functions
    function closeViewModal() {
        document.getElementById('viewMessageModal').classList.add('hidden');
    }

    function closeUpdateModal() {
        document.getElementById('updateStatusModal').classList.add('hidden');
    }

    // Helper function for status styling
    function getStatusClass(status) {
        switch (status) {
            case 'unread':
                return 'bg-red-100 text-red-800';
            case 'read':
                return 'bg-yellow-100 text-yellow-800';
            case 'replied':
                return 'bg-green-100 text-green-800';
            case 'archived':
                return 'bg-gray-100 text-gray-800';
            default:
                return 'bg-blue-100 text-blue-800';
        }
    }

    // Close modals when clicking outside
    document.addEventListener('click', function(event) {
        const viewModal = document.getElementById('viewMessageModal');
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
    .message-row {
        transition: background-color 0.2s ease;
    }
</style>