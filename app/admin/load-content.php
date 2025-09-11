<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    http_response_code(403);
    echo '<div class="text-center p-8"><p class="text-red-600">Access denied</p></div>';
    exit();
}

$page = $_GET['page'] ?? 'dashboard';

// Define the page mappings
$pageFiles = [
    'dashboard' => 'dashboard-content.php',
    'appointments' => 'appointments-content.php',
    'consultations' => 'consultations-content.php',
    'patients' => 'patients-content.php',
    'doctors' => 'doctors-content.php',
    'messages' => 'messages-content.php'
];

// Check if the requested page exists
if (isset($pageFiles[$page])) {
    $filePath = __DIR__ . '/' . $pageFiles[$page];

    if (file_exists($filePath)) {
        include $filePath;
    } else {
        // If file doesn't exist, show placeholder content
        // echo generatePlaceholderContent(ucfirst($page));
    }
} else {
    echo '<div class="text-center p-8"><p class="text-red-600">Page not found</p></div>';
}

// function generatePlaceholderContent($pageName)
// {
//     return "
//     <div class='mb-8'>
//         <h1 class='text-3xl font-bold text-gray-900'>$pageName</h1>
//         <p class='text-gray-600 mt-2'>Welcome to the $pageName section.</p>
//     </div>
    
//     <div class='bg-white rounded-lg shadow p-8 text-center'>
//         <div class='w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4'>
//             <svg class='w-8 h-8 text-blue-600' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
//                 <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'></path>
//             </svg>
//         </div>
//         <h3 class='text-lg font-semibold text-gray-900 mb-2'>$pageName Content</h3>
//         <p class='text-gray-600 mb-4'>This section is under development. Content will be added soon.</p>
//         <div class='bg-gray-50 rounded-lg p-4 text-sm text-gray-500'>
//             <p>Features coming soon:</p>
//             <ul class='list-disc list-inside mt-2 space-y-1'>
//                 <li>View and manage " . strtolower($pageName) . "</li>
//                 <li>Advanced filtering and search</li>
//                 <li>Export functionality</li>
//                 <li>Real-time updates</li>
//             </ul>
//         </div>
//     </div>";
// }